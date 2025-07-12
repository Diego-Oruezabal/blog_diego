<header class="header fixed-top navbar-expand-xl">
        <div class="container-fluid">
            <div class="header__main">
              <!-- logo -->
                <div class="logo">
                    <a class="logo__link logo--dark" href="{{ url('/') }}">
                        <span class="logo__text logo__text--dark">EL PATRON SINGLETON</span>
                    </a>
                    <a class="logo__link logo--light" href="{{ url('/') }}">
                        <span class="logo__text logo__text--light">EL PATRON SINGLETON</span>
                    </a>
                </div><!--/-->


                <div class="header__navbar">
                    <nav class="navbar">
                        <!--navbar-collapse-->
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ">
                                <!--Homes -->
                               <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/') }}"> Inicio </a>
                                </li>

                                <!--Blogs-->
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.html"> Blogs </a>
                                </li>
                                <!--contact -->
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('contact.index') }}"> Acerca de </a>
                                </li>
                                <!--Pages-->
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.html"> Acceder </a>
                                </li>


                            </ul>
                        </div>
                        <!--/-->
                    </nav>
                </div>

                <!-- header actions -->
                <div class=" header__action-items">
                    <!--header-social-->
                    <ul class="list-inline social-media social-media--layout-one">
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
