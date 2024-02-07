<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoaRedeSocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa_redes_sociais', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pessoa_id');
            $table->unsignedBigInteger('redes_sociais_id');
            $table->string('link',50);
            $table->timestamps();

            //foreign key (constraints)
            $table->foreign('pessoa_id')->references('id')->on('pessoas');
            $table->foreign('redes_sociais_id')->references('id')->on('redes_sociais');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoa_rede_socials');
    }
}
