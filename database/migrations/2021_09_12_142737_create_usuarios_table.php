<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pessoa', function (Blueprint $table) {
            $table->increments('cd_pessoa');
            $table->string('nm_pessoa');
            $table->string('ds_cpf');
            $table->string('ds_telefone');
            $table->string('ds_email');
            $table->string('ds_senha');
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
        Schema::dropIfExists('tb_pessoa');
    }
}
