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
            <h2 style="text-align: center;margin-bottom: 50px;">Updating Category</h2>
            <?php
            if (isset($_POST['button'])) {

                $con = mysqli_connect('localhost', 'root', '', 'dbpos') or die('Database not Found.');
                $name = $_POST['name'];
                $catid = $_POST['category'];

                $subid = $_POST['subid'];


                $query = "UPDATE sub_category SET subcategory_name='$name',category_id='$catid' where id='$subid'";
                $sucess = mysqli_query($con, $query);
                if ($sucess) {
                    header("Location:manage_subcatagory.php?action=yes");
                } else {
                    header("Location:manage_subcatagory.php? action= no");
                }
            }
            ?>
            <form action="edit_subcategory.php" method="POST">
                <input type="hidden" name="productsId" value="<?php echo $id; ?>" />

                <?php
                $con = mysqli_connect('localhost', 'root', '', 'dbpos') or die('Database not Found.');
                $query = "SELECT * FROM sub_category WHERE id='$id'";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <center><table width="50%">

                            <tr>

                                <td>
                                    <select required name="category">
                                        <?php
                                        $con = mysqli_connect('localhost', 'root', '', 'dbpos') or die('Database not Found.');
                                        $query = "SELECT * FROM main_category";
                                        $result = mysqli_query($con, $query);
                                        while ($category = mysqli_fetch_assoc($result)) {
                                            ?>
                                            <option value="<?php echo $category['id']; ?>"
                                            <?php
                                                if($row['category_id']==$category['id']){
                                                    echo 'selected';
                                                }
                                            ?>        
                                            ><?php echo $category['maincategory_name']; ?></option>
                                            <?php
                                        }
                                        ?>

                                    </select>
                                </td>
                            </tr>
                            <td><input  type="text" name="name" value="<?php echo $row['subcategory_name']; ?>" required></td>

                            <input type="hidden" name="subid" value="<?php echo $id;?>" />
                            <td>
                                <input  type="submit" name="button" value="Add">
                            </td>

                        </table>
                    </center>
                <?php } ?>
            </form>
    </body>
</html>