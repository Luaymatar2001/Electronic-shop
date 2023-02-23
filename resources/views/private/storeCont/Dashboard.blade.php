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

     <style>
      body {
  font-family: "Open Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Helvetica, Arial, sans-serif; 
}
     </style>
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
          <a href="#" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Stores</span>
          </a>
        </li>
        <li>
          <a href="{{URL('public/Dashboard/product')}}">
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
                            <li class="breadcrumb-item font-weight-bold"><li class="breadcrumb-item font-weight-bold mr-0 pr-0"><a class="black-text active-1" href="#"><span>Stores</span></a> <img class="ml-md-3" src="https://img.icons8.com/offices/30/000000/double-right.png" width="20" height="20" style= "margin-top:15px"></li>
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
                        <h2>Stores <b>Management</b></h2>
                    </div>
                    <div class="col-sm-7 button">
                        <a  href="{{URL('public/Dashboard/store/add')}}" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Add New User</span></a>
                        <a href="#RestoreDiv" class=" btn btn-primary "  ><i class="fa-solid fa-rotate-left"></i>Restore</a>                      </div>

                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>						
                        <th>image</th>
                        <th> description </th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($stores as $store)
                    <tr>
                        <td>{{$store->id}}</td>
                        <td>{{$store->name}}</td>
                        <td>{{$store->image}}</td>                        
                        <td>{{$store->description}}</td>
                        <td><span class="text-success">{{$store->Email}}</td>
                        <td>
                            <a href="{{URL('public/Dashboard/store/Edit/'.$store->id)}}" class="settings" title="Settings"  data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                            <!-- <a href="#" class="delete" title="Delete" data-toggle="tooltip"></a> -->
                            <form method= "POST" action="{{URL('public/Dashboard/store/delete/'.$store->id)}}" id = "sub_Delete{{$store->id}}">
                     @csrf
                      <button type="button" class = "delete{{$store->id}}" id =  data-toggle="tooltip" style = "border:none;" > <i class="material-icons">&#xE5C9;</i> </button>
                  
                  <script>
                            $('.delete{{$store->id}}').click(function(e){
                            e.preventDefault();

                            let confirm =swal("Are you sure delete this record ?", {
                              dangerMode: true,
                              buttons: true,
                            }).then(function(e){
                                  if(confirm = true){
                                    $('#sub_Delete{{$store->id}}').submit();
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
               
                <div class="hint-text col-9"><b> {{$stores->count()}}</b> items out of  <b>{{$stores->total()	}}</b> in <b>{{$stores->lastPage()	}}</b> pages</div>
                <!-- 2 items out of 100 in 10 pages -->
                 <div class = "col-1" style = "border :10px;">
                 {!! $stores->links() !!}
                               </div> 
    
            </div>
            <!-- pagination -->
           
           
        </div>
  
    </div>
  <!-- ///////////////////// -->

    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title" id = "RestoreDiv">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>Restore Stores <b>Management</b></h2>
                    </div>
                    <div class="col-sm-7 button">
                        <a  href="{{URL('public/Dashboard/store/add')}}" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Add New User</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>						
                        <th>image</th>
                        <th> description </th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($deletedStore as $deletedStores)
                    <tr>
                        <td>{{$deletedStores->id}}</td>
                        <td>{{$deletedStores->name}}</td>
                        <td>{{$deletedStores->image}}</td>                        
                        <td>{{$deletedStores->description}}</td>
                        <td><span class="text-success">{{$deletedStores->Email}}</td>
                        <td>
                            <!-- <a href="#" class="delete" title="Delete" data-toggle="tooltip"></a> -->
                            <form method= "POST" action="{{URL('public/Dashboard/store/restore/'.$deletedStores->id)}}">
                            <input type="hidden" name = "_token" value = "{{csrf_token()}}">
                     <button type="submit" class="btn btn-primary btn-sm">Restore</button>
                    </form> 
                          </td>
                    </tr>
                    @endforeach
                </tbody>
            
           
            </table>
     
            
              <div class = "row">
               
                <div class="hint-text col-9"><b> {{$stores->count()}}</b> items out of  <b>{{$stores->total()	}}</b> in <b>{{$stores->lastPage()	}}</b> pages</div>
                <!-- 2 items out of 100 in 10 pages -->
                 <div class = "col-1" style = "border :10px;">
                 {!! $stores->links() !!}
                               </div> 
    
            </div>
            <!-- pagination -->
           
           
        </div>
  
    </div>
  

</div>     
 
        

</div>     



    </div>
 
  </section>
  <!-- <div class = "pagination" >
    {!! $stores->links() !!} 
    </div> -->
        


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





</script>
</body>
</html>

