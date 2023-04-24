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
        Schema::create('registration_forms', function (Blueprint $table) {
            $table->id();
            $table->string('sname')->nullable();
            $table->string('fname')->nullable();
            $table->string('age')->nullable();
            $table->string('cnic')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('campus_id')->nullable();
            $table->string('sub_campus_id')->nullable();
            $table->string('test')->nullable();
            $table->string('challan')->nullable();
            $table->string('date')->nullable();
            $table->string('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registration_forms');
    }
};
