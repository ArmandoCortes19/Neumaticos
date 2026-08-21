@extends('layouts.app')

@section('title', 'Detalle Neumático')

@section('content')
<div class="card" style="max-width:600px; margin:0 auto;">
    <h2>🛞 Detalle del Neumático</h2>
    <br>

    <table>
        <tr><th style="width:40%;">Código</th><td>{{ $neumatico->codigo }}</td></tr>
        <tr><th>Marca</th><td>{{ $neumatico->marca }}</td></tr>
        <tr><th>Medida</th><td>{{ $neumatico->medida }}</td></tr>
        <tr><th>Estado</th><td><span class="estado-{{ $neumatico->estado }}">{{ ucfirst(str_replace('_', ' ', $neumatico->estado)) }}</span></td></tr>
        <tr><th>Área</th><td><span class="area-{{ $neumatico->area }}">{{ strtoupper($neumatico->area) }}</span></td></tr>
        <tr><th>Observaciones</th><td>{{ $neumatico->observaciones ?? '—' }}</td></tr>
        <tr><th>Creado</th><td>{{ $neumatico->created_at->format('d/m/Y H:i') }}</td></tr>
        <tr><th>Actualizado</th><td>{{ $neumatico->updated_at->format('d/m/Y H:i') }}</td></tr>
    </table>

    <div style="margin-top:20px; display:flex; gap:8px;">
        <a href="{{ route('neumaticos.edit', $neumatico) }}" class="btn btn-primary">Editar</a>
        <a href="{{ route('neumaticos.index') }}" class="btn btn-secondary">Volver</a>
    </div>
</div>
@endsection
