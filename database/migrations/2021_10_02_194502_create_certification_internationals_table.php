<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificationInternationalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certification_internationals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_faculties');
            $table->foreignId('id_study');
            $table->string('level');
            $table->text('result');
            $table->string('country');
            $table->date('s_assessment');
            $table->date('e_assessment');
            $table->date('start_date');
            $table->date('end_date');
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
        Schema::dropIfExists('certification_internationals');
    }
}
