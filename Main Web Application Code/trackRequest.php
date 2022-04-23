<?php
  include_once 'Includes/header.php';
?>

<div class="jumbotron">
        <h1 class="text-center">Track a Request</h1>
        <div class="container-fluid">
            <form action="trackRequestHandle.php" method="post">
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
                    echo "<p>can't find req ID</p>";
                }
                else if ($_GET["error"] == "stmtfailed") {
                    echo "<p>Something went wrong, try again!</p>";
                }
            }
        ?>
    </div>

</body>

</html>