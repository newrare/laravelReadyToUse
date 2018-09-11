<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApiTable extends Migration
{
    public function up()
    {
        Schema::create("api", function (Blueprint $table) {
            $table->increments("id");
            $table->integer("idUser");
            $table->string("name");
            $table->char("tokenId", 50);
            $table->char("tokenKey", 100);
        });
    }

    public function down()
    {
        Schema::dropIfExists('api');
    }
}
