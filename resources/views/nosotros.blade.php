@extends('layouts.template')

@section('content')

<!-- Hero Section for "Nosotros" -->
<section class="hero text-white text-center py-5" style="background: linear-gradient(135deg, #343a40, #17a2b8);">
    <div class="container">
        <h1 class="display-4 fw-bold">Nosotros</h1>
        <p class="lead mt-3">Somos un equipo apasionado por mejorar la vida de las mascotas y sus dueños, brindando servicios de calidad que cuidan y protegen a tus fieles compañeros.</p>
    </div>
</section>

<!-- Features Section for "Nosotros" -->
<section class="features py-5">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Nuestras Características</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <h3 class="card-title">Atención Integral</h3>
                        <p class="card-text">Ofrecemos una variedad de servicios de salud, higiene y bienestar para mantener a tu mascota feliz y saludable.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <h3 class="card-title">Equipo Profesional</h3>
                        <p class="card-text">Contamos con veterinarios y especialistas dedicados al cuidado y atención personalizada de tu mascota.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <h3 class="card-title">Instalaciones Modernas</h3>
                        <p class="card-text">Nuestras instalaciones están diseñadas para ofrecer comodidad y seguridad a tu mascota en cada visita.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Benefits Section for "Nosotros" -->
<section class="benefits bg-light py-5">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Beneficios Clave</h2>
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <h3 class="card-title">Bienestar de tu Mascota</h3>
                        <p class="card-text">Con nuestros servicios, puedes asegurar una mejor calidad de vida para tu mascota, ayudándola a mantenerse activa y saludable.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <h3 class="card-title">Tranquilidad para el Dueño</h3>
                        <p class="card-text">Nos ocupamos del cuidado de tu mascota para que tengas la tranquilidad de que está en buenas manos.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection