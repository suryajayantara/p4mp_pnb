<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificationsInternationalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certifications_internationals', function (Blueprint $table) {
            $table->id();
            $table->integer('id_faculties');
            $table->integer('id_study');
            $table->string('level');
            $table->string('result');
            $table->string('country');
            $table->date('assessment');
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
        Schema::dropIfExists('certifications_internationals');
    }
}
