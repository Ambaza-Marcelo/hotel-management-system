@extends('layouts.app')
@section('title','create leave')
@section('content')
<div class="container-fluid">
<div class="container">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form novalidate id="entryForm" action="{{route('leaves.store')}}" method="post" enctype="multipart/form-data">
                    	{{csrf_field()}}
                        <div class="box-header">
                            <div class="callout callout-danger">
                                <p><b>Note:</b> Create a employee before create new leave.</p>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                @if(!$leave)
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                    	<label for="employee_id">Employee<span class="text-danger"></span></label>
                                            <select id="employee_id" class="form-control" name="employee_id">
                                          	@foreach($employees as $employee)
                                                <option value="1">{{$employee}}</option>
                                            @endforeach
                                            </select>
                                        <span class="form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('employee_id') }}</span>
                                    </div>
                                </div>
                                @endif
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                    	<label for="leave_type">Leave Type<span class="text-danger"></span></label>
                                            <select id="leave_type" class="form-control" name="leave_type">    
                                                <option value="1">Casual Leave</option>
                                                <option value="2">Sick Leave</option>
                                                <option value="3">Undefined Leave</option>
                                                <option value="4">Maternity Leave</option>
                                                <option value="5">Special Leave</option>
                                            </select>
                                        <span class="form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('leave_type') }}</span>
                                    </div>
                                </div>
                                <div class=" @if(!$leave)col-md-2 @else col-md-4 @endif">
                                    <div class="form-group has-feedback">
                                        <label for="leave_date">Leave Date @if(!$leave)Start @endif<span class="text-danger"></span></label>
                                        <input type='date' class="form-control date_picker" name="leave_date" placeholder="date"minlength="10" maxlength="10" />
                                        <span class="fa fa-calendar form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('leave_date') }}</span>
                                    </div>
                                </div>
                                    @if(!$leave)
                                    <div class="col-md-2">
                                    <div class="form-group has-feedback">
                                        <label for="leave_date_end">Leave Date end</label>
                                        <input type='date' class="form-control date_picker_with_clear"name="leave_date_end" value="" minlength="10" maxlength="10" />
                                        <span class="fa fa-calendar form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('leave_date_end') }}</span>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="document">Document <span class="text-black"></span></label>
                                        <input  type="file" class="form-control" accept=".jpeg, .jpg, .png, .pdf, .doc, .docx, .txt" name="document" placeholder="Leave paper">
                                        <span class="glyphicon glyphicon-open-file form-control-feedback" style="top:25px;"></span>
                                        <span class="text-danger">{{ $errors->first('document') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-feedback">
                                        <label for="description">Description</label>
                                        <textarea name="description" class="form-control"  maxlength="500"></textarea>
                                        <span class="fa fa-location-arrow form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('description') }}</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right">Save</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
</div>
@endsection