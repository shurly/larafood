@extends('adminlte::page')

@section('title', 'Detalhes da Categoria')

@section('content_header')
    <h1>Detalhes da Categoria {{$category->name}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong>{{$category->name}}
                </li>
                <li>
                    <strong>E-mail: </strong>{{$category->description}}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{route('categories.destroy', $category->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar Categoria {{$category->name}} <i class=" fas fa-trash"></i> </button>
            </form>
        </div>
    </div>
@endsection
