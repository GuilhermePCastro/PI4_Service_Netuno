<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página de Pedidos</title>

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
      <div class="page-content__title">
        <h1 class="title__text">Pedidos</h1>
      </div>

        <!-- Mostrando mensagem na tela com a session -->
        @if(session()->has('valido'))
            <div class="valido mb-2">
               {{session()->get('valido')}}
            </div>
        @endif

            <!-- Mostrando mensagem na tela com a session -->
        @if(session()->has('invalido'))
            <div class="invalido mb-2">
                {{session()->get('invalido')}}
            </div>
        @endif

      <form class="page-content__inputs inputs-group" action="{{ Route('pedido.filtro') }}">
        <label class="input-container input-container-10">
          Código
          <input id="codigo" name="codigo" type="text" class="input-container__input">
        </label>
        <label class="input-container input-container-25">
          CPF Cliente
          <input id="cpf" name="cpf" type="text" class="input-container__input" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}$" placeholder="999.999.999-99">
        </label>
        <label class="input-container input-container-25">
            Status
            <select name="status">
                <option value="" selected></option>
                <option value="Em Aberto">Em Aberto</option>
                <option value="Em Atendimento">Em Atendimento</option>
                <option value="Em Separação">Em Separação</option>
                <option value="Enviado">Enviado</option>
                <option value="Finalizado">Finalizado</option>
                <option value="Cancelado">Cancelado</option>
            </select>
        </label>
        <button type="submit" class="inputs__search">
          Buscar
        </button>
      </form>

      <table class="page-content__table"  border="0" cellpadding="0" cellspacing="0">
        <tr align="center">
          <th>Cód.</th>
          <th>CPF Cliente</th>
          <th>Status</th>
          <th>Data</th>
          <th>Total</th>
          <th>Ação</th>
        </tr>
        @foreach($pedidos as $pedido)
            <tr>
                <td>{{ $pedido -> id }}</td>
                <td>{{ $pedido->cliente()->ds_cpf }}</td>
                <td>{{ $pedido -> ds_status }}</td>
                <td>{{ date_format($pedido->created_at, 'd/m/Y') }}</td>
                <td>{{ number_format($pedido -> vl_total, 2, ',', '.') }}</td>
                <td>
                    <a href="{{ route('pedido.show', $pedido->id) }}" >
                        <button class='table__button table__edit' type='button'>
                            <img src="{{ asset('svgs/edit-icon.svg') }}"  alt='editar'>
                            Verificar
                        </button>
                    </a>
                </td>
            </tr>
        @endforeach
      </table>
      <div class="mt-5 mb-5 d-flex justify-content-center">
        {{ $pedidos->withQueryString()->links()}}
    </div>

    </section>
  </main>
</body>
</html>
