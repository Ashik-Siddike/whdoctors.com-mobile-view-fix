<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('n_id')->unique();
            $table->string('phone')->unique();
            $table->float('commission_rate')->nullable();
            $table->string('address');
            $table->string('image')->nullable();
            $table->string('id_card_front_image')->nullable();
            $table->string('id_card_back_image')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->text('details')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agents');
    }
};
