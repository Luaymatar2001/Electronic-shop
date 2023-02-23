<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="{{asset('FontAwesome/css/all.min.css')}}">
    @include('includes.links')
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark " style = "background-color:#6c757d;">
    <div class="container-fluid"><i class="fa-solid fa-cart-shopping fa-2x mr-2"></i><a class="navbar-brand" href="#">shopping</a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                <li class="nav-item"> <a class="nav-link active" aria-current="page" href="#">Home</a> </li>
                <li class="nav-item">
                <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="{{URL('public/Dashboard/store')}}" role="tab"
      aria-controls="pills-login" aria-selected="true">Login</a>
      </li>                <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false"> Shop </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Products</a></li>
                        <li><a class="dropdown-item" href="#">Laptops</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Accessories</a></li>
                    </ul>
                </li>
            </ul>
            <form action = "{{URL('public/Dashboard/search')}}" methods = "post" class="d-flex"> 
                <input class="form-control mr-2" style = "width:300px; " type="search" placeholder="Search" name = "inputSearch" aria-label="Search"> 
            <button class="btn btn-outline-success" type="submit">Search</button> </form>            
        </div>
    </div>
</nav>

    
<div class=" container .prod" >
        <div class="row ">
            <div class="col-auto col-md-10  ">
                <div aria-label="breadcrumb " class="first  d-md-flex" >
                    <ol class="breadcrumb indigo lighten-6 first-1 shadow-lg mb-5  ">
                        <!-- <li class="breadcrumb-item font-weight-bold"><a class="black-text text-uppercase  "  href="#"><span  >home</span></a><img class="ml-md-3" src="https://img.icons8.com/offices/30/000000/double-right.png" width="20" height="20"> </li>
                        <li class="breadcrumb-item font-weight-bold"><a class="black-text text-uppercase" href="#"><span >about</span></a><img class="ml-md-3" src="https://img.icons8.com/offices/30/000000/double-right.png" width="20" height="20"></li> -->
                            <li class="breadcrumb-item font-weight-bold " ><li class="breadcrumb-item font-weight-bold mr-0 pr-0"><a class="black-text active-0" href="{{URL('public/stores')}} "><span>Store </span></a> <img class="ml-md-3" src="https://img.icons8.com/offices/30/000000/double-right.png" width="20" height="20" style= "margin-top:15px"></li>
                            <li class="breadcrumb-item font-weight-bold " ><li class="breadcrumb-item font-weight-bold mr-0 pr-0"><a class="black-text active-1" href="#"><span> {{$nameStore}} : Products</span></a> <img class="ml-md-3" src="https://img.icons8.com/offices/30/000000/double-right.png" width="20" height="20" style= "margin-top:15px"></li>
                        </ol>
                </div>
            </div>
        </div>
