<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('layouts.header')
    
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-1">
                <div class="panel panel-custom">                    
                    <div id="app">
                        <nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="background-color: #e3f2fd">
                            <div class="container">
                                 <ul class="navbar-nav" style="list-style-type: none;">
                                    <li>
                                        <i class="fa fa-home"></i>
                                        <a class="navbar-brand" aria-hidden="true" href="{{ url('/') }}"> Inicio </a>
                                    </li>
                                    <!-- Authentication Links -->
                                    @if(!auth::guest())
                                    
                                        <!-- Pagina com dados publicos apenas para visualizar-->
                                        <li class="nav-item dropdown thumb-dropdown " >
                                            <i class="fa fa-globe"></i>
                                            <a href="" class="dropdown-toggle navbar-brand" data-toggle="dropdown"> CEA <span class="caret"></span></a> 
                                            
                                            <ul class="dropdown-menu" role="menu">                                        
                                                <li>
                                                    <a href="{{ route('cea.index', 1) }}" class="navbar-brand " > Agenda de Eventos                               
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('cea.index') }}" class="navbar-brand "> Relatórios de Reuniões </a>
                                                </li>
                                          </ul>       
                                        </li>

                                         <li class="nav-item dropdown thumb-dropdown" >
                                            <i class="fa fa-globe"></i>
                                            <a href="" class="dropdown-toggle navbar-brand" data-toggle="dropdown"> PLBM <span class="caret"></span></a> 
                                            
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="{{ route('plbm.index', 1) }}" class="navbar-brand " > Agenda de Ações                                
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('plbm.index') }}" class="navbar-brand "> Relatórios de Ações </a>
                                                </li>
                                          </ul>       
                                        </li>

                                        @if(Auth::user()->hasRole('Admin'))
                                            <li class="nav-item dropdown thumb-dropdown " >
                                                 <i class="fa fa-calendar"></i>
                                                <a href="" class="dropdown-toggle navbar-brand" data-toggle="dropdown"> Agenda <span class="caret"></span></a>       
                                                <ul class="dropdown-menu" role="menu">
                                                    <li>
                                                        <a href="{{ route('sch.index', 1) }}" class="navbar-brand " > CEA                                
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('sch.index') }}" class="navbar-brand "> PLBM
                                                        </a>
                                                    </li>
                                                </ul>       
                                            </li>
                                        @endif

                                        @if(Auth::user()->hasRole('Admin') || Auth::user()->hasRole('editor'))
                                            <li class="nav-item dropdown thumb-dropdown " >
                                                <i class="fa fa-file-text-o"></i>
                                                <a href="" class="dropdown-toggle navbar-brand" data-toggle="dropdown">Relatórios <span class="caret"></span></a> 
                                                <ul class="dropdown-menu" role="menu">
                                                
                                                    <li>
                                                        <a href="{{ route('rep.index', 1) }}" class="navbar-brand" > CEA                                
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('rep.index', 2)}}" class="navbar-brand "> PLBM
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('rep.index', 3)}}" class="navbar-brand "> Ibama
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('rep.index')}}" class="navbar-brand "> Jogo
                                                        </a>
                                                    </li>
                                                </ul>       
                                            </li>
                                        @endif
                                    
                                        <li>
                                            <i class="fa fa-file-text-o"></i>
                                            <a class="navbar-brand " aria-hidden="true" href="{{ route('ig.index') }}"> Ibama/Jogo </a>
                                        </li>

                                        <li>
                                            <i class="fa fa-file-video-o"></i>
                                            <a class="navbar-brand " aria-hidden="true" href="{{ route('doc.index') }}"> Documentário </a>
                                        </li>

                                        <!-- Pagina para gerenciar usuarios e niveis de acesso  -->   
                                        @if(Auth::user()->hasRole('Admin'))
                                            <li>
                                                <i class="fa fa-user-circle-o"></i>
                                                <a class="navbar-brand " aria-hidden="true" href="{{ route('cat.index') }}"> Usuários</a>
                                            </li>
                                        @endif
                                    @endif
                                </ul>  
                                <div class="collapse navbar-collapse" id="navbarSupportedContent" >
                                    <!-- Left Side Of Navbar -->
                                    <ul class="navbar-nav mr-auto">

                                    </ul>

                                    <!-- Right Side Of Navbar -->
                                    <ul class="navbar-nav">
                                        <!-- Authentication Links -->
                                        @guest
                                            <li><a class="nav-link" href="{{ route('login') }}"><i class="fa fa-sign-in"></i> Entrar</a></li>
                                            <li><a class="nav-link" href="{{ route('register') }}"><i class="fa fa-registered"> </i> Registrar</a></li>
                                        @else
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-o"></i>
                                                    {{ Auth::user()->name }} <span class="caret"></span>
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
                                        @endguest
                                    </ul>
                                </div>
                            </div>
                        </nav>

                        <main class="py-4">
                            @yield('content')
                        </main>
                    </div>
</body>
<!-- Scripts -->
 <!--  <script src="{{ asset('js/app.js') }}"></script>-->
  @include('layouts.footer')
</html>
