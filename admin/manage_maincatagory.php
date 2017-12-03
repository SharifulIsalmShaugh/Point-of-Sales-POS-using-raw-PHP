

<!DOCTYPE html>
<html>
<head>
	<title>POS</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php require("menu.php");?>
	<section>
			<h2 style="text-align: center;margin-bottom: 50px;">Manage Category</h2>

	<?php 
       if (isset($_GET['action'])){
           
           if($_GET['action']=='yes'){
               echo "<span style='display:block;text-align:center; margin:29px; color:green;font-size:18px;'>Data Updated.</span>";
           }
    else {
                echo "<span style='display:block;text-align:center; margin:29px; color:red;font-size:18px;'>Data not Updated.</span>";
        }
       }
    ?>


 <?php
    
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        
        $con=  mysqli_connect('localhost','root','', 'dbpos') or die ('Database not Found.');
        $name= $_POST['name'];
        $query= "INSERT INTO main_category(maincategory_name)VALUES('$name')";
        $sucess= mysqli_query($con, $query);
        if($sucess){
            echo "<span style='display:block;text-align:center;color:green;font-size:18px;'>Data inserted.</span>";
        }
 else {
           echo "<span style='display:block;text-align:center;color:red;font-size:18px;'>Data Not inserted.</span>";
 }
    }
    
    ?>
                        <form action="" method="POST">
			<table width="50%">
			<tr>
			<td>
				<input class="inputform" type="text" name="name" placeholder="New Catagory" required>
				
			</td>
			<td>
				<input class="submitbutton" type="submit" name="button" value="Add">
			</td>
			</tr>
			</table>
			</form>
			<!-- <a href="#" class="menagebutton">Add New Catagory</a> -->
        <?php
    $con=  mysqli_connect('localhost','root','', 'dbpos') or die ('Database not Found.');
        if(isset($_GET['iddelete'])){
            $delid = $_GET['iddelete'];
            $query = "DELETE FROM main_category where id='$delid'";
            $delete = mysqli_query($con, $query);
            if($delete){
                echo "<span style='color:green;text-align:center;' >Data Deleted successfully!!</span>";
            } else {
                echo "<span style='color:red;text-align:center;' >Data Not Deleted!!</span>";
            }
        }
    ?>
		<table class="table">
			<tr>
				<th>SL</th>
				<th>Name</th>
				<th width="20%">Action</th>
			</tr>
       <?php
        $con=  mysqli_connect('localhost','root','', 'dbpos') or die ('Database not Found.');
        $query = " SELECT * FROM main_category";
        $i=0;
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($result)) {
           $i++; 
       ?> 
		
				<tr>
					<td><?php echo $i;?></td>
					<td><?php echo $row['maincategory_name'];?></td> 
                                        <td>
					<a href="edit_maincategory.php?idedit=<?php echo $row['id'];?>" class="editbutton">Edit ||</a>
					<a onclick="return confirm('Are you sure to delte data?');" href="?iddelete=<?php echo $row['id'];?>" class="deletebutton">Delete</a>
                                        </td>
				</tr>
        <?php  } ?>
			
		</table>
      
                        
	</section>
	<footer><h2 style="text-align: center;margin: 0;padding: 33px 0px;">Devoloped by &copy; S2S</h2></footer>
</body>
</html>