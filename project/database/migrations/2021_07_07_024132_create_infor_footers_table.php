<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInforFootersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infor_footers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('text');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('linkFacebook');
            $table->string('linkInstargam');
            $table->string('linkTwitter');
            $table->string('linkGoogle');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('infor_footers');
    }
}
