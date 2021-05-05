<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWepppiOrderReqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wepppi_order_reqs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('follow_up_id')->constrained('follow_ups')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('wepppi_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('status',151)->nullable();
            $table->string('food',191)->nullable();
            $table->string('drink',191)->nullable();
            $table->string('meal',191)->nullable();
            $table->string('special_instruction',191)->nullable();

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
        Schema::dropIfExists('wepppi_order_reqs');
    }
}
