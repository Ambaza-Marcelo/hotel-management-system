<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Kitchen;
use App\User;
use Carbon\Carbon;

class KitchenController extends Controller
{
    // 
    public function index()
    {
    	  /*
        $totalGenStockInitialParMois = Kitchen::select(
                        DB::raw('MONTH(date) as month,YEAR(date) as year'),
                        DB::raw('sum(stock_initial) as stock_initial'),
                        DB::raw('sum(prix_vente_unitaire) as prix_vente_unitaire'))->groupBy('month')->get();

        $totalGenPrixVenteUnitaireParMois = DB::table('kitchens')->sum('prix_vente_unitaire');
        $totalGenPrixAchatUnitaireParMois = DB::table('kitchens')->sum('prix_achat_unitaire');
        $totalGenQuantiteEntreeParMois = DB::table('reports')->sum('entree');
        $totalGenQuantiteSortieParMois = DB::table('kitchens')->sum('quantite_sortie');

        $totalGenValStockTotalParMois = Kitchen::select(
                        DB::raw('MONTH(date) as month,YEAR(date) as year'),
                        DB::raw('sum(stock_initial) as stock_initial'),
                        DB::raw('sum(prix_vente_unitaire) as prix_vente_unitaire'))->groupBy('month')->get();*/
        $rapportGeneralParMois = Kitchen::select(
                        DB::raw('MONTH(date) as month,YEAR(date) as year'),
                        DB::raw('sum(total_prix_vente_total) as total_prix_vente'),
                        DB::raw('sum(total_prix_achat_total) as total_prix_achat'))->groupBy('month','year')->paginate(12);

        $rapportGeneralParJours = Kitchen::select(
                        DB::raw('DAY(date) as day,MONTH(date) as month,YEAR(date) as year'),
                        DB::raw('sum(total_prix_vente_total) as total_prix_vente'),
                        DB::raw('sum(total_prix_achat_total) as total_prix_achat'))->groupBy('day','month','year')->paginate(30);

        /*
        $totalGenPrixAchatTotalParMois = Kitchen::select(
                        DB::raw('MONTH(date) as month,YEAR(date) as year'),
                        DB::raw('sum(stock_initial) as stock_initial'),
                        DB::raw('sum(prix_vente_unitaire) as prix_vente_unitaire'))->groupBy('month')->get();
        $totalGenStockTotalParMois = DB::table('kitchens')->sum('total_stock_total');
        $totalGenStockRestantParMois = DB::table('kitchens')->sum('total_stock_restant');
        $totalGenPrixValStockRestantParMois = Kitchen::select(
                        DB::raw('MONTH(date) as month,YEAR(date) as year'),
                        DB::raw('sum(stock_initial) as stock_initial'),
                        DB::raw('sum(prix_vente_unitaire) as prix_vente_unitaire'))->groupBy('month')->get();*/
        


        $totalGenStockInitial = DB::table('kitchens')->sum('stock_initial');
        $totalGenPrixVenteUnitaire = DB::table('kitchens')->sum('prix_vente_unitaire');
        $totalGenPrixAchatUnitaire = DB::table('kitchens')->sum('prix_achat_unitaire');
        $totalGenQuantiteEntree = DB::table('kitchens')->sum('entree');
        $totalGenQuantiteSortie = DB::table('kitchens')->sum('quantite_sortie');

        $totalGenValStockTotal = DB::table('kitchens')->sum('total_val_stock_total');
        $totalGenPrixVenteTotal = DB::table('kitchens')->sum('total_prix_vente_total');
        $totalGenPrixAchatTotal = DB::table('kitchens')->sum('total_prix_achat_total');
        $totalGenStockTotal = DB::table('kitchens')->sum('total_stock_total');
        $totalGenStockRestant = DB::table('kitchens')->sum('total_stock_restant');
        $totalGenPrixValStockRestant = DB::table('kitchens')->sum('prix_val_stock_restant');



        $kitchens = Kitchen::paginate(25);
        return view('backend.report.kitchen.index',compact(
            'kitchens',
            'totalGenStockInitial',
            'totalGenPrixVenteUnitaire',
            'totalGenPrixAchatUnitaire',
            'totalGenQuantiteEntree',
            'totalGenQuantiteSortie',

            'totalGenValStockTotal',
            'totalGenPrixVenteTotal',
            'totalGenPrixAchatTotal',
            'totalGenStockTotal',
            'totalGenStockRestant',
            'totalGenPrixValStockRestant',

            //rapport general
            'rapportGeneralParMois',
            'rapportGeneralParJours'

        ));
    }

