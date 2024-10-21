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
        Schema::create('_dechet', function (Blueprint $table) {
            $table->id();
            $table->string('categorie'); // Storing enum as a string
            $table->integer('quantite')->default(0);
            $table->foreignId('centre_recyclage_id')->constrained()->onDelete('cascade'); 
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
        Schema::dropIfExists('_dechet');
    }
};