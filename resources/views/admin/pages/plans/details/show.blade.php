@extends('adminlte::page')

@section('title', "Detalhe  {$detail->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Planos</a></li>
        <li class="breadcrumb-item"><a href="{{route('plans.show', $plan->url)}}">{{$plan->name}}</a></li>
        <li class="breadcrumb-item"><a href="{{route('details.plan.index', $plan->url)}}" class="active">Detalhes do Plano</a></li>
        <li class="breadcrumb-item active"><a href="{{route('details.plan.edit', [$plan->url, $detail->id])}}" class="active">Detalhes</a></li>

    </ol>

    <h1>Detalhe {{$detail->name}}</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{$detail->name}}
                </li>
            </ul>
        </div>
        <div class="card-footer">
            <form action="{{route('details.plan.destroy', [$plan->url, $detail->id])}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar</button>
            </form>
        </div>
    </div>
@endsection

