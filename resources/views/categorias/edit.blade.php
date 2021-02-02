@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>{{ 'Editar Categoria'}}</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <form action="{{route('categorias.update', $categoria->id)}}" method="POST">
                            <input type="hidden" name="_method" value="PUT">
                            @csrf
                            <h4></h4>
                            <div class="form-group">
                                <label for="nome">Nome da categoria:</label>
                                <input id="inp" type="text" name="nome" class="form-control" value="{{$categorias->nome}}" required>
                        
                            </div>
                            <button id='btnInserir' type="submit" class="btn "> Atualizar </button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection