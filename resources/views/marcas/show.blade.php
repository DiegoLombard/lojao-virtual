@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Produtos relacionados à marca') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4>{{$marca->nome}} </h4>
                                   
                    <hr>
                    
                    @foreach ($marca->produto as $produto)
                    <p>{{$produto->descricao}}</p>
                    
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
