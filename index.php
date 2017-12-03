<?php
if(isset($_GET['log'])){
    session_start();
    session_unset();
    session_destroy();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>POS</title>
        <link rel="stylesheet" type="text/css" href="sellers/css/style.css">

    </head>
<!--     <body style="background-image: url(sellers/img/bg.jpg )";> -->

        <div class="login">
            <div class="page">

                <form method="POST" action="logincheck.php" >
                    <center>
                        <table>
                            <tr>

                                <td> <center><h1 style="margin: 0;">Login</h1> <hr style="margin: 0; margin-bottom: 10px; width: 100px;"></center></td>
      

                            </tr>
        <?php 
       if (isset($_GET['action'])){
           
           if($_GET['action']=='no'){
               echo "<span style='display:block;text-align:center; margin:2px; color:red;font-size:18px;'>Wrong Email or Password.</span>";
       }}
           ?>
                            <center>
                                <tr>

                                    <td> <input name="uname" type="Email" class="log" placeholder=" Enter your Email" required> </td>

                                </tr>
                            </center>
                            <tr>

                                <td> <input name="pass" type="password" class="log" placeholder=" Password" required> </td>

                            </tr>
                            <tr>
                                <td><input type="submit" class="logbutton" name="login" value="Login"></td>
                            </tr>
                    </center>
      
                    </table>
                    </center>


                </form>

            </div>

        </div>
    </body>
</html>