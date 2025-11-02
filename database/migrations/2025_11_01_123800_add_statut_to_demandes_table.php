<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('demandes', function (Blueprint $table) {
            if (!Schema::hasColumn('demandes', 'statut')) {
                // SQLite compatible: simple ADD COLUMN with default
                $table->string('statut')->default('en attente')->after('message');
            }
        });
    }

    public function down(): void
    {
        Schema::table('demandes', function (Blueprint $table) {
            if (Schema::hasColumn('demandes', 'statut')) {
                // Some SQLite versions may not support dropColumn; this will work on platforms that do.
                $table->dropColumn('statut');
            }
        });
    }
};
