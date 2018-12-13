<?php
$team_id= $_GET ['team_id'];
$dbconn = new mysqli("localhost", "root", "", "gameon") OR DIE("Error Message" . mysqli_connect_error); // Connect to database, DIE on fail
	$qrystr = 'SELECT *  FROM team WHERE ID='. $team_id; // Query String
	$rs2 = $dbconn->query($qrystr);	// Execute the query string
	if ($rs2->num_rows > 0) {	// $result must be greater than 0
		while($rsx = $rs2->fetch_assoc()) {	
      $name = $rsx['Name'];
      $Position = $rsx['Position'];
      $Manager = $rsx['Manager'];
      $Captain = $rsx['Captain'];
    }
  }

?>


<!DOCTYPE html>
<html>
<body>

<form action="team_action_page.php" method="post">
  <fieldset>
    <legend>Edit Team information:</legend>
     Name:
    <input type="text" name="firstname" value="<?php echo $name?>">
    <br>
    Position:
    <input type="text" name="position" value="<?php echo $Position?>">
    <br>
    Manager:
    <input type="text" name="Manager" value="<?php echo $Manager?>">
    <br>
    Captain:
    <input type="text" name="Captain" value="<?php echo $Captain?>">
    <br>
    <br>
    <input style="display:none" type="text" name="team_id" value="<?php echo $team_id?>">
    <input type="submit" value="update" name="submit_type">
  </fieldset>
</form>

</body>
</html>


