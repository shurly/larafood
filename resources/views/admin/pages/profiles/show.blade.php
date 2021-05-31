@extends('adminlte::page')

@section('title', 'Detalhes do Perfil')

@section('content_header')
    <h1>Detalhes do Perfil {{$profile->name}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong>{{$profile->name}}
                </li>
                <li>
                    <strong>Descrição: </strong>{{$profile->description}}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{route('profiles.destroy', $profile->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar Perfil {{$profile->name}} <i class=" fas fa-trash"></i> </button>
            </form>
        </div>
    </div>
@endsection
