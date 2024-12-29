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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();  // username untuk mention
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->text('bio')->nullable();       // deskripsi profil
            $table->string('avatar')->nullable();  // foto profil
            $table->string('cover_photo')->nullable(); // foto sampul
            $table->string('location')->nullable(); // lokasi/alamat
            $table->enum('role', ['user', 'admin', 'moderator'])->default('user');
            $table->boolean('is_verified')->default(false); // centang biru 😄
            $table->integer('followers_count')->default(0);
            $table->integer('following_count')->default(0);
            $table->integer('posts_count')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('is_active')->default(true);
            $table->timestamp('last_active_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes(); // untuk keperluan banned/hapus akun
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};