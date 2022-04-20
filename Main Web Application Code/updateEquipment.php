<?php
  include_once 'Includes/header.php';
?>

<div class="jumbotron text-center">
  <div class="container-fluid">
  <h1 class="text-center">Equipment List</h1>
    <?php
    //
    require_once 'Includes/db.inc.php';

      $sql = mysqli_stmt_init($conn);
      mysqli_stmt_prepare($sql, "SELECT * FROM EQUIPMENT ORDER BY EquipmentID ASC;");

      mysqli_stmt_execute($sql);
      $stmtResult = mysqli_stmt_get_result($sql);

      echo "<table>";
			echo "<tr>";
				echo "<th>Equipment ID</th>";
				echo "<th>Equipment Name</th>";
				echo "<th>Description</th>";
				echo "<th>Location</th>";
			echo "</tr>";

      //loop through each account
      while ($row = mysqli_fetch_array($stmtResult)) {
        //print(echo html tags + data) for each account
        echo "<tr>";
          echo "<td>" . $row['EquipmentID'] . "</td>";//
          echo "<td>" . $row['EquipmentName'] . "</td>";//
          echo "<td>" . $row['Descr'] . "</td>";//
          echo "<td>" . $row['Location'] . "</td>";//
        echo "</tr>";
      }
      echo "</table><br>";
    ?>
  </div>

</body>

</html>