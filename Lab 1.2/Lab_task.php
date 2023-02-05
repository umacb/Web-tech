<html>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Name: <input type="text" name="fname">
  <br>
  <label for="fav_language">please enter your favourite language:</label>
  <br>
  <input type="radio" id="html" name="fav_language" value="HTML">
<label for="html">HTML</label><br>
<input type="radio" id="css" name="fav_language" value="CSS">
<label for="css">CSS</label><br>
<input type="radio" id="C++" name="fav_language" value="C++">
<label for="C++">C++</label>
<br>
<p>please select your vehicle:</p>
<input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
<label for="vehicle1"> I have a bike</label><br>
<input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
<label for="vehicle2"> I have a car</label><br>
<input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
<label for="vehicle3"> I have a boat</label>
<br>
<br>
<label for="cars">Choose a car:</label>
<br>
<label for="cars">please choose your cars:</label>
<select name="cars" id="cars">
  <option value="volvo">Volvo</option>
  <option value="saab">Saab</option>
  <option value="mercedes">Mercedes</option>
  <option value="audi">Audi</option>
  <option value="bmw">Bmw</option>
</select>
<br>
<br>
<label for="w3review">Review of this website:</label><br>
<textarea id="w3review" name="w3review" rows="4" cols="50">
</textarea>
<br>
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
    echo "<br>";
}
  $fav_language= htmlspecialchars($_POST['fav_language']);
  if (isset($fav_language)) {
      echo $fav_language . "<br>";
  } else {
      echo "fav_language is not set <br>";
}
$vehicle1= htmlspecialchars($_POST['vehicle1']);
  if (isset($vehicle1)) {
      echo $vehicle1 . "<br>";
  } else {
      echo "vehicle1 is not set <br>";
  }
  $vehicle2= htmlspecialchars($_POST['vehicle2']);
  if (isset($vehicle2)) {
      echo $vehicle2 . "<br>";
  } else {
      echo "vehicle2 is not set <br>";
    }
      $vehicle3= htmlspecialchars($_POST['vehicle3']);
      if (isset($vehicle3)) {
          echo $vehicle3 . "<br>";
      } else {
          echo "vehicle3 is not set <br>";
      }
      $cars= htmlspecialchars($_POST['cars']);
  if (isset($cars)) {
      echo $cars . "<br>";
  } else {
      echo "car is not set <br>";
  }
  $w3review = $_REQUEST['w3review'];
  if (empty($w3review)) {
    echo "Website is empty";
  } else {
    echo $w3review;
  }
?>

</body>
</html>