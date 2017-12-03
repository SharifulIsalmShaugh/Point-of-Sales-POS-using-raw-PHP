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
            <img src="../admin/<?php echo $_SESSION['image'];?>" class="img">
            <h5 style="text-align: center; margin: 1px;"> <?php echo $_SESSION['name'];?> </h5>
         </div>
        </table>
	<!-- <ul>
		<li><a href="#">img</a>
			<ul>
				<li><a href="#">Logout</a></li>
			</ul>
				</li>
			</ul> -->
</header>
<aside> 
	<ul>
		<li><a href="home.php">Home</a></li>
		<li><a href="view_product.php">Product</a></li>
		<li><a href="sales_product.php">Sales Product</a></li>
		<li><a href="profile.php">Profile</a></li>
		<li><a href="report.php">Report</a></li>
		<li><a href="../index.php?log=log">Logout</a></li>
	</ul>
</aside>
	