<?php
session_start();
$member_name = $_SESSION['varname']['email'];
$cnn = new mysqli("localhost", "root", "", "gameon") OR DIE("Error Message" . mysqli_connect_error); // Connect to database, DIE on fail
$sql2 = 'SELECT * FROM `employee` WHERE Name = "'.$member_name.'"'; // Query String
$result = $cnn->query($sql2);
?>

  <!DOCTYPE html>
  <html>
  <head>
  <style>
  table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
  }

  tr:nth-child(even) {
    background-color: #dddddd;
  }
  </style>
  </head>
<body>

<h2>Member Table</h2>
<!-- <a href="admin/insert_employee.php?teamid=<?php echo $rows['Team_ID']?>"><button><h3>Click To Add Employee ! </h3></button></a> -->

<br>
<br>
<br>

<table>
  <tr>
    <th>Employee name</th>
    <th>Profile Picture</th>
    <th>Position</th>
    <th>Last Played </th>
    <th>Rank</th>
    <th>value</th>
    <th>Salary</th>
    <th>Action</th>
    


  </tr>
  <?php
    while($rows = $result->fetch_assoc()) {		
  ?>
  <tr>
    <td><?php echo $rows['Name']?></td>
    <td ><img style="height: 40px;width: 40px;" src="<?php echo $rows['profile_picture_path'];?>"></td>
    <td><?php echo $rows['Position']?></td>
    <td><?php echo $rows['LastPlayed']?></td>
    <td><?php echo $rows['Rank']?></td>
    <td><?php echo $rows['Value']?></td>
    <td><?php echo $rows['Salary']?></td>
    <td><a href="edit_member.php?emp_id=<?php echo $rows['ID']?>">EDIT</a></td>
    
    
  </tr>

<?php
}
?>
</table>

</body>




<hr>
<a href="../Logout.php">
click here to log out</a>