<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePedido extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pedido', function (Blueprint $table) {
            $table->id();
            $table->integer('cliente_id');
            $table->string('ds_endereco');
            $table->string('ds_numero');
            $table->string('ds_cep');
            $table->string('ds_cidade');
            $table->string('ds_uf');
            $table->string('ds_complemento');
            $table->double('vl_total',12,4);
            $table->string('ds_status');
            $table->double('vl_frete',12,4);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_pedido');
    }
}
