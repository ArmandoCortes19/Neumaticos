@extends('layouts.app')

@section('title', 'Editar Neumático')

@section('content')
<div class="card" style="max-width:600px; margin:0 auto;">
    <h2>✏️ Editar Neumático</h2>
    <br>

    <form method="POST" action="{{ route('neumaticos.update', $neumatico) }}">
        @csrf @method('PUT')

        <div class="form-group">
            <label>Código *</label>
            <input type="text" name="codigo" class="form-control" value="{{ old('codigo', $neumatico->codigo) }}" required>
            @error('codigo') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label>Marca *</label>
            <input type="text" name="marca" class="form-control" value="{{ old('marca', $neumatico->marca) }}" required>
            @error('marca') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label>Medida *</label>
            <input type="text" name="medida" class="form-control" value="{{ old('medida', $neumatico->medida) }}" required>
            @error('medida') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label>Estado *</label>
            <select name="estado" class="form-control" required>
                @foreach($estados as $estado)
                    <option value="{{ $estado }}" {{ old('estado', $neumatico->estado) === $estado ? 'selected' : '' }}>
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
                @foreach($areas as $area)
                    <option value="{{ $area }}" {{ old('area', $neumatico->area) === $area ? 'selected' : '' }}>
                        {{ strtoupper($area) }}
                    </option>
                @endforeach
            </select>
            @error('area') <span class="error">{{ $message }}</span> @enderror
        </div>
        @else
        <div class="form-group">
            <label>Área</label>
            <input type="text" class="form-control" value="{{ strtoupper($neumatico->area) }}" readonly style="background:#f0f4f8;">
        </div>
        @endif

        <div class="form-group">
            <label>Observaciones</label>
            <textarea name="observaciones" class="form-control" rows="3">{{ old('observaciones', $neumatico->observaciones) }}</textarea>
            @error('observaciones') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div style="display:flex; gap:8px;">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('neumaticos.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
