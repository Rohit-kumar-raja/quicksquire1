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
        Schema::create('rents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('duration');
            $table->string('pincode');
            $table->string('state');
            $table->string('district');
            $table->string('city');
            $table->string('address');
            $table->string('ram_type');
            $table->string('ram_size');
            $table->string('storage_type');
            $table->string('storage_size');
            $table->string('system_type');
            $table->string('mouse');
            $table->string('keyboard');
            $table->string('description');
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
        Schema::dropIfExists('rents');
    }
};
