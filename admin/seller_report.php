
<!DOCTYPE html>
<html>
<head>
       <?php require("menu.php");?>
	<title>POS</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>


	<section>
			<h2 style="text-align: center;margin-bottom: 50px;">Seller wise Report</h2>

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
        <a href="seller_report_all.php?idview=<?php echo $row['id'];?>" class="editbutton">Report</a>
                                       
				</td>
			</tr>
			
			<?php   } ?>
		</table>
	</section>
        
	<footer><h2 style="text-align: center;margin: 0;padding: 33px 0px;">Devoloped by &copy; S2S</h2></footer>
</body>
</html>