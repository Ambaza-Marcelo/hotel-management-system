<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\Kitchen;

class ChartController extends Controller
{
    //


    	public function day(){
		$products= OrderProduct::select(
		                DB::raw('DAY(created_at) as day'),DB::raw('sum(line_total) as total_line') , 'product_id','qty','line_total','created_at')->groupBy('day','product_id')->get();
		}
		public function month(){
		$products= OrderProduct::select(
		                DB::raw('MONTHNAME(created_at) as month'),
		                DB::raw('sum(line_total) as total_line') , 'product_id','qty','line_total','created_at')->groupBy('month','product_id')->get();
		}
		public function year(){
		$products= OrderProduct::select(
		                DB::raw('YEAR(created_at) as year'),
		               DB::raw('sum(line_total) as total_line') , 'product_id','qty','line_total','created_at')->groupBy('year','product_id')->get();
		}

		public function index()
		{
			$totalGenStockInitialByDay = Report::select(
		                DB::raw('DAY(created_at) as day'),DB::raw('sum(stock_initial) as stock_initial_total') , 'id','nom_produit','line_total','created_at')->groupBy('day','product_id')->get();
	        $totalGenPrixVenteUnitaireByDay = 
	        $totalGenPrixAchatUnitaireByDay = 
	        $totalGenQuantiteEntreeByDay = 
	        $totalGenQuantiteSortieByDay = 

	        $totalGenStockInitialByMonth = 
	        $totalGenPrixVenteUnitaireByMonth = 
	        $totalGenPrixAchatUnitaireByMonth = 
	        $totalGenQuantiteEntreeByMonth = 
	        $totalGenQuantiteSortieByMonth = 


	        $totalGenStockInitialByYear = 
	        $totalGenPrixVenteUnitaireByYear = 
	        $totalGenPrixAchatUnitaireByYear = 
	        $totalGenQuantiteEntreeByYear = 
	        $totalGenQuantiteSortieByYear = 
		}


		//
		/*
		$Rspatients = DB::table('reports')
			->select(
			    DB::raw("day(created_at) as day"),
			    DB::raw("Count(*) as total_patients"))

			->orderBy("created_at")
			->groupBy(DB::raw("day(created_at)"))
			->get();


			$result_patients[] = ['day','Patients'];
			foreach ($Rspatients as $key => $value) {
			$result_patients[++$key] = [$value->day,$value->total_patients];
			}


			//view
				return 
			view('Dashboard.index')
			        ->with('result_patients',json_encode($result_patients));*/
}


$chart_options = [
    'chart_title' => 'Users by months',
    'report_type' => 'group_by_date',
    'model' => 'App\Models\User',
    'group_by_field' => 'created_at',
    'group_by_period' => 'month',
    'chart_type' => 'bar',
];
$chart1 = new LaravelChart($chart_options);

return view('home', compact('chart1'));


@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    <h1>{{ $chart1->options['chart_title'] }}</h1>
                    {!! $chart1->renderHtml() !!}

                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
{!! $chart1->renderChartJsLibrary() !!}
{!! $chart1->renderJs() !!}
@endsection








public function index()
{
    $chart_options = [
        'chart_title' => 'Users by months',
        'report_type' => 'group_by_date',
        'model' => 'App\Models\User',
        'group_by_field' => 'created_at',
        'group_by_period' => 'month',
        'chart_type' => 'bar',
        'filter_field' => 'created_at',
        'filter_days' => 30, // show only last 30 days
    ];

    $chart1 = new LaravelChart($chart_options);


    $chart_options = [
        'chart_title' => 'Users by names',
        'report_type' => 'group_by_string',
        'model' => 'App\Models\User',
        'group_by_field' => 'name',
        'chart_type' => 'pie',
        'filter_field' => 'created_at',
        'filter_period' => 'month', // show users only registered this month
    ];

    $chart2 = new LaravelChart($chart_options);

    $chart_options = [
        'chart_title' => 'Transactions by dates',
        'report_type' => 'group_by_date',
        'model' => 'App\Models\Transaction',
        'group_by_field' => 'transaction_date',
        'group_by_period' => 'day',
        'aggregate_function' => 'sum',
        'aggregate_field' => 'amount',
        'chart_type' => 'line',
    ];

    $chart3 = new LaravelChart($chart_options);

    return view('home', compact('chart1', 'chart2', 'chart3'));
}