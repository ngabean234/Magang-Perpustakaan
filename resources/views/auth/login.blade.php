<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('login-form/style.css') }}" />
    <title>SIGN | PUSDIG</title>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
               
                <form method="POST" action="{{ route('login') }}" class="sign-in-form">
                    @csrf
                    <form action="#" class="sign-in-form">
                        <h2 class="title">Sign in</h2>
                        <div class="input-field">
                            <i class="fas fa-user"></i>
                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="off" placeholder="Masukan E-mail">
                        </div>
                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                            <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="off" placeholder="Masukan Password">
                        </div>
                        <input type="submit" value="Login" class="btn solid" />

                        <p class="social-text">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red">E-mail atau Password tidak sama</strong>
                                </span>
                            @enderror
                        </p>

                        <p class="social-text">Or Sign up to <a href="{{ route('register') }}">Daftar? </a> </p>

                    </form>

            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Selamat Datang,</h3>
                    <p>
                       Jika belum mempunyai akun silahkan daftar terlebih dahulu<br>
                    </p>
                </div>
                <img src="{{ asset('login-form/img/log4.svg') }}" class="image" alt="" />
            </div>
        </div>
    </div>

    <script src="{{ asset('login-form/app.js') }}"></script>
</body>

</html>
