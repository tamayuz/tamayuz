<?php

namespace App\Http\Controllers;

use App\Article;
use App\StudyMajor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/*
study_major_id
user_id
image_src
title
description
body
is Accepted
byHow
*/

class ArticleController extends Controller
{


    public function index(Request $request)
    {
        if ($study_major = $request->study_major) {
            $study_major = StudyMajor::find($request->study_major);
            $articles = $study_major->article ;

        } else {
            $articles = Article::latest()->where('is_accepted', true)->get();

        }

        return view('article.index', [
            'articles' => $articles,
        ]);
    }

    public function create()
    {
        return view('article.create', [
            'study_majors' => StudyMajor::all(),


        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $article = new Article($data);

        if (isset($request->image_src)) {
            $image = $request->file('image_src');
            $path = Storage::put('/public/article_images', $image, 'public');
            $path = str_replace('public', '/storage', $path);
            $article->image_src = $path;
        } else {

            $article->image_src = "/images/D_Article.png";

        }


        $article->user_id = auth()->user()->id;
        $article->save();

        return redirect(route('articles.index', app()->getLocale()));


    }

    public function show($a, Article $article)
    {
        return view('article.show', [
            'article' => $article,


        ]);
    }

    public function edit($a, Article $article)
    {
        return view('article.edit', [
            'article' => $article,
            'study_majors' => StudyMajor::all()

        ]);
    }

    public function update($q, Request $request, Article $article)
    {

        $path = $article->image_src;
        $article = Article::find($article->id);
        $data = $this->validateData($request);
        $article->title = $data['title'];
        $article->body = $data['body'];
        $article->description = $data['description'];
        $article->study_major_id = $data['study_major_id'];


        if (isset($request->image_src)) {
            $image = $request->file('image_src');
            $path = Storage::put('/public/article_images', $image, 'public');
            $path = str_replace('public', '/storage', $path);
            $article->image_src = $path;
        } else {

            $article->image_src = $path;

        }


        $article->user_id = auth()->user()->id;
        $article->save();
        return redirect(route('articles.show', ['language' => app()->getLocale(), 'article' => $article]));
    }

    public function destroy($a, Article $article)
    {
        $path = $article->image_src;
        $path = str_replace('storage', 'public', $path);

        Storage::delete($path);
        $article->delete();
        return back();
    }

    public function accept($a, Article $article)
    {
        $this->authorize('full_access');
        $article->is_accepted = true;
        $article->save();
        return back();
    }

    public function managerIndex()
    {
        $this->authorize('full_access');

        return view('article.manage', [
            'accepted_articles' => Article::latest()->where('is_accepted', true)->get(),
            'not_accepted_articles' => Article::latest()->where('is_accepted', false)
                ->orWhere('is_accepted', null)
                ->get()
        ]);

    }


    public function validateData(Request $request)
    {

        return $request->validate([
            'title' => 'required',
            'study_major_id' => 'required',
            'body' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:512',


        ]);


    }

}
