<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Document</title>
</head>
<body>
    <section class="back">
        <main>
            @if(session('msg'))
                <div class="msg">
                    <p>{{ session('msg') }}</p>
                </div>

            @elseif(session('msg-danger'))
                <div class="msg-danger">
                    <p>{{ session('msg-danger') }}</p>
                </div>
            @endif

            <form action="{{ route('users.store') }}" method="post">
                @csrf

                <h1> &nbsp;Cadastro</h1>
                <div class="inputBox">
                    <input type="text" name="first_name" placeholder="Primeiro Nome">
                </div>
                <div class="inputBox">
                    <input type="text" name="last_name" placeholder="Último Nome">
                </div>
                <div class="inputBox">
                    <input type="email" name="email" placeholder="Email">
                </div>
                <div class="inputBox">
                    <input type="password" name="password" placeholder="Senha">
                </div>
                <div class="inputBox">
                    <input type="password" name="confirmPassword" placeholder="Confirmar Senha">
                </div>  
                <div class="inputBox" id="btn">
                    <button type="submit">Cadastrar-se</button>
                </div>
                <a href="/login">Entrar</a>
            </form>
        </main>
    </section>
</body>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</html>