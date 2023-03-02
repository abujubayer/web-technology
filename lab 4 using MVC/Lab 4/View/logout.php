<!DOCTYPE html>
<html>
<?php include '../Templete/head.html';?>
<body>
<?php include '../Templete/nav.php';?>
<br>
<br>

<?php

session_start();

if (isset($_SESSION['uname'])) {
    session_destroy();
    header("location:../View/login.php");

}

else{
    header("location:../View/login.php");
}

?>
<br>
<br>
</body>
<?php include '../Templete/footer.php';?>
</html>