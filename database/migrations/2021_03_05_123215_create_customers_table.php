<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name',44);
            $table->string('last_name',44);
            $table->string('education',22);
            $table->string('image',100)->nullable();
            $table->string('profession',22)->nullable();
            $table->date('dob');
            $table->string('gender',10);
            $table->string('phone',15);
            $table->string('fav_cuisine',191)->nullable();
            $table->string('fav_restaurant',191)->nullable();
            $table->string('username',22);
            $table->string('email',50)->unique();
            $table->string('password',151);
            $table->string('joined_date',22);
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('customers');
    }
}
