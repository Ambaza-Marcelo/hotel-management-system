@extends('layouts.app')
@section('title','master expenses report')
@section('content')
	<div class="container">
		<br>
		<div class="panel panel-header">
			Les dépenses
		</div>
		  <table class="table table-bordered">
		    <thead>
		      <tr>
		        <th>#</th>
		        <th>Date</th>
		        <th>Description</th>
		        <th>Montant</th>
		        <th>Date de création</th>
		      </tr>
		    </thead>
		    <tbody>
		      @foreach($expenses as $expense)     
		      <tr class="success">
		        <td>{{$loop->index +1}}</td>
		        <td>Le {{ \Carbon\Carbon::parse($expense->date)->format('d/m/Y') }}</td>
		        <td>{{$expense->title}}</td>
		        <td>{{$expense->total}} Fbu</td>
		        <td>Le {{ \Carbon\Carbon::parse($expense->created_at)->format('d/m/Y') }}</td>
		      </tr>
		      @endforeach
		    </tbody>
		  </table>
		  {{$expenses->links()}}
		  liste des depenses par jour
		  <table class="table table-bordered">
		    <thead>
		      <tr>
		        <th>Date</th>
		        <th>Montant</th>
		        <th>Date de création</th>
		      </tr>
		    </thead>
		    <tbody>
		      @foreach($expenseParJours as $expenseParJour)     
		      <tr>
		        <td class="alert alert-danger"> Le {{$expenseParJour->day}}/{{$expenseParJour->month}}/{{$expenseParJour->year}}</td>
		        <td class="alert alert-warning">{{$expenseParJour->total_expense}} Fbu</td>
		        <td class="alert alert-info">Le {{ \Carbon\Carbon::parse($expenseParJour->created_at)->format('d/m/Y') }}</td>
		      </tr>
		      @endforeach
		    </tbody>
		  </table>
		  {{$expenseParJours->links()}}
		  liste des depenses par mois
		  <table class="table table-bordered">
		    <thead>
		      <tr>
		        <th>Mois</th>
		        <th>Annee</th>
		        <th>Montant</th>
		        <th>date de creation</th>
		      </tr>
		    </thead>
		    <tbody>
		      @foreach($expenseParMois as $expense)     
		      <tr>
		        <td class="alert alert-danger">{{$expense->month}}</td>
		        <td class="alert alert-info">{{$expense->year}}</td>
		        <td class="alert alert-warning">{{$expense->total_expense}} Fbu</td>
		        <td class="alert alert-info">Le {{ \Carbon\Carbon::parse($expense->created_at)->format('d/m/Y') }}</td>
		      </tr>
		      @endforeach
		    </tbody>
		  </table>
		  {{$expenseParMois->links()}}
	</div>
	
@endsection