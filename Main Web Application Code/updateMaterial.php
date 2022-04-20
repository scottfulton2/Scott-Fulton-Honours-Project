<?php
  include_once 'Includes/header.php';
?>

<div class="container-fluid">
  <h1 class="text-center">Update Materials List</h1>
    <?php
    //
    require_once 'Includes/db.inc.php';

      $sql = mysqli_stmt_init($conn);
      mysqli_stmt_prepare($sql, "SELECT * FROM MATERIALS ORDER BY MaterialID ASC;");

      mysqli_stmt_execute($sql);
      $stmtResult = mysqli_stmt_get_result($sql);

      echo "<table>";
			echo "<tr>";
				echo "<th>Material ID</th>";
				echo "<th>Material Name</th>";
				echo "<th>Cost</th>";
				echo "<th>Unit of Measure</th>";
			echo "</tr>";

      //loop through each account
      while ($row = mysqli_fetch_array($stmtResult)) {
        //print(echo html tags + data) for each account
        echo "<tr>";
          echo "<td>" . $row['MaterialID'] . "</td>";//
          echo "<td>" . $row['MaterialName'] . "</td>";//
          echo "<td>" . $row['Cost'] . "</td>";//
          echo "<td>" . $row['UnitOfMeasure'] . "</td>";// 
          echo "<td><form method='post'><button type='submit' name='Delete' value='" . $row['MaterialID'] . "' formaction='updateMaterialHandle.php' class='button'>Delete Item</button></form></td>";//button which deletes the item
        echo "</tr>";
      }
      echo "<tr><td><form method='post'><button type='submit' name='Add' formaction='addMaterial.php' class='button'>add item</button></form><td></tr>";
      echo "</table><br>";
    ?>
  </div>

</body>

</html>