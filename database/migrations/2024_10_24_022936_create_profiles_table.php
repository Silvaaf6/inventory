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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user')->nullable();
            $table->string('cover');
            $table->string('username');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('agama');
            $table->string('alamat');
            $table->string('jenis_kelamin');
            $table->string('no_telp');
            $table->timestamps();
        });

        Schema::create('hobi_profile', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_profile')->onDelete('cascade');
            $table->foreignId('id_hobi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
        Schema::dropIfExists('hobi_profile');
    }
};
