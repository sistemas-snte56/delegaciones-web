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
        Schema::create('nomenclatura', function (Blueprint $table) {
            $table->id();
            $table->string('nomenclatura' , 150);
            $table->unsignedBigInteger('id_tipo_delegacion');
            $table->timestamps();

            $table->foreign('id_tipo_delegacion')->references('id')->on('tipo_delegacion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nomenclatura');
    }
};
