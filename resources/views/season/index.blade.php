@extends('layouts.second_layout.app')
@section('header')
    <link rel="stylesheet" href="/css/app.css">
@endsection
@section('content')

    <div class="row">
        <div class="col-2 border-left border-right">
            @foreach($seasons as $season   )

                <a href="{{route('articles.index', ['language' => app()->getLocale() , 'study_major' => $season   ->id])}}">{{__($season->name)}}</a>
                <br>
                <hr>

            @endforeach
            @can('full_access')
                <a href="{{route('season.create',['language' => app()->getLocale()])}}">ِ{{__('Add new season')}}</a>
                <br>
                <hr>
            @endcan
        </div>
        <div class="col-9">
            @foreach($seasons as $season)

                <h3><span
                        class="text-danger">{{__($season->name)}}  : </span>{{__('has :pcount Project',['pcount' => $season->project->count()])}}
                </h3>
                <hr>


            @endforeach
        </div>
    </div>
@endsection
