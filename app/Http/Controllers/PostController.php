<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\PostArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('postpage');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\posts
     * ArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostArticleRequest $request)
    {
        $article = new Article();
        $article -> title = $request -> title;
        $article -> body = $request -> body;
        DB::transaction(function () use ($article){
            $article -> save();
        });

        //CSRFトークンを破棄
        $request->session()->regenerateToken();

        return redirect(route('article.index'));

    }
}
