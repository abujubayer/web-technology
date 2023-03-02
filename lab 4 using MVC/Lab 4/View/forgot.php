<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <style>

        .make-it-center{
            margin: auto;
            width: 50%;
        }

        body{
            background: #eeeaea;
            margin: auto;
            width: 50%;
            border: 1px solid #3e3c3c;
            padding: 20px;

        }

        .lefterr{
            margin-left: -10%;
        }

        .required:after {
            content:"*";
            color: red;
        }
        .error{
            color: red;
        }

        /* The sidebar menu */
        .sidenav {
            height: 100%; /* Full-height: remove this if you want "auto" height */
            width: 220px; /* Set the width of the sidebar */
            position: fixed; /* Fixed Sidebar (stay in place on scroll) */
            z-index: 1; /* Stay on top */
            top: 0; /* Stay at the top */
            left: 0;
            background-color: #111; /* Black */
            overflow-x: hidden; /* Disable horizontal scroll */
            padding-top: 20px;
        }

        /* The navigation menu links */
        .sidenav a {
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
        }

        /* When you mouse over the navigation links, change their color */
        .sidenav a:hover {
            color: #f1f1f1;
        }

    </style>
</head>
<body>
    <?php $email = "";
$emailErr = "";
?>
<div class="donor-info make-it-center">
<h2>FORGOT PASSWORD</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Enter Email: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>

<input type="submit" name="submit" value="Submit">  

</form>

</div>
<?//php include '../Templates/nav.php';?>

<?php
// define variables and set to empty values

$username = $password = ""; 
$errCount = 0;



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])) {
        $emailErr = "Email is required for this action!";
        $errCount = $errCount + 1;
    } else {
        $email = check_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $email="";
            $errCount = $errCount + 1;
        }
    }
    include '../Controller/DataController.php';
    $user_found = false;
    if ($errCount < 1){
        $user_found = true;

        $email_check = check_email($email);
        echo 'Email :'.$email_check['email'];
        echo '<br>';
        echo 'Password :'.$email_check['pass'];
        echo '<br>';
        //$strJsonFileContents = file_get_contents("../data/data.json");
        // var_dump($strJsonFileContents);

       // $arra = json_decode($strJsonFileContents);
        // var_dump($arra);
       
        /*
        foreach($arra as $item) { //foreach element in $arr
            //echo "<br>";
            //echo "username: ".$item->username;
            //echo "<br>";
            //echo "password: ".$item->password;
            //echo "<br>";

            if ($email === $item->email){
                $user_found = true;
                // match. now check pw
                if ($item->password){
                    echo "<br><div style='color: green'>You are $item->name </br></div>";
                    echo "<div style='color: red'> Your Password is $item->password </br></div>";
                }else{
                    $passErr .= "Password Not Found!!";
                }
            }
        }*/

        if (!$user_found){
            echo $userErr .= "No account found!";
        }

    }

}

  function check_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>




</body>

<?//php include '../Templates/footer.php';?>
</html>