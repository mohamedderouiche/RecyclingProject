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
        Schema::create('dechets', function (Blueprint $table) {
            $table->id();
            $table->enum('type_dechet', ['Plastique', 'Papier', 'Verre', 'Métal']); 
            $table->float('quantite')->nullable(); 
            $table->unsignedBigInteger('centre_recyclages_id');
            $table->foreign('centre_recyclages_id')->references('id')->on('centre_recyclages')->onDelete('cascade');
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
        Schema::dropIfExists('dechets');
    }
};
