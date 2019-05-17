<?php 
session_start();
//Connects to your Database 

include_once ('db.php');

//This code runs if the form has been submitted

if (isset($_POST['submit'])) { 



//This makes sure they did not leave any fields blank

	if ( !$_POST['firstname']|| !$_POST['lastname'] || !$_POST['email'] || !$_POST['address'] || !$_POST['telephone_number'] || !$_POST['road'] || !$_POST['zip']) {

		die('You did not complete all of the required fields');

	}

// checks if the username is in use

	// if (!get_magic_quotes_gpc()) {

	// 	$_POST['email'] = addslashes($_POST['email']);

	// }



	$emailcheck = $_POST['email'];

	$check = mysqli_query($con,"SELECT email FROM user_ WHERE email = '$emailcheck'") 

	or die(mysqli_error());

	$check2 = mysqli_num_rows($check);




//if the name exists it gives an error

	if ($check2 != 0) {
		?>
		<p>Sorry, the username is already in use. <a href="editprofile.php">Edit Profile</a>.</p>
		<?php
		exit();
	}


	if (!get_magic_quotes_gpc()) {

		$_POST['email'] = addslashes($_POST['email']);

	}



// now we insert it into the database
  $sql = "UPDATE user_ SET LastName = '".$_POST['lastname']."',FirstName = '".$_POST['firstname']."',TelNo = '".$_POST['telephone_number']."',Email = '".$_POST['email']."',City = '".$_POST['address']."',Road = '".$_POST['road']."',Zipcode = '".$_POST['zip']."' WHERE User_ID = '".$_SESSION['User_ID']."' ";

	$add_member = mysqli_query($con,$sql);
  header("location:logout.php");
	?>



	



	



	<?php 

}



else 

{	

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
        <a class="dropdown-item" href="changeprofile.php">Profile</a>
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

	<div class="container">
		<div class="row justify-content-start">
			<div class="col-2">

			</div>
			<div class="col-8">
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
					<br>
					<br>
					<br>
					<h1>Edit Profile!!!</h1>


					<table border="0">

						<tr><td>Email:</td><td>
							<input type="text" class="form-control" name="email" maxlength="60">
						</td></tr>

						<tr><td>Firstname:</td><td>
							<input type="text" class="form-control" name="firstname" maxlength="60">
						</td></tr>

						<tr><td>Lastname:</td><td>
							<input type="text" class="form-control" name="lastname" maxlength="60">
						</td></tr>

						<tr><td>Address:</td><td>
							<input type="text" class="form-control" name="address" maxlength="60">
						</td></tr>

						<tr><td>Tel:</td><td>
							<input type="text" class="form-control" name="telephone_number" maxlength="60">
						</td></tr>

						<tr><td>Road:</td><td>
							<input type="text" class="form-control" name="road" maxlength="60">
						</td></tr>

						<tr><td>Zip:</td><td>
							<input type="text" class="form-control" name="zip" maxlength="60">
						</td></tr>

						<tr><th colspan=2>
							<p><br></p>
							<input type="submit" name="submit" class="btn btn-primary" value="Submit">
						</th></tr> 
					</table>
					<div><a href="Logintest.php">เข้าสู่ระบบ</a></div> 
				</form>

			</div>
			<div class="col-2">

			</div>
		</div>


<!--   <div class="row justify-content-center">
    <div class="col-1">

    </div>
    <div class="col-10">

      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">


        <div class="form-row">
          <div class="col-md-4 mb-3">
            <label for="validationTooltip01">First name</label>
            <input type="text" class="form-control" id="validationTooltip01" placeholder="First name" value="" name="firstname" required>
          </div>
          <div class="col-md-4 mb-3">
            <label for="validationTooltip02">Last name</label>
            <input type="text" class="form-control" id="validationTooltip02" placeholder="Last name" value="" name="lastname" required>
          </div>
        </div>


        <div class="form-row">
          <div class="col-md-4 mb-3">
            <label for="validationTooltip04">Email</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
              </div>
              <input type="email" class="form-control" id="validationTooltip04" placeholder="Email" name="email" aria-describedby="validationTooltipUsernamePrepend"  required>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="validationTooltip05">Password</label>
            <input type="password" class="form-control" id="validationTooltip05" placeholder="Password" name="password" required>
          </div>
          <div class="col-md-3 mb-3">
            <label for="validationTooltip05">re-enter Password</label>
            <input type="password" class="form-control" id="validationTooltip05" placeholder="Password" name="password2" required>
          </div>
          <div class="col-md-9 mb-3">
            <label for="validationTooltip07">Address</label>
            <input type="text" class="form-control" id="validationTooltip07" placeholder="Address" name="address" required>
          </div>
          <div class="col-md-2 mb-3">
            <label for="validationTooltip06">Telephone Number</label>
            <input type="text" class="form-control" id="validationTooltip06 placeholder="097*******" name="telephone_number" required>
          </div>
        </div>


        <div class="form-row">
          <div class="col-md-3 mb-3">
            <label for="validationTooltip08">Road</label>
            <input type="text" class="form-control" id="validationTooltip08" placeholder="Road" name="road" required>
          </div>
          <div class="col-md-3 mb-3">
            <label for="validationTooltip09">ZipCode</label>
            <input type="text" class="form-control" id="validationTooltip09" placeholder="ZipCode" name="zip" required>
          </div>
        </div>

        <tr><th colspan=2><input type="submit" name="submit" 
        	value="Register"></th></tr>  -->
        	<!-- <button class="btn btn-primary" type="submit">Submit form</button> -->


        </form>
    </div>
    <div class="col-1">

    </div>
</div>


</div>




</article>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



</body>


<?php

}

?> 