<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('nom_produit');
            $table->string('stock_initial');
            $table->string('entree');
            $table->string('prix_achat_unitaire');
            $table->string('quantite_sortie');
            $table->string('prix_vente_unitaire');

            $table->string('total_val_stock_total');
            $table->string('total_prix_vente_total');
            $table->string('total_prix_achat_total');
            $table->string('total_stock_total');
            $table->string('total_stock_restant');
            $table->string('prix_val_stock_restant');
            $table->string('utilisateur');
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
        Schema::dropIfExists('reports');
    }
}
