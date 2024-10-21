<?php
 session_start();
 require_once("partials/DBconnect.php");
 require_once("extra_content/function.php");

 
 if(!empty($_SESSION['login'])){
     //   echo ($_SESSION['login']);
     }
     else{
         Redirect_to("admin_login.php");
     }



$searQueryParameter = $_GET["id"];

$sql = "SELECT * FROM client_message WHERE id='$searQueryParameter'";
$stmt = $connectingDB->query($sql);
while($Data = $stmt->fetch()){
    $id = $Data["id"];
    $status = $Data["status"];
}


if($status == 0){
$sql2 = "UPDATE client_message SET id = '$id', status = 1 WHERE id = '$id'";
$result = $connectingDB->query($sql2);

if($result){
    Redirect_to("dashboard.php");
}
else{
    echo "<script>alert('Something Went wrong');</script>";
}
}
else{
        $sql2 = "UPDATE client_message SET id = '$id', status = 0 WHERE id = '$id'";
        $result = $connectingDB->query($sql2);
        
        if($result){
            Redirect_to("dashboard.php");
        }
        else{
            echo "<script>alert('Something Went wrong');</script>";
        }
}  


?>