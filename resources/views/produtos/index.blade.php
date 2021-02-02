@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h3>{{ 'Produtos Registrados'}}</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="form-group">
                            <form  action="{{route('produtos.buscar')}}" >
                                @csrf
                                <div class="input-group">
                                    <input id="inp" type="text" name="buscar" class="form-control" placeholder="Localizar Produto por Nome">
                                    <span class="input-group-btn"> <button id='btnBusca' class="btn btn-light">Buscar</button></span>
                                </div>
                            </form>
                        </div>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Preço</th>
                                <th>Cor da Embalagem</th>
                                <th>Peso</th>
                                <th>Marca</th>
                                
                                <th>Ação</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produtos as $produto)
                            <tr>
                                
                                <td scope="row">{{$produto->descricao}}</td>
                                <td scope="row">{{$produto->preco}}</td>
                                <td scope="row">{{$produto->cor}}</td>
                                <td scope="row">{{$produto->peso}}</td>
                                <td scope="row">{{$produto->marca->nome}}</td>
                                <td>
                                    <a href="{{route('produtos.show', $produto->id)}}" ><i id="btnAcao" class="fas fa-info-circle"></i></a>
                                    <a href="{{route('produtos.edit', $produto->id)}}" ><i id="btnAcao" class="fas fa-edit"></i></a>
                                    <a href="{{route('produtos.delete', $produto->id)}}" ><i id='btnAcao'  class="fas fa-trash-alt"></i></a>
                                
                                </td>
                               
                            
                            
                            </tr>
                            @endforeach   
                          
                        </tbody>
                    </table>
                    <a href="{{route('produtos.create')}}"><button  id='btnInserir' class="btn btn-block">Inserir Produto</button></a>
                </div>
                <div class="d-flex justify-content-center">
                    {!! $produtos->links('pagination::bootstrap-4') !!}
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
