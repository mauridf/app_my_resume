<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoaIdiomasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa_idiomas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pessoa_id');
            $table->unsignedBigInteger('idioma_id');
            $table->unsignedBigInteger('nivel_idioma_id');
            $table->timestamps();

            //foreign key (constraints)
            $table->foreign('pessoa_id')->references('id')->on('pessoas');
            $table->foreign('idioma_id')->references('id')->on('idiomas');
            $table->foreign('nivel_idioma_id')->references('id')->on('nivel_idiomas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoa_idiomas');
    }
}
