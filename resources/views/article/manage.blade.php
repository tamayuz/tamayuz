@extends('layouts.second_layout.app')
@section('header')
    <title>{{__('Article')}}</title>
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/myjs.js"></script>
@endsection
@section('content')


    <div class="">
        <p style="display: none"> {{$acount = $accepted_articles->count()  }} {{$ncount = $not_accepted_articles->count()}}</p>
        <header class="align-center">
            <h2>{{__('Tamayuz Articles')}}</h2>
            <p>{{__("Over :acount  accepted Articles And over :ncount not accepted Article",[ 'acount' => $acount , 'ncount' => $ncount])}} </p>

            <hr>
        </header>
        <div style =" padding: 10px">
            <h3> {{__('Accepted Articles !')}}</h3>
        </div>
        @forelse($accepted_articles as $article)
            <script>
                function confirmDelete() {
                    var r = confirm('Delete Article ??');
                    if (r == true) {
                        window.location.href = "{{ route('articles.delete',['language' => app()->getLocale(), 'article' => $article->id ])}}";
                    }
                }
            </script>
            <div class="image round left ">
                <img src="{{$article->image_src}}" alt="Pic {{$loop->index +1}}" style="height: 150px; width: 150px"/>
            </div>
            <header>
                <h3>{{$article->title}}<span style="font-size: 13px"><br> {{__('By : ')}} {{$article->user->name}}</span></h3>
            </header>
            <p style="color: #1b1e21">{{$article->description}}</p>
            <div class="btn-group">
            <button
                onclick="window.location.href ='{{route('articles.show',['language' => app()->getLocale(), 'article' => $article->id ])}}'"
                style="border-radius: 40px;">
                {{__('See more !')}}
            </button>
            @can('updateArticle',$article)

                <button
                    onclick="window.location.href ='{{route('articles.edit',['language' => app()->getLocale(), 'article' => $article->id ])}}'"
                    style="border-radius: 40px;">
                    {{__('Edit Article')}}
                </button>

            @endcan
            @can('deleteArticle',$article)
                <form
                    action="{{ route('articles.delete',['language' => app()->getLocale(), 'article' => $article->id ])}}"
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
            <hr>
            <h2>{{__('Not Accepted Articles')}}</h2>


        @endforelse
        <hr>
        <div style =" padding: 10px">
            <h3>ِ{{__('Not Accepted Articles :')}}</h3>
        </div>
        @forelse($not_accepted_articles as $article)

                <script>

                function confirmDelete() {
                    var r = confirm('Delete Article ??');
                    if (r == true) {
                        window.location.href = "{{ route('articles.delete',['language' => app()->getLocale(), 'article' => $article->id ])}}";
                    }
                }
            </script>
            <div class="image round left ">
                <img src="{{$article->image_src}}" alt="Pic {{$loop->index +1}}" style="height: 150px; width: 150px"/>
            </div>
            <header>
                <h3>{{$article->title}}<span style="font-size: 13px">{{__(' by : ')}}{{$article->user->name}}</span></h3>
            </header>
            <p style="color: #1b1e21">{{$article->description}}</p>
            <div class="btn-group">
                <button
                    onclick="window.location.href ='{{route('articles.show',['language' => app()->getLocale(), 'article' => $article->id ])}}'"
                    style="border-radius: 40px;">
                    See more !
                </button>

                @can('updateArticle',$article)

                    <button
                        onclick="window.location.href ='{{route('articles.edit',['language' => app()->getLocale(), 'article' => $article->id ])}}'"
                        style="border-radius: 40px;">
                        Edit Article
                    </button>

                @endcan
                @can('deleteArticle',$article)
                    <form
                        action="{{ route('articles.delete',['language' => app()->getLocale(), 'article' => $article->id ])}}"
                        method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')"
                                type="submit" value="" style="border-radius: 40px">{{__('Delete')}}</button>
                    </form>
                @endcan
                <form
                    action="{{ route('articles.accept',['language' => app()->getLocale(), 'article' => $article->id ])}}"
                    method="post">
                    @csrf
                    <button type="submit" onclick="return confirm('Are you sure?')"
                            type="submit" value="" style="border-radius: 40px">{{__('Accept')}}</button>
                </form>
            </div>
            <br><br><br>
            <hr>

        @empty
            <h2>{{__('Empty !')}}</h2>


        @endforelse



    </div>


@endsection
