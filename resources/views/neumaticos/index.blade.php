@extends('layouts.app')

@section('title', 'Neumáticos')

@section('content')
<div class="card">
    <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:20px;">
        <h2>🛞 Neumáticos</h2>
        <a href="{{ route('neumaticos.create') }}" class="btn btn-primary">+ Nuevo</a>
    </div>

    @if($neumaticos->isEmpty())
        <p style="color:#7f8c8d; text-align:center; padding:32px 0;">No hay neumáticos registrados aún.</p>
    @else
        <div style="overflow-x:auto;">
            <table>
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Marca</th>
                        <th>Medida</th>
                        <th>Estado</th>
                        <th>Área</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($neumaticos as $neumatico)
                    <tr>
                        <td><strong>{{ $neumatico->codigo }}</strong></td>
                        <td>{{ $neumatico->marca }}</td>
                        <td>{{ $neumatico->medida }}</td>
                        <td><span class="estado-{{ $neumatico->estado }}">{{ ucfirst(str_replace('_', ' ', $neumatico->estado)) }}</span></td>
                        <td><span class="area-{{ $neumatico->area }}">{{ strtoupper($neumatico->area) }}</span></td>
                        <td>{{ $neumatico->created_at->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('neumaticos.show', $neumatico) }}" class="btn btn-secondary btn-sm">Ver</a>
                            <a href="{{ route('neumaticos.edit', $neumatico) }}" class="btn btn-primary btn-sm" style="margin-left:4px;">Editar</a>
                            <form method="POST" action="{{ route('neumaticos.destroy', $neumatico) }}" style="display:inline; margin-left:4px;"
                                  onsubmit="return confirm('¿Eliminar este neumático?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
