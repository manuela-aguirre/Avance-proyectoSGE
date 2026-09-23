<x-guest-layout>

    <style>
        .cotec-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
            background: linear-gradient(135deg, #15803d 0%, #16a34a 50%, #34d399 100%);
            font-family: 'Figtree', Arial, sans-serif;
        }

        .cotec-card {
            width: 100%;
            max-width: 420px;
            background: #ffffff;
            border-radius: 1rem;
            box-shadow: 0 20px 40px rgba(0,0,0,0.25);
            overflow: hidden;
            border: 1px solid #dcfce7;
        }

        .cotec-header {
            background: linear-gradient(90deg, #14532d 0%, #16a34a 100%);
            padding: 2.5rem 2rem;
            text-align: center;
            color: #ffffff;
        }

        .cotec-logo-circle {
            width: 92px;
            height: 92px;
            background: #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem auto;
            box-shadow: 0 6px 18px rgba(0,0,0,0.2);
            box-sizing: border-box;
            border: 4px solid rgba(255,255,255,0.5);
            overflow: hidden;
        }

        .cotec-logo-circle svg {
            width: 100%;
            height: 100%;
            display: block;
        }

        .cotec-header h1 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 700;
            letter-spacing: 0.03em;
        }

        .cotec-header .subtitle {
            margin-top: 0.25rem;
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            color: #dcfce7;
            font-weight: 600;
        }

        .cotec-header .slogan {
            margin-top: 0.75rem;
            font-size: 0.85rem;
            font-style: italic;
            color: #ecfdf5;
        }

        .cotec-body {
            padding: 2rem;
        }

        .cotec-body h2 {
            margin: 0;
            font-size: 1.25rem;
            font-weight: 600;
            color: #1f2937;
            text-align: center;
        }

        .cotec-body .welcome {
            margin-top: 0.25rem;
            font-size: 0.875rem;
            color: #6b7280;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .cotec-field {
            margin-bottom: 1.25rem;
        }

        .cotec-field label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: #374151;
            margin-bottom: 0.5rem;
        }

        .cotec-input-wrap {
            position: relative;
        }

        .cotec-input-wrap i {
            position: absolute;
            left: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            color: #16a34a;
        }

        .cotec-input-wrap input {
            width: 100%;
            box-sizing: border-box;
            padding: 0.75rem 1rem 0.75rem 2.5rem;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            font-size: 0.95rem;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .cotec-input-wrap input:focus {
            outline: none;
            border-color: #16a34a;
            box-shadow: 0 0 0 3px rgba(22,163,74,0.2);
        }

        .cotec-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .cotec-remember {
            display: flex;
            align-items: center;
            font-size: 0.875rem;
            color: #4b5563;
        }

        .cotec-remember input {
            margin-right: 0.5rem;
        }

        .cotec-forgot {
            font-size: 0.875rem;
            font-weight: 500;
            color: #15803d;
            text-decoration: none;
        }

        .cotec-forgot:hover {
            text-decoration: underline;
            color: #14532d;
        }

        .cotec-submit {
            width: 100%;
            background: #15803d;
            color: #ffffff;
            font-weight: 600;
            font-size: 0.95rem;
            padding: 0.85rem 1rem;
            border: none;
            border-radius: 0.5rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: background 0.2s, box-shadow 0.2s;
        }

        .cotec-submit:hover {
            background: #14532d;
            box-shadow: 0 6px 10px rgba(0,0,0,0.15);
        }

        .cotec-register-link {
            text-align: center;
            font-size: 0.875rem;
            color: #4b5563;
            margin-top: 1.5rem;
        }

        .cotec-register-link a {
            color: #15803d;
            font-weight: 600;
            text-decoration: none;
        }

        .cotec-register-link a:hover {
            text-decoration: underline;
            color: #14532d;
        }

        .cotec-footer {
            margin-top: 2rem;
            padding-top: 1.25rem;
            border-top: 1px solid #f3f4f6;
            text-align: center;
        }

        .cotec-footer p {
            margin: 0.2rem 0;
            font-size: 0.75rem;
            color: #9ca3af;
        }

        .cotec-footer .highlight {
            color: #16a34a;
            font-weight: 500;
        }

        .cotec-copyright {
            text-align: center;
            color: rgba(255,255,255,0.85);
            font-size: 0.75rem;
            margin-top: 1.5rem;
        }

        .cotec-error {
            color: #dc2626;
            font-size: 0.8rem;
            margin-top: 0.4rem;
        }

        @media (max-width: 480px) {
            .cotec-header { padding: 2rem 1.25rem; }
            .cotec-body { padding: 1.5rem; }
        }
    </style>

    <div class="cotec-wrapper">
        <div style="width:100%; max-width:420px;">

            <div class="cotec-card">

                <!-- Encabezado -->
                <div class="cotec-header">
                    <div class="cotec-logo-circle" style="background: transparent; border-radius: 0; border: none; box-shadow: none; width: 88px; height: 88px;">
                        <img
                            src="{{ file_exists(public_path('build/images/logo-cotecnova.png')) ? asset('build/images/logo-cotecnova.png') : asset('build/images/logo-cotecnova.svg') }}"
                            alt="Logo COTECNOVA"
                            style="width:100%; height:100%; object-fit:contain; display:block;"
                        >
                    </div>

                    <h1>Biblioteca COTECNOVA</h1>
                    <p class="subtitle">ERP Universitario</p>
                    <p class="slogan">"Conocimiento al alcance de un clic"</p>
                </div>

                <!-- Formulario -->
                <div class="cotec-body">

                    <h2>Iniciar sesión</h2>
                    <p class="welcome">¡Bienvenido de nuevo! Ingresa tus datos para acceder a tu cuenta.</p>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Correo -->
                        <div class="cotec-field">
                            <label for="email">Correo electrónico</label>
                            <div class="cotec-input-wrap">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#16a34a" stroke-width="2" style="width:1.1rem;height:1.1rem;">
                                    <rect x="2" y="4" width="20" height="16" rx="2"/>
                                    <path d="m22 7-10 5L2 7"/>
                                </svg>
                                <input
                                    id="email"
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    required
                                    autofocus
                                    autocomplete="username"
                                    placeholder="correo@ejemplo.com"
                                />
                            </div>
                            @error('email')
                                <p class="cotec-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Contraseña -->
                        <div class="cotec-field">
                            <label for="password">Contraseña</label>
                            <div class="cotec-input-wrap">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#16a34a" stroke-width="2" style="width:1.1rem;height:1.1rem;">
                                    <rect x="3" y="11" width="18" height="11" rx="2"/>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                                </svg>
                                <input
                                    id="password"
                                    type="password"
                                    name="password"
                                    required
                                    autocomplete="current-password"
                                    placeholder="••••••••"
                                />
                            </div>
                            @error('password')
                                <p class="cotec-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Recordarme / Olvidé contraseña -->
                        <div class="cotec-row">
                            <label class="cotec-remember" for="remember_me">
                                <input id="remember_me" type="checkbox" name="remember">
                                Recordarme
                            </label>

                            @if (Route::has('password.request'))
                                <a class="cotec-forgot" href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                            @else
                                <a class="cotec-forgot" href="#">¿Olvidaste tu contraseña?</a>
                            @endif
                        </div>

                        <!-- Botón -->
                        <button type="submit" class="cotec-submit">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" style="width:1.1rem;height:1.1rem;">
                                <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/>
                                <polyline points="10 17 15 12 10 7"/>
                                <line x1="15" y1="12" x2="3" y2="12"/>
                            </svg>
                            Iniciar sesión
                        </button>

                    </form>

                    <!-- Enlace a registro -->
                    <p class="cotec-register-link">
                        ¿No tienes una cuenta?
                        <a href="{{ route('register') }}">Regístrate aquí</a>
                    </p>

                    <!-- Pie -->
                    <div class="cotec-footer">
                        <p>Biblioteca Universidad COTECNOVA</p>
                        <p class="highlight">Acceso exclusivo para usuarios autorizados</p>
                    </div>

                </div>
            </div>

            <p class="cotec-copyright">&copy; {{ date('Y') }} COTECNOVA. Todos los derechos reservados.</p>

        </div>
    </div>
</x-guest-layout>