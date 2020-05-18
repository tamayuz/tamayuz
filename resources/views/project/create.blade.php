@extends('layouts.second_layout.app')
@section('header')
    <link rel="stylesheet" href="/css/app.css">
    <style>
        input {
            color: black;
            border-color: red;
        }

        .black {
            color: black;
            border-color: red;
        }

    </style>

@endsection
@section('content')
    @auth()
        @can('createProject')
            <div class="col-sm-12">
                <form action="{{route('projects.store',app()->getLocale())}}" class="add-form" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label " for="name">{{__('Project Title')}}</label>
                            <input class="form-control black  {{ $errors->has('title') ? 'danger' : '' }}" name="title"
                                   id="name" type="text" placeholder="Project title" value="{{ old('title') }}"
                                   style="background:white; color: black;"
                            >
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="university">{{__('University')}}</label>
                            <input class="form-control {{ $errors->has('university') ? 'danger' : '' }}" type="text"
                                   name="university" id="university" value="{{ old('university') }}"
                                   placeholder="University Name"
                                   style="background:white; color: black;"/>

                        </div>


                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label" for="study_major_id">Category</label>
                            <div class="select-wrapper">
                                <select class="form-control {{ $errors->has('$study_major_id') ? 'danger' : '' }}"
                                        name="study_major_id" id="study_major_id">
                                    <option value="">- Category -</option>
                                    @foreach ($study_majors as $study_major)
                                        <option
                                            value="{{$study_major->id}}" {{ (old("$study_major") == "$study_major->name" ? "selected":"") }}>
                                            {{$study_major->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-6">
                            <label class="form-label" for="type">{{__('Sub Category')}}</label>
                            <input class="form-control {{ $errors->has('type') ? 'danger' : '' }}" type="text"
                                   name="sub_category" id="sub_category" value="{{ old('sub_category') }}"
                                   placeholder="Sub Category"
                                   style="background:white; color: black;"/>
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label" for="supervisor_name">{{__('Supervisor')}}</label>
                            <input class="form-control {{ $errors->has('supervisor_name') ? 'danger' : '' }}"
                                   type="text"
                                   name="supervisor_name" id="supervisor_name" value="{{ old('supervisor_name') }}"
                                   placeholder="Supervisor Name"
                                   style="background:white; color: black;"/>
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="season">{{__('season')}}</label>
                            <div class="select-wrapper">
                                <select class="form-control {{ $errors->has('season') ? 'danger' : '' }}"
                                        name="season_id" id="season">
                                    <option value="">- Season -</option>
                                    @foreach ($seasons as $season)
                                        <option value="{{$season->id}}"> {{$season->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label" for="date">{{__('Date')}}</label>
                            <input class="form-control {{ $errors->has('date') ? 'danger' : '' }}" type="date"
                                   name="" id="date" value="{{ old('date') }}" placeholder="Date"/>
                            {{--                                    name = date--}}

                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label" for="responsers">{{__('Responsers')}}</label>
                            <input class="form-control {{ $errors->has('responsers') ? 'danger' : '' }}" type="text"
                                   name="" id="responsers" value="{{ old('responsers') }}"
                                   placeholder="Responsers Name"
                                   style="background:white; color: black;"/>
                            {{--                                    name = responsers--}}
                        </div>
                        <div class="form-group col-6 v_link">
                            <label class="form-label" for="video_link">{{__('Video Link')}}</label>
                            <input class="form-control {{ $errors->has('video') ? 'danger' : '' }}" type="text"
                                   name="video_link" id="video_link" value="{{ old('video') }}"
                                   placeholder="Put Video Link"
                                   style="background:white; color: black;"
                            />
                        </div>


                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label" for="file">{{__('Load PowerPoint')}}</label>
                            <input name="PowerPoint_src"
                                   class="form-control {{ $errors->has('PowerPoint_src') ? 'danger' : '' }}"
                                   type="file"
                                   id="PowerPoint_src" value="{{ old('PowerPoint_src') }}"
                                   placeholder="Load PowerPoint"/>
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="image_src">{{__('Load Photo')}}</label>
                            <input name="image_src" class="form-control {{ $errors->has('image_src') ? 'danger' : '' }}"
                                   type="file"
                                   id="image_src" value="{{ old('image_src') }}" placeholder="Load Photo"/>
                        </div>
                    </div>

                    <div class="row">

                        <div class="form-group col-6 v_load">
                            <label class="form-label" for="video">{{__('Load Video')}}</label>
                            <input class="form-control {{ $errors->has('video') ? 'danger' : '' }}" type="file"
                                   id="video" accept="video" value="{{ old('video') }}"
                                   name="video_src"/>
                        </div>

                    </div>
                    <div class="form-group ">
                        <label class="form-label" for="description">{{__('Description')}}</label>
                        <textarea class="form-control {{ $errors->has('description') ? 'danger' : '' }}"
                                  name="description"
                                  id="description" placeholder="Enter your description"
                                  rows="10">{{Request::old('desc')}}</textarea>
                    </div>

                    <div class="btn-group mb-4">
                        <button type="submit" class="">{{__('Upload')}}</button>
                    </div>
                </form>
            </div>



            {{--        @elsecan('false')--}}
            {{--            <div class="align-center">--}}
            {{--                <h1> You already have a project </h1>--}}
            {{--                <a href="{{route('home',app()->getLocale())}}">--}}
            {{--                    <button class="btn-sm" style="margin: 30px ; position: relative">Click to Show it</button>--}}
            {{--                </a>--}}
            {{--            </div>--}}


        @endcan

        @cannot('createProject')

            <div class="align-center">
                <h1> You already have a project  </h1>
                <a href="{{route('projects.index',['language' => app()->getLocale() ])}}">
                    <button class="btn-sm" style="margin: 30px ; position: relative">See All Projects ? </button>
                </a>
            </div>

        @endcannot





    @endauth

    @guest()
        <div class="align-center">
            <h1> You Must Sign In First </h1>
            <a href="{{route('home',app()->getLocale())}}">
                <button class="btn-sm" style="margin: 30px ; position: relative">Home page</button>
            </a>
        </div>
    @endguest



@endsection
