<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProdutoDepartamento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_departamento', function (Blueprint $table) {
            //UnsignedBigInteger - tipo do campo
            $table->unsignedBigInteger('produto_id');
            $table->unsignedBigInteger('departamento_id');

            //Linkando os campos criados a tabelas referentes
            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->foreign('departamento_id')->references('id')->on('departamentos');

            //Criando as chaves primarias
            $table->primary(['produto_id','departamento_id']);

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
        Schema::dropIfExists('produto_departamento');
    }
}
