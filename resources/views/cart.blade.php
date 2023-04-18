@extends('includes/layout')
@section('title', 'Carrinho')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    <link rel="stylesheet" href="{{ asset('css/msg.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
@endpush

@php $total = 0;  @endphp 
@section('content')

    @if($mensagem = Session::get('msg'))
        <div class="container">
            <div class="msg">
                <p>{{ $mensagem }}</p>
            </div>   
        </div>  
    @endif

        <div class="excluir">
            <p>Tem certeza que deseja excluir o item?</p> <br>
            <button class="yes">Sim</button>
            <button class="no">Não</button>
        </div>

    <main>
        <table>
            <thead>
                <tr>
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Subtotal</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @if(session('cart'))
                    @foreach (session('cart') as $id => $details) 
                        @php 
                            $total += $details['price'] * $details['quantity'];
                        @endphp
                        <tr data-id="{{ $id }}">
                            <td>
                                <span>
                                    <img src="{{ url("storage/products/{$details['picture']}") }}" alt="">
                                </span>
                            </td>
                            <td>{{ $details['product_name'] }}</td>
                            <td>{{ $details['price'] }}</td>
                            <td data-th="Quantity">
                                <input type="number" name="price" id="price" value="{{ $details['quantity'] }}" min="1" class="quantity cart_update">
                            </td>
                            <td>{{ $details['price'] * $details['quantity'] }}</td>
                            <td>
                                <button class="cart_remove">
                                    <i class='bx bxs-trash-alt'></i> &nbsp; Excluir
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <div class="values">
            <span>Total:  R$ {{ $total }}</span>
            <a href="">
                <button class="end">
                    <i class='bx bxs-shopping-bags'></i> &nbsp; Finalizar compra!
                </button>
            </a>
            <a href="{{ route('product.index') }}">
                <button class="continue">
                    <i class='bx bx-left-arrow-alt'></i>Continuar Comprando!
                </button>
            </a>
        </div>  
    </main>

    <script type="text/javascript">
// alterar valor carrinho
        $(".cart_update").change(function(e){
            e.preventDefault();
            var ele = $(this);

            $.ajax({
                url: "{{ route('update_cart') }}",
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                    // find -> procura os descendents
                    // val -> equivalente ao value
                },
                success: function(response){
                    window.location.reload();
                }
            });
        });


// remover item do carrinho
        $(".cart_remove").click(function(e){        

            e.preventDefault();
            $(".excluir").addClass("active");
            
            var ele = $(this)

            if($(".yes").click(function(){
                // sem CSRF o Laravel não permite a solicitação
                // parents -> retornarsse os ancestrais desse elemento na arvore DOM
                // attr    -> retornar atributo do valor específicado
                $.ajax({
                    url: "{{ route('remove_from_cart') }}",
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function(){
                        window.location.reload();
                    }
                })   
            }));

            if($(".no").click(function(){
                $(".excluir").removeClass("active");
            }));
        });
    </script>
@endsection




