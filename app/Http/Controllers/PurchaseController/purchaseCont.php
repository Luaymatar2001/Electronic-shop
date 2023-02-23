<?php

namespace App\Http\Controllers\PurchaseController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Store;
use App\Models\Purchase;
class purchaseCont extends Controller
{
    // btn

    public function index()
    {
        $paginate = 6;
        $purchase = Purchase::select('*')->paginate($paginate);
        return view('private.purchaseCont.Dashboard')->with('purchase' , $purchase);

    }

    public function purchase($idP)
    {
        $Product = Product::where("id" , "=" , $idP)->select('*')->first();
         $id = $Product->id;
        $name = $Product->name;
        $price = $Product->price;
        $discount = $Product->discount;
        
        if(!empty($discount)){
        $price = $price -$discount;
        }
       
        $purches =new Purchase();
        $purches->product_id = $id;
        $purches->name = $name;
        $purches->price = $price;
        
        $purches->save();
        return redirect()->back();
    }

    // public function total($idP){
  
     
    //     $paginate = 6;
    //     $purchase = Purchase::select('*')->paginate($paginate);
    //  return view('private.purchaseCont.Dashboard')->with('purchase' , $purchase);
    // }

    public function report($idP){
              // $priceP = Purchase::where("product_id" , "=" , $idP)->count('')->sum('price');
        // Member::groupBy('id')->count();
        // 
     
    
        $result= Purchase::where("product_id" , "=" , $idP)->select('id','name','product_id','price');
        $count = $result->count('id');
        $sum = $result->sum('price');
        $Info = $result->limit(1)->first();

       $array = array('id'=>$Info->product_id ,'name' => $Info->name , 'count' => $count, 'sum' => $sum);
    //    $array = session(['id'=>$Info->product_id ,'name' => $Info->name, 'count' => $count, 'sum' => $sum]);
    // $Info->name
     
    
        $paginate = 6;
        $purchase = Purchase::select('*')->paginate($paginate);
     return view('private.purchaseCont.Dashboard')->with('purchase' , $purchase)->with('report' ,  $array);
       
    }


}
