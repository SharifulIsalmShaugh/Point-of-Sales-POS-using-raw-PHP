<?php
if (isset($_GET['idedit'])) {
    $id = $_GET['idedit'];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>POS</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body> 
        <?php require("menu.php"); ?>
        <section>
            <h2 style="text-align: center;margin-bottom: 0; font-weight: bold;">Updating product</h2>
            <?php
            if (isset($_POST['button'])) {

                $con = mysqli_connect('localhost', 'root', '', 'dbpos') or die('Database not Found.');
                $name = $_POST['name'];
                $maincategory = $_POST['maincategory'];
                $subcategory = $_POST['subcategory'];
                $B_Price = $_POST['B_Price'];
                $S_Price = $_POST['S_Price'];
                $Discount = $_POST['Discount'];
                $Quantity = $_POST['Quantity'];
                $productid = $_POST['productsId'];


                $query = "UPDATE products SET name='$name',subcategory_id='$subcategory',buy_price='$B_Price',sale_price='$S_Price',discount='$Discount',quantity='$Quantity' where id='$productid'";
                $sucess = mysqli_query($con, $query);
                if ($sucess) {
                    header("Location:view_product.php?action=yes");
                } else {
                    header("Location:view_product.php? action= no");
                }
            }
            ?>

            <form class="form" action="edit_product.php" method="POST">
                <input type="hidden" name="productsId" value="<?php echo $id; ?>" />
                <?php
                $con = mysqli_connect('localhost', 'root', '', 'dbpos') or die('Database not Found.');
                $query = "SELECT products.*,sub_category.category_id FROM products,sub_category WHERE products.id='$id' AND products.subcategory_id=sub_category.id;";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <table width="90%;" style="margin-left: 40px;">
                        <tr>
                            <td width="30%">Name</td>
                            <td><input type="text" name="name" value="<?php echo $row['name']; ?>" required></td>
                        </tr>
<!--                        <tr>
                            <td>Category</td>
                            <td>
                                <select required name="maincategory">
                                    <option selected disabled>Select Category</option>
                                    <?php
                                    $con = mysqli_connect('localhost', 'root', '', 'dbpos') or die('Database not Found.');
                                    $query = "SELECT * FROM main_category";
                                    $result = mysqli_query($con, $query);
                                    while ($category = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <option value="<?php echo $category['id']; ?>"

                                                <?php
                                                if ($row['category_id'] == $category['id']) {
                                                    echo 'selected';
                                                }
                                                ?>
                                                ><?php echo $category['maincategory_name']; ?></option>
                                                <?php
                                            }
                                            ?>

                                </select>
                            </td>
                        </tr>-->
                        <tr>
                            <td>Sub Category</td>
                            <td>
                                <select required name="subcategory">
                                    <option selected disabled>Select Category</option>
                                    <?php
                                    $con = mysqli_connect('localhost', 'root', '', 'dbpos') or die('Database not Found.');
                                    $query = "SELECT * FROM sub_category";
                                    $result = mysqli_query($con, $query);
                                    while ($category = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <option value="<?php echo $category['id']; ?>"

                                                <?php
                                                if ($row['subcategory_id'] == $category['id']) {
                                                    echo 'selected';
                                                }
                                                ?>
                                                ><?php echo $category['subcategory_name']; ?></option>
                                                <?php
                                            }
                                            ?>

                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width="30%">Buying Price</td>
                            <td><input type="number" name="B_Price" value="<?php echo $row['buy_price']; ?>" placeholder="Buying Price" required></td>
                        </tr>
                        <tr>
                            <td width="30%">Selling Price</td>
                            <td><input type="number" name="S_Price" value="<?php echo $row['sale_price']; ?>" placeholder="Selling Price" required></td>
                        </tr>
                        <tr>
                            <td width="30%">Discount</td>
                            <td><input type="number" name="Discount" value="<?php echo $row['discount']; ?>" placeholder="parcentage" required></td>
                        </tr>
                        <tr>
                            <td width="30%">Quantity</td>
                            <td><input type="number" name="Quantity" value="<?php echo $row['quantity']; ?>" required></td>
                        </tr>
                        <tr>
                            <td>
                            <td><input class="addsubmit" type="submit" name="button" value="Add"></td>
                            </td>
                        </tr>

                    </table>
                <?php } ?>
            </form>
        </section>

        <footer><h2 style="text-align: center;margin: 0;padding: 33px 0px;">Devoloped by &copy; S2S</h2></footer>

    </body>
</html>
