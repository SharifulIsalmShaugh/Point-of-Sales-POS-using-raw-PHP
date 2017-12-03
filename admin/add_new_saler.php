
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
		<h2 style="text-align: center; margin-bottom:0;">Adding New Salers</h2>
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
    $result = $_POST['result'];
    $birth = $_POST['birth'];
    $nid = $_POST['nid'];
    $address = $_POST['address'];
    if(empty($name)||empty($sex)||empty($phone)||empty($email)||empty($password)||empty($education)||empty($result)||empty($birth)||empty($nid)||empty($address)){
        echo "Field must not be empty!!";
    }else if($file_size>3145728){
        echo "<span style='display:block;text-align:center;color:red;font-size:18px;'>File should be less then 1MB!!!</span>";
    }else if(in_array($file_ext,$permited)==false){
        echo "<span style='display:block;text-align:center;color:red;font-size:18px;'>You can upload only:-".implode(',', $permited)."</span>";
    }  else {
        move_uploaded_file($temp_name, $image);
        $con=  mysqli_connect('localhost','root','', 'dbpos') or die ('Database not Found.');
        $query = "INSERT INTO user(name,profile_image,sex,phone,email,password,education,result,dob,nid,address)VALUES('$name','$image','$sex','$phone','$email','$password','$education','$result','$birth','$nid','$address')";
        $sucess = mysqli_query($con, $query);
        if ($sucess) {
            echo "<span style='display:block;text-align:center;color:green;font-size:18px;'>Data inserted.</span>";
        }
        else{
            echo "<span style='display:block;text-align:center;color:red;font-size:18px;'>Data not inserted.</span>";
        }
    }
    
}

?>
		<div>
                    <form class="form" action="add_new_saler.php" method="post" enctype="multipart/form-data">

		<table width="90%" style="margin-left: 40px;">
			<tr>
				<td width="30%">Name</td>
                                <td><input type="text" name="name" placeholder="name" required></td>
			</tr>
			<tr>
			<td>Profile Picture</td>
			<td>
				<label>
					<input id="photo" name="profile_image" size="34" type="file">
				</label>
			</td>
			</tr>
			<tr>
				<td>Sex</td>
				<td><select class="select" required name="sex">
				<option selected disabled >Select One</option>
					<option >Male</option>
					<option >Female</option>
				</select>
			</tr>
			<tr>
				<td>Phone</td>
				<td><input type="number" name="phone" placeholder="phone" required></td>
			</tr>
			<tr>
				<td>E-mail</td>
				<td><input type="email" name="email" placeholder="email" required></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="Password" name="password" placeholder="Password" required></td>
			</tr>
			<tr>
				<td>Education</td>
				<td><input type="text" name="education" placeholder="last one" required></td>
			</tr>
			<tr>
				<td>Result</td>
				<td><input type="text" name="result" placeholder="last one" required></td>
			</tr>


                         <tr>
				<td>Date of Birth</td>
				<td><input class="tcal" type="text" name="birth" placeholder="date of birth" required></td>
			</tr>

                         <tr>
				<td>NID</td>
				<td><input type="name" name="nid" placeholder="xxxxxxxxxxxx"></td>
			</tr>

                        <tr>
                            <td>Address</td>
                            <td><textarea required name="address"></textarea></td>
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
		</form>
		</div>
	</section>
	<footer><h2 style="text-align: center;margin: 0;padding: 33px 0px;">Devoloped by &copy; S2S</h2></footer>
	<script type="text/javascript" src="tcal.js"></script>
</body>
</html>