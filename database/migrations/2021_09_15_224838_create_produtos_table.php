<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_produto', function (Blueprint $table) {
            $table->id();
            $table->string('ds_nome');
            $table->text('ds_descricao');
            $table->decimal('vl_produto','12','4');
            $table->integer('qt_estoque');
            $table->string('ds_foto');
            $table->integer('tg_destaque');
            $table->integer('categoria_id');
            $table->integer('marca_id');
            $table->string('ds_dimensoes');
            $table->string('ds_peso');
            $table->string('ds_material');
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
        Schema::dropIfExists('tb_produto');
    }
}
