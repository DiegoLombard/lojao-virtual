<link rel="stylesheet" href="{{ url('/css/_nav.css') }}">
<nav id="fundoNav" class="navbar navbar-expand-md navbar-light  shadow-sm">
            <div class="container">
                <a id="logoNav" class="navbar-brand" href="{{ url('/') }}">
                <img id='logoNav' src={{url("./images/LVG.png")}} >
                </a>
                
                <button id='botaoNav' class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span  class="navbar-toggler-icon"></span>
                </button>

                <div  class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul  class="navbar-nav mr-auto">
                        <li  class="nav-item">
                            <a id="letraNav" class="nav-link" href="{{route('produtos.index')}}">{{ __('Produtos') }}</a>
                        </li>
                        <li class="nav-item">
                            <a id="letraNav" class="nav-link" href="{{route('marcas.index')}}">{{ __('Marcas') }}</a>
                        </li>
                        <li class="nav-item">
                            <a id="letraNav" class="nav-link" href="{{route('categorias.index')}}">{{ __('Categorias') }}</a>
                        </li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a id="letraNav" class="nav-link" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a id="letraNav" class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="letraNav" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a  class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Sair') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div id="espaco"></div>