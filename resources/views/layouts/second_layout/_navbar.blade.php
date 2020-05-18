<header id="header">
    <div class="inner">
        <a href="{{route('home',app()->getLocale())}}" class="logo">{{__('Tamayuz archive')}}</a>
        <nav id="nav">
            <a href="{{route('home',app()->getLocale())}}">{{__('Contact Us')}}</a>
            @auth()
                <a href="{{route('users.show',['language' => app()->getLocale() ,  'user' =>auth()->user()])}}">{{auth()->user()->name}}</a>
            @endauth

            @guest()
                <a class="nav-link" href="{{ route('login',app()->getLocale()) }}">{{ __('Login') }}</a>

            @endguest
        </nav>
        <a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
    </div>
</header>
