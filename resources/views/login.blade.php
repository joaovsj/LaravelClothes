<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('/css/msg.css') }}">
    <title>Login</title>
</head>
<body>
    <section class="back">
        <main>

            @if($mensagem = Session::get('msg-danger'))
                <div class="msg-danger">
                    <p>{{ $mensagem }}</p>
                </div>   
            @endif

            @if($errors->any())
                @foreach ($errors->all() as $error)        
                    <div class="msg-danger">
                        <p>{{ $error }}</p>
                    </div>                    
                @endforeach
            @endif

            <form action="{{ route('login.auth') }}" method="post">
                @csrf

                <h1> &nbsp;Login</h1>
                <div class="inputBox">
                    <input type="email" name="email" placeholder="Email">
                </div>
                <div class="inputBox">
                    <input type="text" name="password" placeholder="Senha">
                </div>
                <div class="inputBox" id="btn">
                    <button type="submit">Entrar</button>
                </div>
                <a href="{{ route('login.create') }}">Cadastrar-se</a>
            </form>
        </main>
    </section>
</body>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</html>