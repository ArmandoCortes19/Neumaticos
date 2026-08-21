@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="card">
    <h2>🛠️ Dashboard Administrador</h2>
    <p style="color:#7f8c8d; margin-bottom:20px;">Bienvenido, {{ auth()->user()->name }}. Tienes acceso total al sistema.</p>

    <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(180px,1fr)); gap:16px; margin-bottom:24px;">
        <a href="{{ route('neumaticos.index') }}" style="text-decoration:none;">
            <div style="background:#1a3c5e; color:white; padding:20px; border-radius:8px; text-align:center;">
                <div style="font-size:28px;">🛞</div>
                <div style="font-size:16px; margin-top:8px;">Todos los Neumáticos</div>
            </div>
        </a>
        <a href="{{ route('slw') }}" style="text-decoration:none;">
            <div style="background:#3498db; color:white; padding:20px; border-radius:8px; text-align:center;">
                <div style="font-size:28px;">📦</div>
                <div style="font-size:16px; margin-top:8px;">Área SLW</div>
            </div>
        </a>
        <a href="{{ route('qet') }}" style="text-decoration:none;">
            <div style="background:#27ae60; color:white; padding:20px; border-radius:8px; text-align:center;">
                <div style="font-size:28px;">🔧</div>
                <div style="font-size:16px; margin-top:8px;">Área QET</div>
            </div>
        </a>
        <a href="{{ route('butc') }}" style="text-decoration:none;">
            <div style="background:#8e44ad; color:white; padding:20px; border-radius:8px; text-align:center;">
                <div style="font-size:28px;">🚛</div>
                <div style="font-size:16px; margin-top:8px;">Área BUTC</div>
            </div>
        </a>
    </div>

    <a href="{{ route('neumaticos.create') }}" class="btn btn-primary">+ Nuevo Neumático</a>
</div>
@endsection
