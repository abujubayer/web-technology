<!DOCTYPE html>
<html>
<?php include '../Templete/head.html';?>
<body>

<?php
include '../Templete/sidenav.php';
session_start();
include '../Templete/nav.php';
// define variables and set to empty values
$userErr = $passErr = "";
$username = $password = "";
$errCount = 0;

if (isset($_SESSION['uname'])) {
    echo "<h1> Welcome ".$_SESSION['uname']."</h1>";

} else{
    header('Location:../View/login.php');
}

?>

<br>
<br>
</body>
<?php include '../Templete/footer.php';?>
</html>