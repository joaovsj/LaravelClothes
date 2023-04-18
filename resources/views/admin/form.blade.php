@extends('includes/layout')
@section('title', 'Cadastrar Produtos')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <link rel="stylesheet" href="{{ asset('css/msg.css') }}">
@endpush

@section('content')
    <main>
        <form action="{{ route('admin.products') }}" method="post" class="first_form" enctype="multipart/form-data">
            @csrf

            @if(session('success_products'))
                <div class="msg">
                    <p>{{ session('success_products') }}</p>
                </div>
            @elseif(session('error_fields'))
                <div class="msg-danger">
                    <p>{{ session('error_fields') }}</p>
                </div>
            @endif

            <h1> &nbsp;Cadastro de Produtos</h1>
            
            <div class="inputBox">
                <label for="picture" id="foto"><i class='bx bxs-image-add'></i>Escolher Arquivo</label>
                <input type="file" name="picture" id="picture">
            </div>


            <div class="inputBox">
                <input type="text" name="titulo" placeholder="Nome">
            </div>
            <div class="inputBox">
                <input type="text" name="price" placeholder="Preço" class="money">
            </div>
            

            <select name="category" class="inputSelect">
                <option value="">Selecione a Categoria</option>

                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>    
                    @endforeach

            </select>

            <div class="boxArea" id="ementa">
                <label for="ementa">Descrição do Produto</label>
                <textarea name="description" id="ementa" cols="30" rows="5"></textarea>
            </div>

            <div class="inputBox" id="btn">
                <button type="submit">Cadastrar</button>
            </div>
        </form>
        
        

        <section class="second_form">
            
            <a href="{{ route('admin.listing') }}" id="btnListagem">Listagem dos produtos</a>

            @if(session('sucess'))
                <div class="msg">
                    <p>{{ session('sucess') }}</p>
                </div>
            @elseif(session('error'))
                <div class="msg-danger">
                    <p>{{ session('error') }}</p>
                </div>
            @endif

            <form action="{{ route('admin.category') }}" method="post">
                @csrf

                <div class="inputButtons">
                    <input type="text" class="categoria" name="name" placeholder="Categoria">
                    <button type="submit">Cadastrar</button>
                </div>
            </form>
            <table class="table">
                <thead> 
                    <tr>
                        <th>Nome</th>
                        <th>Produtos por Categorias</th>
                        <th colspan="2">Ações</th>
                    </tr>
                </thead>
                <tbody>

                    @if(count($categories) > 0)
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>{{ count($category->products) }}</td>
                                <td class="btn">
                                    <a href="{{ route('admin.deleteCategory', $category->id) }}"><i class='bx bxs-trash-alt' ></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @else 
                        <p style="margin: 20px 30px;">Não há categorias cadastradas ainda...</p>
                    @endif
                </tbody>
            </table>
        </section>
    </main>
@endsection

@push('jquery')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <script>
        $('.money').mask('000.000.000.000.000,00', {reverse: true});
    </script>
@endpush