
<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php

$nameErr = $emailErr = $genderErr = $doberr = $degreeerr = $blooderr= "";
$name = $email = $gender = $dob =  $blood ="";
$degree=false;
$count=0;
$namelength= strlen($name);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Can not be empty";
  } else {
    $name = test_input($_POST["name"]);
   
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and White space are allowed";
    }
    else if($namelength < 2)
    {$nameErr = "<redtext> Invalid name. name must contains at least two words</redtext>";}
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Can not be empty";
  } else {
    $email = test_input($_POST["email"]);
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Must be a valid email";
    }
  }
    
  if (empty($_POST["dob"])) {
    $doberr = "Can not be empty";
  } else {
    $dob = test_input($_POST["dob"]);
   
  }

  if (empty($_POST["Blood"])) {
    $blooderr = "Must be selected";
  } else {
    $blood = test_input($_POST["Blood"]);
    if($blood=="None")
    $blooderr = "Must be selected";
  }

  if (empty($_POST["gender"])) {
    $genderErr = "At least one of them must be selected";
  } else {
    $gender = test_input($_POST["gender"]);
  }
  
  if(!empty($_POST['deg'])) { 
       $degree=true;

       if($degree)
       {
        
         foreach($_POST['deg'] as $value){
          $count=$count+1;
       }
       if($count<2)
       {
         $degreeerr="Please Select at least two of them ";
       }
      
       }
       
       }
       else
       {
         $degreeerr="Please Select at least two of them";
       }


  }   

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
<fieldset>
<legend>Name:</legend> <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  <fieldset>
  <fieldset>
  <legend>E-mail:</legend> <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
</fieldset>
<fieldset>
   <legend><label for="dob">Date of birth :</label></legend>
   <input type="date" name="dob" id="dob">
   <span class="error">* <?php echo $doberr;?></span>
   <br>
</fieldset>
<fieldset>
  <legend>Gender:</legend>
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
</fieldset>
<fieldset>
  <legend>Degree:</legend>
      <input type="checkbox" name="deg[]"  value="SSC">SSC
      <input type="checkbox" name="deg[]"  value="HSC">HSC
      <input type="checkbox" name="deg[]" value="BSC">BSC
      <input type="checkbox" name="deg[]" value="MSC">MSC
      <span class="error">* <?php echo $degreeerr;?></span>
     <br>
    </fieldset>
    <fieldset>
   <legend> Group:</legend>
   <select name="Blood" id="">
   <option value="None">None</option>
     <option value="O+">O+</option>
     <option value="O-">O-</option>
     <option value="A+">A+</option>
     <option value="A-">A-</option>
     <option value="B+">B+</option>
     <option value="B-">B-</option>
     <option value="AB+">AB+</option>
     <option value="AB-">AB-</option>
   </select>
   <span class="error">* <?php echo $blooderr;?></span>
   <br>
</fieldset>
  <input type="submit" name="submit" value="Submit">  


</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $dob;
echo "<br>";
echo $gender;
echo "<br>";


if($count>1)
{
  if(!empty($_POST['deg'])) {   
  
  foreach($_POST['deg'] as $value){
    echo "Degrees :". $value ;
    echo "<br>";
}
  }
}
if($blood!="None")
echo $blood;


?>

</body>
</html>