<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página de Usuário</title>

  @include('layouts.bootstrap')
  <link href="{{ asset('css/header.css') }}" rel="stylesheet">
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('css/menu.css') }}" rel="stylesheet">
  <link href="{{ asset('css/pg-users.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Rhodium+Libre&display=swap" rel="stylesheet">
  <script src="{{ asset('js/menu.js') }}"></script>

    <script>
        function remover(){
            return confirm('Você deseja remover esse usuário ?');
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
        <h1 class="title__text">Usuários</h1>
        <a href="{{ Route('usuario.create') }}">
            <button type="button" class="title__include">
              Incluir Registro
            </button>
          </a>
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

      <form class="page-content__inputs inputs-group" action="{{ Route('usuario.filtro') }}" >
        <label class="input-container input-container-10">
            Cod. Usuário
            <input id="user" name="user" type="text" class="input-container__input">
        </label>
        <label class="input-container input-container-30">
          Email
          <input id="email" name="email" type="email" class="input-container__input">
        </label>
        <button type="submit" class="inputs__search">
          Buscar
        </button>
      </form>

      <table class="page-content__table"  border="0" cellpadding="0" cellspacing="0">
            <tr align="center">
            <th>Nome</th>
            <th>E-mail</th>
            <th>Ação</th>
            </tr>
            @foreach($user as $u)
                <tr>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>
                    <td>
                        <a href="{{ route('usuario.edit', $u->id) }}" >
                            <button class='table__button table__edit' type='button'>
                                <img src="{{ asset('svgs/edit-icon.svg') }}"  alt='editar'>
                                Alterar
                            </button>
                        </a>
                        <form style="display: inline;" method="POST" action="{{route('usuario.destroy', $u->id) }}" onsubmit="return remover();">
                            @method('DELETE')
                            @csrf
                            <button type="submit"  class='table__button table__remove'>
                                <img src="{{ asset('svgs/trash-icon.svg') }}" alt='remover'>
                                Deletar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $user->withQueryString()->links()}}

      <div class="mt-5 mb-5 d-flex justify-content-center">
    </div>

    </section>
  </main>
</body>
</html>
