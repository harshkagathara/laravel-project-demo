<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('name',22);
            $table->string('description',150)->nullable();
            $table->string('coupon_code',25)->unique();
            $table->enum('discount_type', ['PERCENTAGE', 'FIXED']);
            $table->integer('discount');
            $table->date('expiry_date')->nullable();
            $table->string('max_usage',5)->nullable();
            $table->string('active',20)->nullable();
            $table->foreignId('restaurant_id')->constrained('restaurants')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('coupons');
    }
}
