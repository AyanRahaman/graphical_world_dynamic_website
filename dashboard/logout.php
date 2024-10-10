<?php
session_start();
session_destroy();

// header("location:login.php");
echo "<script>document.location='admin_login.php'</script>";
?>