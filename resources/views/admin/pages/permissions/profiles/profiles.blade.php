@extends('adminlte::page')

@section('title', "Perfis das Permissões {$permission->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('profiles.index')}}">Perfis</a></li>
    </ol>

    <h1>Perfis das Permissões$profiles <b> {{$permission->name}}</b> </h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th width="250">Ações</th>
                </tr>
                </thead>

                <tbody>

                @foreach($profiles as $profile)
                    <tr>
                        <td>
                            {{$profile->name}}
                        </td>
                        <td style="width:10px; ">
                            {{--  <a href="{{route('details.plan.index', $profile->url)}}" class="btn btn-info">Detalhes</a>--}}
                            <a href="{{route('profiles.permissions.detach', [$profile->id, $permission->id])}}" class="btn btn-danger">Desvincular</a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {{ $profiles->appends($filters)->links() }}
            @else
                {{ $profiles->links() }}
            @endif
        </div>
    </div>

@stop
