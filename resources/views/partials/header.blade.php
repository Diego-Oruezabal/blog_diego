<header class="header fixed-top navbar-expand-xl">
        <div class="container-fluid">
            <div class="header__main">
              <!-- logo -->
                <div class="logo">
                    <a class="logo__link logo--dark" href="{{ url('/') }}">
                         <img src="{{ asset('assets/img/logo/logo_negro_patron_singleton.png') }}" alt="Logo oscuro" class="logo__image">
                        <span class="logo__text logo__text--dark">EL PATRON SINGLETON</span>
                    </a>
                    <a class="logo__link logo--light" href="{{ url('/') }}">
                        <img src="{{ asset('assets/img/logo/logo_blanco_patron_singleton.png') }}" alt="Logo blanco" class="logo__image">
                        <span class="logo__text logo__text--light">EL PATRON SINGLETON</span>
                    </a>
                </div>


                <div class="header__navbar">
                    <nav class="navbar">

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ">

                               <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/') }}"> Inicio </a>
                                </li>


                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('blog.index') }}"> Posts </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('contact.index') }}"> Acerca de </a>
                                </li>


                                @if (Auth::check())
                                      <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown3" role="button" data-bs-toggle="dropdown" aria-expanded="false"> {{ auth()->user()->name }} </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{ route('posts.list') }}" class="dropdown-item">Mis publicaciones</a>
                                            </li>
                                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Perfil</a></li>

                                            {{-- Opciones de administrador --}}
                                            @role('admin')
                                                <li><hr class="dropdown-divider"></li>
                                                <li><a class="dropdown-item" href="{{ route('categories.index') }}">Categorías</a></li>
                                                <li><a class="dropdown-item" href="{{ route('tags.index') }}">Etiquetas</a></li>
                                            @endrole
                                                <li><hr class="dropdown-divider"></li>

                                            <li>
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <button type="submit" class="dropdown-item">Cerrar sesión</button>
                                                </form>
                                            </li>
                                        </ul>

                                        </li>

                                @else
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}"> Acceder </a>
                                    </li>
                                @endif

                            </ul>
                        </div>
                    </nav>
                </div>

                <!-- header actions -->
                <div class=" header__action-items">
                    <!--header-social-->
                 <!--   <ul class="list-inline social-media social-media--layout-one">
                        <li class="social-media__item">
                            <a href="{{ config('app.social.facebook') }}" class="social-media__link" target="_blank">
                                <i class="bi bi-facebook"></i>
                            </a>
                        </li>

                        <li class="social-media__item">
                            <a href="{{ config('app.social.instagram') }}" class="social-media__link" target="_blank">
                                <i class="bi bi-instagram"></i>
                            </a>
                        </li>

                        <li class="social-media__item">
                            <a href="{{ config('app.social.youtube') }}" class="social-media__link" target="_blank">
                                <i class="bi bi-youtube"></i>
                            </a>
                        </li>-->
                        <!-- WhatsApp -->
                        <li class="social-media__item">
                            <a href="{{ config('app.social.whatsapp') }}" class="social-media__link" target="_blank">
                                <i class="bi bi-whatsapp"></i>
                            </a>
                        </li>

                        <!-- Telegram -->
                        <li class="social-media__item">
                            <a href="{{ config('app.social.telegram') }}" class="social-media__link" target="_blank">
                                <i class="bi bi-telegram"></i>
                            </a>
                        </li>
                        <!-- Email -->
                        <li class="social-media__item">
                            <a href="mailto:{{ config('app.social.email') }}" class="social-media__link" target="_blank">
                                <i class="bi bi-envelope-fill"></i>
                            </a>
                         </li>
                    </ul>


                    <!--theme-switch-->
                    <div class="theme-switch">
                        <label class="theme-switch__label" for="checkbox">
                            <input type="checkbox" id="checkbox" class="theme-switch__checkbox">
                            <span class="theme-switch__slider round ">
                                <i class="bi bi-sun icon-light theme-switch__icon theme-switch__icon--light"></i>
                                <i class="bi bi-moon icon-dark theme-switch__icon theme-switch__icon--dark"></i>
                            </span>
                        </label>
                    </div>

                    <!--search-icon-->
                    <div class="search-icon">
                        <a href="#search" class="search-icon__link">
                            <i class="bi bi-search search-icon__icon"></i>
                        </a>
                    </div>

                    <!--navbar-toggler-->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler__icon"></span>
                    </button>
                </div>
            </div>
        </div>
</header>
