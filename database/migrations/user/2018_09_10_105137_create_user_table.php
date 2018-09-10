<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->char("login", 100)->unique();
            $table->string("password");
            $table->string("email");
            $table->boolean("emailIsValid");
            $table->char("socialNetwork", 50);
            $table->string("urlAvatar")->nullable();
            $table->date("dateRegistration");
            $table->char("lang", 2);
            $table->boolean("isAdmin");
        });
    }

    public function down()
    {
        Schema::dropIfExists('user');
    }
}
