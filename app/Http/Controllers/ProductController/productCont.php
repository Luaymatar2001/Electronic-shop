<?php

namespace App\Http\Controllers\ProductController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Store;
use App\Http\Requests\productRequest;
class productCont extends Controller
{
    public function index()
    {
      $paginate = 6;
      $products = Product::Join('stores', 'stores.id','=', 'products.store_id')
      ->whereNull('stores.deleted_at')
      ->select("products.*" , "stores.name AS store_name")->paginate($paginate);

      $deletedProduct = Product::onlyTrashed()->select("*")->paginate($paginate);
      return view('private.productCont.Dashboard')->with('product' ,$products )->with('deletedProduct' ,$deletedProduct );
    }
    public function selectStores()
    {
        $storesOption =  Store::select("id" , "name")->get();
        return view('private.productCont.AddForm')->with('storesOptions' ,$storesOption );


    }
    public function store(productRequest $request)
    {

     $name1 = $request['name'];
    
      $discription1 = $request['describe'];
     $price = $request['price'];
     $store_id = $request['storeId'];
    // $store_name = $request['store_name'];
     $flag = $request['selStore'];
     $discount = $request['discount'];
     $quantity = $request['quantity'];
     $image = $request->file('image');
     $category = $request['category'];

     $path = 'ImgProducts/';
     $name = time()+rand(1,1000).'.'.$image->getClientOriginalExtension();
     // dd($name);
     Storage::disk('public')->put($path.$name , file_get_contents($image));
   
     $product =  new Product();
     $product->name = $name1 ;
     $product->price = $price;
     $product->image = $path.$name;
     $product->discount = $discount; 
     $product->store_id = $store_id;
     //$product->store_name = $store_name;
     $product->quantity = $quantity;
     $product->description= $discription1 ;
     $product->category= $category ;     
     $product->flag = $flag; 
  
     
     $result = $product->save();

     return redirect()->back()->with('add_Status',$result);
    }

    public function Edit($id)
    {
    $productInfo = Product::where('id' , '=' ,$id)->select('*')->first() ;
    $storesOption =  Store::select("id" , "name")->get();
    return view('private.productCont.EditForm')->with('idInfo' , $productInfo)->with('storesOptions',$storesOption);
   }
   
   public function update( productRequest $request , $id)
   {

    $name1 = $request['name'];
    
    $discription1 = $request['describe'];
     $price = $request['price'];
     $store_id = $request['storeId'];
     // $store_name = $request['store_name'];
     $flag = $request['selStore'];
     $discount = $request['discount'];
     $quantity = $request['quantity'];
     $image = $request->file('image');
     $category = $request['category'];

     $path = 'ImgProducts/';
     $name = time()+rand(1,1000).'.'.$image->getClientOriginalExtension();
     // dd($name);
     Storage::disk('public')->put($path.$name , file_get_contents($image));

     $product = Product::where('id' , '=' , $id)->select('*')->first();

     $product->name = $name1 ;
     $product->price = $price;
     $product->image = $path.$name;
     $product->discount = $discount; 
     $product->store_id = $store_id;
     //$product->store_name = $store_name;
     $product->quantity = $quantity;
     $product->description= $discription1 ;
     $product->category= $category ;     
     $product->flag = $flag; 
  
     
     $result = $product->save();

       return redirect()->back()->with('add_Status',$result);

  }

  public function distroy($id)
  {
  
    $product = Product::where('id','=',$id)->delete();
   
    return redirect()->back();
  }



  public function restore($id)
  {
    // onlyTrashed
    Product::withTrashed()->where('id' ,$id)->restore();
      return redirect()->back();
  }
}
