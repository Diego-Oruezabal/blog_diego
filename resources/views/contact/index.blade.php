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
                                    ¡Hola! Bienvenido a <strong>El Patrón Singleton</strong>. Soy Diego O., desarrollador fullstack con formación en negocios, apasionado por la tecnología, la programación y el pensamiento estratégico.
                                </p>
                                <p class="about-us__description-text">
                                    Este blog nace con la intención de compartir conocimientos, experiencias y herramientas útiles que he ido descubriendo en el mundo del desarrollo web, así como reflexiones sobre finanzas personales, inversión a largo plazo, economía y crecimiento profesional.
                                </p>
                                <p class="about-us__description-text">
                                    Me apasiona escribir código limpio, bien estructurado y con propósito. Creo firmemente en la educación financiera como una vía para ganar autonomía, tomar mejores decisiones y construir un futuro más libre y consciente.
                                </p>
                                <div class="about-us__qoute">
                                    <i class="bi bi-quote about-us__qoute-icon"></i>
                                    <h3 class="about-us__qoute-item">
                                        “Invertir en uno mismo es el proyecto de código abierto más valioso que puedes desarrollar.”
                                    </h3>
                                    <small class="about-us__qoute-author">Diego O.</small>
                                </div>
                                <p class="about-us__description-text">
                                    Aquí encontrarás artículos técnicos, ideas para automatizar tareas, recursos para mejorar tu productividad como desarrollador, y también contenido sobre cómo tomar el control de tus finanzas desde la perspectiva de alguien que programa, invierte y nunca deja de aprender.
                                </p>
                                <p class="about-us__description-text">
                                    Gracias por pasarte por aquí. Si te interesa colaborar, tienes ideas que quieras compartir o simplemente quieres conversar, estaré encantado de leerte.
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
