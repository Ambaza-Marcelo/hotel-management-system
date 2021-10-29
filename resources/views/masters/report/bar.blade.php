@extends('layouts.app')
@section('title','report bar list')
@section('content')
    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <div class="box-header">
                        <h3 class="box-title">Rapport Pour Bar</h3>
                    </div>
                    <div class="">
                        <table id="products" class="table table-bordered table-striped list_view_table">
                            <thead>
                            <tr class="alert alert-success">
                                <th width="3%">#</th>
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
                                <th width="15%">Enregistré par</th>
                                <th width="15%">Date heure de creation</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reports as $report)
                                <tr>
                                    <td class="alert alert-warning">{{ $loop->index+1 }}</td>
                                    <td class="alert alert-info">Le {{ \Carbon\Carbon::parse($report->date)->format('d/m/Y') }}</td>
                                    <td class="alert alert-warning">{{ $report->nom_produit }}</td>
                                    <td class="alert alert-info"> {{ $report->stock_initial }} </td>
                                    <td class="alert alert-warning"> {{ $report->total_val_stock_total }} FBU</td>
                                    <td class="alert alert-info">{{ $report->entree }}</td>
                                    <td class="alert alert-warning"> {{ $report->prix_achat_unitaire }} FBU</td>
                                    <td class="alert alert-info"> {{ $report->total_prix_achat_total }} FBU</td>
                                    <td class="alert alert-warning"> {{ $report->total_stock_total }}</td>
                                    <td class="alert alert-info">{{ $report->quantite_sortie }}</td>
                                    <td class="alert alert-warning"> {{ $report->prix_vente_unitaire }} FBU</td>
                                    <td class="alert alert-info">{{ $report->total_prix_vente_total }} FBU</td>
                                    <td class="alert alert-warning"> {{ $report->total_stock_restant }} </td>
                                    <td class="alert alert-info"> {{ $report->prix_val_stock_restant }} FBU</td> 
                                    <td class="alert alert-warning"> {{ $report->utilisateur }} </td> 
                                    <td class="alert alert-info">Le {{ \Carbon\Carbon::parse($report->created_at)->format('d/m/Y') }}</td> 
                                </tr>
                            @endforeach
                            </tbody>
                            <!--
                            <tfoot>
                            <tr class="alert alert-success">
                                <th width="10%">Total</th>
                                <th width="15%" style="background: rgb(100,100,100);"></th>
                                <th width="10%" style="background: rgb(100,100,100);"></th>
                                <th width="10%">{{$totalGenStockInitial}}</th>
                                <th width="10%">{{$totalGenValStockTotal}} FBU</th>
                                <th width="10%">{{$totalGenQuantiteEntree}}</th>
                                <th width="10%">{{$totalGenPrixAchatUnitaire}} FBU</th>
                                <th width="10%">{{$totalGenPrixAchatTotal}} FBU</th>
                                <th width="10%">{{$totalGenStockTotal}}</th>
                                <th width="10%">{{$totalGenQuantiteSortie}}</th>
                                <th width="10%">{{$totalGenPrixVenteUnitaire}} FBU</th>
                                <th width="10%">{{$totalGenPrixVenteTotal}} FBU</th>
                                <th width="10%">{{$totalGenStockRestant}}</th>
                                <th width="10%">{{$totalGenPrixValStockRestant}} FBU</th>
                                <th style="background: rgb(100,100,100);"></th>
                                <th style="background: rgb(100,100,100);"></th>
                            </tr>
                            </tfoot> -->
                        </table>
                        {{$reports->links()}}
                    </div>

                    <div class="">
                        rapport des boissons par jour
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th width="15%">Date</th>
                                <th width="10%">V.T.S.R</th>
                                <th width="10%">T.P.A</th>
                                <th width="10%">T.P.V</th>
                                <th width="10%">Depense Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rapportGeneralParJours as $rapportGeneralParJour)
                                
                                <tr>
                                    <td class="alert alert-danger">Le {{ $rapportGeneralParJour->day }}/{{ $rapportGeneralParJour->month }}/{{ $rapportGeneralParJour->year }}</td>
                                    <td class="alert alert-warning">{{ $rapportGeneralParJour->stock_initial }} FBU</td>
                                    <td class="alert alert-info"> {{ $rapportGeneralParJour->total_prix_achat }} FBU</td>
                                    <td class="alert alert-warning"> {{ $rapportGeneralParJour->total_prix_vente }} FBU </td>
                                    @foreach($expenseParJours as $expenseParJour)
                                        @if($rapportGeneralParJour->day == $expenseParJour->day && $rapportGeneralParJour->month == $expenseParJour->month && $rapportGeneralParJour->year == $expenseParJour->year)
                                      
                                    <td class="alert alert-info">{{$expenseParJour->total_expense}} FBU</td>
                                    @endif
                                    @endforeach
                                </tr>
                                
                            @endforeach

                            </tbody>
                        </table>
                        {{$rapportGeneralParJours->links()}}
                    
                </div>

                    <div class="">
                        rapport des boissons par mois
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th width="15%">Mois</th>
                                <th width="10%">Annee</th>
                                <th width="10%">T.V.S.R</th>
                                <th width="10%">T.P.A</th>
                                <th width="10%">T.P.V</th>
                                <th width="10%">Depense Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rapportGeneralParMois as $rapportGeneral)
                               
                                <tr>
                                    <td class="alert alert-danger">{{ $rapportGeneral->month }}</td>
                                    <td class="alert alert-warning">{{ $rapportGeneral->year }}</td>
                                    
                                    <td class="alert alert-warning">{{ $rapportGeneral->prix_val_stock_restant }}</td>
                                    <td class="alert alert-info"> {{ $rapportGeneral->total_prix_achat }} FBU</td>
                                    <td class="alert alert-warning"> {{ $rapportGeneral->total_prix_vente }} FBU </td>
                                    @foreach($expenseParMois as $expense)
                                        @if($rapportGeneral->month == $expense->month && $rapportGeneral->year == $expense->year)
                                      
                                    <td class="alert alert-info">{{$expense->total_expense}} FBU</td>
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

