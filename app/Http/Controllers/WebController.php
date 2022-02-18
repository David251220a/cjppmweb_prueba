<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Departments;
use App\Models\Forms;
use App\Models\Ley2991;
use App\Models\Ley5189;
use App\Models\News;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $ley = Ley5189::orderBy('name')->get();
        $news = News::OrderByDesc('id')->limit(10)->get();

        return view('index', compact(['ley', 'news']));
    }

    public function contact()
    {
        return view('www.contact');
    }

    public function contactSend(ContactRequest $request)
    {
        $data = json_encode($request->all());

        Forms::create([
            'form' => 'contact',
            'data' => $data,
        ]);

        return redirect()->back()->with('message', 'Mensaje enviado!');
    }

    public function departments($slug = null)
    {
        if ($slug) {
            $data = Departments::where('title', str_replace('-', ' ', $slug))->first();
            if (!$data) {
                return abort(404);
            }
        } else {
            $data = Departments::OrderBy('title')->get();
        }
        return view('www.departments', compact('data'));
    }

    public function institutional()
    {
        return view('www.institutional');
    }

    public function institutionalAuthorities()
    {
        return view('www.authorities');
    }

    public function institutionalHistory()
    {
        return view('www.history');
    }

    public function institutionalMedical()
    {
        return view('www.medical');
    }

    public function institutionalSocial()
    {
        return view('www.social');
    }

    public function ley5189($slug = null)
    {
        $month = $this->month();
        if ($slug) {
            $data = Ley5189::where('slug', $slug)->first();
            if (!$data) {
                return abort(404);
            }
        } else {
            $data = Ley5189::orderBy('name')->get();
        }
        return view('www.ley5189', compact(['month', 'data']));
    }
    
    public function ley2991($slug = null)
    {
        $month = $this->month();
        if ($slug) {
            $data = Ley2991::where('slug', $slug)->first();
            if (!$data) {
                return abort(404);
            }
        } else {
            $data = Ley2991::orderBy('id')->get();
        }
        return view('www.ley2991', compact(['month', 'data']));
    }

    public function news($slug = null)
    {
        if ($slug) {
            $data = News::where('slug', $slug)->first();
            if (!$data) {
                return abort(404);
            }
        } else {
            $data = News::OrderByDesc('created_at')->get();
        }
        return view('www.news', compact('data'));
    }
}
