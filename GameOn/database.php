<?php
// Function:		getDBConnection()
// Parameters:		Nil
// Pre-Condition:	There is no current database connection
// Post-Condition:	Creates a database connection

function getDBConnection(){
DEFINE("SERVER","");
DEFINE("USERNAME","");
DEFINE("PASSWORD","");
DEFINE("DATABASE","");
// Create connection
$conn = new mysqli(SERVER, USERNAME, PASSWORD, DATABASE);
// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	echo "Connected successfully";
}


// Function:		insertUser()
// Parameters:		$un = username, $em = email address, $pw = password
// Pre-Condition:	The user does not have a current login
// Post-Condition:	Inserts a new administration user into the database

function insertUser($un, $em, $pw){
	
	DEFINE("SERVER","");
	DEFINE("USERNAME","");
	DEFINE("PASSWORD","");
	DEFINE("DATABASE","");
	// Create connection
	$conn = new mysqli(SERVER, USERNAME, PASSWORD, DATABASE);
	// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		echo "Connected successfully";
	}
	//getDBConnection();
	$sql = 'INSERT INTO accounts (userName, emailAddress, Password) VALUES ("' . $un .'", "'. $em.'", "' . $pw. '")';
	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
}





function otherOperations(){
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE MyGuests SET lastname='Doe' WHERE id=2";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();

// sql to delete a record
$sql = "DELETE FROM MyGuests WHERE id=3";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
}



function getAllCustomers(){
	//Select record
	$sql = "SELECT id, firstname, lastname FROM MyGuests";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
		}
	} else {
		echo "0 results";
	}
	$conn->close();
}
?>