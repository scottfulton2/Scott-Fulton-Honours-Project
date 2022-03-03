<?php
  include_once 'Includes/header.php';
?>

    <div class="jumbotron">
        <h2 class="text-center">Welcome to the Log In Page!</h2>
        <div class="container-fluid">
            <form action="Includes/login.inc.php" method="post">
                <input type="text" name="username" placeholder="username..." value="username">
                <label for="username">Username: </label><br>
                <input type="password" name="pwd" placeholder="password..." value="password">
                <label for="password">Password: </label><br>
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