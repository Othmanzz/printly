<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('papers_type', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->timestamps();
        });

        Schema::create('papers_size', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("paper_type");
            $table->string("printer_type");
            $table->string("printer_color");
            $table->string("printer_method");
            $table->string("papers_slice");
            $table->string("covers");

            $table->timestamps();
        });
        Schema::create('papers_slice', function (Blueprint $table) {
            $table->id();
            $table->string("name");
			            $table->string("paper_count");

            $table->string("photo");

            $table->timestamps();
        });


        Schema::create('printer_color', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->integer("type");

            $table->timestamps();
        });
        \Illuminate\Support\Facades\DB::insert("insert into printer_color (`name`,`type`) VALUES  ('أسود','0') ");
        \Illuminate\Support\Facades\DB::insert("insert into printer_color (`name`,`type`) VALUES  ('ملون','1') ");

        Schema::create('printer_type', function (Blueprint $table) {
            $table->id();
            $table->string("name");

            $table->timestamps();
        });
        \Illuminate\Support\Facades\DB::insert("insert into printer_type (`name`) VALUES  (' وجه واحد') ");
        \Illuminate\Support\Facades\DB::insert("insert into printer_type (`name`) VALUES  ('وجهين') ");
        Schema::create('printer_method', function (Blueprint $table) {
            $table->id();
            $table->string("name");

            $table->timestamps();
        });
        \Illuminate\Support\Facades\DB::insert("insert into printer_method (`name`) VALUES  ('طولي') ");
        \Illuminate\Support\Facades\DB::insert("insert into printer_method (`name`) VALUES  ('عرضي') ");


        Schema::create('cover_type', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("price_type");

            $table->string("photo");
            $table->timestamps();
        });
            Schema::create('cover_files_orders', function (Blueprint $table) {
            $table->id();
            $table->integer("file");
            $table->integer("order");

            $table->foreignId("m_id");
         
        });
Schema::create('cover_type_price', function (Blueprint $table) {
            $table->id();
            $table->foreignId("cover_id");
            $table->string("star_from");
            $table->string("end_to");
            $table->string("price");
        });

        Schema::create('price_list', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->foreignId("paper_id");
           $table->foreignId("printer_type");
            $table->foreignId("paper_type");

            $table->foreignId("printer_method");
            $table->foreignId("printer_color");
            $table->foreignId("paper_slice");
            $table->integer("price");

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
        Schema::dropIfExists('papers');
    }
}
