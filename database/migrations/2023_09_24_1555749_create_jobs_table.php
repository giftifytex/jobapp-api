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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->integer('pay');
            $table->string('location');
            $table->boolean('is_popular');
            $table->unsignedBigInteger('job_type_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('experience_id');
            $table->unsignedBigInteger('user_id');
            $table->string('logo');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('job_categories')->onDelete('cascade');
            $table->foreign('experience_id')->references('id')->on('experiences')->onDelete('cascade');
            $table->foreign('job_type_id')->references('id')->on('job_types')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
