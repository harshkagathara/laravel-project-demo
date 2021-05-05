<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_addresses', function (Blueprint $table) {
            $table->id();
        
            $table->string('name',22);
            $table->string('address',100);
            $table->integer('pincode');
            $table->string('city',25)->nullable();
            $table->decimal('lat')->nullable();
            $table->decimal('long')->nullable();

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
        Schema::dropIfExists('restaurant_addresses');
    }
}
