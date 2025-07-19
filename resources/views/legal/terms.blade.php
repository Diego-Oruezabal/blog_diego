@extends('layouts.base')

@section('title', 'Términos y Condiciones')

@section('content')
<section class="m-top mb-60">
    <div class="container">
        <div class="row">
            <div class="m-auto col-lg-10">
                <div class="widget">
                    <h3 class="widget__title">Términos y Condiciones</h3>
                    <p><strong>Última actualización:</strong> {{ now()->format('d/m/Y') }}</p>

                    <p>Bienvenido a <strong>El Patrón Singleton</strong>. Al acceder a este sitio web, aceptas cumplir con los siguientes términos y condiciones. Si no estás de acuerdo con alguno de ellos, por favor, no utilices este sitio.</p>
                    <p>1. Propiedad del contenido
Todo el contenido publicado en este blog (textos, imágenes, diseño y estructura) pertenece a su autor, salvo que se indique lo contrario. No está permitido copiar, reproducir o redistribuir el contenido sin autorización expresa.</p>
                    <p>2. Uso del blog
Este blog tiene fines informativos y educativos. No se garantiza que el contenido sea siempre exacto, completo o actualizado. El autor no se hace responsable por decisiones tomadas con base en la información aquí publicada.</p>
<p>3. Comentarios y participación
Los usuarios pueden dejar comentarios siempre que respeten la buena convivencia y las normas básicas de respeto. No se permitirá contenido ofensivo, ilegal, spam o difamatorio. El autor se reserva el derecho de moderar, editar o eliminar cualquier comentario sin previo aviso.</p>
<p>4. Enlaces externos
El blog puede contener enlaces a sitios web de terceros. No nos hacemos responsables por el contenido, políticas o prácticas de esos sitios.</p>
<p>5. Privacidad
Este blog puede recopilar datos básicos del usuario, como nombre, correo electrónico o dirección IP, con el fin de mejorar la experiencia del sitio o para funciones específicas como comentarios. No se comparte información con terceros sin consentimiento.</p>
<p>6. Cambios en los términos
Estos términos pueden ser modificados en cualquier momento. Te recomendamos revisarlos periódicamente. El uso continuado del blog implica la aceptación de los términos actualizados.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
