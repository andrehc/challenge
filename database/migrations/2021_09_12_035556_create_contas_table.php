<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_conta', function (Blueprint $table) 
        {
            $table->increments('cd_conta');
            $table->unsignedBigInteger('cd_pessoa');            
            $table->foreign('cd_pessoa')->references('cd_pessoa')->on('tb_pessoa');            
            $table->integer('cd_tipo_conta');
            $table->string('ds_tipo_conta');
            $table->integer('cd_agencia');
            $table->integer('cd_digito');
            $table->string('ds_razao_social');
            $table->string('ds_nome_fantasia');
            $table->string('ds_cnpj');
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
        Schema::dropIfExists('tb_conta');
    }
}
