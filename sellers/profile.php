<!DOCTYPE html>
<html>
<head>
	<title>POS</title>

        <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
 <?php require("menu.php"); ?>
 <section>
 <center>
 <h2>Update Profile</h2>
 <?php
 if (isset($_POST['button'])) { 
$con = mysqli_connect('localhost', 'root', '', 'dbpos') or die('Database not Found.');
   $email = $_POST['email'];
   $sallerid =$_SESSION['uid'];
   $password = $_POST['password'];
   $query = "UPDATE user SET email='$email',password='$password' where id='$sallerid'";
        $sucess = mysqli_query($con, $query);
    }
 ?>
 <form action="" method="POST">
 <input type="hidden" name="sellerid" value="<?php echo $sallerid; ?>" />
 <input style="width: 20%; display: inline-block; margin: 20px;" type="email" name="email" placeholder="Enter New Email">
  <input style="width: 20%; display: inline-block; " type="text" name="password" placeholder="Enter New Password">
   <input style="width: 10%; margin-top: 40px;" type="submit" name="button" value="Submit">
 </form>

 </center>
 </section>
 <footer>
 	<h2 style="text-align: center;margin: 0;padding: 33px 0px;">Devoloped by &copy; S2S</h2>
 </footer>

</body>
</html>