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
        Schema::create('contact_us', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete(); // Foreign key to the 'states' table
            $table->string('phone_number')->nullable();
            $table->string('subject')->nullable();
            $table->text('message');
            $table->tinyInteger('is_read')->default(0);
            $table->softDeletes(); // Adds 'deleted_at' column for soft deletes
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
        Schema::dropIfExists('contacts');
    }
};
