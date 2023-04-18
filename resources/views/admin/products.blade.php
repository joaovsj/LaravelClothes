@extends('includes/layout')
@section('title', 'Listagem dos Produtos')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
    <link rel="stylesheet" href="{{ asset('css/msg.css') }}">

    <style>
        .msg{
            margin: 0 !important
        }
        
        .btn{
            position: absolute;
            top: 20%;
            left: 25%;
            font-size: 1.2rem;
        }
        .btn>a{
            color: #333;
        }
    </style>
@endpush

@section('content')

    <span class="btn">
        <a href="{{ route('admin.create') }}">Voltar</a>
    </span>

    <main>
        <div>
            @if(session('sucess'))
                <div class="msg">
                    <p>{{ session('sucess') }}</p>
                </div>
            @endif

            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Preço</th>
                        <th>Opção</th>
                    </tr>
                </thead>
                <tbody>

                    @if(count($products) > 0)
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->titulo }}</td>
                                <td>{{  Str::limit($product->description, 25) }}</td>
                                <td>{{ $product->preco }} </td>
                                <td>
                                    <form action="{{ route('admin.delete', $product->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit">
                                            <i class='bx bxs-trash-alt' ></i>    
                                        </button>

                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <p id="end_text">Não há produtos cadastrados ainda...</p>
                    @endif
                </tbody>
            </table>
        </div>
    </main>
@endsection