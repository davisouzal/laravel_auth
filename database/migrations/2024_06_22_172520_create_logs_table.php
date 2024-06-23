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
        Schema::create('logs', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('idUser');
        $table->enum('action', ['store', 'update', 'destroy']);
        $table->string('tableName');
        $table->string('columnName')->nullable();
        $table->text('oldValue')->nullable();
        $table->text('newValue')->nullable();
        $table->unsignedBigInteger('idRecord')->nullable();
        $table->timestamps();

        $table->foreign('idUser')->references('id')->on('users');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logs');
    }
};
