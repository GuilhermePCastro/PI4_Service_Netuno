<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Zoom Cliente</title>
    <script src="../assets/js/menu.js"></script>

    <script src="https://kit.fontawesome.com/f9d34fff0e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


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

          <div class="inputs-group mb">
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

          <h2 class="page-title mt mb">Endereços</h2>
          <div class="inputs-group mb">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Endereço</th>
                        <th>Bairro</th>
                        <th>Cidade</th>
                        <th>UF</th>
                        <th>CEP</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cliente->enderecos()->get() as $endereco)
                        <tr>
                            <td>{{ $endereco->ds_endereco }}, {{ $endereco->ds_numero }}</td>
                            <td>{{ $endereco->ds_bairro }}</td>
                            <td>{{ $endereco->ds_cidade }}</td>
                            <td>{{ $endereco->ds_uf }}</td>
                            <td>{{ $endereco->ds_cep }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
          </div>

        </form>
      </section>
    </main>
  </body>
</html>
