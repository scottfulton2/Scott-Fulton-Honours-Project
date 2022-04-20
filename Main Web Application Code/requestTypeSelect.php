<?php
  include_once 'Includes/header.php';
?>

<div class="jumbotron text-center" style="padding:10">
  <h2 class="text-center">What Type Of Requestor Are You?</h2><br>
  <form formaction="Includes/requestTypeSelect.inc.php" method="post">
    <input type="radio" id="student" name="usertype" value="student">
    <label for="student">University of Dundee Student (either postgraduate or undergraduate)</label><br> 
    <input type="radio" id="staff" name="usertype" value="staff">
    <label for="staff">University of Dundee Staff</label><br>
    <input type="radio" id="other" name="usertype" value="other">
    <label for="other">Other</label><br>

    <div class="text-center">
      <div class="g-recaptcha" data-sitekey="6Lcd2XQfAAAAAG-O2-bZDut-YOYvGjX0xrr07TcI"></div>
    </div>

    <button type="submit" name="submit" formaction="Includes/requestTypeSelect.inc.php">Next -></button>
  </form>
  <?php
  if (isset($_GET["error"])) {
    if ($_GET["error"] == "nochoice") {
      echo "<p>You must state what type of user you are in order to proceed! Also remember to do reCAPTCHA</p>";
    }
  }
  ?>
</div>

</body>

</html>