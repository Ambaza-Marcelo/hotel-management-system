@extends('layouts.app')
@section('title','category')
@section('content')
	<div class="container">
		<div style="margin-top: 10px;">        
			      <div class=" col-sm-10">
			        <a href="{{ route('categories.create') }}" class="btn btn-primary">+create</a>
			      </div>
		</div>
		<div class="panel panel-header">
			<h2>Category List</h2>
		</div>
		  <table class="table table-bordered">
		    <thead>
		      <tr>
		        <th>id</th>
		        <th>name</th>
		        <th>Discount Price</th>
				<th>Price</th>
		        <th>Actions</th>
		      </tr>
		    </thead>
		    <tbody>
		      @foreach($categories as $category)     
		      <tr class="success">
		        <td>{{$category->id}}</td>
		        <td>{{$category->name}}</td>
				<td>{{$category->discount_price}} FBU</td>
		        <td>{{$category->price}} FBU</td>
		        <td>
		        	 <div style="display: flex;">
                        <div class="btn-group">
                            <a title="Edit" href="{{route('categories.edit',$category->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>Editer</a>

                            </a>
                        </div>&nbsp;&nbsp;
                        <div class="btn-group">
                            <form class="myAction" method="POST" action="{{route('categories.destroy',$category->id)}}" onclick="return confirm('voulez-vous vraiment supprimer ?')">
                                                {{ method_field('DELETE') }}
                                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                                    <i class="fa fa-fw fa-trash"></i>Supprimer
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
@endsection