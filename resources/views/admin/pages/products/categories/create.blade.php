@extends('adminlte::page')

@section('title', "Cateoria disponíveis do Produto {$product->title}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('products.index')}}">Produtos</a></li>
        <li class="breadcrumb-item active"><a href="{{route('products.categories.create', $product->id)}}">Disponíveis</a></li>
    </ol>

    <h1>Cateoria disponíveis do Produto <b>{{$product->title}}</b></h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{route('products.categories.create', $product->id)}}" method="POST" class="form form-inline">
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
                    <th>Nome</th>
                    <th width="800">#</th>
                </tr>
                </thead>

                <tbody>
                <form action="{{route('products.categories.attach', $product->id)}}" method="POST">
                    @csrf
                    @foreach($categories as $category)
                        <tr>
                            <td>
                                <input type="checkbox" name="permissions[]" value="{{$category->id}}">
                            </td>
                            <td>
                                {{$category->name}}
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="500">
                            @include('admin.includes.alerts')
                            <button type="submit" class="btn btn-success">Vincular</button>
                        </td>
                    </tr>
                </form>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {{ $categories->appends($filters)->links() }}
            @else
                {{ $categories->links() }}
            @endif
        </div>
    </div>

@stop

