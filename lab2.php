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
$nameErr = $emailErr = $birthdayErr = $genderErr = "";
$name = $email = $birthday = $gender  = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' .-]*$/",$name)) {
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
    

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }

  if (empty($_POST["birthday"])) {
    $birthdayErr = "Gender is required";
  } else {
    $birthday = test_input($_POST["birthday"]);
  }

  $aDoor = $_POST['degree'];
  if(empty($aDoor)) 
  {
    echo("You didn't select  any degree.");
  } 
  else 
  {
    $N = count($aDoor);

    for($i=0; $i < $N; $i++)
    {
      
      echo($aDoor[$i] . " <br>");
      
    }
    if ($N < 2){
        echo "please select at least two fields";
       }

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
  Name: <input type="text" name="name">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  
  Gender:
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="other">Other
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <label for="birthday">Birthday:</label><br>
        <input type="date" id="birthday" name="birthday" value=>
        <span class="error">* <?php echo $birthdayErr;?></span><br>


        <p>DEGREE</p>
        <input type="checkbox" id="SSC" name="degree[]" value="ssc">
  <label for="SSC"> SSC</label>
  <input type="checkbox" id="HSC" name="degree[]" value="hsc">
  <label for="hsc"> HSC </label>
  <input type="checkbox" id="BSc" name="degree[]" value="bsc">
  <label for="bsc"> BSc </label>
  <input type="checkbox" id="MSc" name="degree[]" value="msc">
  <label for="msc"> MSc </label>
        
  <p>Blood group?</p>
  <input list="bg" name="id2">
  <datalist id="bg">
    <option value="A+">
    <option value="A-">
    <option value="B+">
    <option value="B-">
    <option value="O+">
    <option value="O-">
    <option value="AB+">
    <option value="AB-">
  </datalist><br><br>
  <input type="reset">
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $gender;
?>

</body>
</html>