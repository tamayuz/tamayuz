@extends('layouts.second_layout.app')
@section('header')
    <title>{{__('Project')}}</title>
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/myjs.js"></script>
@endsection
@section('content')


    <div class="">
        <p style="display: none"> {{$acount = $accepted_projects->count()  }} {{$ncount = $not_accepted_projects->count()}}</p>
        <header class="align-center">
            <h2>{{__('Tamayuz Projects')}}</h2>
            <p>{{__("Over :acount  accepted Projects And over :ncount not accepted Project",[ 'acount' => $acount , 'ncount' => $ncount])}} </p>

            <hr>
        </header>
        <div style =" padding: 10px">
            <h3>{{__('Accepted Projects !')}}</h3>
        </div>
        @forelse($accepted_projects as $project)
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
                ِ{{__('See more !')}}
            </button>
            @can('updateProject',$project)

                <button
                    onclick="window.location.href ='{{route('projects.edit',['language' => app()->getLocale(), 'project' => $project->id ])}}'"
                    style="border-radius: 40px;">
                    ِ{{__('Edit Project ')}}
                </button>

            @endcan
            @can('deleteProject',$project)
                <form
                    action="{{ route('projects.delete',['language' => app()->getLocale(), 'project' => $project->id ])}}"
                    method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure?')"
                            type="submit" value="" style="border-radius: 40px">{{__('Delete')}}</button>
                </form>
            @endcan
            </div>
            <br><br><br>
            <hr>

        @empty
            <h2>{{__('No Accepted   Projects Yet')}}</h2>


        @endforelse
        <hr>
        <div style =" padding: 10px">
            <h3>ِ{{__('Not Accepted Projects ! ')}}</h3>
        </div>
        @forelse($not_accepted_projects as $project)

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
                        {{__('Edit Project ')}}
                    </button>

                @endcan
                @can('deleteProject',$project)
                    <form
                        action="{{ route('projects.delete',['language' => app()->getLocale(), 'project' => $project->id ])}}"
                        method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')"
                                type="submit" value="" style="border-radius: 40px">{{__('Delete')}}</button>
                    </form>
                @endcan
                <form
                    action="{{ route('projects.accept',['language' => app()->getLocale(), 'project' => $project->id ])}}"
                    method="post">
                    @csrf
                    <button type="submit" onclick="return confirm('Are you sure?')"
                            type="submit" value="" style="border-radius: 40px">{{__('Accept ')}}</button>
                </form>
            </div>
            <br><br><br>
            <hr>

        @empty
            <h2>{{__('No Accepted   Projects Yet')}}</h2>


        @endforelse



    </div>


@endsection
