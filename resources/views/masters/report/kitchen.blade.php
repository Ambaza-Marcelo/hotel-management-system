@extends('layouts.app')
@section('title','report kitchen list')
@section('content')
    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <div class="box-header">
                        <h3 class="box-title">Rapport Pour Cuisine</h3>
                    </div>
                    <div class="">
                        <table id="products" class="table table-bordered table-striped list_view_table">
                            <thead>
                            <tr class="alert alert-success">
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
                                <th width="10%">Type</th>
                                <th width="10%">Prix de vente total</th>
                                <th width="10%">Stock Restant</th>
                                <th width="10%">Valeur du stock Restant</th>
                                <th width="15%">Utilisateur</th>
                                <th width="15%">Date de creation</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($kitchens as $kitchen)
                                <tr>
                                    <td class="alert alert-warning">{{ $loop->index+1 }}</td>
                                    <td class="alert alert-info">{{ $kitchen->date }}</td>
                                    <td class="alert alert-warning">{{ $kitchen->nom_produit }}</td>
                                    <td class="alert alert-info"> {{ $kitchen->stock_initial }} </td>
                                    <td class="alert alert-warning"> {{ $kitchen->total_val_stock_total }} FBU</td>
                                    <td class="alert alert-info">{{ $kitchen->entree }}</td>
                                    <td class="alert alert-warning"> {{ $kitchen->prix_achat_unitaire }} FBU</td>
                                    <td class="alert alert-info"> {{ $kitchen->total_prix_achat_total }} FBU</td>
                                    <td class="alert alert-warning"> {{ $kitchen->total_stock_total }}</td>
                                    <td class="alert alert-info">{{ $kitchen->quantite_sortie }}</td>
                                    <td class="alert alert-warning"> {{ $kitchen->prix_vente_unitaire }} FBU</td>
                                    <td class="alert alert-info"> {{ $kitchen->type }} </td>
                                    <td class="alert alert-warning">{{ $kitchen->total_prix_vente_total }} FBU</td>
                                    <td class="alert alert-info"> {{ $kitchen->total_stock_restant }} </td>
                                    <td class="alert alert-warning"> {{ $kitchen->prix_val_stock_restant }} FBU</td>
                                    <td class="alert alert-info"> {{ $kitchen->utilisateur }} </td>
                                    <td class="alert alert-warning"> {{ $kitchen->created_at }} FBU</td>
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
                                <th style="background: rgb(100,100,100);"></th>
                                <th width="10%">{{$totalGenPrixVenteTotal}} FBU</th>
                                <th width="10%">{{$totalGenStockRestant}}</th>
                                <th width="10%">{{$totalGenPrixValStockRestant}} FBU</th>
                                <th style="background: rgb(100,100,100);"></th>
                                <th style="background: rgb(100,100,100);"></th>
                            </tr>
                            </tfoot> -->
                        </table>
                    </div>
                    <div class="">
                        rapport cuisine par jour
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th width="10%">#</th>
                                <th width="10%">Jour</th>
                                <th width="15%">Mois</th>
                                <th width="10%">Annee</th>
                                <th width="10%">T.P.A</th>
                                <th width="10%">T.P.V</th>
                                <th width="10%">Benefice</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rapportGeneralParJours as $rapportGeneralParJour)
                                <tr>
                                    <td class="alert alert-warning">{{ $loop->index+1 }}</td>
                                    <td class="alert alert-danger">{{$rapportGeneralParJour->day}}</td>
                                    <td class="alert alert-info">{{ $rapportGeneralParJour->month }}</td>
                                    <td class="alert alert-warning">{{ $rapportGeneralParJour->year }}</td>
                                    <td class="alert alert-info"> {{ $rapportGeneralParJour->total_prix_achat }} FBU </td>
                                    <td class="alert alert-warning"> {{ $rapportGeneralParJour->total_prix_vente }} FBU </td>
                                    
                                    <?php
                                            $benefice = $rapportGeneralParJour->total_prix_vente - $rapportGeneralParJour->total_prix_achat;
                                    ?>
                                    @if($benefice > 0)
                                    <td class="alert alert-success">{{$benefice}} FBU</td>
                                    @else
                                    <td class="alert alert-danger">{{$benefice}} FBU</td>
                                    @endif
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        {{$rapportGeneralParJours->links()}}

                    <div class="">
                        rapport cuisine par mois
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th width="10%">#</th>
                                <th width="15%">Mois</th>
                                <th width="10%">Annee</th>
                                <th width="10%">T.P.A</th>
                                <th width="10%">T.P.V</th>
                                <th width="10%">Benefice</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rapportGeneralParMois as $rapportGeneral)
                                <tr>
                                    <td class="alert alert-warning">{{ $loop->index+1 }}</td>
                                    <td class="alert alert-danger">{{ $rapportGeneral->month }}</td>
                                    <td class="alert alert-warning">{{ $rapportGeneral->year }}</td>
                                    <td class="alert alert-info"> {{ $rapportGeneral->total_prix_achat }} FBU </td>
                                    <td class="alert alert-warning"> {{ $rapportGeneral->total_prix_vente }} FBU </td>
                                    
                                    <?php
                                            $benefice = $rapportGeneral->total_prix_vente - $rapportGeneral->total_prix_achat;
                                    ?>
                                    @if($benefice > 0)
                                    <td class="alert alert-success">{{$benefice}} FBU</td>
                                    @else
                                    <td class="alert alert-danger">{{$benefice}} FBU</td>
                                    @endif
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

