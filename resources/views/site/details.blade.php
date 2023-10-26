@extends('site.layout')
@section('title', 'Detalhes')
@section('conteudo')

    <div class="row container">
        <br>
        <div class="col s12 m6">
            <img src="{{$produto->imagem}}" class="responsive-img">
        </div>

        <div class="col s12 m6">
            <h4> {{$produto->nome}}</h4>
            <h4> R${{number_format($produto->preco,2,',','.')}}</h4>
            <p> Postado por: {{$produto->user->firstname }}</p>
            <p> Categoria: {{$produto->categoria->nome }}</p>
            <p> {{$produto->descricao}}</p>
            <form action="{{route('site.addcarrinho')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$produto->id}}">
                <input type="hidden" name="name" value="{{$produto->nome}}">
                <input type="hidden" name="price" value="{{$produto->preco}}">
                <input type="number" name="qnt" min="1" value="1">
                <input type="hidden" name="img" value="{{$produto->imagem}}">
                <button class="btn orange btn-lange">Comprar</button>
            </form>
        </div>
    </div>

@endsection
