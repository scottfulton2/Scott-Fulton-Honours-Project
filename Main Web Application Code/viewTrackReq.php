<?php
	include_once 'Includes/header.php';
?>

<div class="jumbotron text-center">
  <h1 class="text-center">Full Request Info</h1><br>
  <div class="container-fluid">
  <?php
  require_once 'Includes/db.inc.php';

  if (isset($_SESSION["requestID"])) {
    $requestID = $_SESSION["requestID"];

    $sql = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($sql, "SELECT * FROM REQUESTS WHERE RequestID = ?;");
    
    //append requestID to sql statement
    mysqli_stmt_bind_param($sql, "s", $requestID);

    mysqli_stmt_execute($sql);
    $stmtResult = mysqli_stmt_get_result($sql);

    $row = mysqli_fetch_array($stmtResult);

    echo "<p>Request ID: " . $row['RequestID'] ."</p>";
    echo "<p>Requestor Type: " . $row['RequestorType'] ."</p>";
    echo "<p>First Name: " . $row['FirstName'] ."</p>";
    echo "<p>Surname: " . $row['Surname'] ."</p>";
    echo "<p>Email: " . $row['Email'] ."</p>";
    echo "<p>Project Type: " . $row['ProjType'] ."</p>";
    echo "<p>Assigned To: " . $row['AssignedTo'] ."</p>";
    echo "<p>Request Status: " . $row['RequestStatus'] ."</p>";
    echo "<p>Date Submitted: " . $row['DateSubmitted'] ."</p>";
    echo "<p>Nature Of Request: " . $row['NatureOfReq'] ."</p>";
    //copy this to duplicate for more items: echo "<p>: " . $row[''] ."</p><br>";
    
  }
  else {
    header("Location: trackRequest.php");
    exit();
  }

  if ($_SESSION["accountType"] === "Supervisor") {
    if ($row['ApprovTwoRevStatus'] === "Reviewing") {
      //accept button
      echo "<form method='post'><button type='submit' name='approve' value='" . $row['RequestID'] . "' formaction='updateStatus.php' class='button'>Approve</button></form>";
      //reject button
      echo "<form method='post'><button type='submit' name='reject' value='" . $row['RequestID'] . "' formaction='updateStatus.php' class='button'>Reject</button>";
      
    } 
  }
  ?>
  <br>
  <form>
    <button type="submit" formaction="index.php">Back to Home Page<br><-</button><br>
  </form>
  </div>
</div>

</body>

</html>