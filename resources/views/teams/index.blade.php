@extends('layouts.app')
    @section('content')
    <div class="container">
        <h1 class="mb-4">Llistat de llibres</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('teams.create', [], true) }}">Afegir equip</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nom de l'equip</th>
                    <th>Descripció</th>
                    <th>Logo</th>
                    <th>Accions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($teams as $team)
                    <tr>
                        <td>{{ $team->name }}</td>
                        <td>{{ $team->description }}</td>
                        <td>{{ $team->logo }}</td>
                        <td>
                            <a href="{{ route('teams.edit', $team) }}" class="btn btn-sm btn-warning">Edita</a>
                            <form action="{{ route('teams.destroy', $team) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Segur que vols eliminar-lo?')">Elimina</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endsection
