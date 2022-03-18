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
        Schema::create('citas', function (Blueprint $table) {
            $table->id();

            $table->string('title',255);
            $table->bigInteger('documentOwner');
            $table->string('nameOwner',150);
            $table->bigInteger('numberOwner');
            $table->string('namePet',150);
            $table->text('descripcionPet');

            $table->dateTime('start');
            $table->string('timePet');
            $table->dateTime('end');

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
        Schema::dropIfExists('citas');
    }
};