<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteTbUsuarioadmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('tb_usuarioadmin');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('tb_usuarioadmin', function (Blueprint $table) {
            $table->id();
            $table->string('ds_email');
            $table->string('ds_senha');
            $table->timestamps();
        });
    }
}
