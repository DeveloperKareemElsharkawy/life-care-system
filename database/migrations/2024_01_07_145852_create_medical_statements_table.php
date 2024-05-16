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
        Schema::create('medical_statements', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->enum('contract_type', ['cash', 'contract'])->nullable();
            $table->enum('diagnosis_type', ['normal', 'Re-diagnosis'])->nullable();

            $table->enum('payment_type', ['cash', 'visa'])->nullable();

            $table->float('examination_price')->nullable();
            $table->float('examination_notes')->nullable();

            $table->text('receipt_number')->nullable();
            $table->text('notes')->nullable();
            $table->date('day')->nullable();

            $table->unsignedBigInteger('insurance_company_id')->nullable();
            $table->foreign('insurance_company_id')->references('id')->on('insurance_companies');

            $table->unsignedBigInteger('doctor_id')->nullable();
            $table->foreign('doctor_id')->references('id')->on('doctors');

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
        Schema::dropIfExists('medical_statements');
    }
};
