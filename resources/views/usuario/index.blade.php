<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página de Clientes</title>

  @include('layouts.bootstrap')
  <link href="{{ asset('css/header.css') }}" rel="stylesheet">
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('css/menu.css') }}" rel="stylesheet">
  <link href="{{ asset('css/pg-users.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Rhodium+Libre&display=swap" rel="stylesheet">
  <script src="{{ asset('js/menu.js') }}"></script>

    <script>
        function remover(){
            return confirm('Você deseja remover o produto ?');
        }
    </script>
</head>
<body>
    <header>
        @include('layouts.headerdashboard')
    </header>


  <main class="main">

    @include('layouts.menu')

    <section class="main__page-content right-container">
      <div class="page-content__title">
        <h1 class="title__text">Clientes</h1>
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

      <form class="page-content__inputs inputs-group" action="{{ Route('cliente.filtro') }}">
        <label class="input-container input-container-10">
            Cod. Usuário
            <input id="user" name="user" type="text" class="input-container__input">
        </label>
        <label class="input-container input-container-30">
          CPF
          <input id="cpf" name="cpf" type="text" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}$" placeholder="999.999.999-99" class="input-container__input">
        </label>
        <button type="submit" class="inputs__search">
          Buscar
        </button>
      </form>

      <table class="page-content__table"  border="0" cellpadding="0" cellspacing="0">
            <tr align="center">
            <th>Nome</th>
            <th>CPF</th>
            <th>E-mail</th>
            <th>Admin</th>
            <th>Ação</th>
            </tr>
            @foreach($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->usuario()->name }}</td>
                    <td>{{ $cliente->ds_cpf }}</td>
                    <td>{{ $cliente->usuario()->email }}</td>
                    <td>{{ $cliente->usuario()->IsAdmin == 1 ? 'Sim' : 'Não' }}</td>
                    <td>
                        <a href="{{ Route('cliente.admin', $cliente->id) }}">
                            <button class='table__button table__remove' type='button'>
                                <img src="{{ asset('svgs/edit-icon.svg') }}"  alt='editar'>
                                Tornar Admin
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
      <div class="mt-5 mb-5 d-flex justify-content-center">
        {{ $clientes->withQueryString()->links()}}
    </div>

    </section>
  </main>
</body>
</html>
