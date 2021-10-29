@extends('layouts.app')
@section('title','expense')
@section('content')
	<div class="container">
		<div style="margin-top: 10px;">        
			      <div class=" col-sm-10">
			        <a href="{{ route('expenses.create') }}" class="btn btn-info">+Creer</a>
			      </div>
		</div>
		<br>
		<div class="panel panel-header">
			Les depenses
		</div>
		  <table class="table table-bordered">
		    <thead>
		      <tr>
		        <th>id</th>
		        <th>Date</th>
		        <th>Description</th>
		        <th>Montant</th>
		        @if(Auth::user()->role == 'admin')
		        <th>Actions</th>
		        @endif
		      </tr>
		    </thead>
		    <tbody>
		      @foreach($expenses as $expense)     
		      <tr class="success">
		        <td>{{$expense->id}}</td>
		        <td>Le {{ \Carbon\Carbon::parse($expense->date)->format('d/m/Y') }}</td>
		        <td>{{$expense->title}}</td>
		        <td>{{$expense->total}} Fbu</td>
		        @if(Auth::user()->role == 'admin')
		        <td>
		        	<div style="display: flex;">
                        <div class="btn-group">
                            <a title="Edit" href="{{ route('expenses.edit',$expense->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>Editer</a>

                            </a>
                        </div>
                        <div class="btn-group">
                            <form class="myAction" method="POST" action="{{ route('expenses.destroy',$expense->id) }}" onclick="return confirm('voulez-vous vraiment supprimer?')">
                                                {{ method_field('DELETE') }}
                                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                    <i class="fa fa-fw fa-trash"></i>Supprimer
                                </button>
                            </form>
                        </div>
                    </div>
		        </td>
		        @endif
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
		      </tr>
		    </thead>
		    <tbody>
		      @foreach($expenseParJours as $expenseParJour)     
		      <tr>
		        <td class="alert alert-danger">Le {{$expenseParJour->day}}/{{$expenseParJour->month}}/{{$expenseParJour->year}}</td>
		        <td class="alert alert-warning">{{$expenseParJour->total_expense}} Fbu</td>
		      </tr>
		      @endforeach
		    </tbody>
		  </table>
		  {{$expenseParJours->links()}}
		  liste des depenses par mois
		  <table class="table table-bordered">
		    <thead>
		      <tr>
		        <th>#</th>
		        <th>Mois</th>
		        <th>Annee</th>
		        <th>Montant</th>
		      </tr>
		    </thead>
		    <tbody>
		      @foreach($expenseParMois as $expense)     
		      <tr>
		        <td class="alert alert-warning">{{$loop->index+1}}</td>
		        <td class="alert alert-danger">{{$expense->month}}</td>
		        <td class="alert alert-info">{{$expense->year}}</td>
		        <td class="alert alert-warning">{{$expense->total_expense}} Fbu</td>
		      </tr>
		      @endforeach
		    </tbody>
		  </table>
		  {{$expenseParMois->links()}}
	</div>
	
@endsection