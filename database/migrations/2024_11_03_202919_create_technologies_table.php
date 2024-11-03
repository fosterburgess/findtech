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
        Schema::create('technologies', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->string('case_number')->nullable();
            $table->text('abstract')->nullable();
            $table->text('applications')->nullable();
            $table->text('advantages')->nullable();
            $table->text('publications')->nullable();
            $table->text('related_links')->nullable();
            $table->json('tags')->nullable();
            $table->string('status')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('technologies');
    }
};
