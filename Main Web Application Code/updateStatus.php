<?php

session_start();


/**
 * May need to create multiple versions of 'updateStatus.php', 'viewSingleReq.php' and 'view&ManageRequests.php'
 * One each for Sys admin, technician and supervisor --->>> don't need to do this anymore, just use
 * Session variables and we should be gucci
 */

//session_start();
require_once 'Includes/db.inc.php';

if (isset($_POST['approve'])) {
  $requestID = $_POST['approve'];
  
  if ($_SESSION["accountType"] === "Supervisor") {
    $sql = "UPDATE REQUESTS SET ApprovTwoRevStatus = 'Approved' WHERE RequestID = '$requestID';";
  }
  else if ($_SESSION["accountType"] === "Technician") {
    //call function which checks which reviewer (one or two) the technician is
    $technicianRevCheck = technicianRevCheck($conn, $requestID);

    //if false then they are 'ApprovOneRevStatus'
    if ($technicianRevCheck === false) {
      $sql = "UPDATE REQUESTS SET ApprovOneRevStatus = 'Approved' WHERE RequestID = '$requestID';";
    }
    //else then they are 'ApprovTwoRevStatus'
    else {
      $sql = "UPDATE REQUESTS SET ApprovTwoRevStatus = 'Approved' WHERE RequestID = '$requestID';";
    }
  }
  else {
    $sql = "UPDATE REQUESTS SET ApprovOneRevStatus = 'Approved' WHERE RequestID = '$requestID';";
  }
  //$sql = "UPDATE REQUESTS SET ApprovOneRevStatus = 'Approved' WHERE RequestID = '$requestID';";

  if (mysqli_query($conn, $sql)) {
    echo "<h1>Request Approved</h1>";
  } 
  else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    echo "<h1>SQL error!</h1>";
  }

  //call function which checks if request has been approved by both
  //bothApprovedCheck($conn, $requestID);


  if ($_SESSION["accountType"] === "Supervisor") {
    header("Location: supervisorHome.php");
    exit();
  }
  else {
    header("Location: view&ManageRequests.php");
    exit();
  }
}



else if (isset($_POST['reject'])) {
  $requestID = $_POST['reject'];
	//need to also mark request status as rejected
  //$sql = "UPDATE REQUESTS SET ApprovOneRevStatus = 'Rejected' WHERE RequestID = '$requestID';";

  if ($_SESSION["accountType"] === "Supervisor") {
    $sql = "UPDATE REQUESTS SET ApprovTwoRevStatus = 'Rejected' WHERE RequestID = '$requestID';";
  }
  else if ($_SESSION["accountType"] === "Technician") {
    //call function which checks which reviewer (one or two) the technician is
    $technicianRevCheck = technicianRevCheck($conn, $requestID);

    //if false then they are 'ApprovOneRevStatus'
    if ($technicianRevCheck === false) {
      $sql = "UPDATE REQUESTS SET ApprovOneRevStatus = 'Rejected' WHERE RequestID = '$requestID';";
    }
    //else then they are 'ApprovTwoRevStatus'
    else {
      $sql = "UPDATE REQUESTS SET ApprovTwoRevStatus = 'Rejected' WHERE RequestID = '$requestID';";
    }
  }
  else {
    $sql = "UPDATE REQUESTS SET ApprovOneRevStatus = 'Approved' WHERE RequestID = '$requestID';";
  }

	if (mysqli_query($conn, $sql)) {
		echo "<h1>Request Rejected</h1>";
	} 
	else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		echo "<h1>SQL error!</h1>";
	}
  


  if ($_SESSION["accountType"] === "Supervisor") {
    header("Location: supervisorHome.php");
    exit();
  }
  else {
    header("Location: view&ManageRequests.php");
    exit();
  }

}



//marking request as paid
else if (isset($_POST['paid'])) {
  $requestID = $_POST['paid'];

  $sql = "UPDATE REQUESTS SET Paid = true WHERE RequestID = '$requestID';";

  if (mysqli_query($conn, $sql)) {
    echo "<h1>Request Paid</h1>";
  } 
  else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    echo "<h1>SQL error!</h1>";
  }

  header("Location: view&ManageRequests.php");
  exit();
}
/*
else if (isset($_POST[""])) {
    
}
else if (isset($_POST[""])) {
    
}
else if (isset($_POST[""])) {
    
}*/
else {
  if ($_SESSION["accountType"] === "Supervisor") {
    header("Location: supervisorHome.php");
    exit();
  }
  else {
    header("Location: view&ManageRequests.php");
    exit();
  }
}


function technicianRevCheck($conn, $requestID) {
  $result = false;
    
  $sql = mysqli_stmt_init($conn);
  mysqli_stmt_prepare($sql, "SELECT * FROM REQUESTS WHERE RequestID = ?;");
  
  mysqli_stmt_bind_param($sql, "s", $requestID);

  mysqli_stmt_execute($sql);
  $stmtResult = mysqli_stmt_get_result($sql);

  $row = mysqli_fetch_array($stmtResult);

  if ($row["ApproverOneID"] == "2") {
      $result = false;
  }
  else {
      $result = true;
  }
  mysqli_stmt_close($sql);

  return $result;
}


/*
reviewValidate() {

}*/

?>