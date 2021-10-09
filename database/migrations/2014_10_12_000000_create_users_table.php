<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('photo')->default('');
            $table->string('phone')->default('');
            $table->string('phone2')->default('');
            $table->string('gender')->default('');
            $table->string('country')->default('');
            $table->integer('profit')->default(0);
            $table->integer('block')->default(0);
            $table->timestamp('block_to');
            $table->string('reason')->default('0');

            $table->integer('type')->default(0);

            $table->rememberToken();
            $table->timestamps();


        });
          Schema::create('comission', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('total');
 $table->foreignId('order_id');
            $table->foreignId('coupon_id');

        
        });
          Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('universty');
           $table->string('college');
            $table->string('specialist');

        
        });
        Schema::create('safer_profit', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('order_id');
           $table->string('profit');
            $table->timestamp('created_at')->default(date('Y-m-d h:i:s'));

        
        });
        Schema::create('representatives', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('code');
           $table->string('user_discount');
            $table->string('safer_discount');

        
        });
            Schema::create('print_man', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('universty');
           $table->string('college');
            $table->string('specialist');

        
        });
             Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('universty');
           $table->string('college');
            $table->string('specialist');

        
        });
        Schema::create('users_coupons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('code')->unique();

            $table->integer('allowed')->default(0);

            $table->integer('used')->default(0);

        });
        Schema::create('user_promo_codes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->integer('amount')->default(0);
            $table->timestamps();
        });
        DB::insert("insert into users (`name` , `email` , `password`,`gender`,`phone`,`type`)
            VALUES ('admin','admin@admin.com','".Hash::make('admin')."','1','0000000000' , '1')");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
