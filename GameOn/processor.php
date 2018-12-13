<?php
//	PURPOSE:	Insert data into accounts table
//	DATA:		Form data sent from index.php
//	INPUTS:		username, password, emailAddress, role and register (register is a submit button)

if(isset($_POST['register'])){			// $_POST['register'], has this button been pressed? Y/N
	$un = $_POST['username'];			// Create a variable, based upon form data
	$pw = $_POST['password'];			// Create a variable, based upon form data
	$em = $_POST['emailAddress'];		// Create a variable, based upon form data
	$rl = $_POST['role'];				// Create a variable, based upon form data
	$conn = new mysqli("localhost", "goAdmin", "admin123", "gameon") OR	
			DIE("Error Message" . mysqli_connect_error);	// Connect to database, DIE on fail
	$sql = 'INSERT INTO accounts (username, email, password, role) 		
			VALUES ("' . $un . '","' . $em . '","' . $pw . '","' . $rl . '")'; // Query String
	mysqli_query($conn, $sql);			// Executes query string
	mysqli_close($conn);				// Close the connection
	echo "New person added!";			// Returns a string to the screen
}



//	PURPOSE:	Login into existing account
//	DATA:		Form data sent from index.php
//	INPUTS:		username, password and login (login is the submit button)

if(isset($_POST['login'])){			// Has the login button been pressed? Y/N
	$un = $_POST['username']; 		// Don't forget this is an email address
	$pass = $_POST['password'];		// Create a variable, based upon form data
	$cnn = new mysqli("localhost", "goAdmin", "admin123", "gameon") OR
			DIE("Error Message" . mysqli_connect_error); // Connect to database, DIE on fail
	$sql2 = 'SELECT ID, email, username, password FROM accounts 
				WHERE email="'. $un . '" AND password="' . $pass . '"'; // Query String
	$result = $cnn->query($sql2);	// Execute the query string
	echo '<table>';
	if ($result->num_rows > 0) {	// $result must be greater than 0
		while($rows = $result->fetch_assoc()) {							// Get table data
			echo '<h1>Hi '.$rows["username"].'</h1>';	// Returns a string to the screen
	
	echo '<tr><td>'. $rows["ID"] . '</td><td>' . $rows["username"]. '</td><td>' . $rows["email"]. '</td></tr>';
	}
	} else {
		echo "0 results";								// Returns a string to the screen
	}
	echo '</table>';
} 


if(isset($_POST['delete'])){							// Has the delete button been pressed? Y/N
	echo 'User ID: ' . $_POST['users'];					// Which user did we want? By ID number only
	$conn2 = new mysqli("localhost", "goAdmin", "admin123", "gameon") OR
			DIE("Error Message" . mysqli_connect_error); // Connect to database, DIE on fail
	
}

?>




















