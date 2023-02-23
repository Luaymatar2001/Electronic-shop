<?php

namespace App\Http\Controllers\StoreController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;
use Illuminate\Support\Facades\Storage;
class storeView extends Controller
{
   
 public function index()
 {
    $paginate = 6;
    $store = Store::select("*")->paginate($paginate);
    foreach($store as $stores){
        $img_link = Storage::url($stores->image);
        $stores->image =  $img_link ;
       }
    //  dd($store->toArray());
    return view('public.stores')->with('stores' ,$store );
 }
}
