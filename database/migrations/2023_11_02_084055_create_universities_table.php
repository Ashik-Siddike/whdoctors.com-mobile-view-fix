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
        Schema::create('universities', function (Blueprint $table) {
            $table->id();
            $table->set('type', ['public', 'private']);
            $table->unsignedInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->string('image')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->string('address');
            $table->string('program');
            $table->string('tuition_fee');
            $table->string('living_cost');
            $table->date('application_date');
            $table->string('admission_requirements');
            $table->tinyInteger('is_show_homepage')->default(0);
            $table->tinyInteger('is_partner')->default(0);
            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_image')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('universities');
    }
};
