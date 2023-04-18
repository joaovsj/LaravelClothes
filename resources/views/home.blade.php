@extends('includes/layout')
@section('title', 'Produtos')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/msg.css') }}">
@endpush    

@section('content')

    <div class="search">
        <form action="{{ route('product.index') }}" method="get">
            
            <div class="inputBox">  
                <input type="text" class="categoria" name="titulo" placeholder="Nome do Produto" value="{{$titulo}}">
            </div>
            
            <select name="category" class="inputSelect">
                <option value="">Selecione a Categoria</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>    
                    @endforeach
            </select>

            <button type="submit">Procurar</button>
        </form>
    </div>
    
    @if($mensagem = Session::get('msg'))
        <div class="container">
            <div class="msg">
               <p>{{ $mensagem }}</p>
            </div>   
        </div>
    @endif

    <div class="wrapper">

        @if(count($products) > 0)
            @foreach($products as $product)
                    <div class="card">
                        <img src="{{ url("storage/products/{$product->picture}") }}" alt="">
                        <div class="content">
                            <div class="row">
                                <div class="details">
                                    <span>{{ $product->titulo }}</span>
                                    <p>{{ Str::limit($product->description, 20) }}</p>
                                </div>
                                <div class="price">R$ {{ $product->preco }}</div>
                            </div>
                            <div class="buttons">
                                <button>
                                    <a href="{{route('products.details', $product->id)}}">Ver mais</a>
                                </button>
                                <button>
                                    <a href="{{ route('add_to_cart', $product->id) }}">
                                        Adicionar ao Carrinho
                                    </a>
                                </button>
                            </div>
                        </div>
                    </div>
            @endforeach
        @else
            <div id="mensagem-pesquisa">
                <p>Não há Roupas referentes a pesquisa!</p>
            </div>
        @endif
    </div>
@endsection