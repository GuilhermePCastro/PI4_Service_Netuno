<!DOCTYPE html>
<html lang="pt-br">
    <head>
        @include('layouts.head')
        <link rel="stylesheet" href="{{ asset('css/show-cliente.css') }}">
        <title>Netuno</title>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </head>
    <body class="dsk-container-4x25">

        <header>
            @include('layouts.headernaologado')
        </header>

        <main>

            <!-- Mostrando mensagem na tela com a session -->
            @if(session()->has('valido'))
                <div class="alert alert-success" role="alert"> {{session()->get('valido')}}</div>
            @endif
                <!-- Mostrando mensagem na tela com a session -->
            @if(session()->has('error'))
                <div class="alert alert-danger" role="alert"> {{session()->get('error')}} </div>
            @endif

            <div class=" mt-4 row m-0 justify-content-center">
                <div class=" col-12 text-center mb-4">
                    <h2 class="m-0 text-uppercase text-h2 ">Perfil</h2>
                </div>
            </div>

            <div class=" ml-2 mt-4 row m-0">
                <div class="col-12 mb-4">
                    <h3 class="m-0 text-uppercase text-h3">Dados pessoais</h3>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 d-inline-block">
                    <span class="titulo-campo">Nome: </span><span class="titulo-valor">{{ Auth()->user()->name }}</span>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 d-inline-block">
                    <span class="titulo-campo">CPF: </span><span class="titulo-valor">{{ $cliente->ds_cpf }}</span>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 d-inline-block">
                    <span class="titulo-campo">Celular: </span><span class="titulo-valor">{{ $cliente->ds_celular }}</span>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 d-inline-block">
                    <span class="titulo-campo">E-mail: </span><span class="titulo-valor">{{ Auth()->user()->email }}</span>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 d-inline-block">
                    <span class="titulo-campo">Endereço: </span><span class="titulo-valor">{{ $cliente->ds_endereco }}</span>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 d-inline-block">
                    <span class="titulo-campo">Número: </span><span class="titulo-valor">{{ $cliente->ds_numero }}</span>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 d-inline-block">
                    <span class="titulo-campo">CEP: </span><span class="titulo-valor">{{ $cliente->ds_cep }}</span>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 d-inline-block">
                    <span class="titulo-campo">Cidade: </span><span class="titulo-valor">{{ $cliente->ds_cidade }}</span>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 d-inline-block">
                    <span class="titulo-campo">Estado: </span><span class="titulo-valor">{{ $cliente->ds_uf }}</span>
                </div>

                <div class="mt-5 mb-5 col-12 text-center">
                    <button class="btn btn-primary " onclick="window.location.href = '{{ route('cliente.edit', $cliente->id) }}'">Alterar Dados</button>
                </div>

            </div>

            <div class=" mt-4 row m-0">
                <div class=" col-12 mb-4">
                    <h3 class="m-0 text-uppercase text-h3">Meus pedidos</h3>

                    @if (\App\Models\Pedido::pedidosAtivos()->count())
                        <h3 class="m-0 text-uppercase text-h3 mt-5 text-center">Em andamento</h3>
                    @endif
                    <div class="accordion mt-4 mb-2 col-11 mx-auto ">
                        @foreach (\App\Models\Pedido::pedidosAtivos() as $pedido)
                            <div class="accordion-item">
                                <div class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#item-{{ $pedido->id }}">
                                        Pedido Nº {{ $pedido->id }} - {{ date_format($pedido->created_at, 'd/m/Y') }} - {{ $pedido->ds_status }}
                                    </button>
                                </div>
                                <div class="accordion-collapse collapse" id="item-{{ $pedido->id }}">
                                    <div class="mt-2 ml-4">
                                        <div>
                                            <span class="titulo-campo">Entregue em: </span>
                                            <span class="titulo-valor">
                                                {{ $pedido->ds_endereco }}, {{ $pedido->ds_numero }} - {{ $pedido->ds_cidade }}, {{ $pedido->ds_uf }} - CEP {{ $pedido->ds_cep }}
                                            </span>
                                        </div>
                                        <div>
                                            <span class="titulo-campo">Pago com: </span>
                                            <span class="titulo-valor">
                                                Cartão {{ $pedido->cd_cartao }} - {{ $pedido->nr_parcela }}x de R$ {{ number_format($pedido->vl_total/$pedido->nr_parcela, 2, ',', '.') }}
                                            </span>
                                        </div>
                                        <div>
                                            <span class="titulo-campo">Total: </span>
                                            <span class="titulo-valor">
                                                R$ {{ number_format($pedido->vl_total, 2, ',', '.') }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="accordion-body mt-2">
                                        <div class="table-responsive">
                                            <table class="table table-hover align-middle">
                                            <span class="titulo-campo">Itens do Pedido </span>
                                                <thead class="table-warning">
                                                    <tr>
                                                        <th>Produto</th>
                                                        <th></th>
                                                        <th>Quantidade</th>
                                                        <th>Valor Unit.</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pedido->itens() as $item)
                                                        <tr class="align-bottom">
                                                            <td class="align-top"><img class="img-lista" src="{{ asset($item->produto()->hx_foto1) }}" alt="{{ $item->ds_nome }}" onclick="window.location.href = '{{ route('produto.show', $item->produto()->id) }}'"></td>
                                                            <td class="align-top"><a class="nome-produto" href="{{ route('produto.show', $item->produto()->id) }}">{{ $item->produto()->ds_nome }}</a></td>
                                                            <td class="align-top">{{ $item->qt_produto }}</td>
                                                            <td class="align-top">{{ number_format($item->vl_produto, 2, ',', '.') }}</td>
                                                            <td class="align-top">{{ number_format($item->vl_produto * $item->qt_produto, 2, ',', '.') }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @if (\App\Models\Pedido::pedidosFinalizados()->count())
                        <h3 class="m-0 mt-5 text-uppercase text-h3 text-center">Finalizados</h3>
                    @endif

                    <div class="accordion mt-4 mb-2 col-11 mx-auto">
                        @foreach (\App\Models\Pedido::pedidosFinalizados() as $pedido)
                            <div class="accordion-item">
                                <div class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#item-{{ $pedido->id }}">
                                        Pedido Nº {{ $pedido->id }} - {{ date_format($pedido->created_at, 'd/m/Y') }} - {{ $pedido->ds_status }}
                                    </button>
                                </div>
                                <div class="accordion-collapse collapse" id="item-{{ $pedido->id }}">
                                    <div class="mt-2 ml-4">
                                        <div>
                                            <span class="titulo-campo">Entregue em: </span>
                                            <span class="titulo-valor">
                                                {{ $pedido->ds_endereco }}, {{ $pedido->ds_numero }} - {{ $pedido->ds_cidade }}, {{ $pedido->ds_uf }} - CEP {{ $pedido->ds_cep }}
                                            </span>
                                        </div>
                                        <div>
                                            <span class="titulo-campo">Pago com: </span>
                                            <span class="titulo-valor">
                                                Cartão {{ $pedido->cd_cartao }} - {{ $pedido->nr_parcela }}x de R$ {{ number_format($pedido->vl_total/$pedido->nr_parcela, 2, ',', '.') }}
                                            </span>
                                        </div>
                                        <div>
                                            <span class="titulo-campo">Total: </span>
                                            <span class="titulo-valor">
                                                R$ {{ number_format($pedido->vl_total, 2, ',', '.') }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="accordion-body mt-2">
                                        <div class="table-responsive">
                                            <table class="table table-hover align-middle">
                                            <span class="titulo-campo">Itens do Pedido </span>
                                                <thead class="table-warning">
                                                    <tr>
                                                        <th>Produto</th>
                                                        <th></th>
                                                        <th>Quantidade</th>
                                                        <th>Valor Unit.</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pedido->itens() as $item)
                                                        <tr class="align-bottom">
                                                            <td class="align-top"><img class="img-lista" src="{{ asset($item->produto()->hx_foto1) }}" alt="{{ $item->ds_nome }}" onclick="window.location.href = '{{ route('produto.show', $item->produto()->id) }}'"></td>
                                                            <td class="align-top"><a class="nome-produto" href="{{ route('produto.show', $item->produto()->id) }}">{{ $item->produto()->ds_nome }}</a></td>
                                                            <td class="align-top">{{ $item->qt_produto }}</td>
                                                            <td class="align-top">{{ number_format($item->vl_produto, 2, ',', '.') }}</td>
                                                            <td class="align-top">{{ number_format($item->vl_produto * $item->qt_produto, 2, ',', '.') }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @if (\App\Models\Pedido::pedidosCancelados()->count())
                        <h3 class="m-0 mt-5 text-uppercase text-h3 text-center">Cancelados</h3>
                    @endif
                    <div class="accordion mt-4 mb-2 col-11 mx-auto">
                        @foreach (\App\Models\Pedido::pedidosCancelados() as $pedido)
                            <div class="accordion-item">
                                <div class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#item-{{ $pedido->id }}">
                                        Pedido Nº {{ $pedido->id }} - {{ date_format($pedido->created_at, 'd/m/Y') }} - {{ $pedido->ds_status }}
                                    </button>
                                </div>
                                <div class="accordion-collapse collapse" id="item-{{ $pedido->id }}">
                                    <div class="mt-2 ml-4">
                                        <div>
                                            <span class="titulo-campo">Entregue em: </span>
                                            <span class="titulo-valor">
                                                {{ $pedido->ds_endereco }}, {{ $pedido->ds_numero }} - {{ $pedido->ds_cidade }}, {{ $pedido->ds_uf }} - CEP {{ $pedido->ds_cep }}
                                            </span>
                                        </div>
                                        <div>
                                            <span class="titulo-campo">Pago com: </span>
                                            <span class="titulo-valor">
                                                Cartão {{ $pedido->cd_cartao }} - {{ $pedido->nr_parcela }}x de R$ {{ number_format($pedido->vl_total/$pedido->nr_parcela, 2, ',', '.') }}
                                            </span>
                                        </div>
                                        <div>
                                            <span class="titulo-campo">Total: </span>
                                            <span class="titulo-valor">
                                                R$ {{ number_format($pedido->vl_total, 2, ',', '.') }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="accordion-body mt-2">
                                        <div class="table-responsive">
                                            <table class="table table-hover align-middle">
                                            <span class="titulo-campo">Itens do Pedido </span>
                                                <thead class="table-warning">
                                                    <tr>
                                                        <th>Produto</th>
                                                        <th></th>
                                                        <th>Quantidade</th>
                                                        <th>Valor Unit.</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pedido->itens() as $item)
                                                        <tr class="align-bottom">
                                                            <td class="align-top"><img class="img-lista" src="{{ asset($item->produto()->hx_foto1) }}" alt="{{ $item->ds_nome }}" onclick="window.location.href = '{{ route('produto.show', $item->produto()->id) }}'"></td>
                                                            <td class="align-top"><a class="nome-produto" href="{{ route('produto.show', $item->produto()->id) }}">{{ $item->produto()->ds_nome }}</a></td>
                                                            <td class="align-top">{{ $item->qt_produto }}</td>
                                                            <td class="align-top">{{ number_format($item->vl_produto, 2, ',', '.') }}</td>
                                                            <td class="align-top">{{ number_format($item->vl_produto * $item->qt_produto, 2, ',', '.') }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </main>
        <div class="footer-dark mt-5">
        </div>
    </body>
</html>
