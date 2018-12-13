<?php
$team_id= $_GET ['team_id'];
echo $team_id;

$dbconn = new mysqli("localhost", "root", "", "gameon") OR DIE("Error Message" . mysqli_connect_error); // Connect to database, DIE on fail
	$qrystr = 'SELECT *  FROM team WHERE ID='. $team_id; // Query String
	$rs2 = $dbconn->query($qrystr);	// Execute the query string
	if ($rs2->num_rows > 0) {	// $result must be greater than 0
		while($rsx = $rs2->fetch_assoc()) {	
      echo "<pre>";
      var_dump($rsx);
      echo "</pre>";
       
    }
  }

?>


<!DOCTYPE html>
<html>
<body>

<form action="/action_page.php">
  <fieldset>
    <legend>Edit Team information:</legend>
    First name:<br>
    <input type="text" name="firstname" value="Mickey">
    <br>
    Last name:<br>
    <input type="text" name="lastname" value="Mouse">
    <br><br>
    <input type="submit" value="Submit">
  </fieldset>
</form>

</body>
</html>


