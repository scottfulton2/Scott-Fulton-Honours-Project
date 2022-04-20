<?php
  include_once 'Includes/header.php';
?>

<div class="jumbotron text-center">
  <h1 class="text-center">Login Accounts</h1><br>
  <div class="container-fluid">
      <?php
      //sql query for accounts table
      require_once 'Includes/db.inc.php';

      $sql = mysqli_stmt_init($conn);
      mysqli_stmt_prepare($sql, "SELECT * FROM USERACCOUNTS ORDER BY AccountID ASC;");

      mysqli_stmt_execute($sql);
      $stmtResult = mysqli_stmt_get_result($sql);

      echo "<table>";
			echo "<tr>";
				echo "<th>Account ID</th>";
				echo "<th>Account Type</th>";
				echo "<th>Username</th>";
				echo "<th>Password</th>";
			echo "</tr>";

      //loop through each account
      while ($row = mysqli_fetch_array($stmtResult)) {
        //print(echo html tags + data) for each account
        echo "<tr>";
          echo "<td>" . $row['AccountID'] . "</td>";//
          echo "<td>" . $row['AccountType'] . "</td>";//
          echo "<td>" . $row['Username'] . "</td>";//
          echo "<td>" . $row['Password'] . "</td>";//
        echo "</tr>";
      }
      echo "</table><br>";
      ?>
  </div>

</body>

</html>