<?php
$email =  $_POST['uname'];
$pass  =  $_POST['pass'];
$con=  mysqli_connect('localhost','root','', 'dbpos') or die ('Database not Found.');
$query="SELECT * FROM user WHERE email='$email' AND password='$pass'";

$logresult = mysqli_query($con,$query);
if(mysqli_num_rows($logresult)>0){
    session_start();
    while ($result=  mysqli_fetch_assoc($logresult)){
        $_SESSION['uid']=$result['id'];
         $_SESSION['image']=$result['profile_image'];
         $_SESSION['name']=$result['name'];
         $type=$result['type'];
    }
    if($type==0){
        header("LOCATION:sellers/home.php");
    }
    elseif ($type==1) {
 header("LOCATION:admin/home.php");   
}
else{
    header("LOCATION:index.php"); 
}
}
else{
       header("LOCATION:index.php? action=no"); 
        echo "<span style='display:block;text-align:center;color:red;font-size:18px;'>Wrong Email or Password.</span>";
}

?>


