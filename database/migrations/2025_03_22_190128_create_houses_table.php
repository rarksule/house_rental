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
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('tenant_id')->nullable();
            $table->foreign('tenant_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('owner_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->decimal('price')->default(0)->nullable();
            $table->date('payment_date')->nullable();
            $table->text('address')->nullable();
            $table->mediumText('map_link')->nullable();
            $table->longText('description');
            $table->mediumText('privateNotes')->nullable();
            $table->decimal('area')->default(0)->nullable();
            $table->double('review')->default('0.0');
            $table->boolean('rented')->default(false);
            $table->json('amenities')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('houses');
    }
};
