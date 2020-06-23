<?php session_start();
$_SESSION['loggedin'] = false;
$_SESSION['userID'] = null;
echo '<script>location.replace(\'Login.php\')</script>';
?>