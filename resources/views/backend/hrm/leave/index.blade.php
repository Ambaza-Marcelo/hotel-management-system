@extends('layouts.app')
@section('title','employee list')
@section('content')
	<section class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header border">
                        <div class="box-tools">
                            <a class="btn btn-info btn-sm" href="{{ route('leaves.create') }}">Create</a>
                        </div>
                    </div>
                 <form action="" method="POST">
                        <div class="table-responsive">
                            <table id="listDataTableWithSearch" class="table table-bordered table-striped list_view_table display responsive no-wrap" width="100%">
                                <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="25%">Employee</th>
                                    <th width="10%">Type</th>
                                    <th width="10%">Leave Date Start</th>
                                    <th width="10%">Leave Date End</th>
                                    <th class="notexport" width="5%">Document</th>
                                    <th width="20%">Note</th>
                                    <th width="5%">Status</th>
                                    <th class="notexport" width="20%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($leaves as $leave)
                                    <tr>
                                        <td>
                                            {{$loop->iteration}}
                                        </td>
                                        @foreach($employees as $employee)
                                        <td>{{ $employee }}</td>
                                        @endforeach
                                        <td>{{ $leave->leave_type }}</td>
                                        <td>{{ $leave->leave_date_start}}</td>
                                        <td>{{ $leave->leave_date_end}}</td>
                                        <td>
                                            @if($leave->document)
                                                <a target="_blank" href="{{asset('storage/leave/'.$leave->document)}}" class="btn btn-link"> <i class="fa fa-2x fa-download"></i></a>
                                            @endif
                                        </td>
                                        <td>{{ $leave->description }}</td>
                                        <td>
                                            @if($leave->status ==1)
                                                <span class="badge bg-yellow">Pending</span>
                                            @elseif($leave->status == 2)
                                                <span class="badge bg-green">Approved</span>
                                            @else
                                                <span class="badge bg-red">Rejected</span>
                                            @endif
                                        </td>
                                        <td>
                                            <!-- todo: have problem in mobile device -->
                                            @if($leave->status == 1)
                                            <div style="display: flex;">
                                                <div class="btn-group">
                                                    <form  class="" method="POST" action="{{route('leaves.update',$leave->id)}}">
                                                        @csrf
                                                        {{ method_field('PATCH') }}
                                                        <input type="hidden" name="status" value="2">
                                                        <input type="hidden" name="update_status" value="1">
                                                        <button type="submit" class="btn btn-success btn-sm" title="Approve">
                                                            Approve
                                                        </button>
                                                    </form>
                                                </div>
                                                <div class="btn-group">
                                                    <form  class="" method="POST" action="{{route('leaves.update',$leave->id)}}">
                                                        @csrf
                                                        {{ method_field('PATCH') }}
                                                        <input type="hidden" name="status" value="3">
                                                        <input type="hidden" name="update_status" value="1">
                                                        <button type="submit" class="btn btn-danger btn-sm" title="Reject">
                                                            Reject
                                                        </button>
                                                    </form>
                                                </div>
                                                <div class="btn-group">
                                                    <a title="Edit"  href="{{route('leaves.edit',$leave->id)}}"  class="btn btn-primary btn-sm">Edit
                                                    </a>
                                                </div>
                                            @endif
                                            <div class="btn-group">
                                                <form  class="myAction" method="POST" action="{{route('leaves.destroy',$leave->id)}}">
                                                    @csrf
                                                    {{ method_field('delete') }}
                                                    <input type="hidden" name="hiddenId" value="{{$leave->id}}">
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
      </section>
@endsection