<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('personal_cards_type', function (Blueprint $table) {
            $table->id();
            $table->string('name');

        });
        Schema::create('personal_cards_size', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('personal_cards_prices', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->foreignId('card_type');
            $table->foreignId('card_size');
            $table->string('price');


        });
        Schema::create('personal_cards_products', function (Blueprint $table) {
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
        Schema::dropIfExists('personal_cards_type');
        Schema::dropIfExists('personal_cards_prices');
        Schema::dropIfExists('personal_cards_size');

    }
}
