@extends('layouts.second_layout.app')
@section('header')
    <title>{{__('Create New article ')}}</title>
@endsection
@section('content')
    @auth()

        <div>
            <h1>{{__('New Article')}}</h1>

            <form enctype="multipart/form-data" method="POST" action="{{route('articles.store',app()->getLocale())}}">
                @csrf
                <div class="form-group">
                    <label for="title">{{__('Article title')}}</label>
                    <input type="text" class="form-control @error('title')  border-danger @enderror " name="title"
                           style="background-color: white ;color: #1b1e21"
                           placeholder="{{__('Article title')}} " value="{{old('title')}}">
                    @error('title')
                    <small class="help text-danger" style="color: red">{{$errors->first('title')}}</small>
                    @enderror

                </div>
                <div class="form-group">

                    <label for="description">{{__('Article description')}}</label>
                    <input type="text" class="form-control @error('description') border-danger @enderror"
                           name="description"
                           placeholder="{{__('Article description')}} " value="{{old('description')}}"
                           style="background-color: white;color: #1b1e21">
                    @error('description')
                    <small class="help text-danger" style="color: red">{{$errors->first('description')}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="body">{{__('Article body')}}</label>
                    <textarea class="form-control @error('body')border-danger @enderror" name="body" rows="5"
                              placeholder="{{__('Article body')}}"
                              style="background-color: white;color: #1b1e21">{{old('body')}}</textarea>
                    @if($errors->has('body'))
                        <small class="help text-danger" style="color: red">{{$errors->first('body')}}</small>
                    @endif
                </div>

                <div class="form-group">
                    <label for="study_major_id">{{__('Study major')}}</label>
                    <select class="form-control" id="study_major_id" name="study_major_id" style="background-color: white;color: #1b1e21">
                        @foreach($study_majors as $study_major)
                            <option value="{{$study_major->id}}">{{__($study_major->name)}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group p-4">
                    {{__('Photo ?')}}
                    <input type="file" value="{{old('image_src')}}" name="image_src" class="form-control" style="margin-top: 5px ;color: #1b1e21"
                           >                   {{old('image_src')}}
                    @error('image_src')
                    <small class="help text-danger" style="color: red" >{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">{{__('Article publisher')}} : {{auth()->user()->name}}</label>
                    <button type="submit" class="btn btn-primary " style="margin-top:10px " value="upload">{{__('Publish')}}</button>
                </div>



            </form>

            @endauth

            @guest()
                <div class="align-center">
                    <h1> {{__('You Must Sign In First')}} </h1>
                    <a href="/">
                        <button class="btn-sm">ِِ{{__('Home page')}}</button>
                    </a>
                </div>
            @endguest


        </div>


@endsection
