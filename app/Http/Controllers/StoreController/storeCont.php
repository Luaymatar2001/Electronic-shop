<?php

namespace App\Http\Controllers\StoreController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Store;
use App\Models\Product;
use App\Http\Requests\storeRequest;
class storeCont extends Controller
{
   // session(['user_id'=>156]);
    public function index()
    {
      $paginate =6;
      $store = Store::select("*")->paginate($paginate);
      $deletedStore = Store::onlyTrashed()->select("*")->paginate($paginate);

      return view('private.storeCont.Dashboard')->with('stores' ,$store )->with('deletedStore' , $deletedStore);
    }
     
     public function store(storeRequest $request)
     {
      $name1 = $request['name'];
      $Email = $request['email'];
      $describe = $request['describe'];
      $image = $request->file('image');
      $path = 'uploads/images/';
      $name = time()+rand(1,1000).'.'.$image->getClientOriginalExtension();
      // dd($name);
      Storage::disk('public')->put($path.$name , file_get_contents($image));
    
      $store =  new Store();
      $store->name = $name1 ;
      $store->Email = $Email ;
      $store->image = $path.$name;
      $store->description= $describe ;
      $result = $store->save();

      return redirect()->back()->with('add_Status',$result);
     }
     
     public function Edit($id)
     {
     $storeInfo = Store::where('id', '=' ,$id)->select('*')->first() ;
     return view('private.storeCont.EditForm')->with('idInfo' , $storeInfo);
    }

    public function update( storeRequest $request , $id)
    {
      $name1 = $request['name'];
      $Email = $request['email'];
      $describe = $request['describe'];
      $image = $request->file('image');
      $path = 'uploads/images/';
      $name = time()+rand(1,1000).'.'.$image->getClientOriginalExtension();
      // dd($name);
      Storage::disk('public')->put($path.$name , file_get_contents($image));
      
      $store1 = Store::where('id' , '=' , $id)->select('*')->first();

      $store1->name = $name1 ;
      $store1->Email = $Email ;
      $store1->image = $path.$name;
      $store1->description= $describe ;

      $result1 = $store1->save();
    

      return redirect()->back()->with('add_Status',$result1);

   }


public function destroy($id)
{

   $store = Store::leftJoin('products', 'stores.id', '=' ,'products.store_id')->where('stores.id' , '=' , $id)->whereNull('stores.deleted_at')->delete(); 
   $product = Product::Join('stores', 'stores.id', '=' ,'products.store_id')->where('stores.id' , '=' , $id)->whereNull('products.deleted_at')->delete(); 
  // Product::Join('stores', 'stores.id', '=', 'products.store_id')
  // ->where('stores.id', $id)
  // ->delete();
 
  //  dd($store->toArray());->where()
  return redirect()->back();
}

public function restore($id)
{
  // onlyTrashed
  Store::withTrashed()->where('id' ,$id)->restore();
    return redirect()->back();
}

}
