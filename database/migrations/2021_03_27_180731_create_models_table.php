<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelsTable extends Migration
{
    private const TABLE = 'model_cars';

    public function up(): void
    {
        Schema::create(self::TABLE, function (Blueprint $table): void {
            $table->increments('id');
            $table->integer('brand')->index();
            $table->string('name')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->Integer('sort')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(self::TABLE);
    }
}
