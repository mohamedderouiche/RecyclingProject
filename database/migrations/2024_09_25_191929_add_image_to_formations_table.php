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
        Schema::table('formations', function (Blueprint $table) {
            $table->string('image')->nullable(); // Ajoute une colonne image qui peut être null
        });
    }
    
    public function down()
    {
        Schema::table('formations', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
    
};
