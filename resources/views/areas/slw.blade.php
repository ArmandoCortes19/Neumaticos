@extends('layouts.app')

@section('title', 'Área SLW')

@section('content')
<div class="card">
    <h2 style="color:#3498db;">📦 Área SLW</h2>
    <p style="color:#7f8c8d; margin-bottom:20px;">Bienvenido, {{ auth()->user()->name }}. Esta es tu área de trabajo.</p>

    <div style="margin-bottom:16px;">
        <a href="{{ route('neumaticos.index') }}" class="btn btn-primary">Ver mis Neumáticos</a>
        <a href="{{ route('neumaticos.create') }}" class="btn btn-secondary" style="margin-left:8px;">+ Nuevo Neumático</a>
    </div>

    <div style="background:#f0f4f8; padding:16px; border-radius:6px;">
        <strong>Área asignada:</strong> <span class="area-slw">SLW</span>
        <br><br>
        <p style="font-size:14px; color:#555;">
            En esta sección puedes gestionar los neumáticos asignados al área SLW.
            Solo verás los registros de tu área.
        </p>
    </div>
</div>
@endsection
