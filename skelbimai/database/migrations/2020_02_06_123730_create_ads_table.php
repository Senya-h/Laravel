<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("name");
            $table->longText("description");
            $table->string("img")->nullable();
            $table->decimal("price", 5, 2)->nullable()->default(0);
            $table->string("email");
            $table->string("phone")->nullable();
            $table->string("location");

            $table->integer("categoryId");

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
        Schema::dropIfExists('ads');
    }
}
