    @include('layouts.header')
    <body>
        <div class="container flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                    <div class="container ">
                        <nav class="navbar navbar-expand-md navbar-light navbar-laravel" >
                            <ul class="navbar-nav" style="list-style-type: none;">
                                <li>
                                    <i class="fa fa-home"></i>
                                    <a class="navbar-brand" aria-hidden="true" href="{{ url('/home') }}">Home</a>
                                </li>
                                <li>
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-o"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>
                                            Sair
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>

                                    </div>
                                </li>
                            
                            </ul>
                        </nav>
                    </div>  
                        
                        
                    @else
                        <div class="container" style="text-align: center; float: center" >
                            <a class="custom-file-upload btn btn-primary fa fa-sign-in" href="{{ route('login') }}"> Entrar</a>
                            <a class="custom-file-upload btn btn-primary fa fa-registered" href="{{ route('register') }}"> Registrar</a>
                        </div>
                    @endauth
                </div>
            @endif

            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </body>
</html>