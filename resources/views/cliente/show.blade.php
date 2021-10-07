<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Zoom Cliente</title>
    <script src="../assets/js/menu.js"></script>

    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/menu.css') }}" rel="stylesheet">
    <link href="{{ asset('css/register-client.css') }}" rel="stylesheet">

    <script src="{{ asset('js/menu.js') }}"></script>

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
          <h1 class="page-title mt mb">Cliente - Cód. {{ $cliente->id }}</h1>
        </div>

        <form class="page-content__inputs mb" method='POST'>
            @method('PATCH')
          @csrf
          <div class="inputs-group mb">
            <label class="input-container input-container-60">
              Nome
              <input name="ds_nome" type="text" value="{{ $cliente->ds_nome }}"  disabled/>
            </label>
            <label class="input-container input-container-10">
              Id Usuário
              <input name="user_id" type="text" value="{{ $cliente->user_id }}"  disabled/>
            </label>
          </div>

          <div class="inputs-group">
            <label class="input-container input-container-20">
              CPF
              <input name="ds_cpf" type="text" value="{{ $cliente->ds_cpf }}"  disabled/>
            </label>
            <label class="input-container input-container-30">
              E-mail
              <input name="ds_email" type="text" value="{{ $cliente->ds_email }}"  disabled/>
            </label>
            <label class="input-container input-container-20">
              Celular
              <input name="ds_celular" type="text" value="{{ $cliente->ds_celular }}"  disabled/>
            </label>
          </div>

        </form>
      </section>
    </main>
  </body>
</html>
