@extends('layouts.app')
@section('title','report bar list')
@section('content')
    <section class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
         @endif
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <div class="box-header">
                        <h3 class="box-title">Rapport</h3>
                        <div class="">
                            <a class="btn btn-info btn-sm" href="{{ route('report-bar-create') }}"><i class="fa fa-plus-circle"></i> Créer</a>&nbsp;&nbsp;<a class="btn btn-success btn-sm" href="{{ url('report-create-pdf') }}"><i class="fa fa-plus-circle"></i> Exporter En PDF</a>
                        </div>
                        <br>
                    </div>
                    <div class="">
                        <table id="products" class="table table-bordered table-striped list_view_table">
                            <thead>
                            <tr>
                                <th width="10%">#</th>
                                <th width="15%">Date</th>
                                <th width="10%">Nom du produit</th>
                                <th width="10%">Stock Initial</th>
                                <th width="10%">valeur du stcok initial</th>
                                <th width="10%">Entree</th>
                                <th width="10%">Prix d'achat unitaire</th>
                                <th width="10%">Prix d'achat total</th>
                                <th width="10%">Stock Total</th>
                                <th width="10%">Sortie</th>
                                <th width="10%">Prix de vente unitaire</th>
                                <th width="10%">Prix de vente total</th>
                                <th width="10%">Stock Restant</th>
                                <th width="10%">Valeur du stock Restant</th>
                                @if(Auth::user()->role == 'admin')
                                <th width="15%">Action</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reports as $report)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>Le {{ \Carbon\Carbon::parse($report->date)->format('d/m/Y') }}</td>
                                    <td>{{ $report->nom_produit }}</td>
                                    <td> {{ $report->stock_initial }} </td>
                                    <td> {{ number_format($report->total_val_stock_total,0,',','.') }} FBU</td>
                                    <td>{{ $report->entree }}</td>
                                    <td> {{ number_format($report->prix_achat_unitaire,0,',','.') }} FBU</td>
                                    <td> {{ number_format($report->total_prix_achat_total,0,',','.') }} FBU</td>
                                    <td> {{ $report->total_stock_total }}</td>
                                    <td>{{ $report->quantite_sortie }}</td>
                                    <td> {{ number_format($report->prix_vente_unitaire,0,',','.') }} FBU</td>
                                    <td>{{ number_format($report->total_prix_vente_total,0,',','.') }} FBU</td>
                                    <td> {{ $report->total_stock_restant }} </td>
                                    <td> {{ number_format($report->prix_val_stock_restant,0,',','.') }} FBU</td>
                                    @if(Auth::user()->role == 'admin')
                                    <td>
                                    <div style="display: flex;">
                                        <div class="btn-group">
                                            <a title="Edit" href="{{route('report-bar-edit',$report->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>Editer</a>

                                            </a>
                                        </div>
                                        <div class="btn-group">
                                            <form class="myAction" method="POST" action="{{route('report-bar-destroy',$report->id)}}" onclick="return confirm('voulez-vous vraiment supprimer ?')">
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
                            <!--<tfoot>
                                <th width="10%">Total</th>
                                <th width="15%" style="background: rgb(100,100,100);"></th>
                                <th width="10%" style="background: rgb(100,100,100);"></th>
                                <th width="10%">{{$totalGenStockInitial}}</th>
                                <th width="10%">{{$totalGenValStockTotal}}</th>
                                <th width="10%">{{$totalGenQuantiteEntree}}</th>
                                <th width="10%">{{$totalGenPrixAchatUnitaire}}</th>
                                <th width="10%">{{$totalGenPrixAchatTotal}}</th>
                                <th width="10%">{{$totalGenStockTotal}}</th>
                                <th width="10%">{{$totalGenQuantiteSortie}}</th>
                                <th width="10%">{{$totalGenPrixVenteUnitaire}}</th>
                                <th width="10%">{{$totalGenPrixVenteTotal}}</th>
                                <th width="10%">{{$totalGenStockRestant}}</th>
                                <th width="10%">{{$totalGenPrixValStockRestant}}</th>
                                @if(Auth::user()->role == 'admin')
                                <th style="background: rgb(100,100,100);"></th>
                                @endif
                            </tfoot> -->
                        </table>
                        {{$reports->links()}}
                    </div>




                    <div class="">
                        rapport des boissons par jour
                        <div class="">
                            <a class="btn btn-success btn-sm" href="{{ url('report-day-create-pdf') }}"><i class="fa fa-plus-circle"></i> Exporter En PDF</a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th width="10%">Date</th>
                                <th width="10%">T.P.A</th>
                                <th width="10%">T.P.V</th>
                                <th width="10%">Depense Total</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rapportGeneralParJours as $rapportGeneralParJour)
                                <tr>
                                    <td>Le {{ $rapportGeneralParJour->day }}/{{ $rapportGeneralParJour->month }}/{{ $rapportGeneralParJour->year }}</td>
                                    <td> {{ number_format($rapportGeneralParJour->total_prix_achat,0,',','.') }} FBU</td>
                                    <td> {{ number_format($rapportGeneralParJour->total_prix_vente,0,',','.') }} FBU</td>
                                    
                                   
                                    @foreach($expenseParJours as $expenseParJour)
                                    
                                    @if ($rapportGeneralParJour->day == $expenseParJour->day && $rapportGeneralParJour->month == $expenseParJour->month && $rapportGeneralParJour->year == $expenseParJour->year)
                                    
                                    <td class="alert alert-warning">{{number_format($expenseParJour->total_expense,0,',','.')}} FBU</td>
                                    @endif
                                    
                                @endforeach
                                    
                                </tr>
                                
                            @endforeach

                            </tbody>
                        </table>
                        {{$rapportGeneralParJours->links()}}
                </div>

                    <div class="">
                            <a class="btn btn-success btn-sm" href="{{ url('report-month-create-pdf') }}"><i class="fa fa-plus-circle"></i> Exporter En PDF</a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th width="15%">Mois</th>
                                <th width="10%">Annee</th>
                                <th width="10%">T.P.A</th>
                                <th width="10%">T.P.V</th>
                                <th width="10%">Depense Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rapportGeneralParMois as $rapportGeneral)
                                
                                <tr>
                                    <td>{{ $rapportGeneral->month }}</td>
                                    <td>{{ $rapportGeneral->year }}</td>
                                    <td> {{ number_format($rapportGeneral->total_prix_achat,0,',','.') }} FBU</td>
                                    <td> {{ number_format($rapportGeneral->total_prix_vente,0,',','.') }} FBU</td>
                                   
                                   @foreach($expenseParMois as $expense)
                                        @if($rapportGeneral->month == $expense->month && $rapportGeneral->year == $expense->year)
                                      
                                        <td class="alert alert-warning">{{number_format($expense->total_expense,0,',','.')}} FBU</td>
                                        @endif
                                    @endforeach  
                                    
                                </tr>
                                
                            @endforeach

                            </tbody>
                        </table>
                        {{$rapportGeneralParMois->links()}}
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
@endsection

