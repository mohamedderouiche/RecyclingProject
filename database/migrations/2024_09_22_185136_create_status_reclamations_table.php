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
        Schema::create('status_reclamations', function (Blueprint $table) {
            $table->id();
            $table->string('status_reclamation');
            $table->text('description')->nullable();
            $table->timestamps();
        });


          // Insert default statuses directly in the migration
          DB::table('status_reclamations')->insert([
            ['status_reclamation' => 'En Attente', 'description' => 'Waiting for processing'],
            ['status_reclamation' => 'En Cours', 'description' => 'Being processed'],
            ['status_reclamation' => 'Résolus', 'description' => 'Issue resolved'],
        ]);
    }

    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status_reclamations');
    }
};
