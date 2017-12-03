<!-- <?php
if (isset($_GET['detailsid'])) {
    $idr = $_GET['detailsid'];
}
?> -->
<!DOCTYPE html>
<html>
<head>
	<title>POS</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="calendar/jquery-ui.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/buttons.dataTables.min.css">
</head>
<body>
	<?php require("menu.php");?>
	<section>

		<h2 style="text-align: center;margin-bottom: 50px;"> Details</h2>
		<center>
			
			<form action="" method="post" style="margin: 20px;" >
				From:<input id="datepicker"  type="text" style="width: 223px; padding:14px; display: inline-block; margin-bottom: 60px" name="d1" class ="tcal" required> 
				To:<input id="datepicker1"  type="text" style="width: 223px; padding:14px; display: inline-block;" name="d2" class ="tcal" required>
				<input style="width: 100px; margin-top: 20px; display: inline-block;" type="submit" name="button" value="Search">

			</form>

		</center>
		<table id="table">
		<thead>
			<tr>
				<th>SL</th>
				<th>Name</th>
				<th>Price</th>
				<th>Quentity</th>
				<th>Total</th>
				<th>Sale Date</th>

			</tr>
			</thead>
			<tbody>

			<?php
			if(isset($_POST['button'])){
				$from = $_POST['d1'];
				$to = $_POST['d2'];
				$query="SELECT sales_details.*,products.name FROM sales_details,products WHERE sales_details. 
			 product_id=products.id AND sale_date >= '$from' AND sale_date <= '$to'";
			 }
			 else{
				$query="SELECT sales_details.*,products.name FROM sales_details,products WHERE sales_details. 
			 product_id=products.id";
			}

			$con = mysqli_connect('localhost', 'root', '', 'dbpos') or die('Database not Found.');

				$exquery = mysqli_query($con,$query) or die('Somthing went wrong');
				$i=0;
        while ($result = mysqli_fetch_assoc($exquery)) {
           $i++;
				?>
				<tr>
			    <td><?php echo $i;?></td>
                <td><?php echo $result['name'];?></td>
                <td><?php echo $result['product_price'];?></td>
                <td><?php echo $result['product_quantity'];?></td>
                <td><?php  
               $stotal = $result['product_price'] * $result['product_quantity'];
               echo $stotal;?>
                TK</td>
                <td><?php echo $result['sale_date'];?></td>


            </tr>
				<?php }?>
				</tbody>
				<tfoot></tfoot>
			</table>
			
		</section>
		<footer>
			<h2 style="text-align: center;margin: 0;padding: 33px 0px;">Devoloped by &copy; S2S</h2>
		</footer>
		<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="calendar/jquery-ui.js"></script>
		<script>
			$( "#datepicker" ).datepicker({
				dateFormat: "dd-mm-yy"
			});
			$( "#datepicker1" ).datepicker({
				dateFormat: "dd-mm-yy"
			});;
		</script>
						</script>
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