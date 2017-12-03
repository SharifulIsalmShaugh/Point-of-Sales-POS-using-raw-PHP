<?php 
    if(isset($_GET['eid'])){
        $id = $_GET['eid'];
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>POS</title>
	 <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php require("menu.php"); ?>
<section>
<div id="pdf2htmldiv">



<h3  style="text-align: center;margin: 0;padding: 10px 0px;">Solution2Solution Ltd.</h2>
<h5  style="text-align: center;margin: 0;padding: 0px 0px;">House: 3/4, Road:15, Sector:Uttara 10. </h5>
<h5  style="text-align: center;margin: 0;padding: 0px 0px;">Phone: 01824168996</h5>
<h5  style="text-align: center;margin: 0;margin-bottom: 50px; padding: 0px 0px;">Email: solution2solution@gmail.com</h5>




            
             
             <!-- <table> -->
             <!-- <tr><th>Info</th></tr>
             <tr><th>Details</th></tr>
 -->
             <?php

$con = mysqli_connect('localhost', 'root', '', 'dbpos') or die('Database not Found.');
               $query = "SELECT * FROM customer  WHERE 	customer_id='$id'"; 
               
               $query = mysqli_query($con, $query);
              //   if ($query) {
              //       echo "Ok";
              //   }
              //   else{
              //  echo  mysqli_error($con);
              // }
              
               while ($result=mysqli_fetch_assoc($query)) {
                 
               
            ?>
          
            <input type="hidden" name="eId" value="<?php echo $id;?>" /><br> <br>
               
             	<p  style=" margin-left: 30px;">Date:  <?php echo date("d-m-Y"); ?></p>
             	<p style="margin-left: 30px;">Voucher No:  <?php echo $result['sessionid'];?></p>
               <p style="margin-left: 30px;">Name:  <?php echo $result['customer_name'];?></p>
                <p style="margin-left: 30px;">Email:  <?php echo $result['customer_email'];?></p>
                <p style="margin-left: 30px;">Phone:  <?php echo $result['customer_phone'];?></p>
                <!-- </table> -->
                
                
                

                
<?php } ?>
<center>

	<table class="table">

            <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quentity</th>
                <th>Total</th>
            </tr>
            <?php
        
             $sid = session_id();
             $sallerid =$_SESSION['uid'];
               $con = mysqli_connect('localhost', 'root', '', 'dbpos') or die('Database not Found.');
               $query = "SELECT sales_details.*,products.name FROM sales_details,products WHERE sales_details.sessionid='$sid' AND sales_details.product_id=products.id"; 
               $i=0;
               $query = mysqli_query($con, $query);
              //  if ($query) {
              //      echo "Ok";
              //  }
              //  else{
              // echo  mysqli_error($con);
              //  }
               $sum=0;
               while ($result=mysqli_fetch_assoc($query)) {
                 $i++;  
               
            ?>
            <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $result['name'];?></td>
                <td><?php echo $result['product_price'];?></td>
                <td><?php echo $result['product_quantity'];?></td>
                <td><?php  
               $stotal = $result['product_price'] * $result['product_quantity'];
               echo $stotal;?>
                TK</td>    
            </tr>
            
            
            <?php
            $sum = $sum+$stotal;
            ?>
            <?php
}
            ?>


<!--             <tr>
                <td colspan="4">Total</td>
                <td colspan="2"><?php echo $sum;?>TK</td>
            </tr> -->

                </table>
                </center>
               <h3 style="text-align: center;">Total Amount: <?php echo $sum;?> Tk</h3>

                
                </div>
                

               <form action="add_sale.php" method="POST">
 			  	<input type="hidden" name="customer_id" value="<?php echo $id;?>">
 			  	<input type="hidden" name="total" value="<?php echo $sum;?>">
          <input style="width: 100px; margin-left: 430px; display: inline-block;" type="submit" name="submit" value="Save">
            <button style="height: 40px; width: 120px; border-radius: 8px; background: #00897b;"><a style="color: black; font-weight: bold;" href="javascript:pdfToHTML()">Save To Print</a></button>
        
 		 		</form>


 			
</section>
   <footer>
            <h2 style="text-align: center;margin: 0;padding: 33px 0px;">Devoloped by &copy; S2S</h2>
   </footer>
      <script type="text/javascript" src="js/jspdf.js"></script>
   <script type="text/javascript" src="js/jquery-2.1.3.js"></script>
   <script type="text/javascript" src="js/pdfFromHTML.js"></script>


</body>
</html>