
@extends('layouts.app')
@section('title' ,'gallery') 
@section('extraStyle')
    <style>
        .thumbnail img {
            opacity: 1;
            display: block;
            width: 100%;
            height: auto;
            transition: .5s ease;
            backface-visibility: hidden;
            max-height: 300px;
            min-height: 300px;
        }
        .thumbnail .middle {
            transition: .5s ease;
            opacity: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            text-align: center;
        }
        .thumbnail:hover img {
            opacity: 0.3;
        }
        .thumbnail:hover .middle {
            opacity: 1;
        }
        .thumbnail:hover .middle .remove-image {
            color: #ff0000;
        }
    </style>
@endsection
@section('content')
    <section class="container">
        <div class="row">
                        <h3 class="">Images</h3>
                        <div class="col-md-4">
                            <a class="btn btn-info btn-sm" href="{{ URL::route('site.gallery_image') }}"><i class="fa fa-plus-circle"></i> Add New</a>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                @foreach($images as $image)
                                    <div class="col-xs-6 col-md-3 thumbnail">
                                        <img class="img-responsive" src="{{asset('storage/gallery/'.$image->meta_value)}}" alt="image">
                                        <div class="middle">
                                            <form class="myAction" method="POST" action="{{route('site.gallery_image_delete',$image->id)}}" onclick="return confirm('voulez-vous vraiment supprimer ?')">
                                                    {{ method_field('DELETE') }}
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                                        <i class="fa fa-fw fa-trash"></i>Remove Image 
                                                    </button>
                                                </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                        {{ $images->links() }}
        </div>
    </section>

@endsection

