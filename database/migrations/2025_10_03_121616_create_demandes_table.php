<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('agriculteur_id');
            $table->unsignedBigInteger('annonce_id');
            $table->foreignId('annonce_id')->constrained()->onDelete('cascade');
            $table->string('nom');
            $table->string('email');
            $table->text('message');
            $table->string('statut')->default('en attente');
            $table->decimal('quantite', 10, 2)->nullable(); // quantité demandée
            $table->timestamps();


            
    $table->foreign('client_id')->references('id')->on('users')->onDelete('cascade');
    $table->foreign('agriculteur_id')->references('id')->on('users')->onDelete('cascade');
    $table->foreign('annonce_id')->references('id')->on('annonces')->onDelete('cascade');
        });

    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandes');
    }
};
