<?php include ("./inc/header.inc.php");
include ("./inc/connect.inc.php");

if(isset($_COOKIE['SNID'])){
    $cookie=sha1($_COOKIE['SNID']);
    $query=mysqli_query($db,"SELECT * FROM login_tokens WHERE tokens='$cookie'");
    $count= mysqli_num_rows($query);
    if($count==0){
        die("you are not logged in!!");
    }
    if($count==1){
        ?>
        <form action="" method="post">
            <input type="submit" value="Logout" name="logout">
        </form>
        <?php
        if(isset($_POST['logout'])){
            $query=mysqli_query($db,"DELETE FROM login_tokens WHERE tokens='$cookie'");
            header("location:index.php");
        }
        
    }
}
else{
    die("You are not logged in!!");
}
?>

