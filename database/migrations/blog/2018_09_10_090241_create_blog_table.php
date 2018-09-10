<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogTable extends Migration
{
    public function up()
    {
        Schema::create("blog", function (Blueprint $table) {
            $table->increments("id");
            $table->integer("idUser");
            $table->char("lang", 2);
            $table->longText("message");
            $table->date("messageDate");
            $table->string("messageTitle");
            $table->string("urlImage")->nullable();
            $table->string("urlVideo")->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists("blog");
    }
}
