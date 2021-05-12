<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class SearchController extends Controller
{
    //
    public function index(){
    	return view('welcome');
    }

    public function autocomplete(Request $request){
    	$data = Item::select("name")->where("name","LIKE","%{$request->query}%")->get();
    	return response()->json($data);
    }
}
