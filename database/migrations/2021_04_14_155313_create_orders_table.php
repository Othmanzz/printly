<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('total');
            $table->foreignId('user_id')->default(0);
            $table->string('payment_method');
            $table->string('currency');
            $table->string('address')->default('');
            $table->string('city')->default('');
            $table->string('zone')->default('');
            $table->integer('payment_confirm')->default(0);
            $table->integer('status')->default(1);
            $table->string('checkout_id')->default('');
            $table->foreignId('represnt_id')->default(0);
            $table->string('code')->default('');
            $table->string('code_price')->default('');



            $table->timestamps();
        });

        Schema::create('orders_products', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('type')->default(1);
            $table->integer('quantity')->default(1);
            $table->integer('total')->default(0);   // 1 for product 2 for custom product
            // 1 for product 2 for custom product
            // 1 for product 2 for custom product
            $table->foreignId('order_id');
        });
        Schema::create('order_history', function (Blueprint $table) {
            $table->id();
            $table->string('comment');
            $table->foreignId('order_id');
    
            $table->timestamps();

        });
        Schema::create('address', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');

            $table->string('city');
            $table->string('area');
            $table->string('street');
            $table->string('more');


        });
        Schema::create('city', function (Blueprint $table) {
            $table->id();

            $table->string('name');


        });      Schema::create('area', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id');
            $table->string('name');


        });
        Schema::create('order_address', function (Blueprint $table) {
            $table->id();
            $table->string('comment');
            $table->foreignId('order_id');
            $table->timestamps();

        });

        Schema::create('order_status', function (Blueprint $table) {
            $table->id();
            $table->string('name');


            $table->timestamps();
        });
    DB::insert("insert into order_status (`name`) VALUES ('طلب جديد')");
    DB::insert("insert into order_status (`name`) VALUES ('تم طباعة الطلب')");
    DB::insert("insert into order_status (`name`) VALUES ('تم التغليف')");
    DB::insert("insert into order_status (`name`) VALUES (' جاهز للاستلام')");
    DB::insert("insert into order_status (`name`) VALUES (' جار التوصيل')");




    Schema::create('coupon', function (Blueprint $table) {
        $table->id('id');
        $table->string('name');
        $table->string('user_id');

        $table->string('code');
        $table->string('type');

        $table->string('discount');
        $table->string('total');

        $table->string('date_start');
        $table->string('date_end');
        $table->string('uses_total');
        $table->string('uses_customer');
        $table->string('status');


        $table->timestamps();
    });

    Schema::create('coupon_history', function (Blueprint $table) {
        $table->id();
        $table->foreignId('coupon_id');
        $table->foreignId('order_id');
        $table->foreignId('customer_id');
        $table->string('amount');
        $table->string('date_added');

        $table->timestamps();
    });
    Schema::create('coupon_product', function (Blueprint $table) {
        $table->id();
        $table->foreignId('coupon_id');
        $table->foreignId('product_id');

    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
