@extends('theme.base')

@section('content')

    <div class= "container py-5  text-center">
        <h1 style="padding: 5%">CRUD CON LARAVEL</h1>
        <a href="{{route('client.index')}}" class="btn btn-primary"> Vista de Clientes </a>
    </div>
    
@endsection