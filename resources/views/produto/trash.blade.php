<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página de Clientes</title>


  <link href="{{ asset('css/header.css') }}" rel="stylesheet">
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('css/menu.css') }}" rel="stylesheet">
  <link href="{{ asset('css/pg-users.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Rhodium+Libre&display=swap" rel="stylesheet">
  <script src="{{ asset('js/menu.js') }}"></script>

    <script>
        function restaurar(){
            return confirm('Você deseja restaurar o produto ?');
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
        <h1 class="title__text">Lixeira (Produtos)</h1>
      </div>

        <!-- Mostrando mensagem na tela com a session -->
        @if(session()->has('valido'))
            <div class="valido">
               {{session()->get('valido')}}
            </div>
        @endif

            <!-- Mostrando mensagem na tela com a session -->
        @if(session()->has('invalido'))
            <div class="invalido">
                {{session()->get('invalido')}}
            </div>
        @endif


      <table class="page-content__table"  border="0" cellpadding="0" cellspacing="0">
        <tr align="center">
          <th></th>
          <th>Cód.</th>
          <th>Nome</th>
          <th>Preço</th>
          <th>Ação</th>
        </tr>
        @foreach($produtos as $produto)
            <tr>
                <td><img src="{{ asset($produto ->ds_foto) }}"></td>
                <td style="text-align: center">{{ $produto -> id }}</td>
                <td style="text-align: center">{{ $produto -> ds_nome }}</td>
                <td style="text-align: center">{{ number_format($produto -> vl_produto, 2, ',', '.') }}</td>
                <td>

                    <form style="display: inline;" method="POST" action="{{route('produto.restore', $produto->id) }}" onsubmit="return restaurar();">
                        @method('PATCH')
                        @csrf
                        <button type="submit"  class='table__button table__edit'>
                            <img src="{{ asset('svgs/edit-icon.svg') }}" alt='remover'>
                            Restaurar
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
      </table>
    </section>
  </main>
</body>
</html>
