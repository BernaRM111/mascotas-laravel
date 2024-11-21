@extends('layouts.template')

@section('content')

<!-- Hero Section -->
<section class="hero text-white text-center py-5" style="background: linear-gradient(135deg, #343a40, #007bff);">
    <div class="container">
        <h1 class="display-4 fw-bold">Cuidando a Tus Mascotas con Amor y Profesionalismo</h1>
        <p class="lead mt-3">Nuestra misión es ofrecer el mejor cuidado para tus mascotas, combinando experiencia y dedicación para que siempre estén felices y saludables.</p>
    </div>
</section>


<!-- Features Section -->
<section class="features py-5">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Lo Que Nos Hace Únicos</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <h3 class="card-title">Cuidado Integral</h3>
                        <p class="card-text">Ofrecemos un servicio completo que cubre todas las necesidades de salud, bienestar y entretenimiento de tu mascota.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <h3 class="card-title">Atención Personalizada</h3>
                        <p class="card-text">Nos aseguramos de conocer a cada mascota y adaptamos nuestros servicios a sus necesidades y personalidad únicas.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <h3 class="card-title">Educación para Dueños</h3>
                        <p class="card-text">Brindamos orientación y consejos a los dueños para ayudarles a entender y mejorar la calidad de vida de sus mascotas.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Benefits Section -->
<section class="benefits bg-light py-5">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Beneficios que Marcan la Diferencia</h2>
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <h3 class="card-title">Tranquilidad para el Dueño</h3>
                        <p class="card-text">Nuestros servicios están diseñados para que siempre tengas la seguridad de que tu mascota está en las mejores manos.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <h3 class="card-title">Vínculo con Especialistas</h3>
                        <p class="card-text">Contamos con un equipo de veterinarios y especialistas que estarán a tu lado en cada etapa del cuidado de tu mascota.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection