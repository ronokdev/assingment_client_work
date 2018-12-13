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




<!-- This is our landing/home/first page, its where we start -->
<div data-role="page" id="index">
	<div data-role="header" data-theme="b">
	<h1>Welcome to Game On!!</h1>
	</div>
		<div data-role="main" class="ui-content">
			<h3>Our first mobile page</h3>
			<a href="#login">Login/Register</a>
			<a href="#settings">
				<button style="width:15px;height:25px;" data-icon="gear" data-position="right"></button>
			</a>
		</div>
	<div data-role="footer" data-theme="b" data-position="fixed">
	<div data-role="navbar">
		<ul>
			<li><a href="#index">
				<button data-icon="home" data-iconpos="top">Home</button>
				</a></li>
			<li><a href="#about">
				<button data-icon="info" data-iconpos="top">About Us</button>
				</a></li>
			<li><a href="#contact">
				<button data-icon="phone" data-iconpos="top">Contact Us</button>
				</a></li>
			<li><a href="#clubs">
				<button data-icon="grid" data-position="top">Clubs</button>
				</a></li>
			<li><a href="#members">
				<button data-icon="user" data-position="top">Members</button>
				</a></li>
		</ul>
	</div><!-- /navbar -->
	<p>&copy; 2017, Created by Anthony Xavier.</p>
	</div>
</div>


<!-- This is our About Us page -->
<div data-role="page" id="about">
	<div data-role="header" data-theme="b">
		<h1>About Game On!!</h1>
	</div>
	<div data-role="main" class="ui-content">
		<h3>What makes Game On stand out from the crowd?</h3>
		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
		<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
		<a href="#index">Home</a>
		
		<a href="#login">Login/Register</a>

	</div>
	<div data-role="footer" data-theme="b" data-position="fixed">
		&copy; 2017, Created by Anthony Xavier.
	</div>
</div>







<!-- This is our Contact Us page -->
<div data-role="page" id="contact">
<div data-role="header" data-theme="b"><h1>Contact Game On!!</h1></div>
<div data-role="main" class="ui-content">
	<h3>Contacting Game On:</h3>
	
	<a href="#login">Login/Register</a>
	
</div>
<div data-role="footer" data-theme="b" data-position="fixed">&copy; 2017, Created by Anthony Xavier.</div>
</div>



<!-- This is our Login/Register page -->
<!-- Adding the data-dialog control -->


<div data-role="page" data-dialog="true" id="login">
<div data-role="main" class="ui-content">

	<!-- This is where existing people can logon -->
	<form action="processor.php" method="POST" data-ajax="false">
	<fieldset>
	<legend><h3>Login to Game On</h3></legend><br>
	<!-- Assumption: Users will enter their email address as their username -->
	<label>Username:</label><input type="text" name="username">
	<label>Password:</label><input type="password" name="password">
	<button type="submit" class="ui-btn" name="login">Login</button>
	</fieldset>
	</form>

	<!-- This is where new people register for a Game On Account -->
	<form action="processor.php" method="POST" data-ajax="false">
	<fieldset>
	<legend><h3>Register on Game On</h3></legend><br>
	<label>Username:</label><input type="text" name="username">
	<label>Email Address:</label><input type="email" name="emailAddress">
	<label>Password:</label><input type="password" name="password">
	<label>Role:</label>
		<select name="role">
			<option value="admin">Game On Administrator</option>
			<option value="bizAdmin">Business/Club Administrator</option>
			<option value="mgr">Manager</option>
			<option value="member">Team Member</option>
		</select>
	<button type="submit" class="ui-btn" name="register">
		Register
	</button>
	</fieldset>
	</form>
	<a href="#index">Home</a>&nbsp;&nbsp;&nbsp;
	<a href="#updateMembers">Update Members</a>&nbsp;&nbsp;&nbsp; <!-- This goes to the login page -->
	<a href="#deleteMembers">Delete Members</a> 				<!-- This goes to the login page -->
	
</div>
<div data-role="footer" data-theme="b" data-position="fixed">
	&copy; 2017, Created by Anthony Xavier.
</div>
</div>




<div data-role="page" data-dialog="true" id="deleteMembers">
<div data-role="main" class="ui-content">
<form action="processor.php" method="POST" data-ajax="false">
<fieldset data-role="controlgroup">
<legend><h3>Delete Users</h3></legend>
<table> <!-- New bit -->
<?php
	$cnn = new mysqli("localhost", "root", "", "gameon") OR
			DIE("Error Message" . mysqli_connect_error); // Connect to database, DIE on fail
	$sql = 'SELECT ID, email, username, password FROM accounts';
	$result = $cnn->query($sql);	// Execute the query string
	if ($result->num_rows > 0) {	// $result must be greater than 0
		while($rows = $result->fetch_assoc()) {			// Get table data
		?> <!-- New bit -->
		<tr><td><input type="radio" name="users" value="<?=$rows["ID"]?>"></td>
			<td style="width:100px; padding-left: 50px;"><?=$rows["username"]?></td>
			<td><?=$rows["email"]?></td>
		</tr>
		<?php
		}
	} else {
		echo "0 results";						// Returns a string to the screen
	}
?>
</table> <!-- New bit -->
<p><button type="submit" name="delete" class="ui-btn">Delete</button></p>
</fieldset>
</form>
</div>

<div data-role="footer" data-theme="b" data-position="fixed">
	<p>&copy; 2017, Created by Anthony Xavier.</p>
</div>
</div>


<!-- Update Accounts -->
<div data-role="page" data-dialog="true" id="updateMembers">
<div data-role="main" class="ui-content">
<form action="processor.php" method="POST" data-ajax="false"> <!-- Simple change to form action -->
<fieldset data-role="controlgroup">
<legend><h3>Update Users</h3></legend>
<select name="ID">										<!-- Is the member ID -->
<option selected>Choose a Member</option>
<?php
	// $cnn2 = new mysqli("localhost", "goAdmin", "admin123", "gameon") OR
	// 		DIE("Error Message" . mysqli_connect_error); // Connect to database, DIE on fail
	$cnn2 = new mysqli("localhost", "root", "", "gameon") OR
			DIE("Error Message" . mysqli_connect_error); // Connect to database, DIE on fail
	$sql2 = 'SELECT ID, email, username, password FROM accounts';
	$result = $cnn2->query($sql2);						// Execute the query string
	if ($result->num_rows > 0) {						// $result must be greater than 0
		while($rs = $result->fetch_assoc()) {			// Get table data
		?>
		<option value="<?=$rs["ID"]?>"><?=$rs["username"]?> - <?=$rs["email"]?></option>
		<?php
		}
	} else {
		echo "0 results";								// Returns a string to the screen
	}
?>
</select>
<p><button type="submit" name="update" class="ui-btn">Update</button></p> <!-- Button Name: update --> 
</fieldset>
</form>
</div>

<div data-role="footer" data-theme="b" data-position="fixed">
	<p>&copy; 2017, Created by Anthony Xavier.</p>
</div>
</div>

<!-- Update Accounts -->


</body>
</html>