    public function create()
    {
    	return view('backend.report.kitchen.create');
    }
     public function store(Request $request)
    {

    	$validator = Validator::make($request->all(),[
    		'date' => 'required',
    		'nom_produit' => 'required',
    		'stock_initial' => '',
    		'entree' => '',
    		'prix_achat_unitaire' => '',
    		'quantite_sortie' => '',
    		'prix_vente_unitaire' => '',
    		'type' => '',

    		'total_val_stock_total' => '',
	    	'total_prix_vente_total' => '',
	    	'total_prix_achat_total' => '',
	 		'total_stock_total' => '',
	  		'total_stock_restant' => '',
	    	'prix_val_stock_restant' => '',
	    	'utilisateur'=> ''
    	]);

        $kitchen = new Kitchen();
        $kitchen->date = $request->date;
        $kitchen->nom_produit = $request->nom_produit;
        $kitchen->stock_initial = $request->stock_initial;
        $kitchen->entree = $request->entree;
        $kitchen->prix_achat_unitaire = $request->prix_achat_unitaire;
        $kitchen->quantite_sortie = $request->quantite_sortie;
        $kitchen->prix_vente_unitaire = $request->prix_vente_unitaire;
        $kitchen->type = $request->type;

        $kitchen->total_stock_total = $kitchen->stock_initial + $kitchen->entree;
        $kitchen->total_stock_restant = $kitchen->total_stock_total - $kitchen->quantite_sortie;
        $kitchen->prix_val_stock_restant = $kitchen->total_stock_restant * $kitchen->prix_vente_unitaire;
        $kitchen->total_prix_vente_total = $kitchen->prix_vente_unitaire * $kitchen->quantite_sortie;
        $kitchen->total_prix_achat_total = $kitchen->prix_achat_unitaire * $kitchen->entree;
        $kitchen->total_val_stock_total = $kitchen->stock_initial * $kitchen->prix_vente_unitaire;
        $kitchen->utilisateur = \Auth::user()->name;

        $kitchen->save();
    	return redirect()->route('report-kitchen-list')->with('success','report kitchen added successfuly');
    }

    public function edit($id)
    {
        $kitchens = Kitchen::whereid($id)->first();
        return view('backend.report.kitchen.edit',compact('kitchens'));
    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(),[
            'date' => 'required',
            'nom_produit' => 'required',
            'stock_initial' => '',
            'entree' => '',
            'prix_achat_unitaire' => '',
            'quantite_sortie' => '',
            'prix_vente_unitaire' => '',
            'type' => '',

            'total_val_stock_total' => '',
            'total_prix_vente_total' => '',
            'total_prix_achat_total' => '',
            'total_stock_total' => '',
            'total_stock_restant' => '',
            'prix_val_stock_restant' => '',
            'utilisateur'=> ''
        ]);

        $kitchen = Kitchen::find($id);
        $kitchen->date = $request->date;
        $kitchen->nom_produit = $request->nom_produit;
        $kitchen->stock_initial = $request->stock_initial;
        $kitchen->entree = $request->entree;
        $kitchen->prix_achat_unitaire = $request->prix_achat_unitaire;
        $kitchen->quantite_sortie = $request->quantite_sortie;
        $kitchen->prix_vente_unitaire = $request->prix_vente_unitaire;
        $kitchen->type = $request->type;

        $kitchen->total_stock_total = $kitchen->stock_initial + $kitchen->entree;
        $kitchen->total_stock_restant = $kitchen->total_stock_total - $kitchen->quantite_sortie;
        $kitchen->prix_val_stock_restant = $kitchen->total_stock_restant * $kitchen->prix_vente_unitaire;
        $kitchen->total_prix_vente_total = $kitchen->prix_vente_unitaire * $kitchen->quantite_sortie;
        $kitchen->total_prix_achat_total = $kitchen->prix_achat_unitaire * $kitchen->entree;
        $kitchen->total_val_stock_total = $kitchen->stock_initial * $kitchen->prix_vente_unitaire;
        $kitchen->utilisateur = \Auth::user()->name;

        $kitchen->save();
        return redirect()->route('report-kitchen-list')->with('success','report kitchen updated successfuly');
    }

    public function destroy($id)
    {
        $kitchen = Kitchen::find($id);
        $kitchen->delete();
        return redirect()->back();
    }
}
