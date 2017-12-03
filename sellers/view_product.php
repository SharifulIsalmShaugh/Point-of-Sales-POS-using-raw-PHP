<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/buttons.dataTables.min.css">
</head>
	<body>
		<?php require("menu.php");?>
		<section>
			<h2 style="text-align: center;">Products</h2>
             <table id="table">
            <thead>
				<tr>
					<th>SL</th>
					<th>Name</th>
					<th>Category</th>
					<th>Sub Category</th>
					<th>Sales Price</th>
                                        <th>Discount</th>
					<th>Stock</th>
				</tr>
                            </thead>
                            <tbody>
                            
         <?php
        $acon=  mysqli_connect('localhost','root','', 'dbpos') or die ('Database not Found.');
        $query = "SELECT products.*,sub_category.subcategory_name,main_category.maincategory_name FROM products,sub_category,main_category WHERE products.subcategory_id=sub_category.id AND sub_category.category_id=main_category.id";
        $result = mysqli_query($acon, $query);
        $i=0;
        while ($row = mysqli_fetch_array($result)) {
           $i++;
       ?> 
		
				<tr>
					<td><?php echo $i;?></td>
					<td><?php echo $row['name'];?></td>
                                        <td><?php echo $row['maincategory_name'];?></td>
                                        <td><?php echo $row['subcategory_name'];?></td>
                                        
                                        <td><?php echo $row['sale_price'];?></td>
                                        <td><?php echo $row['discount'];?></td>
                                        <td><?php echo $row['quantity'];?></td> 
                                        
				</tr>
        <?php } ?>
				
                             </tbody>
                             <tfoot></tfoot>
			</table>
		</section>
		<footer>
			<h2 style="text-align: center;margin: 0;padding: 33px 0px;">Devoloped by &copy; S2S</h2>
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
            <!-- <script type="text/javascript" src="js/datatables.min.js"></script>
            <script>
                $(document).ready( function () {
                    $('#table').DataTable();
                } );
            </script> -->
            
	</body>
</html>

