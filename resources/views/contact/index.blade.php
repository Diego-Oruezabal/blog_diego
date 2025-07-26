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
                                <img src="{{ asset('assets/img/pic/about-us.jpg') }}" alt="Diego Oruezábal" class="about-us__img">
                            </div>
                            <div class="about-us__description">
                                <p class="about-us__description-text">
                                    ¡Hola! Bienvenido a El Patrón Singleton. Soy Diego O., desarrollador fullstack y entusiasta de la tecnología con un gran interés en la programación y el mundo empresarial.
                                </p>
                                <p class="about-us__description-text">
                                    Este blog nace de la idea de compartir conocimientos, experiencias, herramientas y reflexiones sobre el mundo del desarrollo, así como sobre finanzas personales, inversión a largo plazo, economía y crecimiento profesional.
                                </p>
                                <p class="about-us__description-text">
                                    Me apasiona escribir código limpio, estructurado y funcional. También creo en el poder de la educación financiera como una herramienta de libertad.
                                </p>
                                <div class="about-us__qoute">
                                    <i class="bi bi-quote about-us__qoute-icon"></i>
                                    <h3 class="about-us__qoute-item">
                                        "Invertir en uno mismo es el mejor proyecto de código abierto que puedes mantener."
                                    </h3>
                                    <small class="about-us__qoute-author">Diego Oruezábal</small>
                                </div>
                                <p class="about-us__description-text">
                                    En este espacio encontrarás artículos técnicos, recursos útiles, ideas para automatizar tareas, y también publicaciones sobre cómo construir un futuro financiero más estable desde la perspectiva de alguien que programa, invierte y aprende cada día.
                                </p>
                                <p class="about-us__description-text">
                                    Gracias por pasar por aquí. Si quieres contactar conmigo o colaborar en algo interesante, no dudes en escribirme.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!--newslettre-->
       @include('partials.newletter')

@endsection
