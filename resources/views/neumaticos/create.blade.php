@extends('layouts.app')

@section('title', 'Nuevo Neumático')

@section('content')
<div class="card" style="max-width:600px; margin:0 auto;">
    <h2>➕ Nuevo Neumático</h2>
    <br>

    <form method="POST" action="{{ route('neumaticos.store') }}">
        @csrf

        <div class="form-group">
            <label>Código *</label>
            <input type="text" name="codigo" class="form-control" value="{{ old('codigo') }}" required placeholder="Ej: NEU-001">
            @error('codigo') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label>Marca *</label>
            <input type="text" name="marca" class="form-control" value="{{ old('marca') }}" required placeholder="Ej: Bridgestone">
            @error('marca') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label>Medida *</label>
            <input type="text" name="medida" class="form-control" value="{{ old('medida') }}" required placeholder="Ej: 275/80R22.5">
            @error('medida') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label>Estado *</label>
            <select name="estado" class="form-control" required>
                @foreach($estados as $estado)
                    <option value="{{ $estado }}" {{ old('estado') === $estado ? 'selected' : '' }}>
                        {{ ucfirst(str_replace('_', ' ', $estado)) }}
                    </option>
                @endforeach
            </select>
            @error('estado') <span class="error">{{ $message }}</span> @enderror
        </div>

        @if(auth()->user()->role === 'admin')
        <div class="form-group">
            <label>Área *</label>
            <select name="area" class="form-control" required>
                <option value="">-- Seleccione --</option>
                @foreach($areas as $area)
                    <option value="{{ $area }}" {{ old('area') === $area ? 'selected' : '' }}>
                        {{ strtoupper($area) }}
                    </option>
                @endforeach
            </select>
            @error('area') <span class="error">{{ $message }}</span> @enderror
        </div>
        @else
        <div class="form-group">
            <label>Área</label>
            <input type="text" class="form-control" value="{{ strtoupper(auth()->user()->role) }}" readonly style="background:#f0f4f8;">
            <small style="color:#7f8c8d;">El área se asigna automáticamente según tu rol.</small>
        </div>
        @endif

        <div class="form-group">
            <label>Observaciones</label>
            <textarea name="observaciones" class="form-control" rows="3" placeholder="Opcional...">{{ old('observaciones') }}</textarea>
            @error('observaciones') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div style="display:flex; gap:8px;">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('neumaticos.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
