<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @include('includes.links');
    @include('sweetalert::alert')
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
                            <li class="breadcrumb-item font-weight-bold " ><li class="breadcrumb-item font-weight-bold mr-0 pr-0"><a class="black-text active-0" href="{{URL('public/Dashboard/store')}} "><span>Dashboard-Store</span></a> <img class="ml-md-3" src="https://img.icons8.com/offices/30/000000/double-right.png" width="20" height="20" style= "margin-top:15px"></li>
                            <li class="breadcrumb-item font-weight-bold " ><li class="breadcrumb-item font-weight-bold mr-0 pr-0"><a class="black-text active-1" href="#"><span>Add Store</span></a> <img class="ml-md-3" src="https://img.icons8.com/offices/30/000000/double-right.png" width="20" height="20" style= "margin-top:15px"></li>
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
                  text: "Adding a new store has been completed successfully!",
                });
                })

                </script>
                @else
                <div class="alert alert-danger" role="alert">
                Failed to add a new store
                   </div>
                   @endif
                @endif

                <form role="form" action = "{{URL('public/Dashboard/store/addRow')}}" enctype="multipart/form-data" method = "post"   data-toggle="validator">
                  <input type="hidden" name = "_token" value = "{{csrf_token()}}">
                    <div class="form-group">
                        <label>Store name</label>
                        <input type="text" name = "name" class="form-control"  id="inputName" placeholder="Name" >
                        <!-- Error -->
                        @foreach($errors->get('name') as $message)
                        <p class="form-check-label" style = "color:red;">{{$message}}</p>
                        @endforeach
                    </div>
                 
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name = "email" class="form-control" id="inputEmail" placeholder="Email" >
                        <!-- Error -->
                        @foreach($errors->get('email') as $message)
                        <p class="form-check-label" style = "color:red;">{{$message}}</p>
                        @endforeach
                    </div>

                    <div class="form-group">
                 <div class="custom-file">
                    <input type="file"  name = "image"  class="custom-file-input">
                    <label class="custom-file-label" for="inputGroupFile01">Choose image</label>
                    @foreach($errors->get('image') as $message)
                        <p class="form-check-label" style = "color:red;">{{$message}}</p>
                        @endforeach
                    </div>
                 </div>
                 
                    <div class="form-group">
                    <label>Description about the store</label>
                    <textarea class="form-control"  id="inputMessage"
                            placeholder="Message" name = "describe" ></textarea>
                        <!-- Error -->
                        @foreach($errors->get('name') as $message)
                        <span class="form-check-label" style = "color:red;">{{$message}}!</span>
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
})

</script>
</body>
</html>