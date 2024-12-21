<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('login-form/style.css') }}" />
    <title>Perpustakaan Kota Magelang</title>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h1>Perpustakaan</h1>
            <h2>Khazanah Kota Magelang</h2>
            <p>Selamat datang</p>
        </div>
        
        <form method="POST" action="{{ route('login') }}" class="login-form">
            @csrf
            <div class="input-group">
                <i class="fa-solid fa-user"></i>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    placeholder="Masukkan Email"
                    required 
                    autocomplete="off"
                    class="@error('email') is-invalid @enderror"
                >
            </div>

            <div class="input-group">
                <i class="fa-solid fa-lock"></i>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    placeholder="Masukkan Password"
                    required 
                    autocomplete="off"
                    class="@error('password') is-invalid @enderror"
                >
            </div>

            @error('email')
            <div class="error-message">
                <i class="fa-solid fa-circle-exclamation"></i>
                Email atau Password tidak valid
            </div>
            @enderror

            <button type="submit" class="login-button">
                <i class="fa-solid fa-right-to-bracket"></i>
                Masuk
            </button>

        </form>
    </div>
</body>
</html>