<?php 
    if(isset($_GET['idedit'])){
        $id = $_GET['idedit'];
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>POS</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/tcal.css" />
</head>
<body>
	<?php require("menu.php");?>
	<section>
		<h2 style="text-align: center; margin-bottom:0;">Updating Seller</h2>
                <?php
if(isset($_POST['button'])){
    $name = $_POST['name'];
    $sex = $_POST['sex'];
    $phone = $_POST['phone'];
    
    $permited = array('jpg','png','jpeg');
    $image = "profile/".$_FILES['profile_image']['name'];
    $temp_name = $_FILES['profile_image']['tmp_name'];
    $file_size = $_FILES['profile_image']['size'];
    $file_type = $_FILES['profile_image']['type'];
    $div = explode('.', $image);
    $file_ext = strtolower(end($div));
    
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    $education = $_POST['education'];
    $sellerid = $_POST['salerId'];
    $result = $_POST['result'];
    $birth = $_POST['birth'];
    $nid = $_POST['nid'];
    $address = $_POST['address'];
    if(empty($name)||empty($sex)||empty($phone)||empty($email)||empty($password)||empty($education)||empty($result)||empty($birth)||empty($nid)||empty($address)){
        echo "Field must not be empty!!";
    }else if($file_size>3145728){
        echo "<span style='display:block;text-align:center;color:red;font-size:18px;'>File should be less then 3MB!!!</span>";
    }else if(in_array($file_ext,$permited)==false){
        echo "<span style='display:block;text-align:center;color:red;font-size:18px;'>You can upload only:-".implode(',', $permited)."</span>";
    }  else {
        move_uploaded_file($temp_name, $image);
        $con=  mysqli_connect('localhost','root','', 'dbpos') or die ('Database not Found.');
        $query = "UPDATE user SET name='$name',profile_image='$image',sex='$sex',phone='$phone',email='$email',password='$password',education='$education',result='$result',nid='$nid',address='$address' where id='$sellerid'";
        $sucess = mysqli_query($con, $query);
        if ($sucess) {
            header("Location:manage_salers.php?action=yes");   
        }
        else{
            header("Location:manage_salers.php? action= no");
        }
    }
    
}

?>
		<div>
                    <form class="form" action="edit_sellers.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="salerId" value="<?php echo $id;?>" />
               <?php 
                    $con=  mysqli_connect('localhost','root','', 'dbpos') or die ('Database not Found.');
                    $query= "SELECT * FROM user WHERE id='$id'";
                    $result = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
		<table width="90%" style="margin-left: 40px;">
     
			<tr>
				<td width="30%">Name</td>
                                <td><input type="text" name="name" value="<?php echo $row['name'];?>" required></td>
			</tr>
			<tr>
			<td>Profile Picture</td>
                        
			<td>
				<label>
					<input id="photo" name="profile_image"  type="file">
				</label>
			</td>
			</tr>
			<tr>
				<td>Sex</td>
				<td><select class="select" required name="sex">
				<option selected disabled >Select One</option>
                                <option value="Male" <?php
                                if($row['sex']=="Male"){
                                 echo "selected";   
                                }
                                ?>>Male</option>
                                <option value="Female" 
                                        <?php
                                if($row['sex']=="Female"){
                                 echo "selected"; 
                                }
                                ?>
                                        >Female</option>
				</select>
			</tr>
			<tr>
				<td>Phone</td>
				<td><input type="number" name="phone" value="<?php echo $row['phone'];?>" required></td>
			</tr>
			<tr>
				<td>E-mail</td>
				<td><input type="email" name="email" value="<?php echo $row['email'];?>" required></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="Password" name="password" value="<?php echo $row['password'];?>" required></td>
			</tr>
			<tr>
				<td>Education</td>
				<td><input type="text" name="education" value="<?php echo $row['education'];?>" required></td>
			</tr>
			<tr>
				<td>Result</td>
				<td><input type="text" name="result" value="<?php echo $row['result'];?>" required></td>
			</tr>


                         <tr>
				<td>Date of Birth</td>
				<td><input class="tcal" type="text" name="birth" value="<?php echo $row['dob'];?>" required></td>
			</tr>

                         <tr>
				<td>NID</td>
				<td><input type="name" name="nid" value="<?php echo $row['nid'];?>"></td>
			</tr>

                        <tr>
                            <td>Address</td>
                            <td><textarea required name="address">
                                <?php echo $row['address'];?>
                                </textarea></td>
                        </tr>
                        <tr>
                            <td>
                            <td>
                                <input class="addsubmit" type="submit" name="button" value="Add">
                                <input class="addsubmit" type="reset" name="button" value="Reset">
                            </td>
                            </td>
                        </tr>
		</table>
                        <?php } ?>
		</form>
		</div>
	</section>
	<footer><h2 style="text-align: center;margin: 0;padding: 33px 0px;">Devoloped by &copy; S2S</h2></footer>
	<script type="text/javascript" src="tcal.js"></script>
</body>
</html>