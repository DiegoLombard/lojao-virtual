@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>{{ 'Editar Produto'}}</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <form action="{{route('produtos.update', $produto->id)}}" method="POST">
                                <input  type="hidden" name="_method" value="PUT">
                                @csrf
                                <h4></h4>
                                <div class="form-group">
                                    <label for="nome">Descrição do Produto:</label>
                                    <input id="inp" type="text" name="descricao" class="form-control" value="{{$produto->descricao}}" required>
                            
                                </div>
                            
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="preco">Preço:</label>
                                    <input id="inp" type="float" name="preco" class="form-control" value="{{$produto->preco}}" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="cor">Cor da Embalagem:</label>
                                    <input id="inp" type="text" name="cor" class="form-control" value="{{$produto->cor}}" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="peso">Peso do Produto:</label>
                                    <input id="inp" type="float" name="peso" class="form-control" value="{{$produto->peso}}" required>
                                </div>
                            </div>
                                <hr>
                                <h4>Marca relacionada</h4>
                                <div class="form-group">
                                    <label for="marca_id"></label>
                                    <select id="inp" class="custom-select" name="marca_id" required>
                                        
                                        @foreach ($marcas as $marca)
                                        <option value="{{$marca->id}}" {{(isset($produto->marca_id) &&$produto->marca_id == $marca->id ? 'selected' : '')}}>{{$marca->nome}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <hr>
                                <h4>Categoria</h4>
                                <div class="form-group">
                                    <label for="categoria_id">Selecione as categorias do Produto</label>
                                    <select id="inp" multiple class="custom-select" name="categoria_id[]" required>
                                        
                                        @foreach ($categorias as $categoria)
                                        <option value="{{$categoria->id}}"
                                            @foreach ($produto->categorias as $c)
                                            @if ($categoria->id == $c->id)selected="selected"
                                            
                                            @endif  
                                            @endforeach>
                                        
                                       {{$categoria->descricao}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button id="btnInserir" type="submit" class="btn"> Atualizar </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection