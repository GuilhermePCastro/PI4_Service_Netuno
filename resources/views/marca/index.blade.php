<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Marcas</title>
  <script src="{{ asset('js/menu.js') }}"></script>

  @include('layouts.bootstrap')
  <link href="{{ asset('css/header.css') }}" rel="stylesheet">
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('css/menu.css') }}" rel="stylesheet">
  <link href="{{ asset('css/pg-users.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Rhodium+Libre&display=swap" rel="stylesheet">

    <script>
        function remover(){
            return confirm('Você deseja remover a marca ?');
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
        <h1 class="title__text">Marcas</h1>
        <a href="{{ Route('marca.create') }}">
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

      <form class="page-content__inputs inputs-group" action="{{ Route('marca.filtro') }}">
        <label class="input-container input-container-10">
          Código
          <input id="codigo" name="codigo" type="text" class="input-container__input">
        </label>
        <label class="input-container input-container-40">
          Nome
          <input id="nome" name="nome" type="text" class="input-container__input">
        </label>
        <label class="input-container input-container-10">
          Filtra
          <select name="filtro">
            <option value="">Todos</option>
            <option value="1">Sim</option>
            <option value="0">Não</option>
        </select>
        </label>
        <button type="submit" class="inputs__search">
          Buscar
        </button>
      </form>

      <table class="page-content__table"  border="0" cellpadding="0" cellspacing="0">
        <tr align="center">
            <th>Cód.</th>
            <th>Nome</th>
            <th>Filtra</th>
            <th>Ação</th>
        </tr>
        @foreach($marca as $mar)
            <tr>
                <td>
                    <a>{{ $mar-> id }}</a>
                </td>
                <td>{{ $mar-> ds_marca }}</td>
                <td>@if ($mar-> tg_filtro == 1)
                            Sim
                        @else
                            Não
                        @endif
                </td>
                <td style="text-align:center">
                    <a href="{{ route('marca.edit', $mar->id) }}" >
                        <button class='table__button table__edit' type='button'>
                            <img src="{{ asset('svgs/edit-icon.svg') }}"  alt='editar'>
                            Alterar
                        </button>
                    </a>
                    <form style="display: inline;" method="POST" action="{{route('marca.destroy', $mar->id) }}" onsubmit="return remover();">
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
      <div class="mt-5 mb-5 d-flex justify-content-center">
        {{ $marca->withQueryString()->links()}}
        </div>
    </section>
  </main>
</body>
</html>
