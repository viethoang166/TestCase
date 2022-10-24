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
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('email')->unique()->nullable();
            $table->longText('infor')->nullable();
            $table->string('address')->nullable();
            $table->string('phone', 100)->nullable();
            $table->string('banner')->nullable();
            $table->string('min_price')->nullable();
            $table->string('max_price')->nullable();
            $table->boolean('active')->default(true);
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('country_id');
            $table->foreign('city_id')->references('id')->on('cities')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('countries')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('schools');
    }
};
