@extends('layouts.second_layout.app')
@section('header')
    <title>{{__('Project')}}</title>
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/myjs.js"></script>
    @if(app()->getLocale() == 'ar')
        <link rel="stylesheet" href="/css/bootstrap-rtl.css">
    @endif
@endsection
@section('content')

    <div class="container-fluid">
        <p style="display: none"> {{$count = $projects->count() }}</p>
        <header class="align-center">
            <h2>{{__('Tamayuz Projects')}}</h2>
            <p>{{__("Over :count  Projects",[ 'count' => $count])}} </p>

            <hr>
        </header>

        @forelse($projects as $project)
            <script>
                function confirmDelete() {
                    var r = confirm('Delete Project ??');
                    if (r == true) {
                        window.location.href = "{{ route('projects.delete',['language' => app()->getLocale(), 'project' => $project->id ])}}";
                    }
                }
            </script>
            <div class="image round left ">
                <img src="{{$project->image_src}}" alt="Pic {{$loop->index +1}}" style="height: 150px; width: 150px"/>
            </div>
            <header>
                <h3>{{$project->title}}<span style="font-size: 13px"> by : {{$project->user->name}}</span></h3>
            </header>
            <p style="color: #1b1e21">{{$project->description}}</p>
            <div class="btn-group">
                <button
                    onclick="window.location.href ='{{route('projects.show',['language' => app()->getLocale(), 'project' => $project->id ])}}'"
                    style="border-radius: 40px;">
                    {{__('See more !')}}
                </button>
                @can('updateProject',$project)

                    <button
                        onclick="window.location.href ='{{route('projects.edit',['language' => app()->getLocale(), 'project' => $project->id ])}}'"
                        style="border-radius: 40px;">
                        Edit Project
                    </button>

                @endcan
                @can('deleteProject',$project)
                    <form
                        action="{{ route('projects.delete',['language' => app()->getLocale(), 'project' => $project->id ])}}"
                        method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')"
                                type="submit" value="" style="border-radius: 40px">Delete
                        </button>
                    </form>
                @endcan
            </div>
            <br><br><br>
            <hr>

        @empty
            <h2>{{__('No Projects Yet')}}</h2>


        @endforelse
    </div>


@endsection
