@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('products.index')}}">Produtos</a></li>
    </ol>

    <h1>Produtos <a href="{{ route('products.create') }}" class="btn btn-dark">Adicionar <i
                class="fas fa-plus-square"></i></a></h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{route('products.search')}}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Pesquisar" class="form-control"
                       value="{{$filter['filter'] ?? ''}}">
                <button type="submit" class="btb btn-dark">Pesquisar</button>
            </form>
        </div>

        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th width="250">Ações</th>
                </tr>
                </thead>

                <tbody>

                @foreach($products as $product)
                    <tr>
                        <td>
                            <img src="{{url("storage/{$product->image}")}}" alt="{{$product->title}}" style="max-width: 150px">
                        </td>
                        <td>{{$product->title}}</td>

                        <td style="width:10px; ">
                            <a href="{{route('products.edit', $product->id)}}" class="btn btn-primary">Editar</a>
                            <a href="{{route('products.show', $product->id)}}" class="btn btn-warning">VER</a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {{ $products->appends($filters)->links() }}
            @else
                {{ $products->links() }}
            @endif
        </div>
    </div>

@stop