<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccreditationInternationalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accreditation_internationals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_faculties');
            $table->foreignId('id_study');
            $table->foreignId('id_level');
            $table->text('accreditatition_agency');
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
        Schema::dropIfExists('accreditation_internationals');
    }
}
