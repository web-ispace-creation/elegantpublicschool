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
        Schema::create('alumni_councils', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('alumni_id')->unsigned();
            $table->string('designation');
            $table->timestamps();
            $table->foreign('alumni_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumni_council');
    }
};
