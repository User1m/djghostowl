<?php 
// Initialize error array.
$errors = array();

if(isset($_REQUEST['submit-book'])) {

  //Check for a valid name
  if (!empty($_REQUEST['name'])) {
    $name = $_REQUEST['name'];
  $pattern = "/^[a-zA-Z]{2,30}/";// This is a regular expression that checks if the name is valid characters
  if (preg_match($pattern,$name)){ $name = $_REQUEST['name'];}
  else {$errors[] = 'Your Name can only be 2-30 letters long.';}
} else {$errors[] = 'You forgot to enter your Name.';}

  //Check for a valid email 
if (!empty($_REQUEST['email'])) {
  $email = $_REQUEST['email'];
  $pattern = "/^[a-zA-Z0-9.-\_]*@[a-zA-Z]+.[a-z]+/";
  if (preg_match($pattern,$email)){ $email = $_REQUEST['email'];}
  else{ $errors[] = 'Your email isn\'t the right format.';}
} else {$errors[] = 'You forgot to enter your Email.';}

  //Check for a valid phone number
if (!empty($_REQUEST['phone'])) {
  $phone = $_REQUEST['phone'];
  $pattern = "/^[0-9\_]{7,20}/";
  if (preg_match($pattern,$phone)){ $phone = $_REQUEST['phone'];}
  else{ $errors[] = 'Your Phone number must be numbers';}
} else {$errors[] = 'You forgot to enter your Phone #.';}

 //Check for a valid e-org 
if (!empty($_REQUEST['e-org'])) {
  $org = $_REQUEST['e-org'];
  $pattern = "/^[a-zA-Z]{2,20}/";
  if (preg_match($pattern,$org)){ $org = $_REQUEST['e-org'];}
  else{ $errors[] = 'Your Name can only contain letters 2-20 long.';}
} else {$errors[] = 'You forgot to enter your Org Name.';}

  //Check for a e-date
if (!empty($_REQUEST['e-date'])) {
  $date = $_REQUEST['e-date'];
  $pattern = "/^[0-9]\/[0-9]\/[0-9]/";
  if (preg_match($pattern,$date)){ $date = $_REQUEST['e-date'];}
  else{ $errors[] = '';}
} else {$errors[] = 'You forgot to enter the Event Date.';}

 //Check for a valid e-time 
if (!empty($_REQUEST['e-time'])) {
  $time = $_REQUEST['e-time'];
  $pattern = "/^[0-9]:[0-9][a-zA-Z]\-[0-9]:[0-9][a-zA-Z]/";
  if (preg_match($pattern,$time)){ $time = $_REQUEST['e-time'];}
  else{ $errors[] = 'Your time isn\'t the right format.';}
} else {$errors[] = 'You forgot to enter the Event time frame.';}

  //Check for a valid e-numofguests
if (!empty($_REQUEST['e-numofguests'])) {
  $guests = $_REQUEST['e-numofguests'];
  $pattern = "/^[0-9\_]{7,20}/";
  if (preg_match($pattern,$guests)){ $guests = $_REQUEST['e-numofguests'];}
  else{ $errors[] = 'Number of guests must be a number';}
} else {$errors[] = 'You forgot to estimate the Number of guests.';}

 //Check for a valid e-location 
if (!empty($_REQUEST['e-location'])) {
  $location = $_REQUEST['e-location'];
  $pattern = "/^[0-9a-zA-Z]+,[a-zA-Z]+,[a-zA-Z]+,[0-9]+{2,20}/";
  if (preg_match($pattern,$location)){ $location = $_REQUEST['e-location'];}
  else{ $errors[] = 'Pleae follow the format address,city,state,zip.';}
} else {$errors[] = 'You forgot to enter the Event address.';}

  //Check for a valid e-referral
if (!empty($_REQUEST['e-referral'])) {
  $referral = $_REQUEST['e-referral'];
  $pattern = "/^[a-zA-Z]{2,20}/";
  if (preg_match($pattern,$referral)){ $referral = $_REQUEST['e-referral'];}
  else{ $errors[] = 'Your Phone number must be numbers';}
} else {$errors[] = 'You forgot to mention how you got here. ';}

  //Check for a message isn't empty
if (!empty($_REQUEST['message'])) {
 $message = $_REQUEST['message'];
} else {$errors[] = 'You forgot to write your message';}
}
  //End of validation
?>
<?php
//sends email if validation passes
if (empty($errors)) { 
  $from = "From: ".$email.""; 
  $to = "mbembac@gmail.com"; 
  $subject = "From djhgostowl.com";
  $fullmessage = "Name: " . $name. "\n";
  $fullmessage .= "Email: ". $email."\n";
  $fullmessage .="Phone: ". $phone ."\n";
  $fullmessage .="Org: ". $org ."\n";
  $fullmessage .= "Date: ". $date . "\n";
  $fullmessage .= "Time: " . $time ."\n";
  $fullmessage .= "# of guests: ". $guests. "\n";
  $fullmessage .= "Location: ".$location."\n";
  $fullmessage .= "How'd you hear about us?: ". $referral."\n";
  $fullmessage .= "Message: ". $message;


  if(!empty($message)){
    mail($to,$subject,$fullmessage,$from);
  }
}
  //end SEND
