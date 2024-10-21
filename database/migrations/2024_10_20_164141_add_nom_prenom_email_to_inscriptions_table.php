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
        Schema::table('inscriptions', function (Blueprint $table) {
            $table->string('nom')->after('formations_id');
            $table->string('prenom')->after('nom');
            $table->string('email')->after('prenom');
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
{
    Schema::table('inscriptions', function (Blueprint $table) {
        $table->dropColumn(['nom', 'prenom', 'email']);
    });
}
};
