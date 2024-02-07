<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperienciaSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiencia_skills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('experiencia_id');
            $table->unsignedBigInteger('skill_id');
            $table->timestamps();

            //foreign key (constraints)
            $table->foreign('experiencia_id')->references('id')->on('experiencias');
            $table->foreign('skill_id')->references('id')->on('skills');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experiencia_skills');
    }
}
