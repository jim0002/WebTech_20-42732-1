<!DOCTYPE html>
<html>
<head>
	<style>
		.red{
			color: red;
		}

		.Div {
			border: 2px ;
			background-color: lightblue; 
			border: 5px outset gray;   
		}
	</style>
</head>
<body>

<?php
// define variables and set to empty values
$nameErr = $emailErr = $dateErr = $genderErr= $degreeErr= $bloodgroupErr= "" ;
$name = $email = $date = $gender= $degree= $bloodgroup= "" ;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = $_POST["name"];
    $len= str_word_count($name);
    if($len>2){
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed";
          }
		  else{$nameErr="There should be more than 2 words.";}
    }
    
    }
  

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = $_POST["email"];
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["date"])) {
    $dateErr = "DOB is required";
  } else {
    $date = $_POST["date"];}

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = $_POST["gender"];
  }

  if (empty($_POST["degree"])) {
    $degreeErr = "Degree is required";
  } else {
    $degree = $_POST["degree"];
  }

  if (empty($_POST["bloodgroup"])) {
    $bloodgroupErr = "Blood Group is required";
  } else {
    $bloodgroup = $_POST["bloodgroup"];
  }
}

?>

	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<div class="Div">
		<fieldset>
		<legend>Name:</legend>
		<input type="text" name="name" value="<?php echo $name;?>"><span class="red">*<?php echo $nameErr ?></span>
		<br>
		</fieldset>
		</div>

		<br>

		<div class="Div">
		<fieldset>
		<legend>Email:</legend>
		<input type="text" name="email" value="<?php echo $email;?>"><span class="red">*<?php echo $emailErr ?></span>
		<br>
		</fieldset>
		</div>

		<br>

		<div class="Div">
		<fieldset>
		<legend>DOB:</legend>
		<input type="date" id="date" name="date" min="1979-12-31" max="2000-01-02" value="<?php echo $date;?>"> <span class="red">*<?php echo $dateErr ?></span>
		</fieldset>
		</div>

		<br>

		<div class="Div">
		<fieldset>
		<legend>Gender</legend>
		<input type="radio" name="gender"
		<?php if (isset($gender) && $gender=="female") echo "checked";?>
		value="female">Female
		<input type="radio" name="gender"
		<?php if (isset($gender) && $gender=="male") echo "checked";?>
		value="male">Male
		<input type="radio" name="gender"
		<?php if (isset($gender) && $gender=="other") echo "checked";?>
		value="other">Other<span class="red">*<?php echo $genderErr ?></span>
		</fieldset>
		</div>

		<br>

		<div class="Div">
		<fieldset>
		<legend>DEGREE:</legend>
		<input type="checkbox" id="degree" name="degree" 
		<?php if (isset($degree) && $degree=="SSC") echo "checked";?>
		value="SSC">SSC
		<input type="checkbox" id="degree" name="degree" 
		<?php if (isset($degree) && $degree=="HSC") echo "checked";?>
		value="HSC">HSC
		<input type="checkbox" id="degree" name="degree" 
		<?php if (isset($degree) && $degree=="BSc") echo "checked";?>
		value="BSc">BSc
		<input type="checkbox" id="degree" name="degree" 
		<?php if (isset($degree) && $degree=="MSc") echo "checked";?>
		value="MSc">MSc<span class="red">*<?php echo $degreeErr ?></span>
		</fieldset>
		</div>

		<br>

		<div class="Div">
		<fieldset>
		<legend>BLOOD GROUP:</legend>
		<select name="bloodgroup">
			<option text="blank"></option>
			<option <?php if (isset($bloodgroup) && $bloodgroup=="A+ve") echo "selected";?>
			value="A+ve">A+ve</option>

            <option <?php if (isset($bloodgroup) && $bloodgroup=="A-ve") echo "selected";?>
			value="A-ve">A-ve</option>

            <option <?php if (isset($bloodgroup) && $bloodgroup=="B+ve") echo "selected";?>
			value="B+ve">B+ve</option>

            <option <?php if (isset($bloodgroup) && $bloodgroup=="B-ve") echo "selected";?>
			value="B-ve">B-ve</option>

			<option <?php if (isset($bloodgroup) && $bloodgroup=="AB+ve") echo "selected";?>
			value="AB+ve">AB+ve</option>

            <option <?php if (isset($bloodgroup) && $bloodgroup=="AB-ve") echo "selected";?>
			value="AB-ve">AB-ve</option>

			<option <?php if (isset($bloodgroup) && $bloodgroup=="O+ve") echo "selected";?>
			value="O+ve">O+ve</option>

            <option <?php if (isset($bloodgroup) && $bloodgroup=="O-ve") echo "selected";?>
			value="O-ve">O-ve</option>

            value="<?php echo $bloodgroup;?>" </select><span class="red">*<?php echo $bloodgroupErr ?></span><br>
		</fieldset>
		</div>

		<br>

		<input type="submit" name="">

	</form>

	<h2>Input Data</h2>
	<?php 
	echo $name."<br>";
	echo $email."<br>";
	echo $date."<br>";
	echo $gender."<br>";
	echo $degree. "<br>";
	echo $bloodgroup."<br>";
	 ?>




</body>
</html>