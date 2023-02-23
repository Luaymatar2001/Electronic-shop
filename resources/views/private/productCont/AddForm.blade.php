<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @include('includes.links');
    @include('sweetalert::alert')
    <style>
      .hidden{
        display:none;
      }
    </style>
</head>
<body>
    <!-- <div class="container">
    <form>
  <div class="form-group">
    <label for="exampleFormControlInput1">Email address</label>
    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Example select</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect2">Example multiple select</label>
    <select multiple class="form-control" id="exampleFormControlSelect2">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Example textarea</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
</form>

    </div> -->
    
    
    <div class=" container .prod" >
        <div class="row ">
            <div class="col-auto col-md-10  ">
                <div aria-label="breadcrumb " class="first  d-md-flex" >
                    <ol class="breadcrumb indigo lighten-6 first-1 shadow-lg mb-5  ">
                        <!-- <li class="breadcrumb-item font-weight-bold"><a class="black-text text-uppercase  "  href="#"><span  >home</span></a><img class="ml-md-3" src="https://img.icons8.com/offices/30/000000/double-right.png" width="20" height="20"> </li>
                        <li class="breadcrumb-item font-weight-bold"><a class="black-text text-uppercase" href="#"><span >about</span></a><img class="ml-md-3" src="https://img.icons8.com/offices/30/000000/double-right.png" width="20" height="20"></li> -->
                            <li class="breadcrumb-item font-weight-bold " ><li class="breadcrumb-item font-weight-bold mr-0 pr-0"><a class="black-text active-0" href="{{URL('public/Dashboard/product')}} "><span>Dashboard-Product</span></a> <img class="ml-md-3" src="https://img.icons8.com/offices/30/000000/double-right.png" width="20" height="20" style= "margin-top:15px"></li>
                            <li class="breadcrumb-item font-weight-bold " ><li class="breadcrumb-item font-weight-bold mr-0 pr-0"><a class="black-text active-1" href="#"><span>Add Products</span></a> <img class="ml-md-3" src="https://img.icons8.com/offices/30/000000/double-right.png" width="20" height="20" style= "margin-top:15px"></li>
                        </ol>
                </div>
            </div>
        </div>

    <div class="container mt-5">
        <div class="card">
            <h5 class="card-header text-center">Add the new store</h5>
            <div class="card-body">

       

                @if(session()->has('add_Status'))
                @if(session('add_Status'))
                <script>

                $(document).ready(function () {
                  swal({
                  icon: "success",
                  text: " Adding a new store has been completed successfully !",
                });
                })

                </script>
                @else
                <div class="alert alert-danger" role="alert">
                Failed to add a new store
                   </div>
                   @endif
                @endif


                <form role="form" action = "{{URL('public/Dashboard/product/addRow')}}" enctype="multipart/form-data" method = "post"   data-toggle="validator">
                  <input type="hidden" name = "_token" value = "{{csrf_token()}}">
                    <div class="form-group">
                        <label>Product name</label>
                        <input type="text" name = "name" class="form-control" data-error="You must have a name." id="inputName" placeholder="Product name" >
                        <!-- Error -->
                        @foreach($errors->get('name') as $message)
                        <p  style = "color:red;">{{$message}}</p>
                        @endforeach
                    </div>
                    <!-- _________ -->
                    <div class="form-group">
                        <label> price </label>
                        <input type="text" name = "price" class="form-control" data-error="You must have a name." id="inputName" placeholder="price" >
                        <!-- Error -->
                        @foreach($errors->get('price') as $message)
                        <p  style = "color:red;">{{$message}}</p>
                        @endforeach
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Example select</label>
                        <select  class="form-control" name = "selStore" id="exampleFormControlSelect1">
                        <option  value = "1" selected>discount</option>
                          <option   value = "0"> without a discount</option>
                          
                        </select>
                        @foreach($errors->get('selStore') as $message)
                        <p  style = "color:red;">{{$message}}</p>
                        @endforeach
                      </div>



                    <div id = "discount" class="form-group" >
                        <label> discount </label>
                        <input type="text" name = "discount" class="form-control" data-error="You must have a name." id="inputName" placeholder="discount" >
                        <!-- Error -->
                        @foreach($errors->get('discount') as $message)
                        <p  style = "color:red;">{{$message}}</p>
                        @endforeach
                    </div>

                    
              <div class="form-group">
                  <label for="exampleFormControlSelect2">Store name</label>
                    <select multiple class="form-control" name = "storeId" id="exampleFormControlSelect2">
                      @foreach($storesOptions as $stor)
                        <option value = "{{$stor->id}}">{{$stor->name}}</option>
                      @endforeach                   
                    </select>
                    @foreach($errors->get('storeId') as $message)
                        <p  style = "color:red;">{{$message}}</p>
                        @endforeach
              </div>

                    <div class="form-group">
                 <div class="custom-file">
                    <input type="file"  name = "image"  class="custom-file-input">
                    <label class="custom-file-label" for="inputGroupFile01">Choose image</label>
                    </div>
                    @foreach($errors->get('image') as $message)
                        <p  style = "color:red;">{{$message}}</p>
                        @endforeach
                 </div>
                 
                 <div class="form-group">
                    <label>Description about the store</label>
                    <textarea class="form-control"  id="inputMessage"
                            placeholder="Message" name = "describe" ></textarea>
                        <!-- Error -->
                        @foreach($errors->get('describe') as $message)
                        <p  style = "color:red;">{{$message}}</p>
                        @endforeach
                    </div>

                 <div class="form-group">
                        <label> Category </label>
                        <input type="text" name = "category" class="form-control" data-error="You must have a name." id="inputName" placeholder="category">
                        <!-- Error -->
                            @foreach($errors->get('category') as $message)
                        <p  style = "color:red;">{{$message}}</p>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label> quantity </label>
                        <input type="text" name = "quantity" class="form-control" data-error="You must have a name." id="inputName" placeholder="quantity" >
                        <!-- Error -->
                        @foreach($errors->get('quantity') as $message)
                        <p  style = "color:red;">{{$message}}</p>
                        @endforeach
                    </div>

           

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Send</button>
                        
                    </div>
            
                </form>
         
            </div>
        </div>
    </div>

 <script>
    $(document).ready(function () {
      bsCustomFileInput.init()
    });
    $(document) .ready(function() {
$("#exampleFormControlSelect1").change(function(){
  var value = $( "#exampleFormControlSelect1 option:selected" ).val();

 if(value == 1 ){
  $( '#discount' ).removeClass( "hidden" );
}else if(value == 0){
  $('#discount' ).addClass("hidden");
}
});
});




</script>
</body>
</html>