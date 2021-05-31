@extends('adminlte::page')

@section('title', 'Detalhes do Permissões')

@section('content_header')
    <h1>Detalhes do Permissões {{$permission->name}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong>{{$permission->name}}
                </li>
                <li>
                    <strong>Descrição: </strong>{{$permission->description}}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{route('permissions.destroy', $permission->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar a Permissão {{$permission->name}} <i class=" fas fa-trash"></i> </button>
            </form>
        </div>
    </div>
@endsection
