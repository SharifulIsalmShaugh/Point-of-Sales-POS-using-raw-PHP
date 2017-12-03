<!DOCTYPE html>
<html>
<head>
	<title>POS</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/buttons.dataTables.min.css">
</head>
<body>
	<?php require("menu.php");?>
<section>
<h2 style="text-align: center;"> Insufficient Products</h2>

<table id="table">
<thead>
			<tr>
				<th>SL</th>
				<th>Name</th>
				<th>Quantity</th>
				<th width="20%">Action</th>
			</tr>
			</thead>
			<tbody>
       <?php
        $con=  mysqli_connect('localhost','root','', 'dbpos') or die ('Database not Found.');
        $query = " SELECT * FROM products where quantity = 0";
        $result = mysqli_query($con, $query);
        $i=0;
        while ($row = mysqli_fetch_array($result)) {
         $i++;   
       ?> 
		
				<tr>
					<td><?php echo $i;?></td>
					<td><?php echo $row['name'];?></td>
					<td><?php echo $row['quantity'];?></td> 
                   <td>
					<a href="edit_product.php?idedit=<?php echo $row['id'];?>"  class="editbutton">Add</a>
                    </td>
				</tr>
				</tbody>
				<tfoot></tfoot>
        <?php  } ?>
			
		</table>	
</section>
<footer>
	<footer><h2 style="text-align: center;margin: 0;padding: 33px 0px;">Devoloped by &copy; S2S</h2></footer>
</footer>
		<script type="text/javascript" src="js/jquery-1.12.4.js"></script>
        <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="js/buttons.flash.min.js"></script>
        <script type="text/javascript" src="js/jszip.min.js"></script>
        <script type="text/javascript" src="js/pdfmake.min.js"></script>
        <script type="text/javascript" src="js/vfs_fonts.js"></script>
        <script type="text/javascript" src="js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="js/buttons.print.min.js"></script>
        <script>
            $(document).ready(function() {
    $('#table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
             'excel', 'pdf', 'print'
        ]
    } );
} );
        </script>
</body>
</html>