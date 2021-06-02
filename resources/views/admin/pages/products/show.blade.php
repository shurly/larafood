@extends('adminlte::page')

@section('title', 'Detalhes do Produto')

@section('content_header')
    <h1>Detalhes do Produto {{$product->title}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>

                    <img src="{{url("storage/{$product->image}")}}" alt="{{$product->title}}" style="max-width: 90px">

                <li>
                    <strong>Título: </strong>{{$product->title}}
                </li>
                <li>
                    <strong>Flag: </strong>{{$product->flag}}
                </li>
                <li>
                    <strong>Descrição: </strong>{{$product->description}}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{route('products.destroy', $product->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar Produto {{$product->title}} <i class=" fas fa-trash"></i> </button>
            </form>
        </div>
    </div>
@endsection
