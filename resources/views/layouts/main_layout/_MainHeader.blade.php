<header id="header">
    <div class="inner">
        <nav class="navbar navbar-collapse ">
            <div class="align-left " style="display: inline">
                <a class="nav-link text-lg-left"
                   href="{{route('home',app()->getLocale())}}">{{__('Tamayuz archive')}}</a>


                <div class="btn-group  ">
                    <a type="button" class="btn btn-secondary" href="{{route('projects.index',app()->getLocale())}}">
                        {{__('Project')}}</a>
                    <a class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false" id="menum">
                        <span class="sr-only">Toggle Dropright</span>
                    </a>
                    <div class="dropdown-menu  btn-sm" style="background-color:#5e5e6d ;color: white">
                        <a class="nav-link  dropdown-item"
                           href="{{route('projects.create',app()->getLocale())}}">{{__("Create New Project ")}}</a>
                        <br>
                        @can('full_access')
                            <a class="nav-link dropdown-item"
                               href="{{route('projects.manage',app()->getLocale())}}">{{__('Manage Projects')}}</a>
                        @endcan
                    </div>
                </div>

                <div class="btn-group  ">
                    <a type="button" class="btn btn-secondary" href="{{route('articles.index',app()->getLocale())}}">
                        {{__('Article')}}
                    </a>
                    <a class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false" id="menum">
                        <span class="sr-only">Toggle Dropright</span>
                    </a>
                    <div class="dropdown-menu btn-sm" style="background-color:#5e5e6d ;color: white">
                        <a class="nav-link dropdown-item"
                           href="{{route('articles.create',app()->getLocale())}}">{{__("Create New article ")}}</a>
                        <br>
                        @can('full_access')
                            <a class="nav-link dropdown-item"
                               href="{{route('articles.manage',app()->getLocale())}}">{{__('Manage Articles')}}
                            </a>
                        @endcan
                    </div>


                    <div class="btn-group  ">
                        <a type="button" class="btn btn-secondary"
                           href="{{route('season.index',app()->getLocale())}}">
                            {{__('Seasons')}}</a>
                        <a class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false" id="menum">
                            <span class="sr-only">Toggle Dropright</span>
                        </a>
                        <div class="dropdown-menu  btn-sm" style="background-color:#5e5e6d ;color: white">
                            @foreach($seasons as $season)
                                <a class="nav-link  dropdown-item"
                                   href="#">{{__($season->name)}}</a>
                                <br>
                            @endforeach

                            @can('full_access')
                                <div class="dropdown-divider"></div>
                                <a class="nav-link dropdown-item"
                                   href="{{route('season.create',app()->getLocale())}}">{{__('Add new season')}}</a>
                            @endcan
                        </div>

                    </div>


                </div>

                <a class="nav-link" href="#">{{__("About Us")}}</a>
                <a class="nav-link" href="#footer">{{__('Contact Us')}}</a>
                <span class="icon fa-search"></span>


            </div>
            <div>
                <a href="{{route(Route::currentRouteName(),'en')}}" class="nav-link " style="font-size: 7px">EN</a>
                <a href="{{route(Route::currentRouteName(),'ar')}}" class="nav-link " style="font-size: 7px">Ar</a>
                @guest
                    <a class="nav-link" href="{{ route('login',app()->getLocale()) }}">{{ __('Login') }}</a>
                    @if (Route::has('register'))
                        <a class="nav-link" href="{{ route('register',app()->getLocale()) }}">{{ __('Register') }}</a>
                    @endif
                @else
                    <a id="navbar Dropdown" class="dropdown-toggle dropdown  " href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu  btn-sm "
                         style="background-color:#5e5e6d ;color: white; margin-top: -2%"
                         aria-labelledby="navbar Dropdown">
                        <a class="dropdown-item " href="{{ route('logout',app()->getLocale()) }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <div class="dropdown-divider"></div>
                        @can('full_access')
                            <a class="dropdown-item " href="{{ route('users.index',app()->getLocale()) }}">
                                {{ __('Mange users') }}
                            </a>

                        @endcan
                        <form id="logout-form" action="{{ route('logout',app()->getLocale()) }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                        <a class="dropdown-item " href="{{ route('logout',app()->getLocale()) }}">
                            {{ __('Mange Profile Settings') }}
                        </a>
                    </div>
                @endguest
            </div>
        </nav>
    </div>
</header>
<section id="banner">
    <div class="inner">
        <header>
            <h1>{{__('Welcome to Tamayuz Archive')}}</h1>
        </header>
        <div class="flex">
            <div>
                <span class="icon fa-list-ol"></span>
                <h3>{{__('season') }}</h3>
                <p> {{$season->count()." ".__('Seasons')}}</p>
            </div>
            <div>
                <span class="icon fa-braille"></span>
                <h3>{{__('Category') }}</h3>
                <p> {{$study_major->count()." ". __('Categories')}}</p>
            </div>
            <div>
                <span class="icon fa-sticky-note"></span>
                <h3>{{__('article') }}</h3>
                <p> {{$article_counter." ". __('Articles')}}</p>
            </div>
            <div>

                <span class="icon fa-pencil-square-o"></span>
                <h3>{{__('Project') }}</h3>
                <p> {{$project_counter." ". __('Projects')}}</p>
            </div>
        </div>
        <footer>
            <a href="{{route('register',app()->getLocale())}}" class="button">{{__("Sign UP !")}} </a>
        </footer>
    </div>
</section>

<script type="text/javascript">
    $(document).ready(function () {
        $(".dropdown-menu").mouseenter(function () {
            $("#banner .inner").animate({top: $(".dropdown-menu").height() + 70}).delay(500);
        });
    });


    $(document).ready(function () {
        $(".dropdown-menu").mouseleave(function () {
            $("#banner .inner").animate({top: '0px'});
        });
    });

</script>

