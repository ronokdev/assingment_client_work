<?php
$emp_id= $_GET ['emp_id'];
$dbconn = new mysqli("localhost", "root", "", "gameon") OR DIE("Error Message" . mysqli_connect_error); // Connect to database, DIE on fail
	$qrystr = 'SELECT *  FROM employee WHERE ID='. $emp_id; // Query String
	$rs2 = $dbconn->query($qrystr);	// Execute the query string
	if ($rs2->num_rows > 0) {	// $result must be greater than 0
		while($rsx = $rs2->fetch_assoc()) {	
      $name = $rsx['Name'];
      $Position = $rsx['Position'];
      $LastPlayed = $rsx['LastPlayed'];
      $Rank = $rsx['Rank'];
      $Value = $rsx['Value'];
      $Salary = $rsx['Salary'];
    }
  }

?>


<!DOCTYPE html>
<html>
<body>

<form action="employee_action_page.php" method="post">
  <fieldset>
    <legend>Edit Team information:</legend>
     Name:
    <input type="text" name="firstname" value="<?php echo $name?>">
    <br>
    Position:
    <input type="text" name="position" value="<?php echo $Position?>">
    <br>
    LastPlayed:
    <input type="date" name="LastPlayed" value="<?php echo $LastPlayed?>">
    <br>
    Rank:
    <input type="text" name="Rank" value="<?php echo $Rank?>">
    <br>
    Value:
    <input type="text" name="Value" value="<?php echo $Value?>">
    <br>
    Salary:
    <input type="text" name="Salary" value="<?php echo $Salary?>">
    <br>
    <br>
    <input style="display:none" type="text" name="emp_id" value="<?php echo $emp_id?>">
    <input type="submit" value="update" name="submit_type">
  </fieldset>
</form>

</body>
</html>


