@extends('layouts.second_layout.app')
@section('header')
    <title>Edit {{$project->title}}</title>
@endsection
@section('content')
    <h1>{{__('Edit Project ')}}</h1>
    <br>
    <form enctype="multipart/form-data" method="POST"
          action="{{route('projects.update',['language' =>app()->getLocale() ,'project' => $project ])}}">
        @csrf
        <div class="form-group">
            <label for="title">{{__('Project\'s title ')}}</label>
            <input type="text" class="form-control @error('title')  border-danger @enderror " name="title"
                   style="background-color: white ;color: #1b1e21"
                   placeholder="Project title "
                   value="{{old('title') ? :$project->title}}">
            @error('title')
            <small class="help text-danger" style="color: red">{{$message}}</small>
            @enderror

        </div>
        <div class="form-group">
            <label for="description">ِ{{__('Project\'s description ')}}</label>
            <textarea type="text" class="form-control @error('description') border-danger @enderror"
                      name="description"
                      placeholder="Project description "
                      style="background-color: white;color: #1b1e21"
                      value="">{{old('description') ? :$project->description}}</textarea>
            @error('description')
            <small class="help text-danger" style="color: red">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="powerpoint_src">ِ{{__('Project\'s PowerPoint')}}</label>
            <input type="file" class="form-control @error('powerpoint_src')  border-danger @enderror "
                   name="powerpoint_src"
                   style="background-color: white ;color: #1b1e21"
                   placeholder="Project's PowerPoint "
                   value="{{old('powerpoint_src')? :$project->powerpoint_src}}">
            @error('powerpoint_src')
            <small class="help text-danger" style="color: red">{{$message}}</small>
            @enderror

        </div>
        <div class="form-group">
            <label for="title">{{__('Project\'s Video source')}}</label>
            <input type="text" class="form-control @error('video_src')  border-danger @enderror " name="video_src"
                   style="background-color: white ;color: #1b1e21"
                   placeholder="Project video_src "
                   value="{{old('video_src')? : $project->video_src}}"
                   >
            @error('video_src')
            <small class="help text-danger" style="color: red">{{$message}}</small>
            @enderror

        </div>


        <div class="form-group">
            <label for="study_major_id">{{__('Study major')}}</label>
            <select class="form-control" id="study_major_id" name="study_major_id"
                    style="background-color: white;color: #1b1e21"
                    value="{{$project->study_major_id}}">
                @foreach($study_majors as $study_major)
                    <option value="{{$study_major->id}}">{{$study_major->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group p-4">
            <label for="photo">{{__('Photo')}}</label>
            <input type="file" id="photo" value="{{old('image_src')}}" name="image_src" class="form-control"
                   style="margin-top: 5px ;color: #1b1e21">
            {{old('image_src')}}
            @error('image_src')
            <small class="help text-danger" style="color: red">{{$message}}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="">{{__('Project publisher : ')}}{{auth()->user()->name}}</label>
            <button type="submit" class="btn btn-primary " style="margin-top:10px "
                    value="upload">{{__('Upload')}}</button>
        </div>
        <div class="form-group">
            @error('university')
            {{$message}}
            @enderror
            <input type="hidden" name="university" value="{{$project->university}}">
            <input type="hidden" name="season_id" value="{{$project->season_id}}">
            @error('study_major_id')
            {{$message}}
            @enderror        </div>


    </form>


@endsection
