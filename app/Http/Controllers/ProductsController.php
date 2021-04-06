<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use DB;
use Session;

class ProductsController extends Controller
{
    //
	public function index(){
        $products = Product::all();

        return view('products', compact('products'));
	}
	
	public function add_product(Request $request){
		         return view('add');

	}
	public function product_add(Request $request){
		$request->validate([  
            'title'=>'required',  
            'qty'=>'required',  
            'price'=>'required',  
            'Purchase Date'=>'required'  
        ]);  
  
        $product = new Product;  
        $product->name =  $request->get('title');  
        $product->qty = $request->get('qty');  
        $product->price = $request->get('price');  
        $product->purchase_date = $request->get('pdate');
		if($request->file()) {

            $fileName = time().'_'.$request->input_img->getClientOriginalName();
            $filePath = $request->file('input_img')->storeAs('uploads', $fileName, 'public');
      //Move Uploaded File
      $destinationPath = 'uploads';
      $request->file('input_img')->move($destinationPath,$request->file('input_img')->getClientOriginalName());

            $product->photo = $request->input_img->getClientOriginalName();
            $product->save();

            //return back()->with('success','Data has been inserted.');
        }

	           $product->save();

       return redirect('/');


		
	}
	
	public function edit_product($id){
		$product= Product::find($id); 

         $ids=DB::select('select * from products'); 
         $items = array();

        foreach ($ids as $data)
        {
             $items[$data->id] = $data->id;
        }
         return view('edit', compact('product','items'));
         
	}
	public function product_update(Request $request, $id){
		
		$request->validate([  
            'title'=>'required',  
            'qty'=>'required',  
            'price'=>'required',  
            'pdate'=>'required'  
        ]);  
  
        $product = Product::find($id);  
        $product->name =  $request->get('title');  
        $product->qty = $request->get('qty');  
        $product->price = $request->get('price');  
        $product->purchase_date = $request->get('pdate');
		if($request->file()) {

            $fileName = time().'_'.$request->input_img->getClientOriginalName();
            $filePath = $request->file('input_img')->storeAs('uploads', $fileName, 'public');
      //Move Uploaded File
      $destinationPath = 'uploads';
      $request->file('input_img')->move($destinationPath,$request->file('input_img')->getClientOriginalName());

            $product->photo = $request->input_img->getClientOriginalName();
            $product->save();

            //return back()->with('success','Data has been inserted.');
        }

	           $product->save();

       return redirect('/');


		// return view('edit', compact('product','items'));
         
	}

	public function products_search(Request $request){
         $products = DB::select('select * from products where name like "%'.$request->input('term').'%"');
         return view('products', compact('products'));
	}
	
}
