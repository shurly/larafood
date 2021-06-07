@extends('adminlte::page')

@section('title', "Cargos disponíveis para o usuário {$user->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('users.index')}}">Perfis</a></li>
    </ol>

    <h1>Cargos disponíveis para o usuário <b>{{$user->name}}</b></h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{route('users.roles.create', $user->id)}}" method="POST" class="form form-inline">
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
                <form action="{{route('users.roles.attach', $user->id)}}" method="POST">
                    @csrf
                    @foreach($roles as $role)
                        <tr>
                            <td>
                                <input type="checkbox" name="permissions[]" value="{{$role->id}}">
                            </td>
                            <td>
                                {{$role->name}}
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
                {{ $roles->appends($filters)->links() }}
            @else
                {{ $roles->links() }}
            @endif
        </div>
    </div>

@stop

