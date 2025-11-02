<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('annonces', function (Blueprint $table) {
            if (!Schema::hasColumn('annonces', 'agriculteur_id')) {
                // SQLite: impossible d'ajouter une colonne NOT NULL sans valeur par défaut via ALTER TABLE
                // On la crée donc nullable et sans contrainte FK pour compatibilité.
                $table->unsignedBigInteger('agriculteur_id')->nullable()->after('id');
                // Optionnel: index
                $table->index('agriculteur_id');
            }
        });
    }

    public function down(): void
    {
        Schema::table('annonces', function (Blueprint $table) {
            if (Schema::hasColumn('annonces', 'agriculteur_id')) {
                $table->dropIndex(['agriculteur_id']);
                $table->dropColumn('agriculteur_id');
            }
        });
    }
};
