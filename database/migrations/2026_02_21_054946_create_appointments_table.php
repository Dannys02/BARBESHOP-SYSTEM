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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId("service_id")->constrained()->onDelete("cascade");
            $table->foreignId("barber_id")->constrained()->onDelete("cascade");
            $table->string("customer_name");
            $table->string("customer_phone");
            $table->date("booking_date");
            $table->time("booking_time");
            $table->enum("status", ["pending", "konfirmasi", "selesai", "batal"])->default("pending");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
