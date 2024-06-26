<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
</head>

<body>
<div id="auth">

    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <!--
                <div class="auth-logo">
                    <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo"></a>
                </div>

                <h1 class="auth-title">Log in.</h1>
                -->

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="email" id="email" name="email" class="form-control form-control-xl @error('email') is-invalid @enderror" value="{{ old('email') }}" autocomplete="email" placeholder="Email" autofocus required>
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" id="password" name="password" class="form-control form-control-xl @error('password') is-invalid @enderror" placeholder="Password" autocomplete="current-password" required>
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-check form-check-lg d-flex align-items-end">
                        <input id="flexCheckDefault" name="remember" class="form-check-input me-2" type="checkbox" value="" {{ old('remember') ? 'checked' : '' }}>
                        <label  class="form-check-label text-gray-600" for="flexCheckDefault">
                            Recordarme
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Ingresar</button>
                </form>

                <div class="text-center mt-5 text-lg fs-4">
                    <!--
                    <p class="text-gray-600">¿No tienes cuenta? <a href="auth-register.html"
                                                                       class="font-bold">Sign
                            up</a>.</p>
                    -->
                    @if (Route::has('password.request'))
                    <p><a class="font-bold" href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a></p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right">

            </div>
        </div>
    </div>

</div>
</body>

</html>
