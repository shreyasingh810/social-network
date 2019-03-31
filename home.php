<?php include ("./inc/header.inc.php");
include ("./inc/connect.inc.php");
function callname(){
    return "Welcome";
}
include("check.php");
if(!$id){
    die("You dont have access");
}

if(isset($_POST['submit'])){
    $body=$_POST['body'];
    if($body == ""){
        echo "Write something!!";
    }
    else{
        $date=date("Y-m-d H:i:s");
        $query= mysqli_query($db, "INSERT INTO post VALUES('','$body','$date','$id')");
    }
}
?>
<form action="" method="post">
    <textarea name="body" id="" cols="30" rows="5"></textarea>
    <input type="submit" value="Post" name="submit">
</form>

<?php
$query= mysqli_query($db,"SELECT * FROM post");
while($row=mysqli_fetch_array($query)){
    $added_by=$row['posted_by'];
    $body=$row['body'];
    $added_on=$row['added_on'];

    echo $added_by . " " . $body . " " . $added_on . "<br>";
}
?>