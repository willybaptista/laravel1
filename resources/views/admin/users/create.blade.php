@extends('layouts.admin')

@section('title', 'Adicionar Usuário')

@section('content_header')
    <h1>Novo Usuário</h1>    
@endsection

@section('content')

<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>Nome</label>
        <input type="text" name="name" /><br/>
        <label>Email</label>
        <input type="email" name="email" /><br/>
        <label>Senha</label>
        <input type="password" name="password" /><br/>
        Confirmar Senha
        <input type="password" name="password_confirmation" /><br/>
        <input type="submit" value="Enviar" />
    </div>

</form>

@endsection