@extends('layouts.main_layout.app')
@section('content')
    <head>
        <link rel="stylesheet" href="/assets/css/main.css"/>
        <link rel="stylesheet" href="/css/app.css">


        <title>Tamayuz Archive</title>
    </head>
    <body>
    @include('layouts.main_layout._MainHeader')
    <section id="three" class="wrapper align-center">
        <div class="inner">
            <div class="flex flex-2" style="alignment:center">
                <article>
                    <div class="image round">
                        <img src="/images/pic01.jpg" alt="Pic 01"/>
                    </div>
                    <header>
                        <h3>{{__("Watch All Articles")}}</h3>
                    </header>
                    <p>{{__('Tamayuz Archive Contains up to :count Projects',['count' => $project_counter])}} </p>

                    <footer>
                        <a href="{{route('articles.index',app()->getLocale())}}" class="button">{{__('See more !')}}</a>
                    </footer>
                </article>
                <article>
                    <div class="image round">
                        <img src="/images/pic02.jpg" alt="Pic 02"/>
                    </div>
                    <header>
                        <h3>{{__("Watch All Projects")}}</h3>
                    </header>
                    <p>{{__('Tamayuz Archive Contains up to :count Articles',['count' => $article_counter])}} </p>

                    <footer>
                        <a href="{{route('projects.index',app()->getLocale())}}" class="button">{{__('See more !')}}</a>
                    </footer>
                </article>
            </div>
            <br><br>
            <div class="flex flex-2" style="alignment:center">
                <article>
                    <div class="image round">
                        <img src="/images/I_User.png" alt="Pic 01" style="height: 150px ; width: 150px"/>
                    </div>
                    <header>
                        <h3>{{__("Watch All Users")}}</h3>
                    </header>
                    <p>{{__('Tamayuz Archive Contains up to :count Users',['count' => $user_counter])}} </p>

                    <footer>
                        <a href="{{route('users.index',app()->getLocale())}}" class="button">{{__('See more !')}}</a>
                    </footer>
                </article>
                <article>
                    <div class="image round">
                        <img src="/images/I_Book.jpg" alt="Pic 02" style="width: 150px ;width: 150px"/>
                    </div>
                    <header>
                        <h3>{{__("Watch All Study Major")}}</h3>
                    </header>
                    <p>{{__('Tamayuz Archive Contains up to :count Study Major',['count' => $study_major->count()])}} </p>

                    <footer>
                        <a href="{{route('study_major.index',app()->getLocale())}}" class="button">{{__('See more !')}}</a>
                    </footer>
                </article>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="footer" style="background-color: #1b4b72  ;">
        <div class="inner" style="background-color: #1b4b72 ;">

            <h3>{{__('Get in touch')}}</h3>

            <form action="#" method="post">

                <div class="field half first">
                    <label for="name">{{__('Name')}}</label>
                    <input style="background-color: #1b4b72" name="name" id="name" type="text"
                           placeholder="{{__('Name')}}">
                </div>
                <div class="field half">
                    <label for="email">{{__('E-Mail Address')}}</label>
                    <input style="background-color: #1b4b72" name="email" id="email" type="email"
                           placeholder="{{__('E-Mail Address')}}">
                </div>
                <div class="field" style="background-color: #1b4b72">
                    <label for="message">{{__('Message')}}</label>
                    <textarea style="background-color: #1b4b72" name="message" id="message" rows="6"
                              placeholder="{{__('Message')}}"></textarea>
                </div>
                <ul class="actions">
                    <li><input value="{{__('Send Message')}}" class="button alt" type="submit"></li>
                </ul>
            </form>

            <div class="copyright">
                &copy; {{__('Designed by Tamayuz competition')}} <a href="https://facebook.com/Azoooz4"><span
                        class="icon fa-facebook-official "></span></a>
            </div>

        </div>


    </footer>
    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/skel.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>
    </body>
@endsection
