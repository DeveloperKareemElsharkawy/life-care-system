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
        Schema::table('users', function (Blueprint $table) {
            $table->enum('contract_type', ['cash', 'contract'])->nullable();
            $table->enum('payment_type', ['cash', 'visa'])->nullable();

            $table->float('examination_price')->nullable(); // Changed to float
            $table->float('examination_notes')->nullable(); // Changed to float
            $table->text('receipt_number')->nullable();
            $table->text('notes')->nullable();

            $table->unsignedBigInteger('insurance_company_id')->nullable();
            $table->foreign('insurance_company_id')->references('id')->on('insurance_companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
