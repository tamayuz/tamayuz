<?php

namespace App\Http\Controllers;

use App\Article;
use App\Project;
use App\season;
use App\StudyMajor;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $article_counter = Article::where('is_accepted', true)->count();
        $project_counter = Project::where('is_accepted', true)->count();
        $user_counter = User::count();
        $seasons = season::all();
        $study_major = StudyMajor::all();
        return view('layouts.main_layout.index', [
            'article_counter' => $article_counter,
            'project_counter' => $project_counter,
            'user_counter' => $user_counter,
            'seasons' => $seasons,
            'study_major' => $study_major,
        ]);


    }
}
