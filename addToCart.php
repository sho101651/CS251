<?php 
	session_start();
	include_once ('db.php');
	// echo "-----------------";
	if (isset($_GET['product_id']) && isset($_GET['qty'])) {
    	$userid = $_SESSION['User_ID'];
    	$productid = $_GET['product_id'];
	    $quantity = $_GET['qty'];
	    $proc = "SELECT Price FROM product WHERE Product_ID = '$productid'";
	    $query = $con->query($proc);
	    $result = $query->fetch_assoc();
	    if ($result) {
		    $productprice = $result['Price'];

		    $totalCost = $quantity * $productprice;
	    }else{
	    	echo 'product id not found';
	    }
    
    	$insert_data = "INSERT INTO orders (OrderID,Total_cost,Quantity,UserID,ProductID) VALUES ('NULL','$totalCost','$quantity','$userid','$productid')";
    	if ($con->query($insert_data)) {
    		echo 'insert success';
		} else {
		    echo "Error: " . $isert_data . "<br>" . $con->error;
		}
	}else{
		echo '404 not found';
	}
	header('Location: menu.php');
?>