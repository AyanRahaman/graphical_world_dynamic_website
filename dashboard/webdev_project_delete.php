<?php
session_start();
// ===== For Calling the redirect function ====== //
require_once("extra_content/function.php");

if (!empty($_SESSION['login'])) {
    //   echo ($_SESSION['login']);
} else {
    Redirect_to("admin_login.php");
}
// ===== For connecting with the database ====== //
require_once("partials/DBconnect.php");


$SearchQueryParameter = $_GET["id"];

$sql = "DELETE FROM s_s_c_project WHERE id = '$SearchQueryParameter'";
$result = $connectingDB->query($sql);
if($result){
    Redirect_to("website_development.php");
}
else{
    echo "<script>alert('Something went worng!! please try again later');</script>";
}
?>