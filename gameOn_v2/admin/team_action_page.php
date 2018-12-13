<?php
// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";


// getting the variable
$submi_type = $_POST['submit_type'];
$firstname = $_POST['firstname'];
$position = $_POST['position'];
$Manager = $_POST['Manager'];
$captain = $_POST['Captain'];
$team_id = $_POST['team_id'];



if($submi_type == strtolower("update")){
    $dbconn2 = new mysqli("localhost", "root", "", "gameon") OR DIE("Error Message" . mysqli_connect_error);

    $qrystr2 = 'UPDATE team SET
                Name = "' . $firstname . '", 
                Position = "' . $position . '",
                Manager = "' . $Manager .' ",
                Captain = "' . $captain .' ",
                LastUsed = "' . date('Y-m-d ') .' "
                WHERE ID=' .  $team_id;

    echo $qrystr2;
    $rs2 = $dbconn2->query($qrystr2);
    header("location:../adminpage.php"); 
  } 
else{
  $dbconn2 = new mysqli("localhost", "root", "", "gameon") OR DIE("Error Message" . mysqli_connect_error);

  $sql = 'INSERT INTO team (Name, Position, Manager, Captain,Business_ID,LastUsed) VALUES ("' . $firstname . '","' . $position . '","' . $Manager . '","' . $captain . '","'. '1' . '","'. date('Y-m-d ') .'")'; // Query String
  $rs2 = $dbconn2->query($sql);
  
  if($rs2){
    header("location:../adminpage.php"); 
  }
}



?>