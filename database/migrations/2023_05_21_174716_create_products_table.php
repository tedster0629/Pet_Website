<?php

use App\Enums\UserChoice;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->decimal('price')->default(0.0);
            $table->string('discountable')->default(UserChoice::NO);
            $table->string('downloadable')->default(UserChoice::NO);
            $table->string('promoted')->default(UserChoice::NO);
            $table->string('sale')->default(UserChoice::NO);
            $table->timestamp('start_sale')->nullable();
            $table->timestamp('end_sale')->nullable();
            $table->decimal('discount_percent')->default(0);
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
        Schema::dropIfExists('products');
    }
};
