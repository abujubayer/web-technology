<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
</head>
<body>
    <form action="<?php echo $SERVER['PHP_SELF'];?>">
     name: <input type ="fname">
     <input type="submit">
</form>
    <?php
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // collect value of input field
        $name = $_REQUEST['fname'];
        if (empty($name)) {
          echo "Name is empty";
        } else {
          echo $name;
        }
      }
    ?>
</body>
</html>