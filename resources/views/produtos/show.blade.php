@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>{{ __('Detalhes do produto') }}</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        
                            <p>Descricao: {{$produto->descricao}}</p>
                            <p>Preco: R$ {{number_format($produto->preco,2,',', '.')}}</p>
                            <p>Cor: {{$produto->cor}}</p>
                            <p>Peso: {{number_format($produto->peso, 3, ',','.')}} KG</p>
                            <p>Marca: {{$produto->marca->nome}}</p>
                            <p>Categorias: 
                                @foreach ($produto->categorias as $categoria)
                                <a id="categoria" href="{{route('categorias.show', $categoria->id)}}">{{$categoria->descricao}}</a>
                                    
                                @endforeach
                            </p>
                           
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
