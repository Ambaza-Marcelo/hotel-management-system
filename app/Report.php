<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    protected $fillable = [
        'date',
    	'nom_produit',
    	'stock_initial',
    	'entree',
    	'prix_achat_unitaire',
    	'quantite_sortie',
    	'prix_vente_unitaire',

    	'total_val_stock_total',
    	'total_prix_vente_total',
    	'total_prix_achat_total',
    	'total_stock_total',
    	'total_stock_restant',
    	'prix_val_stock_restant',
        'utilisateur'
    ];


}
