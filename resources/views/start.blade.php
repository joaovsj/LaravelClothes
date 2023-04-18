@extends('includes/layout')
@section('title', 'Apresentação')


@section('content')

<!-- img - com quadrados -->
    <section class="first">
        <span class="first-square"></span>

        <div class="img"></div>

        <span class="last-square"></span>
    </section>
<!-- Por que comprar -->

    <section class="second">
        <div class="img"></div>
        <div class="text">
            <p>Por que comprar na</p> <br>

            <div class="title">     
                <span class="first-square"></span>
                <h5>LaraClothes?</h5>
                <span class="last-square" ></span>
            </div>
        </div>
    </section>
<!--  Aprenstação -->

    <section class="third">
        <div class="first_text">
            <span>
                <p>Somos</p>
            </span>
            <span>
                <p>uma empresa fiel ao nossos valores.</p>
            </span>
        </div>
        <div class="last_text">
            <p>Com o objetivo de proporcionar a melhor compra <span>melhor para você!</span></p>
        </div>
    </section>

<!-- Exibição de imagens -->

    <section class="fourth">
        <div class="first-img"></div>
        <div class="second-img">
            <div></div>
            <div></div>
        </div>
    </section>

<!-- comentários -->

    <section class="fifth">
        <span>
            <h4>&ensp;Comentários</h4>
        </span>
        <div class="comments">
            <div>
                <img src="img/person_one.jpg" alt="first">
                <p>Realmente é uma empresa com muito carinho com seus consumidores.</p>
                <p>Rogério Melo</p>
            </div>
            <div>
                <img src="img/person_two.jpg" alt="second">
                <p>Uma loja de confiança, super recomendo!</p>
                <p>Rosa Gonçalves</p>
            </div>
            <div>
                <img src="img/new.jpg" alt="three">
                <p>Nunca vi uma entrega tão rápida, particularmente não deixo de cliente da LaraClothes!</p>
                <p>Júlia Menezes</p>
            </div>
        </div>
    </section>

<!-- Endereço -->

    <section class="address">
        <div class="text">
            <h4> &ensp; Onde nos <br> &ensp; achar!</h4>
            <div>
                <span> <i class='bx bx-map'></i> Anibal Corrêa Melo de Andrade, 1240 - SP</span>
                <span><i class='bx bx-phone'></i>  (15)997458173</span>
                <span> <i class='bx bx-envelope'></i> contato@gmail.com</span>
            </div>
        </div>
        <div class="maps">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2548.646721204211!2d-46.68997674016732!3d-23.577172714754372!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce576d78fdbdb5%3A0x5ffc6f2485c8ae!2sShopping%20Iguatemi%20S%C3%A3o%20Paulo!5e0!3m2!1spt-BR!2sbr!4v1680609525965!5m2!1spt-BR!2sbr" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
@endsection