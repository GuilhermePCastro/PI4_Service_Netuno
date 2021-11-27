<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>

  @include('layouts.bootstrap')
  <link href="{{ asset('css/header.css') }}" rel="stylesheet">
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('css/menu.css') }}" rel="stylesheet">
  <link href="{{ asset('css/pg-users.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Rhodium+Libre&display=swap" rel="stylesheet">
  <script src="{{ asset('js/menu.js') }}"></script>

</head>
<body>
    <header>
        @include('layouts.headerdashboard')
    </header>

  <main class="main">

    @include('layouts.menu')

    <section class="main__page-content right-container">

        <div class="mb-3">
            <h2>Dashboard</h2>
        </div>

        <div class="row mb-2">
            <div class="col-sm-6">
                <div class="card" style=" height: 15rem;">
                    <div class="card-body">
                        <h3 class="card-title h5">Quantidade de Novos Pedidos</h3>
                        <h4 class="card-subtitle h6 mb-2 text-muted">Últ. 7 dias</h4>
                        <h5 class="h1 fs-1 text-center mt-4 mb-3" style="font-size: 70px;">{{ App\Models\Pedido::quantidadePedidos() }}</h5>
                        <h6 class="h4 text-center">Total: R$ {{ number_format(App\Models\Pedido::valorPedidos(), 2, ',', '.') }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card" style=" height: 15rem;">
                    <div class="card-body">
                        <h3 class="card-title h5">Valor Acumulado dos Pedidos (Mês)</h3>
                        <h4 class="card-subtitle h6 mb-2 text-muted">Mês Referência: {{ date('m/Y') }}</h4>
                        <h5 class="h2  text-center mt-4 mb-3" style="font-size: 60px;">R$ {{ number_format(App\Models\Pedido::valorPedidoMes(), 2, ',', '.') }}</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-2">
        <div class="col-4">
                <div class="card" style="height: 15rem;">
                    <div class="card-body">
                        <h3 class="card-title h5">Quantidade de Pedidos Pendentes</h3>
                        <h4 class="card-subtitle h6 mb-2 text-muted">Sem enviar</h4>
                        <h5 class="h1 fs-1 text-center mb-3" style="font-size: 70px;">{{ App\Models\Pedido::qtPedidosPendetes() }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card" style="height: 15rem;">
                    <div class="card-body">
                        <h3 class="card-title h5">Quantidade de Novos Clientes</h3>
                        <h4 class="card-subtitle h6 mb-2 text-muted">Últ. 7 dias</h4>
                        <h5 class="h1 fs-1 text-center mt-4 mb-3" style="font-size: 70px;">{{ App\Models\Cliente::quantidadeClientes() }}</h5>
                        <h6 class="h4 text-center">Total de clientes: {{ App\Models\Cliente::all()->count() }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card" style="height: 15rem;">
                    <div class="card-body">
                        <h3 class="card-title h5">Quantidade de Produtos</h3>
                        <h4 class="card-subtitle h6 mb-2 text-muted">Ativos</h4>
                        <h5 class="h1 fs-1 text-center mt-4 mb-3" style="font-size: 70px;">{{ App\Models\Produto::all()->count() }}</h5>
                    </div>
                </div>
            </div>
        </div>

    </section>

  </main>
</body>
</html>
