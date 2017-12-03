<?php
session_start();
if(!isset($_SESSION['uid'])){
    header("LOCATION:../");
}
?>

<header>
	<h2 style="display: inline;margin: 20px 37px;padding: 8px;float: left;">POINT OF SALES</h2>
        <table>
        <div class="up">
            <img src="<?php echo $_SESSION['image'];?>" class="img">

            <h5 style="text-align: center; margin: 1px;" > <?php echo $_SESSION['name'];?> </h5>
         </div>
        </table>
	<!-- <ul>
		<li><a href="#">Admin</a></li>
	</ul> -->
</header>
<aside>
	<ul>
		<li><a href="home.php">Home</a></li>
		<li><a href="#">Manage Product</a>
		<ul>
			<li><a href="add_product.php">Add product</a></li>
			<li><a href="view_product.php">View Product</a></li>

		</ul>
		</li>
		<li><a href="manage_salers.php">Manage Sellers</a>
		<li><a href="manage_catagory.php">Manage Category</a></li>
		<?php 
			$con=  mysqli_connect('localhost','root','', 'dbpos') or die ('Database not Found.');
        	$query = " SELECT * FROM products where quantity = 0";
        	$exc = mysqli_query($con,$query);
        	$val = mysqli_num_rows($exc);
		?>
		<li><a href="notification.php">Notification <span style="color: red; border-radius: 10px; background: black;"> <?php echo $val;?></span></a></li>
		<li><a href="#">Report</a>
		<ul>
			<li><a href="report.php">Totale Sale</a></li>
			<li><a href="product_report.php">Poduct Wise</a></li>
			<li><a href="profit_report.php">Profit Wise</a></li>
			<li><a href="seller_report.php">Seller Wise</a></li>


		</ul>
		</li>
                <li><a href="../index.php?log=log">Logout</a></li>
	</ul>
</aside>