<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('login-form/style.css') }}" />
    <title>Login | PUSDIG</title>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h1>Perpustakaan</h1>
            <h2>Khazanah Kota Magelang</h2>
            <p>Selamat datang kembali</p>
        </div>
        
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    placeholder="Masukkan Email"
                    required 
                    autocomplete="off"
                >
            </div>

            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    placeholder="Masukkan Password"
                    required 
                    autocomplete="off"
                >
            </div>

            @error('email')
            <div class="error-message">
                Email atau Password tidak valid
            </div>
            @enderror

            <button type="submit" class="login-button">
                Masuk
            </button>
        </form>
    </div>
</body>
</html>