@extends('adminlte::page')

@section('title', 'Detalhes do Usuário')

@section('content_header')
    <h1>Detalhes do Usuário {{$user->name}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong>{{$user->name}}
                </li>
                <li>
                    <strong>E-mail: </strong>{{$user->email}}
                </li>
                <li>
                    <strong>Empresa: </strong>{{$user->tenant->name}}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{route('users.destroy', $user->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar Usuário {{$user->name}} <i class=" fas fa-trash"></i> </button>
            </form>
        </div>
    </div>
@endsection
