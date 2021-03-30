<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'modelcars', function (Blueprint $table)
        {
            $table->increments( 'id' );
            $table->integer( 'brand' )->index();
            $table->string( 'name' )->nullable();
            $table->tinyInteger( 'status' )->nullable();
            $table->Integer( 'sort' )->nullable();
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists( 'models' );
    }

}
