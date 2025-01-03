<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoryViewsTable extends Migration
{
    public function up()
    {
        Schema::create('story_views', function (Blueprint $table) {
            $table->id();
            $table->foreignId('story_id')
                  ->constrained()
                  ->onDelete('cascade');
            $table->foreignId('viewer_id')
                  ->constrained('users')
                  ->onDelete('cascade');
            $table->timestamp('viewed_at')->useCurrent();
            $table->timestamps();
            
            // Unique constraint
            $table->unique(['story_id', 'viewer_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('story_views');
    }
}