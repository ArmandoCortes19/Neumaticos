<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Control de Neumáticos</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: Arial, sans-serif; background: #f4f6f9; display: flex; align-items: center; justify-content: center; min-height: 100vh; }
        .login-card { background: white; padding: 40px; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.12); width: 100%; max-width: 380px; }
        h1 { text-align: center; color: #1a3c5e; margin-bottom: 8px; font-size: 22px; }
        .subtitle { text-align: center; color: #7f8c8d; font-size: 13px; margin-bottom: 28px; }
        .form-group { margin-bottom: 18px; }
        label { display: block; font-weight: 600; margin-bottom: 6px; font-size: 14px; }
        input[type=email], input[type=password] {
            width: 100%; padding: 10px 12px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;
        }
        input:focus { outline: none; border-color: #1a3c5e; }
        .error { color: #c0392b; font-size: 12px; margin-top: 4px; }
        .btn-login {
            width: 100%; padding: 11px; background: #1a3c5e; color: white;
            border: none; border-radius: 4px; font-size: 15px; cursor: pointer; margin-top: 4px;
        }
        .btn-login:hover { background: #14304e; }
        .icon { font-size: 40px; text-align: center; margin-bottom: 12px; }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="icon">🛞</div>
        <h1>Control de Neumáticos</h1>
        <p class="subtitle">Ingrese sus credenciales para continuar</p>

        @if($errors->any())
            <div style="background:#f8d7da; color:#721c24; padding:10px; border-radius:4px; margin-bottom:16px; font-size:13px;">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="usuario@neumaticos.local">
                @error('email') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" required placeholder="••••••••">
            </div>

            <button type="submit" class="btn-login">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>
