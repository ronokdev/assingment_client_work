<?php
session_start();
$member_name = $_SESSION['varname']['email'];
$cnn = new mysqli("localhost", "root", "", "gameon") OR DIE("Error Message" . mysqli_connect_error); // Connect to database, DIE on fail
$sql2 = 'SELECT projects.*,team.Name FROM `projects`  
left join team on projects.WinningTeam = team.ID
WHERE 1'; // Query String
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

<h2>Project Table</h2>
<!-- <a href="admin/insert_employee.php?teamid=<?php echo $rows['Team_ID']?>"><button><h3>Click To Add Employee ! </h3></button></a> -->

<br>
<br>
<br>

<table>
  <tr>
    <th>Last Project</th>
    <th>Results</th>
    <th>Winning Team</th>
    <th>Margin</th>
    <th>Best Employee</th>
    <th>Location</th>
    <th>Odds Team 1</th>
    <th>Odds Team 2</th>
    <th>Team Name</th>
    


  </tr>
  <?php
    while($rows = $result->fetch_assoc()) {		
  ?>
  <tr>
    <td><?php echo $rows['LastProject']?></td>
    <td><?php echo $rows['Results']?></td>
    <td><?php echo $rows['WinningTeam']?></td>
    <td><?php echo $rows['Margin']?></td>
    <td><?php echo $rows['BestEmployee']?></td>
    <td><?php echo $rows['Location']?></td>
    <td><?php echo $rows['OddsTeam_1']?></td>
    <td><?php echo $rows['OddsTeam_2']?></td>
    <td><?php echo $rows['Name']?></td>
    
    
    
  </tr>

<?php
}
?>
</table>

</body>