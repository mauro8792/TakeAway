<nav class="navbar navbar-expand-lg navbar-dark b-black">
    <div class="container">
        <button class="navbar-toggler text-white" type="button" data-toggle="collapse" data-target="#navbarNavigate" aria-controls="navbarNavigate" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavigate">
            <ul class="navbar-nav mr-auto">
                <li>
                    <a class="navbar-brand text-white" href="{{ url('/') }}">Inicio</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('login') }}">Ingresar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('register') }}">Registro</a>
                    </li>
                @else
                    @if (auth()->user()->admin)
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('/admin/products/code') }}">Generar Código</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('/admin/categories') }}">Categorías</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('/admin/products') }}">Productos</a>
                        </li>
                    @endif
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user"></i>&nbsp;{{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item text-black" href="{{ url('/home') }}">Carrito de compras</a>
                                <a class="dropdown-item text-black" href="{{ route('logout') }}">Cerrar Sesion</a>
                            </div>
                        </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
