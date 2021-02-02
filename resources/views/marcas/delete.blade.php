@extends('layouts.app')

@section('content')
<div class="container">
    @if(Session::has('mensagem'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-warning">

                {{Session::get('mensagem')['msg']}}
            </div>
        </div>
    </div>
@endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>{{ 'Deletar Marca'}}</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                       <p style="color: red"> Você tem certeza que deseja deletar <strong>{{$marca->nome}}?</strong></p>
                           <a href="{{route('marcas.destroy', $marca->id)}}"> <button type="submit" class="btn btn-danger"> Deletar </button> </a>
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection