<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();

            // Foreign keys
            $table->unsignedBigInteger('insurance_company_id')->nullable();
            $table->foreign('insurance_company_id')->references('id')->on('insurance_companies');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');


            $table->unsignedBigInteger('doctor_id');
            $table->foreign('doctor_id')->references('id')->on('doctors');


            $table->float('discount_value')->nullable(); // Changed to float
            $table->float('contract_price_before_discount')->nullable(); // Changed to float
            $table->float('contract_final_total')->nullable(); // Changed to float
            $table->enum('contract_type', ['cash', 'contract'])->nullable();
            $table->text('notes')->nullable();


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
        Schema::dropIfExists('sessions');
    }
};
