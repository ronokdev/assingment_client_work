<?php session_start(); ?>
<!DOCTYPE html>
<html lang="EN-AU">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Anthony Xavier">
	<meta name="description" content="ICTPRG409 - Develop Mobile Apps">
	<title>Game On &copy; 2017.</title>
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>
<?php
//	PURPOSE:	Insert data into accounts table
//	DATA:		Form data sent from index.php
//	INPUTS:		username, password, emailAddress, role and register (register is a submit button)

// echo '</pre>';
// print_r($_POST);
// echo '</pre>';

if(isset($_POST['register'])){			// $_POST['register'], has this button been pressed? Y/N
	$un = $_POST['username'];			// Create a variable, based upon form data
	$pw = $_POST['password'];			// Create a variable, based upon form data
	$em = $_POST['emailAddress'];		// Create a variable, based upon form data
	$rl = $_POST['role'];				// Create a variable, based upon form data
	$conn = new mysqli("localhost", "root", "", "gameon") OR	
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
	// $cnn = new mysqli("localhost", "root", "", "gameon") OR
	// 		DIE("Error Message" . mysqli_connect_error); // Connect to database, DIE on fail
	$cnn = new mysqli("localhost", "root", "", "gameon") OR
			DIE("Error Message" . mysqli_connect_error); // Connect to database, DIE on fail


	$sql2 = 'SELECT * FROM accounts 
				WHERE email="'. $un . '" AND password="' . $pass . '"'; // Query String
	$result = $cnn->query($sql2);	// Execute the query string
	echo '<table>';
	if ($result->num_rows > 0) {	// $result must be greater than 0
		while($rows = $result->fetch_assoc()) {							// Get table data
			echo '<h1>Hi '.$rows["username"].'</h1>';	// Returns a string to the screen
	
	echo '<tr><td>'. $rows["ID"] . '</td><td>' . $rows["username"]. '</td><td>' . $rows["email"]. '</td></tr>';
	// setting all the necessary data to session
	$_SESSION['varname'] = $rows;

	if($rows['role'] == 'admin'){
		header("location:adminpage.php");
	}
	if($rows['role'] == 'mgr'){
		header("location:team_page/index.php");
	}


	
	}
	} else {
		echo "0 results";								// Returns a string to the screen
	}
	echo '</table>';
} 


if(isset($_POST['delete'])){							// Has the delete button been pressed? Y/N
	$conn2 = new mysqli("localhost", "root", "", "gameon") OR
			DIE("Error Message" . mysqli_connect_error); // Connect to database, DIE on fail
	$sqlQry = 'DELETE FROM accounts WHERE ID='.$_POST['users'];
	mysqli_query($conn2, $sqlQry);						// Executes query string
	mysqli_close($conn2);								// Close the connection
	echo 'You have deleted a record.';
}



if(isset($_POST['update'])){ 	// update is the name of the button on the form->submit button
	$id = $_POST['ID'];			// Member ID captured here
	$dbconn = new mysqli("localhost", "root", "", "gameon") OR
			DIE("Error Message" . mysqli_connect_error); // Connect to database, DIE on fail
	$qrystr = 'SELECT ID, email, username, password FROM accounts 
				WHERE ID='. $id; // Query String
	$rs2 = $dbconn->query($qrystr);	// Execute the query string
	if ($rs2->num_rows > 0) {	// $result must be greater than 0
		while($rsx = $rs2->fetch_assoc()) {	
		?>
		<div data-role="page"  data-dialog="true">
			<div data-role="main" class="ui-content">
			<h3>Update Member</h3>
			<form action="processor.php" method="POST">
			<fieldset>
			<!-- Where are we going to get these values???? -->
			<!-- what value are we going to use for member id? -->
			<input type="hidden" name="memberID" value="<?= $id ?>">
			<label>Name</label><input type="text" name="mName" value="<?= $rsx['username']; ?>">
			<label>Email</label><input type="email" name="mEmailAddress" value="<?= $rsx['email']; ?>">
			</label>Password</label><input type="password" name="mPassword" value="<?= $rsx['password']; ?>">
			<input type="submit" name="updMember" value="Update">
			</fieldset>
			</form>
				<a href="index.php">Home</a>
				<a href="index.php#login">Login/Register</a>
			</div>
			<div data-role="footer" data-theme="b" data-position="fixed">
				&copy; 2017, Created by Anthony Xavier.
			</div>
		</div>
<?php
		}
	} else {
		echo "0 results";								// Returns a string to the screen
	}
}


// Quiz: 
// What is the name of the submission button from the form we just created?
// What is our next step in updating a member? What are the values that we are sending back to this page?
// How do we do it?

if(isset($_POST['updMember'])){							// Name of the form->submit button
	$mid =	$_POST["memberID"];
	$n =	$_POST["mName"];
	$e =	$_POST["mEmailAddress"];
	$p =	$_POST["mPassword"];
	
	//1st the database connection
	$dbconn2 = new mysqli("localhost", "root", "", "gameon") OR
			DIE("Error Message" . mysqli_connect_error);
	$qrystr2 = 'UPDATE accounts SET
					username = "' . $n . '", 
					email = "' . $e . '",
					password = "' . $p .' "
				WHERE ID=' .  $mid;
	echo $qrystr2; // testing our sql query string
}
?>


<hr>
<a href="Logout.php">
click here to log out</a>

</body>
</html>