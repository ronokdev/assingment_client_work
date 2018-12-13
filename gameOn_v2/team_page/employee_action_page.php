<?php
// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";


// getting the variable
$submi_type = $_POST['submit_type'];
$firstname = $_POST['firstname'];
$position = $_POST['position'];
$LastPlayed = $_POST['LastPlayed'];
$Rank = $_POST['Rank'];
$Value = $_POST['Value'];
$Salary = $_POST['Salary'];
$emp_id = $_POST['emp_id'];



if($submi_type == strtolower("update")){
    $dbconn2 = new mysqli("localhost", "root", "", "gameon") OR DIE("Error Message" . mysqli_connect_error);

    $qrystr2 = 'UPDATE employee SET
                Name = "' . $firstname . '", 
                Position = "' . $position . '",
                LastPlayed = "' . $LastPlayed .' ",
                Rank = "' . $Rank .' ",
                Value = "' . $Value .' ",
                Salary = "' . $Salary .' "
                
                WHERE ID= ' .  $emp_id;

    echo $qrystr2;
    $rs2 = $dbconn2->query($qrystr2);
    header("location:index.php");   
  } 
else{
  $dbconn2 = new mysqli("localhost", "root", "", "gameon") OR DIE("Error Message" . mysqli_connect_error);

  $sql = 'INSERT INTO employee (Name, Position,LastPlayed,Rank,Value,Salary) 
  VALUES ("' . $firstname . '","' . $position . '","' . $Manager . '","' . $captain . '","'. '1' . '","'. date('Y-m-d ') .'")'; // Query String
  $rs2 = $dbconn2->query($sql);
  
  if($rs2){
    header("location:../adminpage.php"); 
  }
}



?>