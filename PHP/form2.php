<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $gender = $_POST["gender"];
  $error = false;

  if (empty($name)) {
    $name_error = "Name is required";
    $error = true;
  }
  if (empty($email)) {
    $email_error = "Email is required";
    $error = true;
  }
  if (empty($gender)) {
    $gender_error = "Gender is required";
    $error = true;
  }
  if ($error) {
    header("Location: form1.php?name_error=$name_error&email_error=$email_error&gender_error=$gender_error");
    exit;
  }
}
?>

<h3>Name: <?php echo $name; ?></h3>
<h3>Email: <?php echo $email; ?></h3>
<h3>Gender: <?php echo $gender; ?></h3>
