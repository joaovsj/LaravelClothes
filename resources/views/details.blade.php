@extends('includes/layout')
@section('title', 'detalhes')

@push('style')
    <link rel="stylesheet" href=" {{ asset('css/details.css') }} ">
    <link rel="stylesheet" href=" {{ asset('css/msg.css') }} ">
@endpush

@section('content')

    @if($mensagem = Session::get('msg'))
        <div class="container">
            <div class="msg">
                <p>{{ $mensagem }}</p>
            </div>   
        </div>  
    @endif

    <main>
        <div class="first_content">
            <img src="{{ url("storage/products/{$product->picture}") }}" alt="">
        </div>
        <div class="second_content">
            <h2> &nbsp; {{$product->titulo}}</h2>
            <span>R$ {{$product->preco }}</span>
            <div class="content_description">
                <p> &nbsp; &nbsp;{{ $product->description }}</p>


                <a href="{{ route('add_to_cart', $product->id) }}">
                    <button>
                        Adicionar ao Carrinho
                    </button>
                </a>
            </div>

        </div>
    </main>
@endsection