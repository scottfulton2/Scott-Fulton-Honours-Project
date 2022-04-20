<?php
	include_once 'Includes/header.php';
?>

<div class="jumbotron text-center">
  <h1 class="text-center">View & Manage Requests</h1><br>
  <div class="container-fluid">
		<?php
		require_once 'Includes/db.inc.php';

		$sql = mysqli_stmt_init($conn);
		mysqli_stmt_prepare($sql, "SELECT * FROM REQUESTS ORDER BY RequestID ASC;");

		mysqli_stmt_execute($sql);
		$stmtResult = mysqli_stmt_get_result($sql);

		echo "<table>";
			echo "<tr>";
				echo "<th>Request ID</th>";
				echo "<th>Requestor Type</th>";
				echo "<th>First Name</th>";
				echo "<th>Surname</th>";
				echo "<th>E-mail</th>";
				echo "<th>Project Type</th>";
				echo "<th>Assignee</th>";
				echo "<th>Request Status</th>";
				echo "<th>date submitted</th>";
				echo "<th>Paid</th>";
				echo "<th> - </th>";
			echo "</tr>";

		while ($row = mysqli_fetch_array($stmtResult)) {
			echo "<tr>";
				echo "<td>" . $row['RequestID'] . "</td>";//reqID
				echo "<td>" . $row['RequestorType'] . "</td>";//reqtype
				echo "<td>" . $row['FirstName'] . "</td>";//Fname
				echo "<td>" . $row['Surname'] . "</td>";//Sname
				echo "<td>" . $row['Email'] . "</td>";//email
				echo "<td>" . $row['ProjType'] . "</td>";//projtype
				echo "<td>" . $row['AssignedTo'] . "</td>";//assignedto
				echo "<td>" . $row['RequestStatus'] . "</td>";//ReqStatus
				echo "<td>" . $row['DateSubmitted'] . "</td>";//datesubmitted
				if ($row['Paid'] === 0) { echo"<td>No</td>"; } else { echo"<td>Yes</td>"; }//paid
				echo "<td><form method='post'><button type='submit' name='submit' value='" . $row['RequestID'] . "' formaction='viewSingleReq.php' class='button'>View More -></button></form></td>";// - button for viewing that request
			echo "</tr>";
		}
		echo "</table><br>";
    ?>
  </div>
</div>

</body>

</html>