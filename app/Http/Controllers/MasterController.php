<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Report;
use App\User;
use App\Expense;
use App\Kitchen;
use Carbon\Carbon;

class MasterController extends Controller
{

    public function index() {
        return view('masters.index');
    }

    public function reportListBar()
    {

        $rapportGeneralParMois = Report::select(
                        DB::raw('MONTH(date) as month,YEAR(date) as year'),
                        DB::raw('sum(total_prix_vente_total) as total_prix_vente'),
                        DB::raw('sum(total_prix_achat_total) as total_prix_achat'))->groupBy('month','year')->paginate(12);

        $rapportGeneralParJours = Report::select(
                        DB::raw('Day(date) as day,MONTH(date) as month,YEAR(date) as year'),
                        DB::raw('sum(total_prix_vente_total) as total_prix_vente'),
                        DB::raw('sum(total_prix_achat_total) as total_prix_achat'),
                        DB::raw('sum(prix_val_stock_restant) as stock_initial'))->groupBy('day','month','year')->orderBy('date','desc')->paginate(30);

     

    	$totalGenStockInitial = DB::table('reports')->sum('stock_initial');
    	$totalGenPrixVenteUnitaire = DB::table('reports')->sum('prix_vente_unitaire');
    	$totalGenPrixAchatUnitaire = DB::table('reports')->sum('prix_achat_unitaire');
    	$totalGenQuantiteEntree = DB::table('reports')->sum('entree');
    	$totalGenQuantiteSortie = DB::table('reports')->sum('quantite_sortie');

        $totalGenValStockTotal = DB::table('reports')->sum('total_val_stock_total');
        $totalGenPrixVenteTotal = DB::table('reports')->sum('total_prix_vente_total');
        $totalGenPrixAchatTotal = DB::table('reports')->sum('total_prix_achat_total');
        $totalGenStockTotal = DB::table('reports')->sum('total_stock_total');
        $totalGenStockRestant = DB::table('reports')->sum('total_stock_restant');
        $totalGenPrixValStockRestant = DB::table('reports')->sum('prix_val_stock_restant');

        //les depenses
        //les depenses
        $expenseParMois = Expense::select(
                        DB::raw('MONTH(date) as month,YEAR(date) as year'),
                        DB::raw('sum(total) as total_expense'))->groupBy('month','year')->get();
        $expenseParJours = Expense::select(
                        DB::raw('DAY(date) as day,MONTH(date) as month,YEAR(date) as year'),
                        DB::raw('sum(total) as total_expense'))->groupBy('day','month','year')->get();


    	$reports = Report::orderBy('date','desc')->paginate(15);
    	return view('masters.report.bar',compact(
    		'reports',
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
            //total expense
            'expenseParMois',
            'rapportGeneralParJours',
            'expenseParJours'

    	));
    }


    public function reportListKitchen()
    {
        $rapportGeneralParMois = Kitchen::select(
                        DB::raw('MONTH(date) as month,YEAR(date) as year'),
                        DB::raw('sum(total_prix_vente_total) as total_prix_vente'),
                        DB::raw('sum(total_prix_achat_total) as total_prix_achat'))->groupBy('month','year')->paginate(12);


        $rapportGeneralParJours = Kitchen::select(
                        DB::raw('DAY(date) as day,MONTH(date) as month,YEAR(date) as year'),
                        DB::raw('sum(total_prix_vente_total) as total_prix_vente'),
                        DB::raw('sum(total_prix_achat_total) as total_prix_achat'))->groupBy('day','month','year')->orderBy('date','desc')->paginate(30);


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
        return view('masters.report.kitchen',compact(
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


    public function reportExpense()
    {
        $expenseParMois = Expense::select(
                        DB::raw('MONTH(date) as month,YEAR(date) as year'),
                        DB::raw('sum(total) as total_expense'))->groupBy('month')->paginate(12);

       $expenseParJours = Expense::select(
                        DB::raw('Day(date) as day,MONTH(date) as month,YEAR(date) as year'),
                        DB::raw('sum(total) as total_expense'))->groupBy('day','month','year')->orderBy('date','desc')->paginate(30);

        $expenses = Expense::orderBy('date','desc')->paginate(25);
        return view('masters.report.expense',compact('expenses','expenseParMois','expenseParJours'));
    }
}
