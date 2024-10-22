<?php
require_once("partials/DBconnect.php");
$searQueryParameter = $_GET["id"];

$sql = "SELECT * FROM portfolio WHERE id='$searQueryParameter'";
$stmt = $connectingDB->query($sql);
while($Data = $stmt->fetch()){
    $id = $Data["id"];
    $image = $Data["image"];
}

$sql = "DELETE FROM portfolio WHERE id = '$searQueryParameter'";
$result=$connectingDB->query($sql);

if($result){
    $path = 'images/'. $image;
    unlink($path);
    header("location: portfolio.php");
}
else{
    echo "<script>alert('Data not deleted')</script>";
}
?>