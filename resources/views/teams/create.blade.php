@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Nou llibre</h1>
    <form action="{{ route('teams.index', [], true) }}" method="POST">
        @csrf
        @include('teams.form')
        <button type="submit" class="btn btn-success">Desa</button>
    </form>
</div>
@endsection
