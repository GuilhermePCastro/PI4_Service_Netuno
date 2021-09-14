<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registro de Tags</title>
    <script src="../assets/js/menu.js"></script>

    <script src="{{ asset('js/menu.js') }}"></script>
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
          <h1 class="page-title mt mb">Tags</h1>
        </div>

        <form class="page-content__inputs mb" method='POST'  action="{{ Route('tag.update', $tag->id) }}">
            @method('PATCH')
          @csrf
          <div class="inputs-group mb">
            <label class="input-container input-container-80">
              Nome da tag*
              <input name="tag_nome" type="text" value="{{ $tag->tag_nome }}" required/>
            </label>
          </div>

          <button class="blue-button mr" type="submit">Salvar</button>
          <button class="white-button" type="button">Limpar</button>

        </form>
      </section>
    </main>
  </body>
</html>
