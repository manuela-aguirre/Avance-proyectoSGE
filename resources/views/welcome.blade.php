<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Biblioteca COTECNOVA') }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;500;600;700;800&display=swap" rel="stylesheet">

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif

        <style>
            body {
                font-family: 'Figtree', sans-serif;
            }

            .cotec-landing {
                min-height: 100vh;
                background: linear-gradient(135deg, #14532d 0%, #15803d 45%, #22c55e 100%);
                color: white;
            }

            .cotec-shell {
                max-width: 1200px;
                margin: 0 auto;
                padding: 2rem 1.2rem 4rem;
            }

            .cotec-topbar {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 1rem;
                padding: 0.2rem 0 1.5rem;
            }

            .cotec-brand {
                display: flex;
                align-items: center;
                gap: 0.85rem;
            }

            .cotec-brand-mark {
                width: 96px;
                height: 96px;
                border-radius: 0;
                background: transparent;
                color: #14532d;
                display: flex;
                align-items: center;
                justify-content: center;
                font-weight: 800;
                font-size: 1.2rem;
                box-shadow: none;
                overflow: hidden;
                border: none;
                flex-shrink: 0;
            }

            .cotec-brand-mark svg {
                width: 100%;
                height: 100%;
                display: block;
            }

            .cotec-brand-text {
                font-weight: 800;
                font-size: 1.15rem;
                letter-spacing: 0.02em;
            }

            .cotec-brand-sub {
                font-size: 0.7rem;
                letter-spacing: 0.17em;
                text-transform: uppercase;
                opacity: 0.8;
            }

            .cotec-actions {
                display: flex;
                align-items: center;
                gap: 0.75rem;
                flex-wrap: wrap;
            }

            .cotec-btn {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                border-radius: 999px;
                font-weight: 700;
                text-decoration: none;
                transition: all 0.2s ease;
                cursor: pointer;
            }

            .cotec-btn-light {
                background: white;
                color: #14532d;
                padding: 0.8rem 1.5rem;
                box-shadow: 0 12px 24px rgba(15, 23, 42, 0.12);
            }

            .cotec-btn-light:hover {
                background: #ecfdf5;
            }

            .cotec-btn-dark {
                background: #0f3d27;
                color: white;
                padding: 0.8rem 1.5rem;
                border: 1px solid rgba(255,255,255,0.2);
            }

            .cotec-btn-dark:hover {
                background: #0c3120;
            }

            .cotec-hero {
                display: grid;
                grid-template-columns: 1.08fr 0.92fr;
                gap: 2rem;
                align-items: center;
                padding: 2.4rem 0 2rem;
            }

            .cotec-kicker {
                display: inline-flex;
                align-items: center;
                gap: 0.5rem;
                border: 1px solid rgba(255,255,255,0.2);
                background: rgba(255,255,255,0.08);
                padding: 0.55rem 0.9rem;
                border-radius: 999px;
                font-size: 0.7rem;
                font-weight: 700;
                letter-spacing: 0.18em;
                text-transform: uppercase;
                color: #ecfdf5;
            }

            .cotec-title {
                margin: 1.2rem 0 1rem;
                font-size: clamp(2.7rem, 4vw, 5rem);
                line-height: 1.02;
                font-weight: 800;
                letter-spacing: -0.06em;
                max-width: 660px;
            }

            .cotec-subtitle {
                max-width: 620px;
                font-size: 1.08rem;
                color: rgba(236,253,245,0.9);
                line-height: 1.8;
            }

            .cotec-cta-row {
                display: flex;
                flex-wrap: wrap;
                gap: 1rem;
                margin-top: 2rem;
            }

            .cotec-stat-row {
                margin-top: 2rem;
                display: flex;
                flex-wrap: wrap;
                gap: 2rem;
                color: rgba(236,253,245,0.9);
            }

            .cotec-stat strong {
                display: block;
                font-size: 2rem;
                color: white;
            }

            .cotec-panel {
                position: relative;
                background: rgba(255,255,255,0.08);
                border: 1px solid rgba(255,255,255,0.18);
                border-radius: 28px;
                padding: 1rem;
                box-shadow: 0 28px 80px rgba(0,0,0,0.15);
            }

            .cotec-panel-inner {
                background: #f3fff7;
                border-radius: 22px;
                padding: 1.3rem;
                color: #0f172a;
            }

            .cotec-panel-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding-bottom: 0.95rem;
                border-bottom: 1px solid #d1fae5;
            }

            .cotec-panel-kicker {
                font-size: 0.68rem;
                letter-spacing: 0.22em;
                text-transform: uppercase;
                font-weight: 700;
                color: #15803d;
            }

            .cotec-panel-title {
                margin-top: 0.5rem;
                font-size: 1.9rem;
                font-weight: 800;
                color: #14532d;
            }

            .cotec-live {
                background: #dcfce7;
                color: #166534;
                border-radius: 999px;
                padding: 0.45rem 0.8rem;
                font-size: 0.7rem;
                font-weight: 700;
            }

            .cotec-grid {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 0.9rem;
                margin-top: 1rem;
            }

            .cotec-metric {
                background: #ecfdf5;
                border-radius: 1rem;
                padding: 1rem;
            }

            .cotec-metric span {
                display: block;
                font-size: 0.8rem;
                color: #4b5563;
            }

            .cotec-metric strong {
                display: block;
                margin-top: 0.45rem;
                font-size: 2rem;
                color: #14532d;
                line-height: 1;
            }

            .cotec-section {
                background: white;
                color: #0f172a;
                padding-top: 5rem;
                padding-bottom: 5rem;
            }

            .cotec-section-inner {
                max-width: 1200px;
                margin: 0 auto;
                padding: 0 1.2rem;
            }

            .cotec-section-heading {
                text-align: center;
                margin-bottom: 2.5rem;
            }

            .cotec-section-label {
                color: #15803d;
                font-size: 0.75rem;
                letter-spacing: 0.18em;
                text-transform: uppercase;
                font-weight: 800;
            }

            .cotec-section-title {
                margin-top: 0.8rem;
                font-size: clamp(2rem, 3vw, 3rem);
                font-weight: 800;
                letter-spacing: -0.04em;
                color: #14532d;
            }

            .cotec-features {
                display: grid;
                grid-template-columns: repeat(4, minmax(0, 1fr));
                gap: 1.2rem;
            }

            .cotec-feature {
                border: 1px solid #dfeee3;
                background: #ffffff;
                border-radius: 1.4rem;
                padding: 1.4rem;
                box-shadow: 0 10px 28px rgba(20,83,45,0.04);
            }

            .cotec-feature-icon {
                width: 52px;
                height: 52px;
                border-radius: 1rem;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 1.7rem;
                margin-bottom: 1rem;
            }

            .cotec-feature h3 {
                margin: 0;
                font-size: 1.3rem;
                color: #14532d;
            }

            .cotec-feature p {
                margin-top: 0.7rem;
                color: #475569;
                line-height: 1.7;
                font-size: 0.95rem;
            }

            .cotec-testimonials {
                background: #0f172a;
                color: white;
                padding: 5rem 0;
            }

            .cotec-testimonial-grid {
                display: grid;
                grid-template-columns: repeat(3, minmax(0, 1fr));
                gap: 1.2rem;
                max-width: 1200px;
                margin: 0 auto;
                padding: 0 1.2rem;
            }

            .cotec-testimonial {
                background: rgba(255,255,255,0.05);
                border: 1px solid rgba(255,255,255,0.08);
                border-radius: 1.5rem;
                padding: 1.5rem;
            }

            .cotec-testimonial p {
                color: #e2e8f0;
                line-height: 1.8;
                font-size: 1rem;
            }

            .cotec-testimonial strong {
                display: block;
                margin-top: 1.2rem;
                font-size: 1rem;
            }

            .cotec-testimonial span {
                color: #cbd5e1;
                font-size: 0.85rem;
            }

            .cotec-callout {
                background: white;
                padding: 4.5rem 0 5rem;
            }

            .cotec-callout-box {
                max-width: 1200px;
                margin: 0 auto;
                padding: 0 1.2rem;
            }

            .cotec-callout-inner {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 1rem;
                background: linear-gradient(90deg, #14532d 0%, #15803d 100%);
                border-radius: 30px;
                padding: 2rem 2.3rem;
                box-shadow: 0 24px 64px rgba(20,83,45,0.2);
            }

            .cotec-callout h2 {
                margin: 0;
                font-size: clamp(2rem, 3vw, 3rem);
                line-height: 1.1;
                letter-spacing: -0.04em;
            }

            .cotec-footer {
                background: #f8fbf8;
                border-top: 1px solid #e2e8f0;
                padding: 3rem 0;
                color: #475569;
            }

            .cotec-footer-inner {
                max-width: 1200px;
                margin: 0 auto;
                padding: 0 1.2rem;
                display: grid;
                grid-template-columns: 1.5fr 1fr 1fr;
                gap: 2rem;
            }

            .cotec-footer-brand {
                display: flex;
                align-items: center;
                gap: 0.7rem;
                font-weight: 800;
                color: #14532d;
                margin-bottom: 1rem;
            }

            .cotec-footer-brand-mark {
                width: 40px;
                height: 40px;
                border-radius: 12px;
                background: #14532d;
                color: white;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 1rem;
            }

            .cotec-footer h3 {
                margin: 0 0 1rem;
                font-size: 0.76rem;
                letter-spacing: 0.18em;
                font-weight: 800;
                text-transform: uppercase;
                color: #64748b;
            }

            .cotec-footer ul {
                margin: 0;
                padding: 0;
                list-style: none;
                line-height: 2;
            }

            @media (max-width: 960px) {
                .cotec-hero,
                .cotec-features,
                .cotec-testimonial-grid,
                .cotec-footer-inner,
                .cotec-callout-inner {
                    grid-template-columns: 1fr;
                    display: grid;
                }

                .cotec-hero {
                    padding-top: 1rem;
                }

                .cotec-features {
                    grid-template-columns: repeat(2, minmax(0, 1fr));
                }

                .cotec-callout-inner {
                    display: grid;
                    text-align: center;
                    justify-items: center;
                }
            }

            @media (max-width: 640px) {
                .cotec-shell,
                .cotec-section-inner,
                .cotec-callout-box,
                .cotec-footer-inner,
                .cotec-testimonial-grid {
                    padding-left: 1rem;
                    padding-right: 1rem;
                }

                .cotec-topbar {
                    flex-direction: column;
                    align-items: flex-start;
                }

                .cotec-features {
                    grid-template-columns: 1fr;
                }
            }
        </style>
    </head>

    <body class="bg-[#f4f8f5] text-slate-800 antialiased">
        <div class="cotec-landing">
            <div class="cotec-shell">
                <header class="cotec-topbar">
                    <div class="cotec-brand">
                        <div class="cotec-brand-mark" style="background: transparent; box-shadow: none; border: none; border-radius: 0; width: 96px; height: 96px;">
                            <img
                                src="{{ file_exists(public_path('build/images/logo-cotecnova.png')) ? asset('build/images/logo-cotecnova.png') : asset('build/images/logo-cotecnova.svg') }}"
                                alt="Logo COTECNOVA"
                                style="width:100%; height:100%; object-fit:contain; display:block;"
                            >
                        </div>
                        <div>
                            <div class="cotec-brand-text">Biblioteca COTECNOVA</div>
                            <div class="cotec-brand-sub">ERP universitario</div>
                        </div>
                    </div>

                    <div class="cotec-actions">
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}" class="cotec-btn cotec-btn-light">Iniciar sesión</a>
                        @endif

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="cotec-btn cotec-btn-dark">Registrarse</a>
                        @endif
                    </div>
                </header>

                <section class="cotec-hero">
                    <div>
                        <div class="cotec-kicker">Sistema académico y bibliotecario</div>
                        <h1 class="cotec-title">Tu biblioteca universitaria, organizada y conectada.</h1>
                        <p class="cotec-subtitle">
                            Gestiona préstamos, reservas, usuarios, inventario y reportes con una plataforma clara, segura y pensada para la comunidad COTECNOVA.
                        </p>

                        <div class="cotec-cta-row">
                            @if (Route::has('login'))
                                <a href="{{ route('login') }}" class="cotec-btn cotec-btn-light">Iniciar sesión</a>
                            @endif

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="cotec-btn cotec-btn-dark">Registrarse</a>
                            @endif
                        </div>

                        <div class="cotec-stat-row">
                            <div class="cotec-stat"><strong>{{ $panelStats['registros'] ?? '0' }}</strong>Registros</div>
                            <div class="cotec-stat"><strong>{{ $panelStats['disponibilidad'] ?? '0%' }}</strong>Disponibilidad</div>
                            <div class="cotec-stat"><strong>{{ $panelStats['acceso'] ?? '24/7' }}</strong>Acceso</div>
                        </div>
                    </div>

                    <div class="cotec-panel">
                        <div class="cotec-panel-inner">
                            <div class="cotec-panel-header">
                                <div>
                                    <div class="cotec-panel-kicker">Panel general</div>
                                    <div class="cotec-panel-title">Biblioteca Central</div>
                                </div>
                                <span class="cotec-live">En línea</span>
                            </div>

                            <div class="cotec-grid">
                                <div class="cotec-metric">
                                    <span>Libros</span>
                                    <strong>{{ $panelStats['libros'] ?? '0' }}</strong>
                                </div>
                                <div class="cotec-metric">
                                    <span>Usuarios</span>
                                    <strong>{{ $panelStats['usuarios'] ?? '0' }}</strong>
                                </div>
                                <div class="cotec-metric">
                                    <span>Préstamos</span>
                                    <strong>{{ $panelStats['prestamos'] ?? '0' }}</strong>
                                </div>
                                <div class="cotec-metric">
                                    <span>Multas</span>
                                    <strong>{{ $panelStats['multas'] ?? '0%' }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <section class="cotec-section">
            <div class="cotec-section-inner">
                <div class="cotec-section-heading">
                    <div class="cotec-section-label">Módulos principales</div>
                    <h2 class="cotec-section-title">Todo lo que necesita una biblioteca universitaria</h2>
                </div>

                <div class="cotec-features">
                    <div class="cotec-feature">
                        <div class="cotec-feature-icon" style="background:#ecfdf5;">📚</div>
                        <h3>Catálogo</h3>
                        <p>Control del inventario, autores, categorías, disponibilidad y digitalización del acervo.</p>
                    </div>

                    <div class="cotec-feature">
                        <div class="cotec-feature-icon" style="background:#eff6ff;">🧾</div>
                        <h3>Préstamos</h3>
                        <p>Registro de préstamos, devoluciones, reservas, vencimientos y alertas automáticas.</p>
                    </div>

                    <div class="cotec-feature">
                        <div class="cotec-feature-icon" style="background:#f0fdf4;">👥</div>
                        <h3>Usuarios</h3>
                        <p>Administración de estudiantes, docentes, administradores y permisos según roles.</p>
                    </div>

                    <div class="cotec-feature">
                        <div class="cotec-feature-icon" style="background:#fef3c7;">📊</div>
                        <h3>Reportes</h3>
                        <p>Indicadores de circulación, uso, cumplimiento y rendimiento del servicio bibliotecario.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="cotec-testimonials">
            <div class="cotec-section-heading">
                <div class="cotec-section-label" style="color:#a7f3d0;">Experiencia institucional</div>
                <h2 class="cotec-section-title" style="color:white;">Bibliotecas que mejoran su servicio académico</h2>
            </div>

            <div class="cotec-testimonial-grid">
                <article class="cotec-testimonial">
                    <p>“Redujimos tiempos de atención y conseguimos una gestión más clara del inventario y de los préstamos del campus.”</p>
                    <strong>Ana Gómez</strong>
                    <span>Directora de Biblioteca</span>
                </article>

                <article class="cotec-testimonial">
                    <p>“La plataforma nos ayudó a organizar mejor la información de usuarios, reservas y notificaciones de vencimiento.”</p>
                    <strong>Carlos Mendoza</strong>
                    <span>Coordinador Académico</span>
                </article>

                <article class="cotec-testimonial">
                    <p>“Es una solución práctica, moderna y muy útil para dar un servicio más eficiente a la comunidad estudiantil.”</p>
                    <strong>María Torres</strong>
                    <span>Encargada de Colecciones</span>
                </article>
            </div>
        </section>

        <section class="cotec-callout">
            <div class="cotec-callout-box">
                <div class="cotec-callout-inner">
                    <div>
                        <div class="cotec-section-label" style="color:#dcfce7;">Empieza hoy</div>
                        <h2 style="color:white;">Optimiza la operación de tu biblioteca universitaria.</h2>
                    </div>

                    <div class="cotec-actions">
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}" class="cotec-btn cotec-btn-light">Iniciar sesión</a>
                        @endif

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="cotec-btn cotec-btn-dark">Registrarse</a>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <footer class="cotec-footer">
            <div class="cotec-footer-inner">
                <div>
                    <div class="cotec-footer-brand">
                        @if (file_exists(public_path('build/images/logo-cotecnova.png')))
                            <img src="{{ asset('build/images/logo-cotecnova.png') }}" alt="Logo COTECNOVA" style="width:48px;height:48px;object-fit:contain;display:block;" />
                        @elseif (file_exists(public_path('build/images/logo-cotecnova.svg')))
                            <img src="{{ asset('build/images/logo-cotecnova.svg') }}" alt="Logo COTECNOVA" style="width:48px;height:48px;object-fit:contain;display:block;" />
                        @else
                            <div class="cotec-footer-brand-mark">B</div>
                        @endif
                        <div>Biblioteca COTECNOVA</div>
                    </div>
                    <p>Sistema académico para la gestión eficiente del acervo, usuarios y servicios bibliotecarios.</p>
                </div>

                <div>
                    <h3>Navegación</h3>
                    <ul>
                        <li>Inicio</li>
                        <li>Módulos</li>
                        <li>Contacto</li>
                    </ul>
                </div>

                <div>
                    <h3>Contacto</h3>
                    <ul>
                        <li>biblioteca@cotecnova.edu.co</li>
                        <li>+57 300 123 4567</li>
                        <li>Campus principal</li>
                    </ul>
                </div>
            </div>
        </footer>
    </body>
</html>