<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Neumáticos') - Sistema de Control</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: Arial, sans-serif; background: #f4f6f9; color: #333; }
        .navbar {
            background: #1a3c5e;
            color: white;
            padding: 12px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .navbar a { color: white; text-decoration: none; margin-left: 16px; }
        .navbar a:hover { text-decoration: underline; }
        .badge {
            background: #e67e22;
            color: white;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 12px;
            text-transform: uppercase;
            margin-left: 8px;
        }
        .container { max-width: 1100px; margin: 32px auto; padding: 0 16px; }
        .card {
            background: white;
            border-radius: 8px;
            padding: 24px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.08);
            margin-bottom: 20px;
        }
        .card h2 { margin-bottom: 16px; color: #1a3c5e; }
        .btn {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
        }
        .btn-primary { background: #1a3c5e; color: white; }
        .btn-danger  { background: #c0392b; color: white; }
        .btn-secondary { background: #7f8c8d; color: white; }
        .btn-sm { padding: 4px 10px; font-size: 12px; }
        .btn:hover { opacity: 0.85; }
        .alert { padding: 12px 16px; border-radius: 4px; margin-bottom: 16px; }
        .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .alert-danger  { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 10px 12px; text-align: left; border-bottom: 1px solid #e0e0e0; }
        th { background: #f0f4f8; font-weight: 600; }
        tr:hover { background: #fafafa; }
        .form-group { margin-bottom: 16px; }
        .form-group label { display: block; margin-bottom: 6px; font-weight: 600; }
        .form-control {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }
        .form-control:focus { outline: none; border-color: #1a3c5e; }
        .error { color: #c0392b; font-size: 12px; margin-top: 4px; }
        .area-slw  { background: #3498db; color: white; padding: 2px 8px; border-radius: 4px; font-size: 12px; }
        .area-qet  { background: #27ae60; color: white; padding: 2px 8px; border-radius: 4px; font-size: 12px; }
        .area-butc { background: #8e44ad; color: white; padding: 2px 8px; border-radius: 4px; font-size: 12px; }
        .estado-nuevo    { background: #27ae60; color: white; padding: 2px 8px; border-radius: 4px; font-size: 12px; }
        .estado-en_uso   { background: #3498db; color: white; padding: 2px 8px; border-radius: 4px; font-size: 12px; }
        .estado-desgaste { background: #e67e22; color: white; padding: 2px 8px; border-radius: 4px; font-size: 12px; }
        .estado-baja     { background: #c0392b; color: white; padding: 2px 8px; border-radius: 4px; font-size: 12px; }
    </style>
</head>
<body>
    @auth
    <nav class="navbar">
        <div>
            <strong>🛞 Control de Neumáticos</strong>
        </div>
        <div>
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('admin') }}">Dashboard</a>
            @else
                <a href="{{ route(auth()->user()->role) }}">Inicio</a>
            @endif
            <a href="{{ route('neumaticos.index') }}">Neumáticos</a>
            <span class="badge">{{ auth()->user()->role }}</span>
            <span style="color:#bdc3c7; margin-left:12px;">{{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}" style="display:inline; margin-left:16px;">
                @csrf
                <button type="submit" class="btn btn-sm" style="background:transparent; color:white; border:1px solid #ffffff66; cursor:pointer;">Salir</button>
            </form>
        </div>
    </nav>
    @endauth

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>
</body>
</html>
