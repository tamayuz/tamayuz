@extends('layouts.second_layout.app')
@section('header')
    <title>{{__('User')}}</title>
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/myjs.js"></script>
@endsection
@section('content')


    <div class="">
        <p style="display: none"> {{$count = $users->count() }}</p>
        <header class="align-center">
            <h2 style="text-align:center">{{__('Total users :count' ,['count' => $user_counter])}}</h2>
            <hr>
        </header>

        @foreach($users as $user)
            <script>
                function confirmDelete() {
                    var r = confirm('Delete User ??');
                    if (r == true) {
                        window.location.href = "{{ route('users.delete',['language' => app()->getLocale(), 'user' => $user->id ])}}";
                    }
                }
            </script>
            <div class="image round left ">
                <img src="{{$user->image_src}}" alt="Pic {{$loop->index +1}}" style="height: 150px; width: 150px"/>
            </div>
            <header>
                <h4>{{$user->name}}</h4>
                @if($admin_ids->contains($user->id))
                    @can('full_access')
                        <h6>{{__('Admin')}}</h6>
                    @endcan
                @endif
            </header>

            <div class="btn-group">
                <button
                    onclick="window.location.href ='{{route('users.show',['language' => app()->getLocale(), 'user' => $user->id ])}}'"
                    style="border-radius: 40px;">
                    {{__('See more !')}}
                </button>


                @can('full_access',$user)
                    @if($user->id != auth()->user()->id)
                        <form
                            action="{{ route('users.delete',['language' => app()->getLocale(), 'user' => $user->id ])}}"
                            method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')"
                                    type="submit" value="" style="border-radius: 40px">{{__('Delete')}}
                            </button>
                        </form>
                    @endif

                @endcan

                @if(!$admin_ids->contains($user->id))


                    @can('full_access',$user)
                        <form
                            action="{{ route('users.makeadmin',['language' => app()->getLocale(), 'user' => $user->id ])}}"
                            method="post">
                            @csrf
                            @method('post')
                            <button type="submit" onclick="return confirm('Are you sure?')"
                                    type="submit" value="" style="border-radius: 40px">
                                {{__('make admin')}}
                            </button>
                        </form>
                    @endcan
                @endif
            </div>
            <br><br><br>
            <hr>

        @endforeach
    </div>


@endsection
