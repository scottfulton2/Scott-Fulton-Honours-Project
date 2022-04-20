<?php


/**
 * May need to create multiple versions of 'updateStatus.php', 'viewSingleReq.php' and 'view&ManageRequests.php'
 * One each for Sys admin, technician and supervisor --->>> don't need to do this anymore, just use
 * Session variables and we should be gucci
 */

//session_start();
require_once 'Includes/db.inc.php';

if (isset($_POST['approve'])) {
  $requestID = $_POST['approve'];
  $sql = "UPDATE REQUESTS SET ApprovOneRevStatus = 'Approved' WHERE RequestID = '$requestID';";

  if (mysqli_query($conn, $sql)) {
    echo "<h1>Request Approved</h1>";
  } 
  else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    echo "<h1>SQL error!</h1>";
  }

  header("Location: view&ManageRequests.php");
  exit();

}
else if (isset($_POST['reject'])) {
  $requestID = $_POST['reject'];
	//need to also mark request status as rejected
  $sql = "UPDATE REQUESTS SET ApprovOneRevStatus = 'Rejected' WHERE RequestID = '$requestID';";


	if (mysqli_query($conn, $sql)) {
		echo "<h1>Request Rejected</h1>";
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
    
}
else if (isset($_POST[""])) {
    
}*/
else {
  header("Location: view&ManageRequests.php");
  exit();
}

/*
reviewValidate() {

}*
/

?>