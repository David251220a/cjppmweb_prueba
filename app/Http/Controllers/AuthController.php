<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Affiliate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function isCheck()
    {
        if (Auth::check()) {
            return redirect()->route('portal')->send();
        }
    }

    public function login(LoginRequest $request)
    {
        $this->isCheck();
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->route('portal');
        }
        return redirect()->back()->withErrors('El Nro. de Documento y/o la contraseña que ha introducido no son válidos')->withInput();
    }

    public function loginForm()
    {
        $this->isCheck();
        return view('auth.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('portal');
    }

    public function forgot(Request $request)
    {
        $this->isCheck();

        $user = User::where('username', $request->document)->where('birth', $request->birthday)->first();
        if (empty($user)) {
            return redirect()->back()->withErrors('Los datos no son válidos')->withInput();
        }

        $pass = mt_rand();

        \Mail::raw("Tu nueva contraseña es $pass", function ($message)  use ($user) {
            $message->to($user->email)->subject('Restablecimiento de contraseña');
        });

        $user->password = bcrypt($pass);
        $user->update();

        return redirect()->route('login')->with(['message' => 'La contraseña se ha restablecido y enviado a su correo electronico'])->withInput();
    }

    public function forgotForm()
    {
        $this->isCheck();
        return view('auth.forgot');
    }

    public function register(Request $request)
    {
        $this->isCheck();
        $affiliate = Affiliate::where('document_number', $request->document)->first();
        if (empty($affiliate)) {
            return redirect()->back()->withErrors('El afiliado no existe')->withInput();
        }

        $user = User::where('username', $request->document)->first();
        if ($user) {
            return redirect()->back()->withErrors('El usuario ya existe')->withInput();
        }

        $doc_f = Storage::putFile('uploads', $request->file('doc_f'));
        $doc_p = Storage::putFile('uploads', $request->file('doc_p'));
        $doc_v = Storage::putFile('uploads', $request->file('doc_v'));

        $user = User::create([
            'username' => $request->document,
            'document_type' => 1,
            'document_number' => $request->document,
            'name' => $request->name,
            'lastname' => $request->lastname,
            'sex' => $request->sex,
            'email' => $request->email,
            'phone' => $request->phone,
            'birth' => $request->birth,
            'password' => bcrypt($request->password),
            'doc_f' => $doc_f,
            'doc_p' => $doc_p,
            'doc_v' => $doc_v,
        ]);

        Auth::login($user);
        return redirect()->route('portal');
    }

    public function registerForm()
    {
        $this->isCheck();
        $this->isCheck();
        return view('auth.register');
    }
}
