@extends('layouts.app')
@section('title','point key')
@section('content')
	<div class="container">
		<div style="margin-top: 10px;">        
			      <div class=" col-sm-10">
			        <a href="{{ route('point-keys.create') }}" class="btn btn-primary">+create</a>
			      </div>
		</div>
		<div class="panel panel-header">
			<h2>point key List</h2>
		</div>
		  <table class="table table-bordered">
		    <thead>
		      <tr>
		        <th>#</th>
		        <th>title</th>
		        <th>description</th>
		        <th>Actions</th>
		      </tr>
		    </thead>
		    <tbody>
		      @foreach($pointkeys as $pointKey)     
		      <tr class="success">
		        <td>{{$loop-> index +1}}</td>
		        <td>{{$pointKey->title}}</td>
		        <td>{{$pointKey->description}}</td>
		        <td>
		        	<div style="display: flex;">
                        <div class="btn-group">
                            <a title="Edit" href="{{route('point-keys.edit',$pointKey->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>Edit</a>

                            </a>
                        </div>&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="btn-group">
                            <form class="myAction" method="POST" action="{{route('point-keys.destroy',$pointKey->id)}}" onclick="return confirm('voulez-vous vraiment supprimer ?')">
                                                    {{ method_field('DELETE') }}
                                                    @csrf
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                                        <i class="fa fa-fw fa-trash"></i>Delete
                                </button>
                            </form>
                        </div>
                    </div>
		        </td>
		      </tr>
		      @endforeach
		    </tbody>
		  </table>
		  {{$pointkeys->links()}}
	</div>
@endsection