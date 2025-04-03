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
            // $table->unsignedBigInteger('tenant_id')->nullable();
            // $table->unsignedBigInteger('owner_id');
            $table->foreignId('tenant_id')->references('id')->on('users')->nullable() ->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('owner_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->decimal('lease_amount')->default(0)->nullable();
            $table->date('payment_date')->nullable();
            $table->text('address')->nullable();
            $table->mediumText('map_link')->nullable();
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
