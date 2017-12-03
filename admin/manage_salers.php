
<!DOCTYPE html>
<html>
<head>
       <?php require("menu.php");?>
	<title>POS</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>


	<section>
			<h2 style="text-align: center;margin-bottom: 50px;">Manage Sellers</h2>
                        <center><a style="color: black;" href="add_new_saler.php" class="menagebutton">Add New Seller</a></center>
     <!--for update message and return--> 
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
      
<!--	for delete seller 		-->
    <?php
    $con=  mysqli_connect('localhost','root','', 'dbpos') or die ('Database not Found.');
        if(isset($_GET['iddelete'])){
            $delid = $_GET['iddelete'];
            $query = "DELETE FROM user where id='$delid'";
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
				<th>ID</th>
				<th>Name</th>
				<th>E-mail</th>
				<th width="20%">Action</th>
			</tr>
                 
    <?php
        $con=  mysqli_connect('localhost','root','', 'dbpos') or die ('Database not Found.');
        $query = " SELECT * FROM user";
        $i=0;
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($result)) {
          $i++;  
       ?> 
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $row['name'];?></td>
				<td><?php echo $row['email'];?></td>
				<td>
                                    <a href="view_sellers.php?idview=<?php echo $row['id'];?>" class="editbutton">View ||</a>
					<a href="edit_sellers.php?idedit=<?php echo $row['id'];?>" class="editbutton">Edit ||</a>
                                        <a onclick="return confirm('Are you sure to delte data?');" href="?iddelete=<?php echo $row['id'];?>" class="deletebutton">Delete</a>
				</td>
			</tr>
			
			<?php   } ?>
		</table>
	</section>
        
	<footer><h2 style="text-align: center;margin: 0;padding: 33px 0px;">Devoloped by &copy; S2S</h2></footer>
</body>
</html>