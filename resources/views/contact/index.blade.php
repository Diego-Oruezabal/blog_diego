@extends('layouts.base')

@section('title', 'Blog - El Patrón Singleton')

@section('content')

   <!--about-us-->
        <section class="mb-10 m-top">
            <div class="container-fluid">
                <div class="row">
                    <div class="m-auto col-xl-9">
                        <div class="about-us">
                            <div class="about-us__image">
                                <img src="{{ asset('assets/img/pic/singleton_contact.png') }}" alt="Diego Oruezábal" class="about-us__img">
                            </div>
                           <div class="about-us__description">
                                <p class="about-us__description-text">
                                    ¡Hola! Bienvenido a <strong>El Patrón Singleton</strong>. Soy Diego, desarrollador fullstack, aprendiz eterno, y (según mis amigos) una mezcla rara entre programador, economista y estratega estilo Sun Tzu.
                                </p>
                                <p class="about-us__description-text">
                                    Este blog es mi laboratorio personal: un espacio donde comparto lo que voy aprendiendo en el mundo del desarrollo web (Laravel, Next.js, Angular y lo que se me cruce), además de ideas sobre inversión, productividad, economía y cómo sobrevivir en el mundo tech sin perder la cabeza (ni el foco).
                                </p>
                                <p class="about-us__description-text">
                                    Me obsesiona escribir código que no solo funcione, sino que tenga sentido. Igual que con el dinero: no se trata solo de tenerlo, sino de entenderlo y usarlo con cabeza. Por eso aquí mezclo programación con educación financiera, porque creo que saber codificar y manejar tu dinero son dos superpoderes que te dan verdadera libertad.
                                </p>

                                <div class="about-us__qoute">
                                    <i class="bi bi-quote about-us__qoute-icon"></i>
                                    <h3 class="about-us__qoute-item">
                                        “Invertir en uno mismo es el proyecto de código abierto más valioso que puedes desarrollar.”
                                    </h3>
                                    <small class="about-us__qoute-author">El Patrón Singleton</small>
                                </div>

                                <p class="about-us__description-text">
                                    Aquí encontrarás tutoriales, reflexiones, atajos, recursos y algún que otro desahogo. Todo desde el punto de vista de alguien que prefiere automatizar antes que repetir, y que piensa que la mejor manera de aprender algo es enseñarlo (o escribirlo en un blog, claro).
                                </p>
                                <p class="about-us__description-text">
                                    El blog, por cierto, está en constante evolución. Estoy añadiendo funcionalidades nuevas, puliendo detalles y rompiendo cosas accidentalmente de vez en cuando —como todo buen desarrollador en su entorno de producción.
                                </p>
                                <p class="about-us__description-text">
                                    Gracias por pasarte por aquí. Si tienes ideas, proyectos, sugerencias o memes, ¡escríbeme! Me encantará leerte.
                                </p>
                            </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!--newslettre-->
       @include('partials.newletter')

@endsection
