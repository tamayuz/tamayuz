@extends('layouts.second_layout.app')
@section('header')
    <title>{{$article->title}}</title>
@endsection
@section('content')


    <div class="image round left  " style="padding-right: 4%; height: 250px ;width: 250px">
        <img src="{{$article->image_src}}">
        <footer style="margin-top: 4px">
            <p>ِ {{__('By : ')}}  {{$article->user->name}}<br> {{__('Study major : ')}} {{__($article->study_major->name)}}</p>
        </footer>
    </div>
    <br>
    <div class="">
        <h4>{{__('title : ')}}<i>{{$article->title}}</i></h4>
        <h5>{{__('Description : ')}}{{$article->description}}</h5>
        <p class="" style="position: relative">
            {{$article->body}}

        </p>
    </div>
    <hr>

@endsection
