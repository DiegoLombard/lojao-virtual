@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>{{ 'Registrar Produto'}}</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <form action="{{route('produtos.store')}}" method="POST">
                            @csrf
                            <h4></h4>
                            <div class="form-group">
                                <label for="descricao">Descrição:</label>
                                <input id="inp" type="text" name="descricao" class="form-control" placeholder="Descricao do produtoa" required>
                        
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="preco">Preço:</label>
                                    <input id="inp" type="float" name="preco" class="form-control" placeholder="7.99" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="cor">Cor da Embalagem:</label>
                                    <input id="inp" type="text" name="cor" class="form-control" placeholder="Verde" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="peso">Peso do Produto:</label>
                                    <input id="inp" type="float" name="peso" class="form-control" placeholder="0.800" required>
                                </div>
                            </div>
                            <hr>
                            <h4>Marca relacionada</h4>
                            <div class="form-group">
                                <label for="marca_id"></label>
                                <select id="inp" class="custom-select" name="marca_id" required>
                                    <option selected>Escolha</option>
                                    @foreach ($marcas as $marca)
                                    <option value="{{$marca->id}}">{{$marca->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <hr>
                            <h4>Categoria</h4>
                            <div class="form-group">
                                <label for="categoria_id">Selecione as categorias do Produto</label>
                                <select id="inp" multiple class="custom-select" name="categoria_id[]" required>
                                    
                                    @foreach ($categorias as $categoria)
                                    <option value="{{$categoria->id}}">{{$categoria->descricao}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <button id='btnInserir' type="submit" class="btn "> Enviar </button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
