
@extends('layouts.app')
@section('title','Contact Us')
@section('content')
    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <form  id="contactUsForm" action="{{URL::Route('site.contact_us')}}" method="post" enctype="multipart/form-data">
                        <div class="">
                            @csrf
                            <div class="form-group">
                                <label for="address">Address<span class="text-danger"></span></label>
                                <textarea autofocus name="address" class="form-control" required maxlength="500" required>@if($address){{ $address->meta_value }}@endif</textarea>
                                <span class="glyphicon glyphicon-info form-control-feedback"></span>
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="phone_no">Phone/Mobile number<span class="text-danger">*</span></label>
                                <input type="text" name="phone_no" class="form-control" placeholder="+25762785400" value="@if($phone){{ $phone->meta_value }}@endif" maxlength="255" required />
                                <span class="glyphicon glyphicon-info form-control-feedback"></span>
                                <span class="text-danger">{{ $errors->first('phone_no') }}</span>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="email">Email<span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" placeholder="ccontact@ambazamarcellin.com" value="@if($email){{ $email->meta_value }}@endif" maxlength="255" required />
                                <span class="glyphicon glyphicon-info form-control-feedback"></span>
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="latlong">Location(latitude and longitude)<span class="text-danger">*</span></label>
                                <input type="text" name="latlong" class="form-control" placeholder="23.7340076,90.3841824" value="@if($latlong){{ $latlong->meta_value }}@endif" maxlength="255" required />
                                <span class="glyphicon glyphicon-info form-control-feedback"></span>
                                <span class="text-danger">{{ $errors->first('latlong') }}</span>
                            </div>


                        </div>                     
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right"><i class="fa fa-check-circle"></i> Save</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection


