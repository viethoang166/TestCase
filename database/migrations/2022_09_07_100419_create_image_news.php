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
        Schema::create('image_news', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('file');
            $table->unsignedBigInteger('new_id');
            $table->boolean('banner')->default(0);
            $table->timestamps();
            $table->foreign('new_id')->references('id')->on('news')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('image_news');
    }
};
