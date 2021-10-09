<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRollupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rollups_size', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('price');

        });

        Schema::create('rollups_products', function (Blueprint $table) {
            $table->id();
            $table->string("file");
            $table->foreignId("user_id")->default(0);
            $table->foreignId("price_id")->default(0);
            $table->string("note");
            $table->integer("quantity");

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
        Schema::dropIfExists('rollups_size');
    }
}
