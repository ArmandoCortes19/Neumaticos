<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('neumaticos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->string('marca');
            $table->string('medida');
            $table->enum('estado', ['nuevo', 'en_uso', 'desgaste', 'baja'])->default('nuevo');
            $table->enum('area', ['slw', 'qet', 'butc']);
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('neumaticos');
    }
};
