<?php
session_start();
$sum=$_POST['total'];
$customerid = $_POST['customer_id'];
$sid = session_id();
$date = date("d-m-Y");
$sellerid = $_SESSION['uid'];

$con = mysqli_connect('localhost', 'root', '', 'dbpos') or die('Database not Found.');
$query = "INSERT INTO sale_product(customer_id,voucher_number,sale_date,total_amount,sellerid) VALUES 
('$customerid','$sid','$date','$sum','$sellerid')";
echo $sum;
$sucess = mysqli_query($con,$query);
  if ($sucess) {

        session_regenerate_id();
        
                  header("LOCATION:sales_product.php");
               }
             

?>