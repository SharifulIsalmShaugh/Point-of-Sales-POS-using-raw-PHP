<!DOCTYPE html>
<html>
    <head>
        <title>POS</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/chosen.min.css" media="all" />
    </head>
    <body>
        <?php require("menu.php"); ?>
        <section>
            <h2 style="text-align: center;">Sales Product</h2>

            <div class="left">
  <?php 
       if (isset($_GET['action'])){
           
           if($_GET['action']=='yes'){
               echo "<span style='display:block;text-align:center; margin:5px; color:red;font-size:20px;'>You Have Less Quantity<?php?></span>";
           }
           if($_GET['action']=='error'){
               echo "<span style='display:block;text-align:center; margin:5px; color:red;font-size:20px;'>You Already Added This Product</span>";

           }
       }
    ?>
            <form class="form" action="add_cart.php" method="POST">
                <table width="70%;" style="margin-left: 40px;">
                    <tr>
                        <td width="30%">Name</td>
                        <td>
                            <select required class="chosen-select" name="products" >
                                <option selected disabled  >Name</option>
                                <?php
                                $con = mysqli_connect('localhost', 'root', '', 'dbpos') or die('Database not Found.');
                                
                                

                                $query = "SELECT * FROM products";
                                $result = mysqli_query($con, $query);
                                
                        
                                while ($products = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <option value="<?php echo $products['id']; ?>"><?php echo $products['name']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>

                        <td width="30%">Quantity</td>

                        <td><input style="width: 70%" type="number" name="Quantity" placeholder="Quantity" required></td>
                    </tr>
                    <tr><td><input type="hidden" name="sellerid"></td></tr>
                    <tr>
                        <td>
                        <td><input style="width: 50%" type="submit" name="button" value="Add To Cart">
                        </td>
                    </tr>

                </table>
            </form>
            </div>
            <div class="right">
             <?php
            $con = mysqli_connect('localhost', 'root', '', 'dbpos') or die('Database not Found.');
            if (isset($_GET['iddelete'])) {
                $delid = $_GET['iddelete'];
                $query = "DELETE FROM sales_details where sale_id='$delid'";
                $delete = mysqli_query($con, $query);

            }
            ?>
            <table class="table">
            <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quentity</th>
                <th>Total</th>
                <th width="20%">Action</th>
            </tr>
            <?php
        
             $sid = session_id();
             
           
               $con = mysqli_connect('localhost', 'root', '', 'dbpos') or die('Database not Found.');
               $query = "SELECT sales_details.*,products.name FROM sales_details,products WHERE sales_details.sessionid='$sid' AND sales_details.product_id=products.id"; 
               $i=0;
               $query = mysqli_query($con, $query);
              //  if ($query) {
              //      echo "Ok";
              //  }
              //  else{
              // echo  mysqli_error($con);
              //  }
               $sum=0;
               while ($result=mysqli_fetch_assoc($query)) {
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
                <td><a onclick="return confirm('Are you sure to delte data?');" href="?iddelete=<?php echo 
                $result['sale_id'];?>">Delete</a></td>
            </tr>
            <?php
            $sum = $sum+$stotal;
            ?>
            <?php
}
            ?>
            <tr>
                <td colspan="4">Total</td>
                <td colspan="2"><?php echo $sum;?>TK</td>
            </tr>

                </table>
                
                   <button style="height: 40px; width: 90px; border-radius: 5px;margin-left: 250px; margin-bottom: 10px; background: #00897b;font-weight: bold;"><a href="confirm.php">Confirm</a></button>
            </div>
        </section>
        <footer>
            <h2 style="text-align: center;margin: 0;padding: 33px 0px;">Devoloped by &copy; S2S</h2>
        </footer>
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/chosen.jquery.min.js"></script>
        <script>
            $(".chosen-select").chosen({no_results_text: "Oops, nothing found!"});
        </script>
    </body>
</html>