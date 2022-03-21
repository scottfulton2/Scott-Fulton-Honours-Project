<?php
  include_once 'Includes/header.php';
?>

    <div class="jumbotron">
        <h1 class="text-center">Welcome to the Log In Page!</h1>
        <div class="container-fluid">
            <form action="Includes/login.inc.php" method="post">
                <label for="username">Username: </label>
                <input type="text" name="username" placeholder="username..." value="username" required><br>
                <label for="password">Password: </label>
                <input type="password" name="pwd" placeholder="password..." value="password" required><br>
                <button type="submit" name="submit">Log In</button> 
            </form>
        </div>
        <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyinput") {
                    echo "<p>Fill in all fields!</p>";
                }
                else if ($_GET["error"] == "wronglogin") {
                    echo "<p>You entered the wrong username or password</p>";
                }
                else if ($_GET["error"] == "stmtfailed") {
                    echo "<p>Something went wrong, try again!</p>";
                }
            }
        ?>
    </div>

</body>

</html>