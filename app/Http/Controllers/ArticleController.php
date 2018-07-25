<?php

namespace App\Http\Controllers;

use App\Article;
use App\EditedBy;
use Auth;
use DB;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = new Article;
        $input = $request->only(['title', 'content', 'idSection']);
        $article->title = $request['title'];
        $article->author = Auth::user()->name;
        $article->content = $request['content'];
        $article->idSection = $request['idSection'];
        $article->save();
        return redirect()->route('section.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $relations = EditedBy::all();
        $editors = array();
        foreach ($relations as $relation) {
            if ($relation->idArticle==$article->id){
                array_push($editors, Auth::user()->find($relation->idUser));
            }
        }
        return view('article/view', ['article'=> $article, 'editors' => $editors]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('article.edit', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $input = $request->only(['title', 'content', 'idSection', 'editor']);
        $article->title = $request['title'];
        $article->content = $request['content'];
        $article->idSection = $request['idSection'];
        $article->save();

        $editedBy = new EditedBy;
        $editedBy->idUser = $request['editor'];
        $editedBy->idArticle = $article->id;
        $editedBy->save();

        return redirect()->route('article.show',$article->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
