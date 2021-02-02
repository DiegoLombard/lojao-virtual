@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>{{ 'Categorias Registradas'}}</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="form-group">
                            <form  action="{{route('categorias.buscar')}}" >
                                @csrf
                                <div class="input-group">
                                    <input id="inp" type="text" name="buscar" class="form-control" placeholder="Localizar Categoria">
                                    <span class="input-group-btn"> <button id='btnBusca' class="btn btn-light">Buscar</button></span>
                                </div>
                            </form>
                        </div>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Descrição</th>
                                <th>Ação</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categorias as $categoria)
                            <tr>
                                
                                <td scope="row">{{$categoria->descricao}}</td>
                                <td>
                                    <a href="{{route('categorias.show', $categoria->id)}}" ><i id="btnAcao" class="fas fa-info-circle"></i></a>
                                    <a href="{{route('categorias.edit', $categoria->id)}}" ><i id="btnAcao" class="fas fa-edit"></i></a>
                                    <a href="{{route('categorias.delete', $categoria->id)}}" ><i id='btnAcao'  class="fas fa-trash-alt"></i></a>
                                </td>
                               
                            
                            
                            </tr>
                            @endforeach   
                          
                        </tbody>
                    </table>
                    
                    <a href="{{route('categorias.create')}}"><button  id='btnInserir'   class="btn  btn-block">Inserir Categoria</button></a>
                </div>
                <div class="d-flex justify-content-center">
                    {!! $categorias->links('pagination::bootstrap-4') !!}
                    </div>
            </div>
                
        </div>
    </div>
</div>
@endsection
