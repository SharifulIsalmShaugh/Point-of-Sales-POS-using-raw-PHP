
<!DOCTYPE html>
<html>
    <head>
        <title>POS</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <?php require("menu.php"); ?>
        <section>
            <h2 style="text-align: center;margin-bottom: 50px;">Manage Subcategory</h2>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $con = mysqli_connect('localhost', 'root', '', 'dbpos') or die('Database not Found.');
                $name = $_POST['category'];
                $subname = $_POST['name'];
                $query = "INSERT INTO sub_category(category_id,subcategory_name)VALUES('$name','$subname')";
                $sucess = mysqli_query($con, $query);
                if ($sucess) {
                    echo "<span style='display:block;text-align:center;color:green;font-size:18px;'>Data inserted.</span>";
                } else {
                    echo "<span style='display:block;text-align:center;color:red;font-size:18px;'>Data Not inserted.</span>";
                }
            }
            ?>
            <form action="" method="POST">
                <table width="50%">
                    <tr class="">

                        <td>
                            <select class="inputoption" required name="category">
                                <option selected disabled >Select Category</option>
                                <?php
                                $con = mysqli_connect('localhost', 'root', '', 'dbpos') or die('Database not Found.');
                                $query = "SELECT * FROM main_category";
                                $result = mysqli_query($con, $query);
                                while ($category = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <option value="<?php echo $category['id']; ?>"><?php echo $category['maincategory_name']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                    </tr>
                    <td>
                        <input class="inputform"   type="text" name="name" placeholder="New Sub Catagory" required>

                    </td>
                    <td>
                        <input class="submitbutton" type="submit" name="button" value="Add">
                    </td>
                    </tr>
                </table>
            </form>
            <?php
            $con = mysqli_connect('localhost', 'root', '', 'dbpos') or die('Database not Found.');
            if (isset($_GET['iddelete'])) {
                $delid = $_GET['iddelete'];
                $query = "DELETE FROM sub_category where id='$delid'";
                $delete = mysqli_query($con, $query);
                if ($delete) {
                    echo "<span style='color:green;text-align:center;' >Data Deleted successfully!!</span>";
                } else {
                    echo "<span style='color:red;text-align:center;' >Data Not Deleted!!</span>";
                }
            }
            ?>
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Subcategory Name</th>
                    <th width="20%">Action</th>
                </tr>
                <?php
                $con = mysqli_connect('localhost', 'root', '', 'dbpos') or die('Database not Found.');
                $query = " SELECT sub_category.*,main_category.maincategory_name FROM sub_category,main_category WHERE sub_category.category_id=main_category.id ";
                $i=0;
                $result = mysqli_query($con, $query);
                
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $i++;
                        ?> 
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row['maincategory_name']; ?></td>
                            <td><?php echo $row['subcategory_name']; ?></td>
                            <td>
                                <a href="edit_subcategory.php?idedit=<?php echo $row['id']; ?>" class="editbutton">Edit ||</a>
                                <a onclick="return confirm('Are you sure to delte data?');" href="?iddelete=<?php echo $row['id']; ?>" class="deletebutton">Delete</a>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    echo mysqli_error($con);
                }
                ?>
                </tr>

            </table>
        </section>
        <footer><h2 style="text-align: center;margin: 0;padding: 33px 0px;">Devoloped by &copy; S2S</h2></footer>
    </body>
</html>