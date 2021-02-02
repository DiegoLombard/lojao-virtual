@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>{{ 'Marcas Registradas'}}</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="form-group">
                            <form  action="{{route('marcas.buscar')}}" >
                                @csrf
                                <div class="input-group">
                                    <input id="inp" type="text" name="buscar" class="form-control" placeholder="Localizar Marca por Nome">
                                    <span class="input-group-btn"> <button id="btnBusca" class="btn btn-light">Buscar</button></span>
                                </div>
                            </form>
                        </div>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Ação</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($marcas as $marca)
                            <tr>
                                
                                <td scope="row">{{$marca->nome}}</td>
                                <td>
                                    <a href="{{route('marcas.show', $marca->id)}}" ><i id="btnAcao" class="fas fa-info-circle"></i></a>
                                    <a href="{{route('marcas.edit', $marca->id)}}" ><i id="btnAcao" class="fas fa-edit"></i></a>
                                    <a href="{{route('marcas.delete', $marca->id)}}" ><i id='btnAcao'  class="fas fa-trash-alt"></i></a>
                                </td>
                               
                            
                            
                            </tr>
                            @endforeach   
                          
                        </tbody>
                    </table>
                    <a href="{{route('marcas.create')}}"><button   id='btnInserir' class="btn btn-block">Inserir Marca</button></a>
                </div>
                <div class="d-flex justify-content-center">
                    {!! $marcas->links('pagination::bootstrap-4') !!}
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
