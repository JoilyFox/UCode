<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">


        <!-- Styles/scipts -->
        <link rel="stylesheet" href="{{ URL::asset('css/common.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" rel="stylesheet">

        @yield('additionalProperties')

    </head>
    <body>

        <header class="bluredBg shadow whiteBg_03">
            <div class="container">

                <div class="logo">
                    <a href="/">Forum</a>
                </div>

                <div class="search">
                    <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg></span>
                    <input type="search" class="mainSearch whiteBg_08 bluredBg" placeholder="Search by name">
                </div>

                <div class="btns">
                    @guest

                        <a class="btn" href="/login">Login</a>
                        <a class="btn" href="/registration">Register</a>

                    @endguest

                    @auth
                    <div class="profilePopUp" id="profilePopUp">

                        <div class="popUpBtn" onclick="showPopUp()">
                            <span>Profile</span>
                            <div class="avatar">
                                <img src="{{ asset('assets/images/default.png') }}" alt="Avatar">
                            </div>
                        </div>


                        <div id="headerPopUp" class="popUpMenu borderRadius whiteBg shadow">
                            <a href="/private">Your Profile</a>
                            <a href="/ask-question">Ask a Question</a>
                            <div class="border"></div>
                            <a class="signOut" href="/logout">Sign Out</a>
                        </div>
                    </div>
                    @endauth
                </div>

            </div>
        </header>

        <main onclick="hide()">
            @yield('content')
        </main>

        <footer>

        </footer>




        <script src="{{ URL::asset('js/script.js') }}">

        </script>

    </body>

</html>
