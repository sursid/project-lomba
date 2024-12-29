<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // User yang menerima notif
            $table->foreignId('from_user_id')->nullable()->constrained('users')->onDelete('cascade'); // User yang membuat action
            $table->enum('type', [
                'friend_request',
                'friend_accepted',
                'post_like',
                'post_comment',
                'comment_reply',
                'mentioned',
                'new_message'
            ]);
            $table->morphs('notifiable'); // Untuk link ke berbagai model (post, comment, dll)
            $table->text('message');
            $table->boolean('is_read')->default(false);
            $table->timestamp('read_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
