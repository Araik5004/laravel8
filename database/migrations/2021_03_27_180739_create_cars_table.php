<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table): void {
            $table->increments('id');
            $table->integer('model')->index();
            $table->string('image')->nullable();
            $table->string('year')->nullable();
            $table->string('number')->nullable();
            $table->string('color')->nullable();
            $table->tinyInteger('transmission')->nullable();
            $table->decimal('rent_price_per_day', 8, 2);
            $table->tinyInteger('status')->nullable();
            $table->Integer('sort')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
}
