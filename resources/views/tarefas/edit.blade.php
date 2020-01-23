@extends('layouts.admin')

@section('title', 'Edição de Tarefas')

@section('content')
    <h1>Edição</h1>

    @if(session('warning'))

        {{ session('warning') }}

    @endif

    <form method="POST">
        @csrf
        <label>Titulo:<br/>
        <input type="text" name="titulo" value="{{ $data->titulo }}"/>
        </label>
        <input type="submit" value="Salvar"/>
    </form>

@endsection