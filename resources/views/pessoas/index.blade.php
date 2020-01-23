@extends('layouts.admin')

@section('title', 'Pessoas');

@section('content')

    @foreach($pessoas as $pessoa)

        {{ $pessoa->nome }}<br/>

    @endforeach

    {{ $pessoas->links() }}

@endsection