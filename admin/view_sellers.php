<?php
    if (!isset($_GET['idview'])){
        header("location:manage_salers.php");
    } else{
        $viewid = $_GET['idview'];
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>POS</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php require("menu.php");?>
        <?php
        $con=  mysqli_connect('localhost','root','', 'dbpos') or die ('Database not Found.');
        $query = " SELECT * FROM user where id='$viewid'";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($result)) {
            
       ?> 
<section>
	<h2 style="text-align: center;margin-bottom: 50px;">Seller Details</h2>

	<table class="img">
		<tr>
                    <td> <img src="<?php echo $row['profile_image'];?>" ></td>
		</tr>
	</table>
	<table class="viewselers">

			<tr>
				<td>ID</td>
				<td><?php echo $row['id'];?></td>	

			</tr>
			<tr>
				<td>Name</td>
				<td><?php echo $row['name'];?></td>

			</tr>
			<tr>
				<td>Phone</td>
				<td><?php echo $row['phone'];?></td>

			</tr>
			<tr>
				<td>E-mail</td>
				<td><?php echo $row['email'];?></td>

			</tr>
			<tr>
				<td>Password</td>
				<td><?php echo $row['password'];?></td>

			</tr>
			<tr>
				<td>Sex</td>
				<td><?php echo $row['sex'];?></td>

			</tr>
			<tr>
				<td>Education</td>
				<td><?php echo $row['education'];?></td>

			</tr>
			<tr>
				<td>Result</td>
				<td><?php echo $row['result'];?></td>

			</tr>
			<tr>
				<td>Date of Birth</td>
				<td><?php echo $row['dob'];?></td>

			</tr>
			<tr>
				<td>NID</td>
				<td><?php echo $row['nid'];?></td>

			</tr>
			<tr>
				<td>Address</td>
				<td><?php echo $row['address'];?></td>

			</tr>
			

	</table>
        
</section>
    <?php } ?>
	<footer>
		<h2 style="text-align: center;margin: 0;padding: 33px 0px;">Devoloped by &copy; S2S</h2>
	</footer>
</body>
</html>