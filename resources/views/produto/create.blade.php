<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registro de produto</title>

    <script src="{{ asset('js/menu.js') }}"></script>
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
          <h1 class="page-title mt mb ">Produtos</h1>
        </div>

        <form class="page-content__inputs mb" method='POST'  action="{{ Route('produto.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="inputs-group mb">
            <label class="input-container input-container-80">
              Nome do produto*
              <input name="ds_nome" type="text" required/>
            </label>
          </div>

          <div class="inputs-group">
                <label class="input-container input-container-40">
                    Categoria*
                    <select name="categoria_id">
                        <option value="">Selecione um valor</option>
                        @foreach ($categories as $categoria )
                            <option value="{{$categoria->id}}">{{$categoria->ds_categoria}}</option>
                        @endforeach
                    </select>
                </label>
                <label class="input-container input-container-40">
                    Marca*
                    <select name="marca_id">
                        <option value="">Selecione um valor</option>
                        @foreach ($marcas as $marca )
                            <option value="{{$marca->id}}">{{$marca->ds_marca}}</option>
                        @endforeach
                    </select>
                </label>
            </div>
            <div class="inputs-group">
            <label class="input-container input-container-50">
              Tag*
                <select class="input-mult" name="tags[]" multiple>
                        @foreach ($tags as $tag )
                            <option value="{{$tag->id}}">{{$tag->ds_nome}}</option>
                        @endforeach
                </select>
            </label>
          </div>

          <div class="inputs-group">
            <label class="input-container input-container-20">
              Preço venda*
              <input min='0' step=".01" name="vl_produto" type="number" required/>
            </label>
            <label class="input-container input-container-20">
              Estoque atual*
              <input min='0' name="qt_estoque" type="number" />
            </label>
            <label class="input-container input-container-20">
              Peso*
              <input  name="ds_peso" type="text" />
            </label>
            <label class="input-container input-container-10">
              Destacar
                <select name="tg_destaque">
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
                </select>
            </label>
          </div>
          <div class="inputs-group">
            <label class="input-container input-container-30">
              Dimensões*
              <input name="ds_dimensoes" type="text" required/>
            </label>
            <label class="input-container input-container-50">
              Material*
              <input name="ds_material" type="text" required/>
            </label>
          </div>
            <label class="input-container input-container mb">
              Foto Principal
              <input type="file" name='ds_foto'/>
            </label>
            <label class="input-container mb">
                Descrição
                <textarea name="ds_descricao" id="" cols="30" rows="10"></textarea>
            </label>

          <button class="blue-button mr" type="submit">Salvar</button>
          <button class="white-button" type="reset">Limpar</button>

        </form>
      </section>
    </main>
  </body>
</html>
