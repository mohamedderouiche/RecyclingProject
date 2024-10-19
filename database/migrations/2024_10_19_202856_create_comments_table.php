<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->text('content'); // Comment content

            // Foreign key for the user who wrote the comment
            $table->unsignedBigInteger('user_id'); // Corrected to 'user_id'
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Foreign key for the article being commented on
            $table->unsignedBigInteger('article_id'); // Corrected to 'article_id'
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');

            $table->timestamps(); // Created_at and updated_at fields
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments'); // Drop the table if it exists
    }
};
