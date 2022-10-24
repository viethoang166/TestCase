<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('note');
            $table->string('tuition');
            $table->dateTime('timestart');
            $table->dateTime('timeend');
            $table->unsignedBigInteger('majors_id');
            $table->boolean('active')->default(true);
            $table->timestamps();
            $table->foreign('majors_id')->references('id')->on('majors')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
