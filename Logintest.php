<?php 

session_start();

//Connects to your Database 
include_once ('db.php');

  // $con->query("SET NAMES UTF8");
	if (isset($_POST['submit'])) {
		$login = $_POST['email'];
		$password = $_POST['pass'];
		if(!empty($login) && !empty($password)) {

		    // $login = mysql_real_escape_string($_POST['login']);
		    // $password = mysql_real_escape_string($_POST['password']);

		    $query = "SELECT * FROM user_ WHERE Email = '$login' AND password = md5('$password')";
		    $data = $con->query($query);
		    if($data) {
		    	$row = $data->fetch_assoc();
		        if ($row) {
		            $_SESSION['User_ID'] = $row['User_ID'];
		            $_SESSION['LastName'] = $row['LastName'];
                header('Location: index.php');
		            // header('Location: member.php');
		            // exit();
		        }else {
		            $_SESSION['message'] = "Please enter a valid username or password";
		            header('Location: error.php');
		            exit();
		        }

		    }
		    else {
		        die("Query failed");
		    }

		}else {
		    $_SESSION['message'] = "Please enter a username or password";
		    header('Location: error.php');
		    exit();
		}
	 	

	}
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
        <li class="nav-item ">
        <a class="nav-link" href="Logintest.php">Login</a>
      </li>    
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
<!--   <div class="container-fluid">
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8" id="signup_msg">
        
      </div>
      <div class="col-md-2"></div>
    </div>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <div class="panel panel-primary">
          <div class="panel-heading">Customer Login Form</div>
          <div class="panel-body">
            
            <form onsubmit="return false" method="post" action="Login.php" id="login">
              <label for="email">Email</label>
              <input type="email" placeholder="Email" class="form-control" name="email" id="email" required/>
              <label for="email">Password</label>
              <input type="password" placeholder="Password" class="form-control" name="password" id="password" required/>
              <p><br/></p>

              <button class="btn btn-primary" type="submit">Login</button>
              <br></br>
              <a href="#" style="color:#333; list-style:none;">Forgotten Password</a>



              
              <butt type="submit" class="btn btn-success" style="float:right;" Value="Login">
              <button class="btn btn-primary" type="submit">Submit form</button>

              <div><a href="Register.html">Create a new account?</a></div>           
            </form>
          </div>
          <div class="panel-footer"><div id="e_msg"></div></div>
        </div>
      </div>
      <div class="col-md-4"></div>
    </div> -->
<?php 

 ?>
<body>

  <div class="container">
  <div class="row">
    <div class="col-sm">
      
    </div>
    <div class="col-sm">
      
      <br>
      <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post"> 
       <table border="0"> 
         <tr><td colspan=2><h1>Login</h1></td></tr> 

         <tr><td>Email:</td><td> 
           <input type="text" name="email" placeholder="email" class="form-control" maxlength="40"> 
         </td></tr> 

         <tr><td>Password:</td><td> 
           <input type="password" name="pass" placeholder="Password" class="form-control" maxlength="50"> 
         </td></tr> 

         <p><br/></p>

         <tr><td colspan="2" align="right"> 
           <input type="submit" name="submit" class="btn btn-primary" value="Login"> 
         </td></tr> 

       </table> 
     </form> 

    </div>
    <div class="col-sm">
      
    </div>
  </div>
</div>






<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


  </body>







 <?php 

 ?> 