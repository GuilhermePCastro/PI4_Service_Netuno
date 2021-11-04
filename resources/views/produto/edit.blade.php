
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
          <h1 class="page-title mt mb">Produtos(Alterar)</h1>
        </div>

         <form class="page-content__inputs mb" method='POST'  action="{{ route('produto.update', $produto->id) }}" enctype="multipart/form-data">
          @method('PATCH')
          @csrf
          <div class="inputs-group mb">
            <label class="input-container input-container-80">
              Nome do produto*
              <input name="ds_nome" type="text" value="{{ $produto->ds_nome}}" required/>
            </label>
          </div>

          <div class="inputs-group">
                <label class="input-container input-container-40">
                Categoria*
                    <select name="categoria_id">
                        @foreach ($categories as $categoria )
                            <option value="{{$categoria->id}}" @if($categoria->id == $produto->categoria_id) selected @endif>
                                {{$categoria->ds_categoria}}
                            </option>
                        @endforeach
                    </select>
                </label>
                <label class="input-container input-container-40">
                    Marca*
                    <select name="marca_id">
                        @foreach ($marcas as $marca )
                            <option value="{{$marca->id}}" @if($marca->id == $produto->marca_id) selected @endif>
                                {{$marca->ds_marca}}
                            </option>
                        @endforeach
                    </select>
                </label>
            </div>
            <div class="inputs-group" >
            <label class="input-container input-container-50">
              Tag*
              <select class="input-mult" name="tags[]" id="" multiple>
                    @foreach ($tags as $tag )
                        <option value="{{$tag->id}}" @if($produto->tags->contains($tag->id)) selected @endif>
                            {{$tag->ds_nome}}
                        </option>
                    @endforeach
              </select>
            </label>
          </div>

          <div class="inputs-group">
            <label class="input-container input-container-20">
              Preço venda*
              <input min='0' step=".01" name="vl_produto" type="number"  value="{{ $produto->vl_produto }}" required/>
            </label>
            <label class="input-container input-container-20">
              Estoque atual*
              <input min='0' name="qt_estoque" type="number" value="{{ $produto->qt_estoque }}"/>
            </label>
            <label class="input-container input-container-30">
              Peso*
              <input  name="ds_peso" type="text" value="{{ $produto->ds_peso }}"/>
            </label>
            <label class="input-container input-container-10">
              Destacar
                <select name="tg_destaque">
                    <option value="1" @if($produto->tg_filtro == 1) selected @endif>Sim</option>
                    <option value="0" @if($produto->tg_filtro == 1) selected @endif>Não</option>
                </select>
            </label>
          </div>

          <div class="inputs-group">
            <label class="input-container input-container-40">
              Dimensões*
              <input name="ds_dimensoes" type="text" value="{{ $produto->ds_dimensoes }}"required/>
            </label>
            <label class="input-container input-container-40">
              Material*
              <input name="ds_material" type="text" value="{{ $produto->ds_material }}" required/>
            </label>
          </div>

          <label class="input-container input-container mb">
              Foto Principal
              <input type="file" name='ds_foto'/>
            </label>
            <div class="inputs-group mb">
                <label class="input-container input-container-90">
                Link Foto App
                <input name="ds_linkfoto" type="text" value="{{ $produto->ds_linkfoto }}"/>
                </label>
            </div>
          <label class="input-container mb">
            Descrição
            <textarea name="ds_descricao" id="" cols="30" rows="10">{{ $produto->ds_descricao}}</textarea>
          </label>

          <button class="blue-button mr" type="submit">Salvar</button>
          <button class="white-button" type="reset">Limpar</button>

        </form>
      </section>
    </main>
  </body>
</html>
