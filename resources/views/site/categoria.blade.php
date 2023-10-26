@extends('site.layout')
@section('title', 'Categoria')

@section('conteudo')
    <div class="row container">
        <h3>Categoria: {{$categoria->nome}}</h3>
        @foreach($produtos as $produto)

            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="{{$produto->imagem}}">
                        <a href="{{route('site.details', $produto->slug)}}" class="btn-floating halfway-fab waves-effect waves-light red">
                            <i class="material-icons">visibility</i>
                        </a>
                    </div>
                    <div class="card-content">
                        <span class="card-title">{{Str::limit($produto->nome, 10)}}</span>
                        <p>{{ Str::limit($produto->descricao, 20)}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row container center">
        {{ $produtos->links('custom.pagination') }}
    </div>
@endsection
