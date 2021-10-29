<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Report;
use App\User;
use App\Expense;
use Carbon\Carbon;
use PDF;
class ReportController extends Controller
{

    public function index()
    {

        /*
        $totalGenStockInitialParMois = Report::select(
                        DB::raw('MONTH(date) as month,YEAR(date) as year'),
                        DB::raw('sum(stock_initial) as stock_initial'),
                        DB::raw('sum(prix_vente_unitaire) as prix_vente_unitaire'))->groupBy('month')->get();

        $totalGenPrixVenteUnitaireParMois = DB::table('reports')->sum('prix_vente_unitaire');
        $totalGenPrixAchatUnitaireParMois = DB::table('reports')->sum('prix_achat_unitaire');
        $totalGenQuantiteEntreeParMois = DB::table('reports')->sum('entree');
        $totalGenQuantiteSortieParMois = DB::table('reports')->sum('quantite_sortie');

        $totalGenValStockTotalParMois = Report::select(
                        DB::raw('MONTH(date) as month,YEAR(date) as year'),
                        DB::raw('sum(stock_initial) as stock_initial'),
                        DB::raw('sum(prix_vente_unitaire) as prix_vente_unitaire'))->groupBy('month')->get();*/
        $rapportGeneralParMois = Report::select(
                        DB::raw('MONTH(date) as month,YEAR(date) as year'),
                        DB::raw('sum(total_prix_vente_total) as total_prix_vente'),
                        DB::raw('sum(total_prix_achat_total) as total_prix_achat'),
                        DB::raw('sum(prix_val_stock_restant) as total_prix_val_stock_restant'))->groupBy('month','year')->paginate(12);
        $rapportGeneralParJours = Report::select(
                        DB::raw('DAY(date) as day,MONTH(date) as month,YEAR(date) as year'),
                        DB::raw('sum(total_prix_vente_total) as total_prix_vente'),
                        DB::raw('sum(total_prix_achat_total) as total_prix_achat'))->groupBy('day','month','year')->orderBy('date','desc')->paginate(30);

        /*
        $totalGenPrixAchatTotalParMois = Report::select(
                        DB::raw('MONTH(date) as month,YEAR(date) as year'),
                        DB::raw('sum(stock_initial) as stock_initial'),
                        DB::raw('sum(prix_vente_unitaire) as prix_vente_unitaire'))->groupBy('month')->get();
        $totalGenStockTotalParMois = DB::table('reports')->sum('total_stock_total');
        $totalGenStockRestantParMois = DB::table('reports')->sum('total_stock_restant');
        $totalGenPrixValStockRestantParMois = Report::select(
                        DB::raw('MONTH(date) as month,YEAR(date) as year'),
                        DB::raw('sum(stock_initial) as stock_initial'),
                        DB::raw('sum(prix_vente_unitaire) as prix_vente_unitaire'))->groupBy('month')->get();*/
        


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
        $expenseParMois = Expense::select(
                        DB::raw('MONTH(date) as month,YEAR(date) as year'),
                        DB::raw('sum(total) as total_expense'))->groupBy('month')->get();

         $expenseParJours = Expense::select(
                        DB::raw('DAY(date) as day,MONTH(date) as month,YEAR(date) as year'),
                        DB::raw('sum(total) as total_expense'))->groupBy('day','month','year')->get();


    	$reports = Report::orderBy('date','desc')->paginate(25);
    	return view('backend.report.bar.index',compact(
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

    public function show(Report $report)
    {

    }

    public function create()
    {

    	return view('backend.report.bar.create');
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

    		'total_val_stock_total' => '',
	    	'total_prix_vente_total' => '',
	    	'total_prix_achat_total' => '',
	 		'total_stock_total' => '',
	  		'total_stock_restant' => '',
	    	'prix_val_stock_restant' => ''
    	]);
        $reportEntree =1;
        $report = new Report();
        $report->date = $request->date;
        $report->nom_produit = $request->nom_produit;
        $report->stock_initial = $request->stock_initial;
        $report->entree = $request->entree;
        $report->prix_achat_unitaire = $request->prix_achat_unitaire;
        $report->quantite_sortie = $request->quantite_sortie;
        $report->prix_vente_unitaire = $request->prix_vente_unitaire;

        $report->total_stock_total = $report->stock_initial + $report->entree;
        $report->total_stock_restant = $report->total_stock_total - $report->quantite_sortie;
        $report->prix_val_stock_restant = $report->total_stock_restant * $report->prix_vente_unitaire;
        $report->total_prix_vente_total = $report->prix_vente_unitaire * $report->quantite_sortie;
        $report->total_prix_achat_total = $report->prix_achat_unitaire * $report->entree;
        $report->total_val_stock_total = $report->stock_initial * $report->prix_vente_unitaire;
        $report->utilisateur = \Auth::user()->name;
    	/*$nom_produit = $request->get('nom_produit');
    	$stock_initial = $_POST('stock_initial');
    	$entree = $request->get('entree');
    	$prix_achat_unitaire = $request->get('prix_achat_unitaire');
    	$prix_vente_unitaire = $_POST('prix_vente_unitaire');
    	$quantite_sortie = $request->get('quantite_sortie');*/

    	/*$total_stock_total = $request->get('total_stock_total');
    	$total_stock_restant = $request->get('total_stock_restant');
    	$prix_val_stock_restant = $request->get('prix_val_stock_restant');
    	$total_prix_vente_total = $request->get('total_prix_vente_total');
    	$total_prix_achat_total = $request->get('total_prix_achat_total');
    	$total_val_stock_total = $_POST('total_val_stock_total');*/

    	/*$total_stock_total = $stock_initial * $entree;
    	$total_stock_restant = $total_stock_total - $quantite_sortie;
    	$prix_val_stock_restant = $total_stock_restant * $prix_vente_unitaire;
    	$total_prix_vente_total = $prix_vente_unitaire * $quantite_sortie;
    	$total_prix_achat_total = $prix_achat_unitaire * $entree;
    	$total_val_stock_total = $stock_initial * $prix_vente_unitaire;


    	$data =$request->all();

    	Report::create($data);*/
        $report->save();
    	return redirect()->route('report-bar-list')->with('success','report-bar added successfuly');
    }

    public function edit($id)
    {
        $reports = Report::whereid($id)->first();
        return view('backend.report.bar.edit',compact('reports'));
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

            'total_val_stock_total' => '',
            'total_prix_vente_total' => '',
            'total_prix_achat_total' => '',
            'total_stock_total' => '',
            'total_stock_restant' => '',
            'prix_val_stock_restant' => ''
        ]);
        $report = Report::find($id);
        $report->date = $request->date;
        $report->nom_produit = $request->nom_produit;
        $report->stock_initial = $request->stock_initial;
        $report->entree = $request->entree;
        $report->prix_achat_unitaire = $request->prix_achat_unitaire;
        $report->quantite_sortie = $request->quantite_sortie;
        $report->prix_vente_unitaire = $request->prix_vente_unitaire;

