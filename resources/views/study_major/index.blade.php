@extends('layouts.second_layout.app')
@section('header')
    <link rel="stylesheet" href="/css/app.css">
@endsection
@section('content')

    <div class="row">
        <div class="col-2 border-left border-right">
            @foreach($study_majors as $study_major)

                <a href="{{route('articles.index', ['language' => app()->getLocale() , 'study_major' => $study_major->id])}}">{{__($study_major->name)}}</a>
                <br>
                <hr>

            @endforeach
                @can('full_access')
                    <a href="{{route('study_major.create',['language' => app()->getLocale()])}}">ِ{{__('Add new study major')}}</a>
                    <br>
                    <hr>
                @endcan
        </div>
        <div class="col-9">
            @foreach($study_majors as $study_major)

                <h3><span
                        class="text-danger">{{__($study_major->name)}}  : </span>{{__('has :pcount Project and :acount article',['pcount' => $study_major->project->count() ,'acount' => $study_major->article->count() ?  : 0])}}
                </h3>
                <hr>


            @endforeach
        </div>
    </div>
@endsection
