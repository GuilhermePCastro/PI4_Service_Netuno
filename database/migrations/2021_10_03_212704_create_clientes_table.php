<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_cliente', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('ds_nome');
            $table->string('ds_cpf');
            $table->string('ds_celular');
            $table->string('ds_email');
            $table->string('ds_senha');
            $table->timestamps();
            $table->integer('endereco_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_clientes');
    }
}
