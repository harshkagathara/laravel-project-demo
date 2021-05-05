<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowUpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follow_ups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('restaurant_id')->constrained('restaurants')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('request_by')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('order_id')->constrained('live_requests')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('wepppies');
            $table->string('purpose',151);
            $table->date('date');		
            $table->time('time');
            $table->decimal('amount')->nullable();
            $table->string('status',151)->nullable();
            $table->string('wepppi_id',191)->nullable();
            $table->string('comment',191)->nullable();
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
        Schema::dropIfExists('follow_ups');
    }
}
