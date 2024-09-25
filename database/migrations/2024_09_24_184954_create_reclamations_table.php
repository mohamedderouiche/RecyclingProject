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
        Schema::create('reclamations', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('type_reclamation_id')->nullable();
            $table->foreign('type_reclamation_id')->references('id')->on('type_reclamations')->onDelete('cascade');

            $table->string("description");
            $table->string('image')->nullable();
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('status_reclamations_id')->default(1);;

            $table->foreign('status_reclamations_id')->references('id')->on('status_reclamations')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reclamations');
    }
};
