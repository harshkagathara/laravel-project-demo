<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatnerwithusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patnerwithuses', function (Blueprint $table) {
            $table->id();
            $table->string('name',22);
            $table->string('address',191);
            $table->string('first_name',22);
            $table->string('sur_name',22);
            $table->string('phone',15);
            $table->string('res_phone',15);
            $table->string('email',50);
            $table->integer('no_of_loc');
            $table->string('type_of_cuisine',22);
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('message',191)->nullable();
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
        Schema::dropIfExists('patnerwithuses');
    }
}
