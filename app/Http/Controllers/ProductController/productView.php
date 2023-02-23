<?php

namespace App\Http\Controllers\ProductController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Store;

class productView extends Controller
{
    public function index($id,$name)
 {

    $min_id =$id;
    $paginate = 3;
   
    // $product = Product::Join('stores', 'stores.id','=', 'products.store_id')
    // ->whereNull('stores.deleted_at')
    // ->where("stores.id","=",$min_id)
    // ->select("products.*" , "stores.name AS storeName")->paginate($paginate);


            $product  = Product::with('store')
            ->where("store_id" ,"=" ,$min_id )
            ->select("*")->
            paginate($paginate);

  
    // dd( $product->toArray());
    
    foreach($product as $products){
        $img_link = Storage::url($products->image);
        $products->image =  $img_link ;
       }

    //  dd($store->toArray());
    return view('public.products')->with('product' ,$product )->with('nameStore' , $name);
}

public function search(REQUEST $request )
{
    $nameSearch = $request['inputSearch'];
   $result = Product::where('name', 'LIKE', "%{$nameSearch}%") 
   ->orWhere('category', 'LIKE', "%{$nameSearch}%") 
   ->get();
   foreach($result as $products){
    $img_link = Storage::url($products->image);
    $products->image =  $img_link ;
   }

   return view('public.search')->with('result' ,$result)->with('nameSearch',$nameSearch);
}
}