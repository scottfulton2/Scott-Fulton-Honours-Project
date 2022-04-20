<?php
  include_once 'Includes/header.php';
?>

  <div class="jumbotron text-center">
    <h1 class="text-center">Request Success!!!</h1><br>
    <div>
      <?php
        // retrieve latest request ID from database
        require_once 'Includes/db.inc.php';

        $sql = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($sql, "SELECT RequestID FROM REQUESTS ORDER BY RequestID DESC;");

        mysqli_stmt_execute($sql);
        $stmtResult = mysqli_stmt_get_result($sql);

        $requestID = mysqli_fetch_array($stmtResult);

        echo "<p><b>Request Number: " . $requestID['RequestID'] . "</b><p><br>";

        emailRequestorReceipt($requestID['RequestID'], $conn);
        
        function emailRequestorReceipt($requestID, $conn) {
          $sql = mysqli_stmt_init($conn);
          mysqli_stmt_prepare($sql, "SELECT * FROM REQUESTS WHERE RequestID = ?;");

          mysqli_stmt_bind_param($sql, "s", $requestID);

          mysqli_stmt_execute($sql);
          $stmtResult = mysqli_stmt_get_result($sql);

          $row = mysqli_fetch_array($stmtResult);
          
          $to = $row['Email'];
          $subject = 'Request Submission Received';
          $message = '<h1>Request Submitted</h1>
                      <p>E-mail: '. $row['Email'] .'</p>
                      <p>Firstname: '. $row['FirstName'] .'</p>
                      <p>Surname: '. $row['Surname'] .'</p>
                      <p>Request ID: '. $row['RequestID'] .'</p>
                      <p>Nature of Request: '. $row['NatureOfReq'] .'</p>';
          $headers = "From: UoD Technical Request System <emailtest571@yahoo.com>\r\n";
          $headers .= "content-type: text/html\r\n";

          mail($to, $subject, $message, $headers);
        }
        
      ?>
      <p><b>Please check your e-mail for details and updates and keep note of your Request Number</b><p><br>
      <!-- button which redirects user back to main menu -->
      <form>
        <button type="submit" formaction="index.php">Return to Main Menu</button>
      </form>
    </div>
  </div>


</body>

</html>