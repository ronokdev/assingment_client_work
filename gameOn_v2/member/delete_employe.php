<?php
$emp_id= $_GET ['emp_id'];

// Has the delete button been pressed? Y/N
$conn2 = new mysqli("localhost", "root", "", "gameon") OR DIE("Error Message" . mysqli_connect_error); // Connect to database, DIE on fail
$sqlQry = 'DELETE FROM employee WHERE ID='.$emp_id;
$query_result = mysqli_query($conn2, $sqlQry);	
if($query_result){
  header("location:index.php");
}
					
mysqli_close($conn2);								// Close the connection

