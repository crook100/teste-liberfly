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
        Schema::create('dummies', function (Blueprint $table) {
            $table->id();
            $table->string("column_one",    64);
            $table->string("column_two",    64);
            $table->string("column_three",  64);
            $table->string("column_four",   64);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dummies');
    }
};
