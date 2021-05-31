@extends('adminlte::page')

@section('title', "Perfis disponíveis do Plano {$plan->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Perfis</a></li>
        <li class="breadcrumb-item active"><a href="{{route('plans.profiles.create', $plan->id)}}">Disponíveis</a></li>
    </ol>

    <h1>Perfis disponíveis do Plano <b>{{$plan->name}}</b></h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{route('plans.profiles.create', $plan->id)}}" method="POST" class="form form-inline">
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
                <form action="{{route('plans.profiles.attach', $plan->id)}}" method="POST">
                    @csrf
                    @foreach($profiles as $profile)
                        <tr>
                            <td>
                                <input type="checkbox" name="permissions[]" value="{{$profile->id}}">
                            </td>
                            <td>
                                {{$profile->name}}
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
                {{ $profiles->appends($filters)->links() }}
            @else
                {{ $profiles->links() }}
            @endif
        </div>
    </div>

@stop

