@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Edita llibre</h1>
    <form action="{{ route('teams.update', $team) }}" method="POST">
        @csrf
        @method('PUT')
        @include('teams.form')
        <button type="submit" class="btn btn-primary">Actualitza</button>
    </form>
</div>
@endsection
