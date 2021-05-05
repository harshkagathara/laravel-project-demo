<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->string('name',22);
            $table->string('description',191);
            $table->string('image',100)->nullable();
            $table->decimal('price');
            $table->decimal('discount_price');
            $table->string('type',50);
            $table->string('is_veg',10)->nullable();
            $table->string('glu_free',10)->nullable();
            $table->decimal('calories')->nullable();
            $table->decimal('protien')->nullable();
            $table->decimal('sodium')->nullable();
            $table->decimal('cholesterol')->nullable();
            $table->string('active',10)->nullable();

            $table->foreignId('addons_category_id')->nullable()->constrained('addons_categories')->onUpdate('cascade')->onDelete('cascade');        
            $table->foreignId('restaurant_id')->constrained('restaurants')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('dish_category_id')->nullable()->constrained('dish_categories')->onUpdate('cascade')->onDelete('cascade');
            
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
        Schema::dropIfExists('dishes');
    }
}
