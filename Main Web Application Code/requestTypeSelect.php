<?php
  include_once 'Includes/header.php';
?>

<div class="jumbotron text-center" style="padding:10">
  <h2 class="text-center">What Type Of Requestor Are You?</h2><br>
</div>
  <form formaction="Includes/requestTypeSelect.inc.php" method="post">
    <div class="jumbotron text-center">
      <div>
        
        <input type="radio" id="student" name="usertype" value="student">
        <label for="student">UoD Student</label><br>
        
        <input type="radio" id="staff" name="usertype" value="staff">
        <label for="staff"> UoD Staff</label><br>
        
        <input type="radio" id="other" name="usertype" value="other">
        <label for="other"> Other (External)</label>

      </div>
      <br>
      <div class="text-center">
        
      </div>
      <br>
      <div class="text-center">
        <button type="submit" name="submit" formaction="Includes/requestTypeSelect.inc.php">Next -></button>
      </div>
      <br>
    </div>
  </form>
  <?php
  if (isset($_GET["error"])) {
    if ($_GET["error"] == "nochoice") {
      echo "<p>You must state what type of user you are in order to proceed! Also remember to do reCAPTCHA</p>";
    }
  }
  ?>

</body>

</html>
