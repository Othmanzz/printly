<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStickersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('stickers_paper_type', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('stickers_paper_shape', function (Blueprint $table) {
            $table->id();
            $table->string('name');

        });
        Schema::create('stickers_paper_size', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('stickers_paper_prices', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->foreignId('paper_type');
            $table->foreignId('paper_size');
            $table->foreignId('paper_shape');
            $table->string('price');


        });


        Schema::create('stickers_products', function (Blueprint $table) {
            $table->id();
            $table->string("file");
            $table->string("note");
            $table->integer("quantity");

            $table->foreignId("user_id")->default(0);
            $table->foreignId("price_id")->default(0);

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
        Schema::dropIfExists('stickers_paper_type');
        Schema::dropIfExists('stickers_paper_shape');
        Schema::dropIfExists('stickers_paper_size');
        Schema::dropIfExists('stickers_paper_prices');


    }
}
