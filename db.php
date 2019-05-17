<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "cs251";

/*PD STYLE
$con = mysqli_connect($servername, $username, $password,$db);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
*/

/*OO STYLE*/
 $con = new mysqli($servername, $username, $password,$db);
 
 if ($con->connect_error) {
     printf("Connection failed: " , $con->connect_error);
	 exit();
 }

?>

<?php
$con = mysqli_connect("localhost","root","","cs251");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?> 