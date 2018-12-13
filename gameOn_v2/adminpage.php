<?php
session_start();

if($_SESSION['varname']["role"] != 'admin'){
      echo "You are Not Allowed here.Only Admins can access this page";
      die();
}
// getting sesision data
$businessId = $_SESSION['varname']['business_id'];

$cnn = new mysqli("localhost", "root", "", "gameon") OR DIE("Error Message" . mysqli_connect_error); // Connect to database, DIE on fail
  $sql2 = 'SELECT * FROM team WHERE Business_ID ='. $businessId; // Query String
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

<h2>Team Table</h2>
<a href="admin/insert_team.php"><button><h3>Click To Add Team ! </h3></button></a>

<br>
<br>
<br>

<table>
  <tr>
    <th>Team name</th>
    <th>Position Name</th>
    <th>Manger</th>
    <th>Captain</th>
    <th>Lastused</th>
    <th colspan=2>Action</th>
    


  </tr>
  <?php
    while($rows = $result->fetch_assoc()) {		
  ?>
  <tr>
    <td><?php echo $rows['Name']?></td>
    <td><?php echo $rows['Position']?></td>
    <td><?php echo $rows['Manager']?></td>
    <td><?php echo $rows['Captain']?></td>
    <td><?php echo $rows['LastUsed']?></td>
     <td><a href="admin/edit_team.php?team_id=<?php echo $rows['ID']?>">EDIT</a></td>
    <td><a href="admin/delete_team.php?team_id=<?php echo $rows['ID']?>">Delete</a></td>
    
  </tr>

<?php
}
?>
</table>

</body>
</html>


<hr>
<a href="Logout.php">log out</a>














