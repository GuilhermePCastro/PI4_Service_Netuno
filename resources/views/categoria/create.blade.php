<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registro de categoria</title>
    <script src="../assets/js/menu.js"></script>

    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/menu.css') }}" rel="stylesheet">
    <link href="{{ asset('css/register-client.css') }}" rel="stylesheet">

    <link
      href="https://fonts.googleapis.com/css2?family=Rhodium+Libre&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <header>
        @include('layouts.headerdashboard')
    </header>
    <main class="main">
      @include('layouts.menu')
      <section class="main__page-content right-container">
        <div class="page-content__title">
          <h1 class="page-title mt mb">Categorias</h1>
        </div>

        <form class="page-content__inputs mb" method='POST'  action="{{ Route('categoria.store') }}">
          @csrf
          <div class="inputs-group mb">
            <label class="input-container input-container-80">
              Nome da categoria*
              <input name="ds_categoria" type="text" required/>
            </label>
          </div>
          <div class="inputs-group mb">
            <label class="input-container input-container-80">
              Descrição da categoria*
              <input name="ds_descricao" type="text" required/>
            </label>
          </div>

          <button class="blue-button mr" type="submit">Salvar</button>
          <button class="white-button" type="reset">Limpar</button>

        </form>
      </section>
    </main>
  </body>
</html>
