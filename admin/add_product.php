
<!DOCTYPE html>
<html>
    <head>
        <title>POS</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <?php require("menu.php"); ?>
        <section>
            <h2 style="text-align: center;margin-bottom: 0; font-weight: bold;">Adding New product</h2>
            <?php
            if (isset($_POST['button'])) {

                $con = mysqli_connect('localhost', 'root', '', 'dbpos') or die('Database not Found.');
                $name = $_POST['name'];
                $subcategory = $_POST['subcategory'];
                $B_Price = $_POST['B_Price'];
                $S_Price = $_POST['S_Price'];
                $Discount = $_POST['Discount'];
                $Quantity = $_POST['Quantity'];


                $query = "INSERT INTO products(name,subcategory_id,buy_price,sale_price,discount,quantity)VALUES('$name','$subcategory','$B_Price',' $S_Price','$Discount','$Quantity')";
                $sucess = mysqli_query($con, $query);
                if ($sucess) {
                    echo "<span style='display:block;text-align:center;color:green;font-size:18px;'>Data inserted.</span>";
                } else {
                    echo "<span style='display:block;text-align:center;color:green;font-size:18px;'>Data not inserted.</span>";
                    //echo mysqli_error($con);
                }
            }
            ?>

            <form class="form" action="" method="POST">
                <table width="90%;" style="margin-left: 40px;">
                    <tr>
                        <td width="30%">Name</td>
                        <td><input type="text" name="name" placeholder="name" required></td>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <td>
                            <select required name="category">
                                <option selected disabled>Select Category</option>
                                <?php
                                $con = mysqli_connect('localhost', 'root', '', 'dbpos') or die('Database not Found.');
                                $query = "SELECT * FROM main_category";
                                $my_result = mysqli_query($con, $query);
                                while ($category = mysqli_fetch_assoc($my_result)) {
                                    ?>
                                    <option value="<?php echo $category['id']; ?>"><?php echo $category['maincategory_name']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Sub Category</td>
                        <td>
                            <select required name="subcategory">
                                <option selected disabled>Select Sub Category</option>
                                <?php
                                $con = mysqli_connect('localhost', 'root', '', 'dbpos') or die('Database not Found.');
                                $query = "SELECT * FROM sub_category";
                                $result = mysqli_query($con, $query);
                                while ($subcategory = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <option value="<?php echo $subcategory['id']; ?>"><?php echo $subcategory['subcategory_name']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td width="30%">Buying Price</td>
                        <td><input type="number" name="B_Price" placeholder="Buying Price" required></td>
                    </tr>
                    <tr>
                        <td width="30%">Selling Price</td>
                        <td><input type="number" name="S_Price" placeholder="Selling Price" required></td>
                    </tr>
                    <tr>
                        <td width="30%">Discount</td>
                        <td><input type="number" name="Discount" placeholder="parcentage" required></td>
                    </tr>
                    <tr>
                        <td width="30%">Quantity</td>
                        <td><input type="number" name="Quantity" required></td>
                    </tr>
                    <tr>
                        <td>
                        <td><input class="addsubmit" type="submit" name="button" value="Add"></td>
                        </td>
                    </tr>

                </table>
            </form>
        </section>

        <footer><h2 style="text-align: center;margin: 0;padding: 33px 0px;">Devoloped by &copy; S2S</h2></footer>

    </body>
</html>