<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiveRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('live_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('restaurant_id')->constrained('restaurants')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('request_by')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('wepppies');
            $table->string('purpose',151);
            $table->date('date');		
            $table->time('time');	
            $table->string('status',151)->nullable();
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
        Schema::dropIfExists('live_requests');
    }
}
