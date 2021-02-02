@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>{{ 'Deletar Produto'}}</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                       <p style="color: red"> Você tem certeza que deseja deletar <strong>{{$produto->descricao}}</strong></p>
                           <a href="{{route('produtos.destroy', $produto->id)}}"> <button type="submit" class="btn btn-danger"> Deletar </button> </a>
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection