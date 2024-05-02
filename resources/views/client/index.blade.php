@extends('theme.base')

@section('content')

    <div class= "container py-5  text-center" style="padding: 0.5%">
        <h1 style="margin-bottom: 3%">Listado de Clientes</h1>
        <a href="{{route('client.create')}}" class="btn btn-primary" style="margin-bottom: 2%" > Crear Cliente </a>

        @if (Session::has('message'))
            <div class="alert alert-info my-5">
                {{ Session::get('message') }}    
            </div>          
        @endif
        <table class="table">
            <thead>
                <th>Nombre</th>
                <th>Saldo</th> 
                <th>Comentarios</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                @forelse ($clients as $details)
                    <tr>
                        <td>{{ $details->name }}</td>
                        <td>{{ $details->due }}</td>
                        <td>{{ $details->comments }}</td>
                        <td>
                            <a href="{{ route('client.edit', $details)}}" class="btn btn-warning">Editar</a>

                            <form action="{{ route('client.destroy', $details) }}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Estas seguro de eliminar este registro?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                <tr>
                    <td colspan="3">No existen registros en estos momentos</td>
                </tr>

                @endforelse
            </tbody>
        </table>

        @if ($clients->count())
        {{$clients->links()}}          
        @endif


    </div>
    
@endsection