@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>{{ 'Registrar Categoria'}}</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <form action="{{route('categorias.store')}}" method="POST">
                            @csrf
                            <h4></h4>
                            <div class="form-group">
                                <label for="descricao">Nome da categoria:</label>
                                <input id="inp" type="text" name="descricao" class="form-control" placeholder="Nome da Categoria" required>
                        
                            </div>
                            <button id='btnInserir' type="submit" class="btn "> Enviar </button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
