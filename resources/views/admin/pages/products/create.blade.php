@extends('adminlte::page')

@section('title', 'Cadastrar Novo Produtos')

@section('content_header')
    <h1>Cadastrar Novo Produtos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('products.store') }}" class="form" method="POST"  enctype="multipart/form-data">
                @csrf

                @include('admin.pages.products._partials.form')
            </form>
        </div>
    </div>
@endsection
