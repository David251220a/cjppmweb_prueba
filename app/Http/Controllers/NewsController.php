<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Str;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:news.index')->only('index');
        $this->middleware('permission:news.create')->only('create');
        $this->middleware('permission:news.create')->only('store');
        $this->middleware('permission:news.edit')->only('edit');
        $this->middleware('permission:news.edit')->only('update');
        $this->middleware('permission:news.destroy')->only('destroy');
    }

    public function index(Request $request)
    {
        if ($request->search) {
            $data = News::where('title', 'LIKE', '%' . $request->search . '%')->orderByDesc('created_at')->paginate(50);
        } else {
            $data = News::orderByDesc('created_at')->paginate(50);
        }
        return view('news.index', compact('data'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $data['title'] = $request->title;
        $data['content'] = $request->content;
        $data['slug'] = Str::slug($request->title, '-') . '-' .  date('ymdi');
        $data['photo'] = '';
        if ($request->photo) {
            $filePath = $request->file('photo')->store('noticias');
            $data['photo'] = $filePath;
        }
        News::create($data);
        return redirect()->route('news.index')->with('message', 'Registro actualizado.');
    }

    public function edit(News $noticia)
    {
        $data = $noticia;
        return view('news.edit', compact('data'));
    }

    public function update(News $noticia, Request $request)
    {
        $data['title'] = $request->title;
        $data['content'] = $request->content;
        if ($request->photo) {
            $filePath = $request->file('photo')->store('noticias');
            $data['photo'] = $filePath;
        }
        $noticia->update($data);
        return redirect()->route('news.index')->with('message', 'Registro actualizado.');
    }
}
