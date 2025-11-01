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
    Schema::table('demandes', function (Blueprint $table) {
        $table->unsignedBigInteger('agriculteur_id')->nullable()->after('client_id');
    });
}

public function down()
{
    Schema::table('demandes', function (Blueprint $table) {
        $table->dropColumn('agriculteur_id');
    });
}

};
