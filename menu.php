<?php 
session_start();
include_once ('db.php');

 ?>

<!doctype html>
<html lang="en">
  <head>
<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- title จะขึ้นตรง tab บนbrowser -->
    <title> ร้านค้าออนไลน์ !!!</title>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">

      <li class="nav-item ">
        <a class="nav-link" href="index.php">หน้าแรก </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="menu.php">เมนูร้านค้า <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="cart.php">รถเข็นสินค้า </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="checkout.php">สั่งซื้อและชำระเงิน </a>
      </li>
      <li class="nav-item dropdown ">

      <?php  if(isset($_SESSION['User_ID'])){ ?>
       <a class="nav-link dropdown-toggle" href="Logintest.php" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Member Login
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="resetpwd.php">Password Reset</a>
        <a class="dropdown-item" href="editprofile.php">Profile</a>
        <a class="dropdown-item" href="logout.php">ออกจากระบบสมาชิก</a>
      </div>
    </li>

      <?php } else{ ?>
        <li class="nav-item ">
        <a class="nav-link" href="Logintest.php">Login</a>
      </li>   


        
  
      <?php } ?>  
        
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Join Us
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="add.php">Registration</a>
        </div>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="Contact.html">ติดต่อเรา </a>
      </li>
    </ul>
  </div>

  <form class="form-inline" action="menuSearch.php" method="GET">
    <input class="form-control mr-sm-2" name="strSearch" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</nav>

  </head>

<!-- Page Content -->
<div class="container mt-5">

  <div class="row">

    <div class="col-lg-3">

      <h1 class="my-4">Deliberger</h1>
      <div class="list-group">
        <a href="meat.php" class="list-group-item">Meat</a>
        <a href="vegetable.php" class="list-group-item">Vegetable</a>
        <a href="seafood.php" class="list-group-item">Seafood</a>
      </div>
      
    </div>
    <!-- /.col-lg-3 -->
    
    <div class="col-lg-9">

      <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active">
            <img class="d-block img-fluid"  src="https://www.img.in.th/images/66b8e23e8446cf7bbcc32ccde86fb6ba.jpg" alt="66b8e23e8446cf7bbcc32ccde86fb6ba.jpg" border="0"  alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block img-fluid"  src="https://www.img.in.th/images/84bc3918f9d4dd5771be7da6d9ad9b52.jpg" alt="84bc3918f9d4dd5771be7da6d9ad9b52.jpg" border="0" alt="two slide">
          </div>
          <div class="carousel-item">
            <img class="d-block img-fluid" src="https://www.img.in.th/images/252bc6c5cb77de715eb9c8365e3493d4.jpg" alt="252bc6c5cb77de715eb9c8365e3493d4.jpg" border="0" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      
      <div class="row">

        <?php 
        
  

        $sql = "SELECT * FROM product";
        $con->query("SET NAMES UTF8");
        $query = $con->query($sql);
        $con->close();
        $resultArray = array();
        $i = 0;
        while ($result = $query->fetch_array()) {
          $resultArray[] = $result;
          $i++;
        }
        
        if($resultArray != null){
          
          foreach($resultArray as $item){
            ?>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-85">
                  <a ><img src="<?php echo  $item['Image_name']; ?>" width="250" height="250" class="rounded-circle" alt="" /></a>
               <div class="card-body">
                <h4 class="card-title">
                  <!-- <form method="GET" action=""></form> -->
                  <a href="Descriptionmenu.php"><?php echo $item['Product_name']; ?></a>
                </h4>
                <h5><?php echo $item['Price']; ?> บาท</h5>
                <p class="card-text"><?php echo $item['Description']; ?></p>
              </div>
              <div class="card-footer">
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" onclick="openModel(<?php echo $item['Product_ID'] ?>)">สั่งซื้อสินค้า</button>
                <!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" >สั่งซื้อสินค้า</button> -->
                <form method="GET" action="Descriptionmenu.php">
                  <button type="submit" class="btn btn-primary">Detail</button>
                  <input type="hidden" value="<?php echo $item['Product_ID']; ?> " name="detailmenu">
                </form>    
                
              </div>
            </div>
          </div>


          


        <?php }} 
        ?>
          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel" name="headder_name"></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body" id="model_body">

                </div>
                <div class="modal-footer">
                  <input type="hidden" id="product_id_hidden"> 
                  <input type="text" id="qty_input" placeholder="Quantity" class="form-control" maxlength="5"> 
                  <button type="button" class="btn btn-danger" id="addToCartBtn" >ใส่ตะกร้าสินค้า</button>   
                  <!-- <a href="#" class="btn btn-danger" id="addToCartBtn" >ใส่ตะกร้าสินค้า </a> -->
                  <!-- <form action="addToCart.php" method="GET">
                    <div class="row">
                      <div class="col-6">
                        <input type="text" name="qty" placeholder="Quantity" class="form-control" maxlength="5"> 
                      </div>
                      <div class="col">
                        <button type="hidden" name="addcart" class="btn btn-danger">ใส่ตะกร้าสินค้า</button>

                        <a href="addToCart.php?id=dataArr.id&qty=qty" class="btn btn-danger">ใส่ตะกร้าสินค้า </a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>   
                      </div>
                    </div>
                  </form> -->
                </div>
              </div>
            </div>
          </div>

      </div>
      <!-- /.row -->
      
    </div>
    <!-- /.col-lg-9 -->
    
  </div>
  <!-- /.row -->
  
</div>
<!-- /.container -->
<!-- Button trigger modal -->



<!-- Footer -->
<footer class="py-5 bg-dark">
  <div class="container">
    <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
  </div>
  <!-- /.container -->
</footer>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript">
      var dataArr = [
      <?php 
        if($resultArray != null){
          foreach($resultArray as $item){        
      ?>        
      {
        id: <?php echo $item['Product_ID'] ?>,
        name: "<?php echo trim($item['Product_name']); ?>",
        des: "<?php echo trim($item['Description']); ?>",
        price: <?php echo $item['Price']; ?>
      },
      <?php 
          }
        }
       ?>
      ];


      function openModel(id){
        console.log(id);
        dataArr.forEach(function(item){
            if(item.id == id){
              $('#exampleModalLabel').text(item.name);
              $('#model_body').text(item.des);
              $('#product_id_hidden').val(item.id);
              // var link = "addToCart.php?product_id=" + item.id + "&qty=1";
              // $('#addToCartBtn').attr('href',link);
              return ;
            }
          });
      }

      $( document ).ready(function() {
          $( "#addToCartBtn" ).click(function() {
              var qty = $('#qty_input').val();
              var regex = /[0-9]|\./;
              if(qty != '' && regex.test(qty)){
                 var product_id = $('#product_id_hidden').val();
                 var link = "addToCart.php?product_id=" + product_id + "&qty=" + qty;
                 window.location.href = link;
              }else{
                alert("Error");
              }
          });
      });
  </script>
</body>

</html>


<?php 

?> 