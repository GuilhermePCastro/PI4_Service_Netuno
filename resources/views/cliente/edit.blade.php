<!DOCTYPE html>
<html lang="pt-br">
    <head>
        @include('layouts.head')
        <link rel="stylesheet" href="{{ asset('css/show-cliente.css') }}">
        <title>Netuno</title>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    </head>
    <body class="dsk-container-4x25">

        <header>
            @include('layouts.headernaologado')
        </header>

        <main>
            <div class=" mt-4 row m-0 justify-content-center">
                <div class=" col-12 text-center mb-4">
                    <h2 class="m-0 text-uppercase text-h2 ">Perfil</h2>
                </div>
            </div>

            <div class=" ml-2 mt-4 row m-0">
                <div class="col-12 mb-4">
                    <h3 class="m-0 text-uppercase text-h3">Alterar Dados pessoais</h3>
                </div>

                <form class="form" method='POST'  action="{{ Route('cliente.update', $cliente->id) }}">
                    @method('PATCH')
                    @csrf
                    <div class="row g-3 align-items-center col-lg-5 col-md-6 col-sm-10 d-inline-block">
                        <label for="ds_nome" class="col-form-label titulo-campo">
                            Nome
                            <input class="form-control" type="text" name="ds_nome" id="ds_nome" value="{{ Auth()->user()->name }}" require>
                        </label>
                    </div>

                    <div class="row g-3 align-items-center col-lg-2 col-md-4 col-sm-10 d-inline-block">
                        <label for="ds_cpf" class="titulo-campo">
                            CPF
                            <input value="{{ $cliente->ds_cpf }}" placeholder="999.999.999-99" class="form-control" type="text" name="ds_cpf" id="ds_cpf" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}$" disabled>
                        </label>
                    </div>

                    <div class="row g-3 align-items-center col-lg-2 col-md-4 col-sm-10 d-inline-block">
                        <label for="ds_celular" class="titulo-campo">
                            Celular
                            <input value="{{ $cliente->ds_celular }}" pattern="\([0-9]{2}\) (9[0-9]{4})-[0-9]{4}$" placeholder="(99) 99999-9999" class="form-control" type="text" name="ds_celular" id="ds_celular" require>
                        </label>
                    </div>

                    <div class="row g-3 align-items-center col-lg-2 col-md-3 col-sm-10 d-inline-block">
                        <label for="ds_cep" class="titulo-campo">
                            CEP
                            <input value="{{ $cliente->ds_cep }}" pattern="[0-9]{5}-[0-9]{3}$" placeholder="99999-999"class="form-control" type="text" name="ds_cep" id="ds_cep" require>
                        </label>
                    </div>

                    <div class="row g-3 align-items-center col-lg-5 col-md-4 col-sm-10 d-inline-block">
                        <label for="ds_endereco" class="titulo-campo">
                            Endereço
                            <input value="{{ $cliente->ds_endereco }}" class="form-control" type="text" name="ds_endereco" id="ds_endereco" require>
                        </label>
                    </div>

                    <div class="row g-3 align-items-center col-lg-1 col-md-3 col-sm-2 d-inline-block">
                        <label for="ds_numero" class="titulo-campo">
                            Número
                            <input value="{{ $cliente->ds_numero }}"class="form-control" type="text" name="ds_numero" id="ds_numero" require>
                        </label>
                    </div>

                    <div class="row g-3 align-items-center col-lg-4 col-md-4 col-sm-10 d-inline-block">
                        <label for="ds_cidade" class="titulo-campo">
                            Cidade
                            <input value="{{ $cliente->ds_cidade }}" class="form-control" type="text" name="ds_cidade" id="ds_cidade" require>
                        </label>
                    </div>

                    <div class="row g-3 align-items-center col-lg-2 col-md-3 col-sm-1 d-inline-block">
                        <label for="ds_uf" class="titulo-campo">
                            Estado
                            <select  class="form-select" name="ds_uf" id="ds_uf">
                                <option value="AC" @if ($cliente->ds_uf == 'AC') selected @endif>Acre</option>
                                <option value="AL" @if ($cliente->ds_uf == 'AL') selected @endif>Alagoas</option>
                                <option value="AP" @if ($cliente->ds_uf == 'AP') selected @endif>Amapá</option>
                                <option value="AM" @if ($cliente->ds_uf == 'AM') selected @endif>Amazonas</option>
                                <option value="BA" @if ($cliente->ds_uf == 'BA') selected @endif>Bahia</option>
                                <option value="CE" @if ($cliente->ds_uf == 'CE') selected @endif>Ceará</option>
                                <option value="DF" @if ($cliente->ds_uf == 'DF') selected @endif>Distrito Federal</option>
                                <option value="ES" @if ($cliente->ds_uf == 'ES') selected @endif>Espírito Santo</option>
                                <option value="GO" @if ($cliente->ds_uf == 'GO') selected @endif>Goiás</option>
                                <option value="MA" @if ($cliente->ds_uf == 'MA') selected @endif>Maranhão</option>
                                <option value="MT" @if ($cliente->ds_uf == 'MT') selected @endif>Mato Grosso</option>
                                <option value="MS" @if ($cliente->ds_uf == 'MS') selected @endif>Mato Grosso do Sul</option>
                                <option value="MG" @if ($cliente->ds_uf == 'MG') selected @endif>Minas Gerais</option>
                                <option value="PA" @if ($cliente->ds_uf == 'PA') selected @endif>Pará</option>
                                <option value="PB" @if ($cliente->ds_uf == 'PB') selected @endif>Paraíba</option>
                                <option value="PR" @if ($cliente->ds_uf == 'PR') selected @endif>Paraná</option>
                                <option value="PE" @if ($cliente->ds_uf == 'PE') selected @endif>Pernambuco</option>
                                <option value="PI" @if ($cliente->ds_uf == 'PI') selected @endif>Piauí</option>
                                <option value="RJ" @if ($cliente->ds_uf == 'RJ') selected @endif>Rio de Janeiro</option>
                                <option value="RN" @if ($cliente->ds_uf == 'RN') selected @endif>Rio Grande do Norte</option>
                                <option value="RS" @if ($cliente->ds_uf == 'RS') selected @endif>Rio Grande do Sul</option>
                                <option value="RO" @if ($cliente->ds_uf == 'RO') selected @endif>Rondônia</option>
                                <option value="RR" @if ($cliente->ds_uf == 'RR') selected @endif>Roraima</option>
                                <option value="SC" @if ($cliente->ds_uf == 'SC') selected @endif>Santa Catarina</option>
                                <option value="SP" @if ($cliente->ds_uf == 'SP') selected @endif>São Paulo</option>
                                <option value="SE" @if ($cliente->ds_uf == 'SE') selected @endif>Sergipe</option>
                                <option value="TO" @if ($cliente->ds_uf == 'TO') selected @endif>Tocantins</option>
                            </select>
                        </label>
                    </div>

                    <div class="mt-5 mb-5 col-12 text-center">
                        <button type="submit" class="btn btn-primary ">Alterar Dados</button>
                    </div>

                </form>



            </div>

        </main>
        <footer class="mt-3"></footer>
    </body>
</html>
