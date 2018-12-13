<?php
$team_id= $_GET ['team_id'];

// Has the delete button been pressed? Y/N
$conn2 = new mysqli("localhost", "root", "", "gameon") OR DIE("Error Message" . mysqli_connect_error); // Connect to database, DIE on fail
$sqlQry = 'DELETE FROM team WHERE ID='.$team_id;
$query_result = mysqli_query($conn2, $sqlQry);	
if($query_result){
  header("location:../adminpage.php");
}
					
mysqli_close($conn2);								// Close the connection

