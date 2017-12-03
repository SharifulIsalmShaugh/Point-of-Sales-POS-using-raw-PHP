<?php

session_start();
$productid = $_POST['products'];
$quantityin = $_POST['Quantity'];
$sellerid = $_SESSION['uid'];
$sid = session_id();

 $con = mysqli_connect('localhost', 'root', '', 'dbpos') or die('Database not Found.');
    $query = "SELECT * FROM products WHERE id = '$productid'";
      $query = mysqli_query($con, $query);
      $result = mysqli_fetch_assoc($query);
      $quantity = $result['quantity'];
   	  $quantityi = $_POST['Quantity'];
      $totalproduct = $quantity<$quantityi;

      $chk="SELECT * FROM sales_details WHERE product_id='$productid' AND sessionid='$sid'";
      $chk=mysqli_query($con,$chk);
       if (mysqli_num_rows($chk)>0) {
        header("LOCATION:sales_product.php?action=error");
      // header('Location:'.$_SERVER['HTTP_REFERER']."?mes=1");
  }
      
      elseif ($totalproduct) {
        
        header("Location:sales_product.php?action=yes");

         }

         else{
      $query = $result['sale_price'];

     $sid = session_id();
     $date = date("d-m-Y");

     $iquery = " INSERT INTO sales_details(product_id,product_price,product_quantity,sessionid,sellerid,sale_date) VALUES
     ('$productid','$query','$quantityin','$sid','$sellerid','$date')";
     $result = mysqli_query($con, $iquery);

     $totalquantity = $quantity-$quantityin;
     $updatequery = "UPDATE products SET quantity='$totalquantity' where id='$productid'";
     $sucess= mysqli_query($con, $updatequery);
     header("LOCATION:sales_product.php");
 }
?>