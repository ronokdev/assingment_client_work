<?php
	echo 'Form data<p>';
	if (isset($_POST['gender']))
		echo "Gender: " .$_POST['gender'].'<br>';
	if (!empty($_POST['pet'])){
		$pets = $_POST['pet'];
		foreach ($pets as $select){
			echo "Favourite pet: " . $select. "<br>";
		}
	}
	echo 'Membership: ' . $_POST['role'];
?>

