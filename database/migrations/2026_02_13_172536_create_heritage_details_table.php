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
        Schema::create('heritage_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('heritage_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->text('description');
            $table->string('audio')->nullable();
            $table->string('qlink_tag')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('heritage_details');
    }
};
