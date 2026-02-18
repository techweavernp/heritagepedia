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
        Schema::create('heritages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('site_id')->constrained()->cascadeOnDelete();
            $table->foreignId('lang_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('feature_image')->nullable();
            $table->string('location');
            $table->string('url_code');
            $table->json('source')->nullable()->comment('role, name, detail');
            $table->boolean('publish')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('heritages');
    }
};
