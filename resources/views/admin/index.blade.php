<!-- filepath: resources/views/admin/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Panel de Administrador</h1>
    <p>Bienvenido, {{ Auth::user()->first_name }}.</p>
    <ul>
        <li><a href="{{ route('user.index') }}">Ver usuarios</a></li>
        <li><a href="{{ route('barbers.index') }}">Ver barberos</a></li>
        <li><a href="{{ route('crud.index') }}">Crud</a></li>    
        <!-- Agrega más enlaces según lo que quieras administrar -->
    </ul>
</div>
@endsection