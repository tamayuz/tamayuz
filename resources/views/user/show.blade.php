@extends('layouts.second_layout.app')
@section('header')
    <title>{{$user->name}}</title>
@endsection
@section('content')


    <div class="image round left ">
        <img src="{{$user->image_src}}">
    </div>

    <br>
    <div>
        <h1> {{__('Articles :count :',['count' => $articles->count()])}}</h1>
        <un>
            @foreach($articles as $article)
                <li>
                    <a href="{{route('articles.show',['language' =>app()->getLocale() , 'article' =>$article] )}}">{{$article->title}}</a>
                </li>
            @endforeach
                <hr>
            @if($project)
                <h1> {{$project->title}}</h1>
            @else
                    <h1>{{__('No project !')}}</h1>

            @endif


        </un>
    </div>
    <hr>
    <footer style="margin-top: 4px; margin-leftleft: 4px">
        <p> {{__('Name : ')}}{{$user->name}}<br> {{__('Study major : ')}}{{__($user->study_major->name)}}</p>
    </footer>
@endsection
