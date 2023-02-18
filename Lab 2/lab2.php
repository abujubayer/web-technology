<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["birth of date"])) {
    $dateErr = "Date is required";
  } else {
    $date = test_input($_POST["birth of date"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }


  if (empty($_POST["degree"])) {
    $degreeErr = "degree is required";
  } else {
    $degree = test_input($_POST["degree"]);
  }


  if (empty($_POST["blood group"])) {
    $blood_groupErr = "blood group is required";
  } else {
    $blood_group = test_input($_POST["blood group"]);
  }



}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br> 
  
  Birth of Date: <input type="text" name="date"><br><br>
  
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  Degree:
  <input type="radio" name="degree" value="SSC">SSC
  <input type="radio" name="degree" value="HSC">HSC
  <input type="radio" name="degree" value="BSc">BSc
  <input type="radio" name="degree" value="MSc">MSc
  <br><br>
  Blood group:<br><br>
  <select name="blood group" id="blood group">
	<option value="">-- Group--</option>
	<option value="A+">A+</option>
	<option value="A-">A-</option>
    <option value="B+">B+</option>
	<option value="B-">B-</option>
	<option value="AB+">AB+</option>
    <option value="O+">O+</option>
</select><br><br>
  <input type="submit" name="submit" value="Submit">  
</form>




</body>
</html>