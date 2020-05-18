@extends('layouts.second_layout.app')
@section('header')
    <title>Edit {{$article->title}}</title>
@endsection
@section('content')
    <h1>Edit Article </h1>
    <br>
    <form enctype="multipart/form-data" method="POST"
          action="{{route('articles.update',['language' =>app()->getLocale() ,'article' =>$article ])}}">
        @csrf
        <div class="form-group">
            <label for="title">Article title</label>
            <input type="text" class="form-control @error('title')  border-danger @enderror " name="title"
                   style="background-color: white ;color: #1b1e21"
                   placeholder="Article title "
                   value="{{$article->title}}">
            @error('title')
            <small class="help text-danger" style="color: red">{{$errors->first('title')}}</small>
            @enderror

        </div>
        <div class="form-group">

            <label for="description">Article description</label>
            <input type="text" class="form-control @error('description') border-danger @enderror"
                   name="description"
                   placeholder="Article description "
                   style="background-color: white;color: #1b1e21"
                   value="{{$article->description}}">
            @error('description')
            <small class="help text-danger" style="color: red">{{$errors->first('description')}}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="body">Article body</label>
            <textarea class="form-control @error('body')border-danger @enderror" name="body" rows="5"
                      placeholder="Article body"
                      style="background-color: white;color: #1b1e21">{{old('body')}}{{$article->body}}</textarea>
            @if($errors->has('body'))
                <small class="help text-danger" style="color: red">{{$errors->first('body')}}</small>
            @endif
        </div>

        <div class="form-group">
            <label for="study_major_id">Study major</label>
            <select class="form-control" id="study_major_id" name="study_major_id"
                    style="background-color: white;color: #1b1e21">
                @foreach($study_majors as $study_major)
                    <option value="{{$study_major->id}}">{{$study_major->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group p-4">
            <input type="file" value="{{old('image_src')}}" name="image_src" class="form-control"
                   style="margin-top: 5px ;color: #1b1e21">
            {{old('image_src')}}
            @error('image_src')
            <small class="help text-danger" style="color: red">{{$message}}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="">Article publisher : {{auth()->user()->name}}</label>
            <button type="submit" class="btn btn-primary " style="margin-top:10px " value="upload">Update</button>
        </div>


    </form>


@endsection
