<?php
  include_once 'Includes/header.php';
?>

<div class="jumbotron">
  <h1 class="text-center">Logged In As Supervisor</h1>      
  <h3 class="text-center">Find a Request</h3>
        <div class="container-fluid">
            <form action="SupervisorHandle.php" method="post"> <!-- will need to create a new files for Supervisor's being able to view and review a request -->
                <label for="requestID">Request ID: </label>
                <input type="text" name="requestID" value="" required><br>
                <label for="email">Email: </label>
                <input type="text" name="email" placeholder="your@email.com" required><br>
                <button type="submit" name="submit">Find Request -></button> 
            </form>
        </div>
        <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyinput") {
                    echo "<p>Fill in all fields!</p>";
                }
                else if ($_GET["error"] == "wrongDetails") {
                    echo "<p>You entered the wrong ID or Email (or your request may not exist)!</p>";
                    echo "<p>please try again</p>";
                }
                else if ($_GET["error"] == "stmtfailed") {
                    echo "<p>Something went wrong, try again!</p>";
                }
            }
        ?>
    </div>

</body>

</html>

</body>

</html>