        $report->total_stock_total = $report->stock_initial + $report->entree;
        $report->total_stock_restant = $report->total_stock_total - $report->quantite_sortie;
        $report->prix_val_stock_restant = $report->total_stock_restant * $report->prix_vente_unitaire;
        $report->total_prix_vente_total = $report->prix_vente_unitaire * $report->quantite_sortie;
        $report->total_prix_achat_total = $report->prix_achat_unitaire * $report->entree;
        $report->total_val_stock_total = $report->stock_initial * $report->prix_vente_unitaire;
        $report->utilisateur = \Auth::user()->name;
        $report->save();
        return redirect()->route('report-bar-list')->with('success','report bar updated successfuly');
    }


    public function createPDF() {
      // retreive all records from db
      $data = Report::all();

      view()->share('report',$data);
      $pdf = PDF::loadView('pdf.report', $data);

      // download PDF file with download method
      return $pdf->download('pdf_file.pdf');
    }

    public function createPDFDay() {
      // retreive all records from db
        $data = Report::select(
                        DB::raw('DAY(date) as day,MONTH(date) as month,YEAR(date) as year'),
                        DB::raw('sum(total_prix_vente_total) as total_prix_vente'),
                        DB::raw('sum(total_prix_achat_total) as total_prix_achat'))->groupBy('day','month','year')->orderBy('date','desc')->paginate(30);

      view()->share('report',$data);
      $pdf = PDF::loadView('pdf.day-report', $data);

      // download PDF file with download method
      return $pdf->download('pdf_file.pdf');
    }

    public function createPDFMonth() {
      // retreive all records from db
      $data = Report::select(
                        DB::raw('MONTH(date) as month,YEAR(date) as year'),
                        DB::raw('sum(total_prix_vente_total) as total_prix_vente'),
                        DB::raw('sum(total_prix_achat_total) as total_prix_achat'),
                        DB::raw('sum(prix_val_stock_restant) as total_prix_val_stock_restant'))->groupBy('month','year')->paginate(12);

      view()->share('report',$data);
      $pdf = PDF::loadView('pdf.month-report', $data);

      // download PDF file with download method
      return $pdf->download('pdf_file.pdf');
    }

    public function destroy($id)
    {
        $report = Report::find($id);
        $report->delete();
        return redirect()->back();
    }

}
