@extends('layouts.app')
@section('title','report kitchen list')
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
                            <a class="btn btn-info btn-sm" href="{{ route('report-kitchen-create') }}"><i class="fa fa-plus-circle"></i> Créer</a>
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
                                <th width="10%">Type</th>
                                <th width="10%">Prix de vente total</th>
                                <th width="10%">Stock Restant</th>
                                <th width="10%">Valeur du stock Restant</th>
                                @if(Auth::user()->role == 'admin')
                                <th width="15%">Action</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($kitchens as $kitchen)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>Le {{ \Carbon\Carbon::parse($kitchen->date)->format('d/m/Y') }}</td>
                                    <td>{{ $kitchen->nom_produit }}</td>
                                    <td> {{ $kitchen->stock_initial }} </td>
                                    <td> {{ $kitchen->total_val_stock_total }} FBU</td>
                                    <td>{{ $kitchen->entree }}</td>
                                    <td> {{ $kitchen->prix_achat_unitaire }} FBU</td>
                                    <td> {{ $kitchen->total_prix_achat_total }} FBU</td>
                                    <td> {{ $kitchen->total_stock_total }}</td>
                                    <td>{{ $kitchen->quantite_sortie }}</td>
                                    <td> {{ $kitchen->prix_vente_unitaire }} FBU</td>
                                    <td> {{ $kitchen->type }} </td>
                                    <td>{{ $kitchen->total_prix_vente_total }} FBU</td>
                                    <td> {{ $kitchen->total_stock_restant }} </td>
                                    <td> {{ $kitchen->prix_val_stock_restant }} FBU</td>
                                    @if(Auth::user()->role == 'admin')
                                    <td>
                                    <div style="display: flex;">
                                        <div class="btn-group">
                                            <a title="Edit" href="{{route('report-kitchen-edit',$kitchen->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>Editer</a>

                                            </a>
                                        </div>
                                        <div class="btn-group">
                                            <form class="myAction" method="POST" action="{{route('report-kitchen-destroy',$kitchen->id)}}" onclick="return confirm('voulez-vous vraiment supprimer?')">
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
                            <!--
                            <tfoot>
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
                                <th style="background: rgb(100,100,100);"></th>
                                <th width="10%">{{$totalGenPrixVenteTotal}}</th>
                                <th width="10%">{{$totalGenStockRestant}}</th>
                                <th width="10%">{{$totalGenPrixValStockRestant}}</th>
                                @if(Auth::user()->role == 'admin')
                                <th style="background: rgb(100,100,100);"></th>
                                @endif
                            </tfoot> -->
                        </table>
                        {{$kitchens->links()}}
                    </div>

                     rapport cuisine par jour
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th width="10%">#</th>
                                <th width="15%">Jour</th>
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
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $rapportGeneralParJour->day }}</td>
                                    <td>{{ $rapportGeneralParJour->month }}</td>
                                    <td>{{ $rapportGeneralParJour->year }}</td>
                                    <td> {{ $rapportGeneralParJour->total_prix_achat }} FBU</td>
                                    <td> {{ $rapportGeneralParJour->total_prix_vente }} FBU</td>
                                    
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
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $rapportGeneral->month }}</td>
                                    <td>{{ $rapportGeneral->year }}</td>
                                    <td> {{ $rapportGeneral->total_prix_achat }} FBU</td>
                                    <td> {{ $rapportGeneral->total_prix_vente }} FBU</td>
                                    
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

