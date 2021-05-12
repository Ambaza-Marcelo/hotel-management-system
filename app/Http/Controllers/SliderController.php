<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    //
    public function create(){
    	return view('slider.create');
    }

    public function Sliderstore(Request $request){
    	$this->validate($request,[
    		'title'=>'required',
    		'image'=>'required|image|mimes:png,jpg,jpeg,gif,svg'
    	]);

    	$image = $request->file('image');
    	$input['slidername']=time().'.'.$image->extension();
    	$destinationPath = public_path('/thumbnail');
    	$img=Image::make($image->path());
    	$img->resize(100,100,function($constraint){
    		$constraint->aspectRatio();
    	})->save($destinationPath.'/'.$input['slidername']);
    	$destinationPath = public_path('slider');
    	$image->move($destinationPath,$input['slidername']);
    	return back()->with('success','Image uploaded successfull')->with('slidername',$input['slidername']);
    }
}
