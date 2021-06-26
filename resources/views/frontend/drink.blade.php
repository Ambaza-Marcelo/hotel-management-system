@extends('layouts.app')
@section('title','Drink')
@section('content')
<div class="container-fluid">
    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <div class="box-header">
                        <h3 class="box-title">All Drinks</h3>
                    </div>
                    <div class="">
                        <table id="drinks" class="table table-bordered table-striped list_view_table">
                            <thead>
                            <tr>
                                <th width="50%">Image</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($drinks as $drink)
                                <tr>
                                    <td>
                                        <img class="img-responsive" style="max-height: 200px;" src="{{ asset('storage/drinks')}}/{{ $drink->image }}" alt=""><br>
                                        <a href="" class="btn btn-danger">Book Now</a>
                                    </td> 
                                    <td>
                                        <p>Title : {{ $drink->title }}</p>
                                        <p>Type : {{ $drink->type }}</p>
                                        <p>Description : {{ $drink->description }}</p>
                                        <p>Old Price : {{ $drink->old_price }}</p>
                                        <p>New Price : {{ $drink->new_price }}</p>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
@endsection

