<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurance_company_categories', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('insurance_company_id');

            $table->foreign('insurance_company_id')->references('id')->on('insurance_companies');

            $table->unsignedBigInteger('main_category_id');
            $table->unsignedBigInteger('category_id');

            $table->foreign('main_category_id')->references('id')->on('categories');
            $table->foreign('category_id')->references('id')->on('categories');

            $table->decimal('discount_price_value', 8, 2)->nullable();
            $table->integer('discount_percentage_value')->nullable();


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
        Schema::dropIfExists('insurance_company_categories');
    }
};
