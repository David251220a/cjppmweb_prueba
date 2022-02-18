<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:user.index')->only('index');
        $this->middleware('permission:user.create')->only('create');
        $this->middleware('permission:user.create')->only('store');
        $this->middleware('permission:user.show')->only('show');
        $this->middleware('permission:user.edit')->only('edit');
        $this->middleware('permission:user.edit')->only('update');
    }

    public function index(Request $request)
    {
        if ($request->search) {
            $data = User::where('username', 'LIKE', '%' . $request->search . '%')->orWhere('name', 'LIKE', '%' . $request->search . '%')->orWhere('lastname', 'LIKE', '%' . $request->search . '%')->orWhere('email', 'LIKE', '%' . $request->search . '%')->orWhere('phone', 'LIKE', '%' . $request->search . '%')->orderBy('username')->paginate(50);
        } else {
            $data = User::where('id', '!=', 1)->orderBy('username')->paginate(50);
        }
        return view('users.index', [
            'data' => $data,
        ]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request['document_type'] = 1;
        $request['password'] = bcrypt($request->password);
        User::create($request->all());
        return redirect()->route('user.index')->with(['message' => 'Registro exitoso!']);
    }

    public function show(User $user)
    {
        return view('users.show', [
            'data' => $user
        ]);
    }

    public function edit(User $user)
    {
        $role = Role::get();
        return view('users.edit', [
            'data' => $user,
            'role' => $role,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return redirect()->back()->with(['message' => 'Registro exitoso!']);
    }
}
