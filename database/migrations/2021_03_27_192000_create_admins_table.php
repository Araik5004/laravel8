<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    public function up(): void
    {
        Schema::create('admins', function (Blueprint $table): void {
            $table->increments('id');
            $table->string('name');
            $table->string('surname');
            $table->string('email');
            $table->string('password');
            $table->string('_token');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
}
