<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->string('name',22);
            $table->string('description',100)->nullable();
            $table->string('promotion_code',25)->unique();
            $table->enum('discount_type', ['PERCENTAGE', 'FIXED']);
            $table->integer('discount');
            $table->date('expiry_date')->nullable();
            $table->string('max_usage',5)->nullable();
            $table->string('active',20)->nullable();
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
        Schema::dropIfExists('promotions');
    }
}
