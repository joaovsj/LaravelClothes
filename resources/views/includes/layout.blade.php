<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    @stack('style')
    @stack('chartjs')
    
    <title>@yield('title')</title>
</head>
<body>
    <header>
        <span class="tittle">
            <h1>LaraClothes</h1>
        </span>
        <ul>
            <li><a href="/">QUEM SOMOS</a></li>
            <li><a href="/home">PRODUTOS</a></li>
            @auth
                @if(auth()->user()->email == 'admin@gmail.com')
                    <li><a href="{{ route('admin.index') }}">DASBOARD</a></li>        
                @else 
                    <li>
                        <a href=" {{ route('cart') }} ">
                        <i class='bx bxs-cart'></i>&nbsp;CARRINHO
                        <span id="cart">{{ count((array) session('cart')) }}</span>
                        </a>
                    </li>
                @endif

                <li><a href="/logout">SAIR</a></li>    
            @else
                <li><a href="/login">ENTRAR</a></li>    
            @endauth
        </ul>        
    </header>

    @yield('content')

    <footer>
        &copy; Todos os direitos reservados.
    </footer>

    @stack('jquery')

</body>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</html>