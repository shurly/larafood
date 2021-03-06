@extends('adminlte::page')

@section('title', "Permissões disponíveis para o cargo {$role->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('roles.index')}}">Cargo</a></li>
    </ol>

    <h1>Permissões disponíveis para o cargo <b>{{$role->name}}</b></h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{route('roles.permissions.create', $role->id)}}" method="POST" class="form form-inline">
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
                <form action="{{route('roles.permissions.attach', $role->id)}}" method="POST">
                    @csrf
                    @foreach($permissions as $permission)
                        <tr>
                            <td>
                                <input type="checkbox" name="permissions[]" value="{{$permission->id}}">
                            </td>
                            <td>
                                {{$permission->name}}
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
                {{ $permissions->appends($filters)->links() }}
            @else
                {{ $permissions->links() }}
            @endif
        </div>
    </div>

@stop

