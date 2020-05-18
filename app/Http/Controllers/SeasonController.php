<?php

namespace App\Http\Controllers;

use App\Project;
use App\season;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    public function index()
    {
        $seasons = season::all();
        return view('season.index', [
            'seasons' => $seasons,



        ]);


    }
    public function create(Request $request)
    {
        return view('season.create',[
            'seasons' => season::all(),



        ]);

    }
    public function store($a,Request $request)
    {
        $season = new season();
        $season->name = $request->season_name;
        $season->save();
        return redirect(route('season.index',app()->getLocale()));
    }
}
