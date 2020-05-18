@extends('layouts.second_layout.app')
@section('header')

@endsection
@section('content')
    <div class="form-group">
        <form action="{{route('season.store',app()->getLocale())}}" method="post">
            @method('POST')
            @csrf
            <label for="name" class="form-lable"> {{__('Name')}}</label>
            <input type="text" name="season_name" id="name"
                   style="color: black ;  ; background-color: white ;" class="form-control">
            <button type="submit" class="button-sm" style="margin-top: 4px ; ">{{__('Save')}}</button>

        </form>




@endsection

