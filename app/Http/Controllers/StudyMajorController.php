<?php

namespace App\Http\Controllers;

use App\StudyMajor;
use Illuminate\Http\Request;

class StudyMajorController extends Controller
{
    public function index()
    {
        $study_majors = StudyMajor::all();
        return view('study_major.index', [
            'study_majors' => $study_majors,


        ]);


    }

    public function create(Request $request)
    {
      return view('study_major.create',[
          'study_majors' => StudyMajor::all(),



      ]);

    }
    public function store($a,Request $request)
    {
            $study_major = new StudyMajor();
            $study_major->name = $request->study_major_name;
            $study_major->save();
            return redirect(route('study_major.index',app()->getLocale()));
    }




}