?>


<?php include("../includes/layouts/header.php");?>


<br >
<br >
<!-- Main Page Content and Sidebar -->

<div class="row">

  <!-- Contact Details -->
  <div class="large-9 columns">

    <h1><a href=\"#\">Booking</a></h1>
    <h3>Thank you for your interest!<h3>
      <p>Please fill out all fields.</p>

      <div class="section-container tabs" data-section>
        <section class="section">
          <div class="content" data-slug="panel1">
           <fieldset>

             <?php 
  //Print Errors
             if (isset($_REQUEST['submit-book'])) {
  // Print any error messages. 
              if (!empty($errors)) { 
                echo '<div class="row"><div data-alert class="alert-box alert radius" class="large-12 columns"><h6>The following occurred:</h6><ul>'; 
  // Print each error. 
                foreach ($errors as $msg) { echo '<h6><strong> -'. $msg . '</strong></h6>';}
                echo '</ul><h6>Your message could not be sent due to input errors.</h6><a href="#" class="close">&times;</a></div></div>';}
                else{
                  echo '<div class="row"><div data-alert class="alert-box success radius" class="large-12 columns"><h6 align="center">Your message was sent. Thank you! <br /> Please do not refresh the browser</h6><br/> <a href="#" class="close">&times;</a></div></div>'; 
                }
              }
//End of errors array
              ?>

              <form>
                <div class="row collapse">
                  <div class="large-4 columns">
                    <label class="inline">Your Name </label>
                  </div>
                  <div class="large-8 columns">
                    <input type="text" name="name" placeholder="Jane Smith">
                  </div>
                </div>
                <div class="row collapse">
                  <div class="large-4 columns">
                    <label class="inline"> Your Email </label>
                  </div>
                  <div class="large-8 columns">
                    <input type="text" name="email" placeholder="jane@smithco.com">
                  </div>
                </div>
                <div class="row collapse">
                  <div class="large-4 columns">
                    <label class="inline">Your Phone </label>
                  </div>
                  <div class="large-8 columns">
                    <input type="text" name="phone" placeholder="1234567890">
                  </div>
                </div>
                <div class="row collapse">
                  <div class="large-4 columns">
                    <label class="inline">Orangization Name </label>
                  </div>
                  <div class="large-8 columns">
                    <input type="text" name="e-org" placeholder="Your Org.">
                  </div>
                </div>
                <div class="row collapse">
                  <div class="large-4 columns">
                    <label class="inline">Date </label>
                  </div>
                  <div class="large-8 columns">
                    <input type="text" name="e-date" placeholder="6/22/14">
                  </div>
                </div>
                <div class="row collapse">
                  <div class="large-4 columns">
                    <label class="inline">Event Time (Start-Finish) </label>
                  </div>
                  <div class="large-8 columns">
                    <input type="text" name="e-time" placeholder="8pm-12am">
                  </div>
                </div>
                <div class="row collapse">
                  <div class="large-4 columns">
                    <label class="inline"># of Expected Guests </label>
                  </div>
                  <div class="large-8 columns">
                    <input type="text" name="e-numofguests" placeholder="40">
                  </div>
                </div>
                <div class="row collapse">
                  <div class="large-4 columns">
                    <label class="inline">Event Location </label>
                  </div>
                  <div class="large-8 columns">
                    <input type="text" name="e-location" placeholder="123 Awesome St.">
                  </div>
                </div>
                <div class="row collapse">
                  <div class="large-4 columns">
                    <label class="inline">How did you hear about us? </label>
                  </div>
                  <div class="large-8 columns">
                    <input type="text" name="e-referral" placeholder="">
                  </div>
                </div>

                <label>What's up? </label>
                <textarea rows="4" name="message"></textarea>

                <label>Please check the right boxes to verify your humanity...</label>
                <label class="good-check">Check Here: <input name="check1" type="checkbox" value="Red Maple Acer" /><br />
                </label>

                <label class="bad-check">Don't Check Here: <input name="check2" type="checkbox" value="Chinese Pistache" /><br />
                </label>

                <label class="good-check">Check Here: <input name="check3" type="checkbox" value="Raywood Ash" /><br />
                </label>
                <button type="submit" name="submit-book" class="radius button">Submit</button>
              </form>
            </fieldset>
          </div>
        </section>

      </div>
    </div>

    <!-- End Contact Details -->


    <!-- Sidebar -->


    <div class="large-3 columns">
      <h5>Map</h5>
      <!-- Clicking this placeholder fires the mapModal Reveal modal -->
      <p>
        <a href="" data-reveal-id="mapModal"><img src="http://placehold.it/400x280"></a><br />
        <a href="" data-reveal-id="mapModal">View Map</a>
      </p>
      <p>
        123 Awesome St.<br />
        Barsoom, MA 95155
      </p>
    </div>
    <!-- End Sidebar -->
  </div>

  <!-- End Main Content and Sidebar -->

  <?php include("../includes/layouts/footer.php");?>