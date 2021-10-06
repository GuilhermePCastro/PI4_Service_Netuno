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

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="dsk-container-4x25">

        <header>
            @php $titulo = "Cadastrar dados pessoais"  @endphp
            @php $pagina = "Dados pessois"  @endphp
            @include('layouts.headerAuth')
        </header>

        <main>

            <div class="row m-0 heigth-dsk m-auto p-0 py-5 justify-content-center dsk-container-4x25 align-items-center ">
                <div class=" dsk-container-4x10 sm-container-4x20 d-flex sombrinha">
                    <div class=" w-100 row  m-0 p-0 justify-content-center ">
                        <form class="w-100  mx-5 my-5" method='POST'  action="{{ Route('cliente.store') }}">
                            @csrf

                            <div>
                                <x-input placeholder="Nome" id="ds_nome" class="mb-4 block mt-1 w-full" type="text" name="ds_nome" :value="Auth()->user()->name" disabled/>
                            </div>

                            <div>
                                <x-input pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}$" placeholder="CPF (999.999.999-99)" id="ds_cpf" class="block mt-1 w-full" type="text" name="ds_cpf" required autofocus />
                            </div>

                            <div class="mt-4">
                                <x-input pattern="\([0-9]{2}\) (9[0-9]{4})-[0-9]{4}$" placeholder="Celular (99) 99999-9999" id="ds_celular" class="block mt-1 w-full" type="text" name="ds_celular"  required />
                            </div>


                            <div class="flex items-center text-center justify-content-center mt-4 w-100">
                                <x-button class="ml-3 btn btn-primary">
                                    {{ __('Cadastrar') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </main>
    </body>
</html>
