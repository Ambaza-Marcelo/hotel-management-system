<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Sale;

class SaleController extends Controller
{
    //
    public function listSale()
    {
    	$sales = Sale::with('product')->paginate(5);
    	return view('backend.sale.list_sale',compact('sales'));
    }

    public function addSale()
    {
    	$prods = Product::get();
    	return view('backend.sale.add_sale',compact('prods'));
    }

    public function processSale(Request $request)
    {
        $request->validate([
        	'description' => 'required',
        	'quantity' => 'required',
        	'price' => 'required',
        	'product_id' => 'required'
        ]);

        Sale::create($request->all());

        return redirect()->back();

    }
}
