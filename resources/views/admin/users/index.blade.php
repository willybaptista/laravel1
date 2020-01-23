@extends('layouts.admin')

@section('title', 'Usuários')

@section('content')

    @foreach($users as $user) 

        {{ $user->name }}<br/>

    @endforeach

@endsection