@extends('adminlte::page')

@section('title', 'Empresas')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('tenants.index')}}">Empresas</a></li>
    </ol>

    <h1>Empresas <a href="{{ route('tenants.create') }}" class="btn btn-dark">Adicionar <i
                class="fas fa-plus-square"></i></a></h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{route('tenants.search')}}" method="POST" class="form form-inline">
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
                    <th>Nome</th>
                    <th width="250">Ações</th>
                </tr>
                </thead>

                <tbody>

                @foreach($tenants as $tenant)
                    <tr>
                        <td>
                            <img src="{{url("storage/{$tenant->image}")}}" alt="{{$tenant->name}}" style="max-width: 150px">
                        </td>
                        <td>{{$tenant->title}}</td>

                        <td style="width:10px; ">
                            <a href="{{route('tenants.edit', $tenant->id)}}" class="btn btn-primary">Editar</a>
                            <a href="{{route('tenants.show', $tenant->id)}}" class="btn btn-warning">VER</a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {{ $tenants->appends($filters)->links() }}
            @else
                {{ $tenants->links() }}
            @endif
        </div>
    </div>

@stop
