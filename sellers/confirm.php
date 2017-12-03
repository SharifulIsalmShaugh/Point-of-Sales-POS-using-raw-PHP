<!DOCTYPE html>
<html>
<head>
	<title>POS</title>
	 <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php require("menu.php"); ?>
<section>
<h2 style="text-align: center;margin-bottom:30px; font-weight: bold;">Customer Information</h2>
 <?php
            if (isset($_POST['button'])) {

                $con = mysqli_connect('localhost', 'root', '', 'dbpos') or die('Database not Found.');
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $sallerid =$_SESSION['uid'];
                $sid = session_id();

                $query = "INSERT INTO customer(customer_name,customer_email,customer_phone,customer_address,sessionid)VALUES('$name','$email','$phone',' $address','$sid')";
                $sucess = mysqli_query($con, $query);
                if ($sucess) {
                    
                	header("LOCATION:confirm.php");
                } 
                
                    
                    // echo mysqli_error($con);
                
            }
            ?>
	<center>
	<form method="POST" action="">
		<table>
			<tr>
               <td width="30%">Name</td>
                <td><input type="text" name="name" placeholder="name" required></td>
             </tr>
             <tr>
               <td width="30%">Email</td>
                <td><input type="text" name="email" placeholder="Email" ></td>
             </tr>
             <tr>
               <td width="30%">Phone</td>
                <td><input type="text" name="phone" placeholder="Phone"></td>
             </tr>
             <tr>
               <td width="30%">Address</td>
                <td><input type="text" name="address" placeholder="Address"></td>
             </tr>
             <tr>
             	<td>
             		<td><input type="submit" name="button" value="Save"></td>
             	</td>
             </tr>
		</table>
	</form>
	</center>


	 <!-- <button style="height: 40px; width: 90px; border-radius: 5px;margin-left: 550px; margin-top: 20px; margin-bottom: 10px; background: #00897b;font-weight: bold;"><a href="save.php">Save</a></button> -->
	<table class="table">
            <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
            <?php
        
             $sid = session_id();
             
           
               $con = mysqli_connect('localhost', 'root', '', 'dbpos') or die('Database not Found.');
               $query = "SELECT * FROM customer"; 
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
                <td><?php echo $result['customer_name'];?></td>
                <td><?php echo $result['customer_email'];?></td>
                <td><?php echo $result['customer_phone'];?></td> 
                  <td><a href="print.php?eid=<?php echo $result['customer_id'];?>">Add</a></td>    
            </tr>

            <?php
}
            ?>

                </table>
</section>
   <footer>
            <h2 style="text-align: center;margin: 0;padding: 33px 0px;">Devoloped by &copy; S2S</h2>
   </footer>

</body>
</html>