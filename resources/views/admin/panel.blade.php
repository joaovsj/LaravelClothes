@extends('includes/layout')
@section('title', 'Painel')

@push('chartjs')
    <script src="{{ asset('js/chart.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush

@section('content')

    <h1 class="text">Bem-vindo {{ auth()->user()->first_name }}</h1>


    <main class="content">
        <section class="management">
            <button>
                <a href="{{ route('admin.create') }}">Novo Produto</a>
            </button>
            <button>
                <a href="{{ route('admin.listing') }}">Ver Produtos</a>
            </button>
        </section>

        <section class="grafic">
            <div class="left">
                <canvas id="myChart" width="400px" ></canvas>

                <canvas id="myChart2" width="400"><'/canvas> 
            </div>
            <div class="right">
                <div class="one">
                    <i class='bx bx-money' ></i>
                    Faturamento: R$ 157,99
                </div>
                <div class="two">
                    <i class='bx bx-user'></i>
                    Número de Usuários: {{$totalDeUsuarios}} 
                </div>
                <div class="three">
                    <i class='bx bx-cart'></i>
                    Pedidos nesse mês: 0
                </div>
            </div>
        </section>
    </main>

    <script>
            var ctx = document.getElementById('myChart');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [ {{$usuariosAno}} ],
                    datasets: [{
                        label: ['2023'],
                        data: [ {{$userTotal}} ],
                        backgroundColor: [ 
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',                         
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',                     
                            'rgba(255, 159, 64, 1)'
                        ],
                    borderWidth: 1, 
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });

        var ctx = document.getElementById('myChart2');
        var myChart = new Chart(ctx, {
          type: 'pie',
          data: {
              labels: [ {!!$category!!} ],
              datasets: [{
                  label: 'Produtos por Categorias',
                  data: [ {{ $product }}],
                  backgroundColor: [
                      'rgba(255, 99, 132)',
                      'rgba(54, 162, 235)',                         
                      'rgba(255, 159, 64)',
                      'rgba(4, 216, 57, 1)'   
                  ]
              }]
          }
      });
    </script>


@endsection