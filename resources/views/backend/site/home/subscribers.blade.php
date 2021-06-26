
@extends('layouts.app')
@section('title','subscribers')
@section('content')
    <section class="container">
        <div class="row">
            <div class="col-md-12">
                    <div class="">
                        <table id="Subscribers" class="table table-bordered table-striped list_view_table">
                            <thead>
                            <tr>
                                <th width="60%">Email</th>
                                <th width="40%">Subscribe At</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subscribers as $sub)
                                <tr>
                                    <td>{{ $sub->meta_value }}</td>
                                    <td> {{ $sub->created_at->format('j M, Y h:m:s a') }}</td>

                                </tr>
                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th width="60%">Email</th>
                                <th width="40%">Subscribe At</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
@endsection
<!-- END PAGE CONTENT-->

<!-- BEGIN PAGE JS-->
@section('extraScript')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#Subscribers').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': true,
                'ordering': true,
                'info': true,
                'autoWidth': false
            });
        });
    </script>
@endsection
<!-- END PAGE JS-->
