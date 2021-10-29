
@extends('layouts.app')
@section('title','FAQ')
@section('content')
    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                        <div class="form-group">
                            <form  id="faqForm" action="{{URL::Route('site.faq')}}" method="post" enctype="multipart/form-data">

                            @csrf
                            <div class="form-group has-feedback">
                                <label for="question">Question<span class="text-danger"></span></label>
                                <input type="text" name="question" class="form-control" placeholder="type your question" value="{{old('question')}}" maxlength="255" required />
                                <span class="glyphicon glyphicon-info form-control-feedback"></span>
                                <span class="text-danger">{{ $errors->first('question') }}</span>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="answer">Answer<span class="text-danger"></span></label>
                                <textarea  name="answer" class="form-control textarea" required minlength="5" >{{ old('answer') }}</textarea>
                                <span class="glyphicon glyphicon-info form-control-feedback"></span>
                                <span class="text-danger">{{ $errors->first('answer') }}</span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-info"><i class="fa fa-check-circle"></i> Save</button>

                            </div>
                            <hr>
                    </form>
                            <table id="faqList" class="table table-bordered table-striped list_view_table">
                                <thead>
                                <tr>
                                    <th width="30%">Question</th>
                                    <th width="60%">Answer</th>
                                    <th width="10%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($faqs as $faq)
                                    @php
                                     $qa = json_decode($faq->meta_value);
                                    @endphp
                                    <tr>

                                        <td>{{ $qa->q }}</td>
                                        <td> {!! $qa->a !!}</td>
                                        <td>
                                            <div class="btn-group">
                                                <form class="myAction" method="POST" action="{{URL::route('site.faq_delete',$faq->id)}}" onclick="return confirm('voulez-vous vraiment supprimer ?')">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                                        <i class="fa fa-fw fa-trash"></i>Delete
                                                    </button>
                                                </form>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th width="30%">Qustion</th>
                                    <th width="60%">Answer</th>
                                    <th width="10%">Action</th>
                                </tr>
                                </tfoot>
                            </table>
                            {{ $faqs->links() }}

                        </div>

                </div>
            </div>
        </div>
    </section>
@endsection


