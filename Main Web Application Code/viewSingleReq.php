<?php
	include_once 'Includes/header.php';
?>

<div class="jumbotron text-center">
  <h1 class="text-center">Full Request Info</h1><br>
  <div class="container-fluid">
  <?php
  require_once 'Includes/db.inc.php';

  if (isset($_POST['submit'])) {
    $requestID = $_POST['submit'];

    $sql = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($sql, "SELECT * FROM REQUESTS WHERE RequestID = ?;");
    
    //append requestID to sql statement
    mysqli_stmt_bind_param($sql, "s", $requestID);

    mysqli_stmt_execute($sql);
    $stmtResult = mysqli_stmt_get_result($sql);

    $row = mysqli_fetch_array($stmtResult);
    
    //$_SESSION["requestID"] = $row['RequestID'];

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
    echo "<p>Has Request Been Paid?: " . isPaid($row['Paid']) ."</p>";
    //copy this to duplicate for more items: echo "<p>: " . $row[''] ."</p><br>";
    
    if ($_SESSION["accountType"] === "Finance/Admin Staff") {
      if (isPaid($row['Paid']) == "No") {
        echo "<form method='post'><button type='submit' name='paid' value='" . $row['RequestID'] . "' formaction='updateStatus.php' class='button'>Mark as Paid</button></form>";
      }
    }

    //change this to a switch case statement(s) in case there are a lot of different status we need to take into account
    if ($row['ApprovOneRevStatus'] === "Reviewing") {
      //accept button
      echo "<form method='post'><button type='submit' name='approve' value='" . $row['RequestID'] . "' formaction='updateStatus.php' class='button'>Approve</button></form>";
      //reject button
      echo "<form method='post'><button type='submit' name='reject' value='" . $row['RequestID'] . "' formaction='updateStatus.php' class='button'>reject</button>";
      
    }
    else {
      echo "";
    }
    /*
    will need to add if statements for what to display to the user depending on the user type
    
    switch () {
      case '':
        ;
        break;
      case '':
        ;
        break;
      case '':
        ;
        break;
      default:
        ;
        break;
    }
    
    */

    /*
  switch ($row['RequestStatus']) {
    case 'In Review':
      echo ""; //Don't display any buttons
      break;
    case 'Rejected':
		  echo "<form method='post'><button type='submit' name='delete' value='" . $row['RequestID'] . "' formaction='updateStatus.php' class='button'>Delete Request</button>";
		  echo "";  //archive request
      break;
    case 'Not Started':
		  echo "";  //mark request as 'In Progress' button
      echo "";  //'delete request' button
		  break;
    case 'In Progress':
      echo "";  //mark request as 'Complete' button
      if ($row['']) { //if request not paid
        echo "";  //'mark as paid' button
      }
      else {
        echo ""; //don't display button if paid
      }
      echo "";  //'delete request' button
		  break;
    case 'Complete':
      echo "";  //archive request
      if ($row['']) { //if request not paid
        echo "";  //'mark as paid' button
      }
      else {
        echo ""; //don't display button if paid
      }
      echo "";  //'delete request' button
    default:
		  echo "";
		  break;
  }
  exit();
  } 
     */
  }
  else {
    header("Location: view&ManageRequests.php");
    exit();
}

function isPaid($paid) {
  if ($paid == 0) {
    $result = "No";
    return $result;
  }
  else {
    $result = "Yes";
    return $result;
  }
}
  ?>

  <br>
  <form>
  <button type="submit" formaction="view&ManageRequests.php">Back to View Requests<br><-</button><br>
  </form>
  </div>
</div>

</body>

</html>