<!-- 
    <div class=" container container-md-fluid">
        <div class="row ">
            <div class="col-auto col-md-10  ">
                <nav aria-label="breadcrumb " class="first  d-md-flex" >
                    <ol class="breadcrumb indigo lighten-6 first-1 shadow-lg mb-5  "> -->
                        <!-- <li class="breadcrumb-item font-weight-bold"><a class="black-text text-uppercase  "  href="#"><span  >home</span></a><img class="ml-md-3" src="https://img.icons8.com/offices/30/000000/double-right.png" width="20" height="20"> </li>
                        <li class="breadcrumb-item font-weight-bold"><a class="black-text text-uppercase" href="#"><span >about</span></a><img class="ml-md-3" src="https://img.icons8.com/offices/30/000000/double-right.png" width="20" height="20"></li> -->
                        <!-- <li class="breadcrumb-item font-weight-bold"><a class="black-text text-uppercase  " href="#"><span >team</span></a><img class="ml-md-3" src="https://img.icons8.com/offices/30/000000/double-right.png" width="20" height="20"> </li> -->
                            <!-- <li class="breadcrumb-item font-weight-bold"><li><li class="breadcrumb-item font-weight-bold mr-0 pr-0"><a class="black-text active-1" href="#"><span>Stores</span></a> <img class="ml-md-3" src="https://img.icons8.com/offices/30/000000/double-right.png" width="20" height="20" style= "margin-top:15px"></li>
                        </ol>
                </nav>
            </div>
        </div> -->

       <div class="pricing4 py-5 bg-light">
  <div class="container">
    <!-- Row  -->
    <div class="row justify-content-center">
      <div class="col-md-8 text-center">
        <h3 class="mb-3">Extra ordinary Pricing for your Fitness</h3>
        <h6 class="subtitle font-weight-normal">You can relay on our amazing features list and also our customer services will be great experience for you without doubt</h6>
      </div>
    </div>
    <!-- Row  -->
    <div class="row mt-4">
      <!-- Column -->
      @foreach($product as $products)
      @empty($products)
      <div class="alert alert-danger alert-dismissible fade show">
              <strong>empty data!</strong> There are no products in this store yet .
          </div> 
      @endempty
      @endforeach


      @foreach($product as $products)
          @if(!empty($products->id))
      <div class="col-md-4">
        <div class="card card-shadow border-0 mb-4">
          <img class="card-img-top" src="{{$products->image}}" alt="wrappixel kit">
         
          <div class="p-3">
            <h5 class="font-weight-medium mb-0">{{$products->name}}</h5>
            <h6 class="subtitle font-13"> <span class = "text-success">Category : </span> {{$products->category}}</h6>
            <ul class="list-inline font-14 mt-3">
              <li class="py-1"><i class="icon-check text-success"></i><span class = "text-success">description : </span>{{$products->description}} </li>
              @if(!empty($products->store))
            
              <li class="py-1"><i class="icon-check text-success"></i><span class = "text-success">Store Name : </span>{{$products->store->name}}</li>
           
              @endif
            </ul>
            <div class=" mt-3 align-items-center">
              <h2 class="price text-success">{{$products->price}}<small>/item</small></h2>
           
              @if($products->flag == 1)
              <h2 class="price text-success"><small>after discount : </small> {{($products->price)-($products->discount)}}<small>/item</small></h2>
              @endif
           
            </div>
            <div class="ml-auto">
                
                <a class="btn btn-danger-gradiant rounded-pill text-white btn-md border-0" href="{{URL('public/Dashboard/product/purchase/'.$products->id)}}">purchase</a>
              </div>
          </div>
        </div>
      </div>
     
          @endif
      
     @endforeach
  
     <!-- Column -->
      <!-- --------- -->
    </div>
    <div class="container">
    <hr>
  <div class = "row">
               
               <div class="hint-text col-9"><b> {{$product->count()}}</b> items out of  <b>{{$product->total()	}}</b> in <b>{{$product->lastPage()	}}</b> pages</div>
               <!-- 2 items out of 100 in 10 pages -->
                <div class = "col-1" style = "border :10px;">
                {!! $product->links() !!}
                              </div> 
           </div>
           </div>
  </div>
</div>
    
  <!-- cards -->
 


<!-- Breadcrumb  -->



</div>

<!--- Footer --->
	<footer>
		<div class="jumbotron jumbotron-fluid bg-secondary p-4 mt-5 mb-0">
			<div class="container">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 cizgi">
						<div class="card bg-secondary border-0">
							<div class="card-body text-light text-center">
								<h5 class="card-title text-white display-4" style="font-size:30px">Telif Hakkı</h5>
							<p class="d-inline lead">Tüm Hakları Saklıdır © 2018<br>
							<a href="#" class="text-light d-block lead">Blog</a>
							</p>
	
							</div>
						</div>
					</div>
					
					<div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 cizgi">
						<div class="card bg-secondary border-0">
							<div class="card-body text-center">
								<h5 class="card-title text-white display-4" style="font-size:30px">İletişim</h5>
								<a class="text-light d-block lead" style="margin-left: -20px" href="#"><i class="fa fa-phone mr-2"></i>+90 (000) 000 0 000</a>
								<a class="text-light d-block lead" href="#"><i class="fa fa-envelope mr-2"></i>admin@localhost.com</a>
							</div>
						</div>
					</div>
					
					<div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
						<div class="card bg-secondary border-0">
							<div class="card-body text-center">
							<h5 class="card-title text-white display-4" style="font-size:30px">Sosyal Medya</h5>
					
									<a class="text-light" href="#"><i class="fa-brands fa-square-facebook fa-fw fa-2x"></i></a>
								
									<a class="text-light" href="#"><i class="fa-brands fa-twitter fa-fw fa-2x"></i></a>
								
									<a class="text-light" href="#"><i class="fa-brands fa-instagram fa-fw fa-2x"></i></a>
								
									<a class="text-light" href="#"><i class="fa-brands fa-linkedin fa-fw fa-2x"></i></a>
								
							</div>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</footer>
	<!--# Footer #-->
</body>
</html>
