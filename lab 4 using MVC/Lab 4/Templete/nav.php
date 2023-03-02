<nav>
<?php
if (isset($_SESSION['uname'])) {
    echo '<span>Logged in as '.$_SESSION['uname'] .'</span> | ';
    echo '<a href="../View/logout.php">Logout</a>';
} 
  else {
    echo '
  <a href="../View/index.php">Home</a> |
  <a href="../View/login.php">Login</a> |
  <a href="../View/registration.php">Registration</a>
</nav>';
}
?>

