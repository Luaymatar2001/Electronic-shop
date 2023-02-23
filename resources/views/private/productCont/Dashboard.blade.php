<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <link rel="stylesheet" href="{{asset('CSS\Styledashboard.css')}}">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     @include('includes.links')
   </head>
<body>
 
       

        
        <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">Shoping</span>
    </div>
      <ul class="nav-links">
      <li>
          <a href="{{URL('public/stores')}}">
          <i class="fa-solid fa-cart-shopping "></i>
            <span class="links_name">Main Page Store</span>
          </a>
        </li>
        <li>
          <a href="{{URL('public/Dashboard/store')}}">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Stores</span>
          </a>
        </li>
        <li>
          <a href="#" class="active">
            <i class='bx bx-box' ></i>
            <span class="links_name">Product</span>
          </a>
        </li>
        <li>
        
          <a href="{{URL('public/Dashboard/purchase')}}">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">purchases</span>
          </a>
        </li>
        <li>
        @if (Route::has('register'))
          <a  href="{{ URL('public/Dashboard/adminRegistration') }}">  
          <i class="fa-solid fa-address-card"></i>
            <span class="links_name">Regester admin</span>
          </a>          
         @endif
         </li>
      </ul>
  </div>
  <section class="home-section">
    <nav class = "dash">
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>


    </nav>

    <div class="home-content">
   
  <!-- <div class="overview-boxes">
         box 
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Order</div>
            <div class="number">40,876</div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          <i class='bx bx-cart-alt cart'></i>
        </div> 
      </div> -->

     
      <div class=" container .prod" >
        <div class="row ">
            <div class="col-auto col-md-10  ">
                <div aria-label="breadcrumb " class="first  d-md-flex" >
                    <ol class="breadcrumb indigo lighten-6 first-1 shadow-lg mb-5  ">
                        <!-- <li class="breadcrumb-item font-weight-bold"><a class="black-text text-uppercase  "  href="#"><span  >home</span></a><img class="ml-md-3" src="https://img.icons8.com/offices/30/000000/double-right.png" width="20" height="20"> </li>
                        <li class="breadcrumb-item font-weight-bold"><a class="black-text text-uppercase" href="#"><span >about</span></a><img class="ml-md-3" src="https://img.icons8.com/offices/30/000000/double-right.png" width="20" height="20"></li> -->
                        <!-- <li class="breadcrumb-item font-weight-bold"><a class="black-text text-uppercase  " href="#"><span >team</span></a><img class="ml-md-3" src="https://img.icons8.com/offices/30/000000/double-right.png" width="20" height="20"> </li> -->
                            <li class="breadcrumb-item font-weight-bold"><li class="breadcrumb-item font-weight-bold mr-0 pr-0"><a class="black-text active-1" href="#"><span>Products</span></a> <img class="ml-md-3" src="https://img.icons8.com/offices/30/000000/double-right.png" width="20" height="20" style= "margin-top:15px"></li>
                        </ol>
                </div>
            </div>
        </div>

   

  <div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>Products <b>Management</b></h2>
                    </div>
                    <div class="col-sm-7 button">
                        <a  href="{{URL('public/Dashboard/product/add')}}" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Add New User</span></a>
                        <a href="#RestoreDiv" class=" btn btn-primary "  ><i class="fa-solid fa-rotate-left"></i>Restore</a>                      </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>						
                        <th>price</th>
                        <th> image </th>
                        <th>discount</th>
                        <!-- <th>store id</th> -->
                        <th>store name</th>
                        <th>quantity</th>
                        <th>category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($product as $products)
                    <tr >
                        <td>{{$products->id}}</td>
                        <td>{{$products->name}}</td>
                        <td>{{$products->price }}</td>
                        <td  class = "text-success">{{$products->image}}</td>  
                        <td>{{$products->discount}}</td>   
                        <td>{{$products->store_name}}</td> 
                        <td>{{$products->quantity}}</td>           
                      
                        <td>{{$products->category }}</td>
                        
                        <td>
                            <a href="{{URL('public/Dashboard/product/Edit/'.$products->id)}}" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                           
                         <form method= "POST" action="{{URL('public/Dashboard/product/delete/'.$products->id)}}" id = "sub_Delete{{$products->id}}">
                         <input type="hidden" name = "_token" value = "{{csrf_token()}}">
                      <button type="button" id = "delete" class = "delete{{$products->id}}" data-toggle="tooltip" style = "border:none;" > <i class="material-icons">&#xE5C9;</i> </button>
                      <script>
                      $('.delete{{$products->id}}').click(function(e){
                      e.preventDefault();

                      let confirm =swal("Are you sure delete this record ?", {
                        dangerMode: true,
                        buttons: true,
                      }).then(function(e){
                            if(confirm = true){
                              $('#sub_Delete{{$products->id}}').submit();
                              }
                          });
                      });

                      </script>
                   

                    </form> 
                    </td>   
                    </tr>

                    @endforeach
                </tbody>
            
           
            </table>
     
            
              <div class = "row">
               
                <div class="hint-text col-9"><b> {{$product->count()}}</b> items out of  <b>{{$product->total()	}}</b> in <b>{{$product->lastPage()	}}</b> pages</div>
                <!-- 2 items out of 100 in 10 pages -->
                 <div class = "col-1" style = "border :10px;">
                 {{ $product->links() }}
                               </div> 
    
            </div>
            <!-- pagination -->
           
           
        </div>
  
    </div>
</div>     
 
<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper" id="RestoreDiv">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>Restore Products <b>Management</b></h2>
                    </div>
                 
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>						
                        <th>price</th>
                        <th> image </th>
                        <th>discount</th>
                        <th>store id</th>
                        <th>quantity</th>
                        <th>category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($deletedProduct as $deletedProducts)
                    <tr >
                        <td>{{$deletedProducts->id}}</td>
                        <td>{{$deletedProducts->name}}</td>
                        <td>{{$deletedProducts->price }}</td>
                        <td  class = "text-success">{{$deletedProducts->image}}</td>  
                        <td>{{$deletedProducts->discount}}</td>   
                        <td>{{$deletedProducts->store_id}}</td>     
                        <td>{{$deletedProducts->quantity}}</td>           
                      
                        <td>{{$deletedProducts->category }}</td>
                        
                        <td>                         
                         <form method= "POST" action="{{URL('public/Dashboard/product/restore/'.$deletedProducts->id)}}">
                         <input type="hidden" name = "_token" value = "{{csrf_token()}}">
                      <button type="submit" class="btn btn-primary btn-sm">Restore</button>
                   
                    </form> 
                    </td>   
                    </tr>
                    @endforeach
                </tbody>
                
           
            </table>
     
              <div class = "row">
               
                <div class="hint-text col-9"><b> {{$deletedProduct->count()}}</b> items out of  <b>{{$deletedProduct->total()	}}</b> in <b>{{$deletedProduct->lastPage()	}}</b> pages</div>
                <!-- 2 items out of 100 in 10 pages -->
                 <div class = "col-1" style = "border :10px;">
                 {!! $product->links() !!}
                               </div> 
    
            </div>
            <!-- pagination -->
           
           
        </div>
  
    </div>
</div>     
 <!-- /// -->
    </div>
 
  </section>
            </div>
  






  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}

var buttons = document.querySelectorAll('.btn')
buttons.forEach(function (button) {
  var button = new bootstrap.Button(button)
  button.toggle()
})
 

$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});


$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});




</script>
</body>
</html>

