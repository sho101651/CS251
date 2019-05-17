<?php 
  session_start();
  include ('db.php');

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

      <li class="nav-item active">
        <a class="nav-link" href="index.php">หน้าแรก <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="menu.php">เมนูร้านค้า </a>
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

<body>
  


<br>
<br>
<br>
<br>

<div class="container">
  <div class="row">
    <div class="col-1">

    </div>
    <div class="col-11">
      <div class="card" style="width: 60rem;">
        <div class="card-header">
          ตะกร้าสินค้า
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            <?php 
            $id = $_SESSION['User_ID'];
            $orderlist = "SELECT * FROM orders WHERE UserID = $id" ;
            $con->query("SET NAMES UTF8");
            $query = $con->query($orderlist);
             $resultArray = array();
            $result2 = array();
            $i = 0;
            
            
            while ($result2 = $query->fetch_array()) {
              $resultArray[$i] = $result2;
              //echo $result2[1]."<br>";
               //var_dump($result2);
              $i++;
            }
            // var_dump($result2);
            // var_dump($resultArray);
            //echo $resultArray[1]." : 2<br>";
            // echo $result2[1]." : 1<br>";
            if($resultArray != null){
           //echo $result2[1];
           
            //var_dump($resultArray);
              
              // echo $resultArray['UserID'];
              foreach($resultArray as $item){
                //echo  $item['ProductID'];
                 $a = $item['ProductID']; 
                // var_dump($item);
                 $productlist = "SELECT * FROM product WHERE Product_ID = $a";
                  $query2 = $con->query($productlist);
                  
                  $result3 = $query2->fetch_array();
                  $j=0;
                  // while ($result2 = $query->fetch_array()) {
                  //   $resultArray[$i] = $result2;
              
                  //   $j++;
                  // }
                  //var_dump($result3);
                   
                  
                 
                ?>

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                  <div class="container">
                  <div class="row">
                    <div class="col-6">
                      <a ><img src="<?php echo  $result3['Image_name']; ?>" width="50" height="50" class="rounded-circle" alt="" /></a>
                      <?php echo $result3['Product_name']; ?>
                      <?php echo $result3['Price']; ?> บาท
                      <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  -->

                    </div>
                    
                    <div class="col-6">
                      
                       
                       <div class="container">
                         <div class="row">
                           <div class="col-4">
                             <h9>จำนวน</h9>                    
                             <button class="btn btn-danger" >+</button>
                           </div>
                           <div class="col-4">
                             <input type="text" name="qty[]" value="<?php echo $item['Quantity']; ?>" id="plusone" class="form-control" maxlength="5">
                           </div>
                           <div class="col-4">
                              <button type="submit" name="submit" class="btn btn-danger">-</button>
                              รวม&nbsp;&nbsp;<?php echo $item['Total_cost']; ?>&nbsp;&nbsp;บาท
                           </div>
                         </div>
                       </div>
                       
                   </div>
                  </div>
                </div>
                         
                    <br>
              <?php }}
                  if (isset($_POST['submit'])) { 
                      
                          $qtyArray = array();
                         $qtyArray = $_POST['qty'];
                         $k=0;

                         /*for($counter = 0; $counter < sizeof($usernames); $counter++)
                         {
                          echo "Username #".($counter + 1).": ".$usernames[$counter]."<br />";
                          echo "Password #".($counter + 1).": ".$passwords[$counter]."<br />";
                        }  */ 
                      foreach($resultArray as $item){
                        $a = $item['ProductID'];
                        //echo $a."<br>";
                         $productlist = "SELECT * FROM product WHERE Product_ID = $a";
                         $query2 = $con->query($productlist);
                         $result3 = $query2->fetch_array();
                         //echo $result3['Product_ID']." : product<br>";

                          $totalprice = $result3['Price'] * $qtyArray[$k];

                          // echo "round : ".$k."<br>"; 
                          // echo "total price ".$totalprice."<br>";
                          // echo "quantity ".$qtyArray[$k]."<br>";
                          // echo "poduct id".$item['ProductID']."<br>";
                          // echo "user iD".$id."<br>";
                          // echo "order id".$item['OrderID']."<br><br>";
                         // , Quantity=$qtyArray[$k]
                         $sql = "UPDATE orders SET Total_cost = '".$totalprice."' , Quantity = '".$qtyArray[$k]."' WHERE ProductID = '".$a."' AND UserID = '".$id."' AND OrderID = '".$item['OrderID']."'"; 

                          if ($con->query($sql) === TRUE) {
                            echo "Record updated successfully";


                            $page = $_SERVER['PHP_SELF'];
                            $sec = "1";
                            ?>
                            <html>
                            <head>
                              <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
                            </head>
                            <body>
                              
                            </body>
                            </html>
                            <?php  
                          } else {
                            echo "Error updating record: " . $con->error;
                          }

                         $k=$k+1;
                      }
                  }  
               ?>



          </li>
          <li class="list-group-item"> 

            <button type="submit" name="submit" class="btn btn-danger">ยืนยันการแก้ไขสินค้า</button>
          </li>
          <!-- <p id="demo">Click the button to change the color of this paragraph.</p>
          <p id="model_body"></p>
          <button  onclick="myFunction()">Try it</button>

          <script>
            function myFunction() {
              var x = document.getElementById("demo");
              $('#model_body').text("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa");
              x.style.color = "red";
              document.getElementById("qty").value = "a";
            }
          </script> -->

                </form>
                
        </ul>
      </div>
    </div>
  </div>
</div>

<br><br><br><br>







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

