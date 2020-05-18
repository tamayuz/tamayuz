@extends('layouts.second_layout.app')
@section('header')
    <title>{{$project->title}}</title>
    <style>
        a {
            text-decoration: none;
        }

        .text-danger {

            color: red;
        }

    </style>
@endsection
@section('content')

    <div class="image round left  " style="padding-right: 4%; height: 250px ;width: 250px">
        <img src="{{$project->image_src}}">
        <footer style="margin-top: 4px">
            <p> {{__('By : ')}}{{$project->user->name}}<br> {{__('Study major : ')}}{{$project->studyMajor->name}}</p>
            <p class="text-danger">{{$project->season->name}}</p>

        </footer>
    </div>
    <br>
    <div class="">
        <h4>{{__('title : ')}}<u>{{$project->title}}</u></h4>
        <h5>{{__('Description : ')}}{{$project->description}}</h5>
        <p class="" style="position: relative">
            {{$project->body}}


        </p>

        <a href="{{$project->powerpoint_src}}">
            <code>{{__('Power point source : ')}}{{$project->powerpoint_src ? :__('Null') }}</code></a><br>
        <a href="{{$project->image_src}}"> <code>ِ{{__('Image source : ')}}{{$project->image_src  ? :__('Null')}}</code></a><br>
        <a href="{{$project->video_src}}"> <code>ِ{{__('Video source : ')}}{{$project->video_src  ? :__('Null')}}</code></a><br>

    </div>
    <hr>

@endsection
