<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->integer('landlord_id');
            $table->string('type');
            $table->string('address');
            $table->longText('about');
            $table->integer('price');
            $table->string('duration');
            $table->longText('gender');
            $table->longText('security');
            $table->longText('features');
            $table->longText('furnishings');
            $table->string('city');
            $table->string('tenants');
            $table->string('roomates');
            $table->string('zip');
            $table->string('images');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('houses');
    }
};
