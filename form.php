<!DOCTYPE html>
<html>
<head>
<style> 
body, html {
  background-image: url("IoT-network-782707.jpg");
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  height: 100%;
  margin: 0;
}
.rectangle {
  background-color: rgb(0,0,0); 
  background-color: rgba(0,0,0, 0.4); 
  color: white;
  font-weight: bold;
  border: 3px solid #f1f1f1;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 100%;
  padding: 20px;
  text-align: left;
}
* {
  box-sizing: border-box;
}
.btn_stl {
  background-color: red;
  color: black;
}
</style>
</head>
<body>
<div class = "rectangle">
<?php
// define variables and set to empty values
$nameErr = $ageErr = $emailErr = $genderErr = $websiteErr = "";
$name = $age = $email = $gender = $comment = $website = "";

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
  if (empty($_POST["age"])) {
    $ageErr = "Age is required!";
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
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<h2>IoT job application</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  Age: <input type="int" age="age" value="<?php echo $age;?>">
  <span class="error">* <?php echo $ageErr;?></span>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  Website: <input type="text" name="website" value="<?php echo $website;?>">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  Bio: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">
  <br><br>
</form>
<?php
if(isset($_POST['reset'])){
  $fp = fopen("form.txt", "w");
  fwrite($fp, PHP_EOL);
  fclose($fp);
}
if(isset($_POST['submit'])){
  $name1 = 'User '. $name . ":" . PHP_EOL ;
  $age1 = ' Age: '. $age . PHP_EOL;
  $gender1 = ' Gender: '. $gender . PHP_EOL;
  $website1 = ' Website: '. $website . PHP_EOL;
  $email1 = ' Email: '. $email . PHP_EOL; 
  $comment1 = ' Bio: '. $comment . PHP_EOL;  
  $space = "". PHP_EOL; 
  $file2 = fopen("form.txt","a") or die("Unable to open file!");
  fwrite($file2, $name1);
  fwrite($file2, $age1);
  fwrite($file2, $email1);
  fwrite($file2, $comment1);
  fwrite($file2, $gender1);
  fwrite($file2, $website1);
  fwrite($file2, $space);
  fclose($file2);
  echo "Success";
}
?>
<form method = "post">
  <br><br>
  <input type="submit" class = "btn_stl" name="reset" value="Clear all">  
</form>
</div>
</body>
</html>

