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
</head>
<body>
	<?php require("menu.php");?>
	<section>
			<h2 style="text-align: center;margin-bottom: 50px;">Updating Category</h2>
        <?php
    
    if(isset($_POST['button']))
    {
        
        $con=  mysqli_connect('localhost','root','', 'dbpos') or die ('Database not Found.');
        $name= $_POST['name'];
        $productid= $_POST['productsId'];

        
        $query= "UPDATE main_category SET maincategory_name='$name' where id='$productid'";
        $sucess= mysqli_query($con, $query);
        if ($sucess) {
            header("Location:manage_maincatagory.php?action=yes");   
        }
        else{
            header("Location:manage_maincatagory.php? action= no");
        }
    }
    


		?>
             <form action="edit_maincategory.php" method="POST">
             <input type="hidden" name="productsId" value="<?php echo $id;?>" />

              <?php 
                    $con=  mysqli_connect('localhost','root','', 'dbpos') or die ('Database not Found.');
                    $query= "SELECT * FROM main_category WHERE id='$id'";
                    $result = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_array($result)) {
                  ?>
			<center><table width="50%">
			<tr>
			<td>
				<td><input type="text" name="name" value="<?php echo $row['maincategory_name'];?>" required></td>
				
			</td>
			<td>
				<input  type="submit" name="button" value="Add">
			</td>
			</tr>
			</table>
			</center>
			<?php } ?>
			</form>
</body>
</html>