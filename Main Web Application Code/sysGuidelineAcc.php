<?php
  include_once 'Includes/header.php';
?>

<div class="jumbotron text-center">
    <h1 class="text-center">TRMS System Guidelines</h1>
    <div>
        <p><b>You must accept the system guidelines before submitting a request.<br>
        please read the guidelines below.</b><p>
    </div>
</div>


<!-- 
    Will need to change this to using a better form of html and make it look a prettier, but for now,
    this is fine, just as long the functionality works
-->
<div class="container-fluid" style="padding:10">
    <div class="jumbotron text-right" style="margin-bottom:1px; padding:10">
    <p>1.   The Request for Technical Assistance form (RTA) should be completed and submitted with appropriate drawings and/or information. Please ensure that an email address is included in order that you can be contacted. Please also include details of a Supervisor (who should approve and sign the request) and account number which will be required should materials need to be bought.</p>
    <br>
    <p>2.	On submission of the form, an RTA number will be assigned to your request and your job will join the queue with others already in the system.</p>
    <br>
    <p>3.	The status of technical requests can be viewed on the Technical Request Task List System.</p>
    <br>
    <p>4.	The technicians endeavour to operate as fair a system as possible to everyone by working through them in a timely manner. Those putting requests in should therefore show due consideration with regards to other jobs in the system before theirs. Please be aware that there are some times of the year however when certain requests are given priority in the system, typically those related to Honours project work. It is advisable to submit workshop requests as soon as you can as no guarantee can be given for a job to be completed by a deadline should there be several jobs already in the system that are being worked through.</p>
    <br>
    <p>5.	Please also note that some jobs may be started before others depending on factors such as, the nature of the request, availability of certain technicians or machinery, anticipated time to complete a request (particularly shorter jobs which might be able to be completed in between waiting time with others).</p>
    <br>
    <p>6.	Please note that when requesting items to be made, it is often considerably easier and less time consuming to make several of the same part at the same time than to just make 1 part and then be asked at a later date for several more. A great deal of technician time can be taken in setting machinery up and it is more effective to run several items off at this stage. Any requests for subsequent identical or similar items, that were not indicated in the original RTA are very likely to be put at the end of the queue in order to be fair to all those with requests in the system.</p>
    <br>
    <p>7.	Please also note that when submitting a request, as far as possible the complete nature of the request should be given. It is very frustrating for technicians and not considerate for others waiting for their jobs to be started when requestors return on several occasions after their job is complete asking for additional work to be done. Please note that under these circumstances, this additional work may be made to join the end of the queue to be fair to others and the technicians.</p>
    <br>
    <p>8.	Additionally, technicians may communicate via email for information that is important to be able to continue with the task. Please note that due consideration has to be given to others who are waiting in the system and if no response to a communication  is made then your request may be stopped and put on hold until that information is received and a different request then started.</p>
    <br>
    <p>Dr Gary J Callon, Technical Manager</p>
    <br>
    </div>
    <form formaction="Includes/sysGuidelineAcc.inc.php" method="post">
        <input type="checkbox" name="accept" value="accept">
        <label for="accept">I accept the system guidelines</label>
        <button type="submit" name="submit" formaction="Includes/sysGuidelineAcc.inc.php">Next -></button>
    </form>
    <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptycheckbox") {
            echo "<p>You have to accept the system guidelines in order to submit a request!</p>";
        }
    }
    ?>
</div>

</body>

</html>