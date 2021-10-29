@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="page-panel-title">@lang('Tableau de bord')</div>

                <div class="panel-body">
                    <a class="btn btn-primary btn-lg btn-block" href="{{ route('hotels.index') }}" role="button">
                        @lang('Musumba hill\'s Hotel')
                    </a>
                </div>
            </div>
        </div>
    </div>
         <div class="row">
            <div style="display: flex;">
                <div class="col-md-8">
                    <a href="{{ url('master/report/bar') }}">
                    <div class="thumbnail">
                        <img src="{{ asset('images/undraw_beer.svg') }}"
                            class="img-responsive mauto" style="height: 250px; width: 450px;" alt=""/>
                    </div></a>
                    <p>Musumba hill's,Rapport pour les boissons</p>
                </div>
                <div class="col-md-8">
                    <a href="{{ url('master/report/kitchen') }}">
                    <div class="thumbnail">
                        <img src="{{ asset('images/undraw_pizza.svg') }}"
                            class="img-responsive mauto" style="height: 250px; width: 450px;" alt=""/>
                    </div></a>
                    <p>Musumba hill's ,Rapport pour la cuisine</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div style="display: flex;">
                <div class="col-md-8">
                    <a href="">
                    <div class="thumbnail">
                        <img src="{{ asset('cliparts/3333.jpg') }}"
                            class="img-responsive mauto" style="height: 250px; width: 450px;" alt=""/>
                    </div></a>
                    <p>Maravilla,Rapport pour les chambres</p>
                </div>
                <div class="col-md-8">
                    <a href="{{ url('master/report/expense') }}">
                    <div class="thumbnail">
                        <img src="{{ asset('cliparts/1111.jpg') }}"
                            class="img-responsive mauto" style="height: 250px; width: 450px;" alt=""/>
                    </div></a>
                    <p>Maravilla,Rapport des dépenses</p>
                </div>
            </div>
        </div>
</div>
</div>
@endsection
