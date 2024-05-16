<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone', 20)->unique()->nullable();
            $table->string('image')->nullable();
            $table->string('source')->nullable();
            $table->integer('age')->nullable();
            $table->tinyInteger('status')->default(1);


            $table->enum('contract_type', ['cash', 'contract'])->nullable();

            $table->enum('gender', ['male', 'female'])->nullable();

            $table->text('fcm_token')->nullable();

            $table->enum('contract_type', ['cash', 'contract'])->nullable();
            $table->enum('payment_type', ['cash', 'visa'])->nullable();

            $table->timestamps(); // Automatically creates 'created_at' and 'updated_at' columns
            $table->softDeletes(); // Adds 'deleted_at' column for soft deletes

            // Indexes
            $table->unique(['pin_code']);
            $table->index(['state_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
