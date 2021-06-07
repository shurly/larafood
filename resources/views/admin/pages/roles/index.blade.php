@extends('adminlte::page')

@section('title', 'Cargos')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('roles.index')}}">Cargos</a></li>
    </ol>

    <h1>Cargos <a href="{{ route('roles.create') }}" class="btn btn-dark">Adicionar <i
                class="fas fa-plus-square"></i></a></h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{route('roles.search')}}" method="POST" class="form form-inline">
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
                    <th width="250">Ações</th>
                </tr>
                </thead>

                <tbody>

                @foreach($roles as $role)
                    <tr>
                        <td>
                            {{$role->name}}
                        </td>
                        <td style="width:10px; ">
                            {{--  <a href="{{route('details.plan.index', $profile->url)}}" class="btn btn-info">Detalhes</a>--}}
                            <a href="{{route('roles.edit', $role->id)}}" class="btn btn-primary">Editar</a>
                            <a href="{{route('roles.show', $role->id)}}" class="btn btn-warning">VER</a>
                            <a href="{{route('roles.permissions', $role->id)}}" class="btn btn-info"><i class="fas fa-lock"></i></a>

                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {{ $roles->appends($filters)->links() }}
            @else
                {{ $roles->links() }}
            @endif
        </div>
    </div>

@stop
