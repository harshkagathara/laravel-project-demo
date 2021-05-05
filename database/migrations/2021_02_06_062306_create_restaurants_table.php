<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('user_id');
            $table->string('name',22);
            $table->string('description',191);
            $table->string('image',151);
            $table->string('phone',15);
            $table->string('email',100);
            $table->decimal('rating',10)->nullable();
            $table->smallInteger('delivery_time')->nullable();
            $table->smallInteger('delivery_radius')->nullable();
            $table->smallInteger('for_two')->nullable();

            $table->string('mon',5)->nullable();
            $table->time('mon_opentime')->nullable();
            $table->time('mon_closetime')->nullable();
            $table->string('tue',5)->nullable();
            $table->time('tue_opentime')->nullable();
            $table->time('tue_closetime')->nullable();
            $table->string('wed',5)->nullable();
            $table->time('wed_opentime')->nullable();
            $table->time('wed_closetime')->nullable();
            $table->string('thu',5)->nullable();
            $table->time('thu_opentime')->nullable();
            $table->time('thu_closetime')->nullable();
            $table->string('fri',5)->nullable();
            $table->time('fri_opentime')->nullable();
            $table->time('fri_closetime')->nullable();
            $table->string('sat',5)->nullable();
            $table->time('sat_opentime')->nullable();
            $table->time('sat_closetime')->nullable();
            $table->string('sun',5)->nullable();
            $table->time('sun_opentime')->nullable();
            $table->time('sun_closetime')->nullable();

            
            // $table->time('opentime');
            //$table->time('closetime');

            // $table->decimal('commission_rate');
            // $table->string('license_code');
            // $table->decimal('restaurant_charges');
          
            $table->string('is_veg',5)->nullable();
            // $table->string('featured')->nullable();
            $table->string('active',5)->nullable();
            $table->foreignId('user_id',5)->nullable()->constrained();
            $table->foreignId('foodtype_id',5)->nullable()->constrained('foodtypes')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('restaurants');
    }
}
