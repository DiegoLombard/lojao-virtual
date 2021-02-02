@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Produtos relacionados à Categoria') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Informações Adicionais</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categoria->produtos as $produto)
                            <tr>
                                <td scope="row">{{$produto->descricao}}</td>
                                <td><a id='categoria' href="{{route('produtos.show', $produto->id)}}">Detalhes do Produtos</a></td>
                               
                            </tr>
                            @endforeach
                            
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
