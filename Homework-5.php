<?php
  // Total Time Spent on this assingment: 3.5 Hours
  
  // Initialize variables
  $course_name = "PHP Course";
  $student_name = "Amir Alatrash";
  $student_no = 21910190;
  date_default_timezone_set('Asia/Jerusalem'); # Set the default timezone to Jerusalem
  $current_date = date('m/d/Y'); # Month / Day / Year
  $current_time = date('h:i:sa'); # Hour : Minutes : Seconds AM/PM
  $ipAddress = $_SERVER['REMOTE_ADDR']; # Get client IP Address
  
  // Form variables
  
  $nameError = $emailError = $ageError = $programmingError = $countryError = $feedbackError = $ipError = NULL;
  $full_name = $email = $age = $programming = $country = $feedback = $ip = $datestamp = $timestamp = NUll;
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  if (empty($_POST["full_name"])) {
		  $nameError = "<span style='color: red; font-weight: bold;'>Name is required</span>";
	  } else {
		  $full_name = secure_input($_POST["full_name"]);
		  }
  
	  if (empty($_POST["age"])) {
		  $ageError = "<span style='color: red; font-weight: bold;'>Age is required</span>";
	  } else {
    $age = secure_input($_POST["age"]);
		  }
  
	  if (empty($_POST["email"])) {
		  $emailError = "<span style='color: red; font-weight: bold;'>Email is required</span>";
	  } else {
    $email = secure_input($_POST["email"]);
		  }
  
	  if (empty($_POST["programming"])) {
		  $programmingError = "<span style='color: red; font-weight: bold;'>Please select a field</span>";
	  } else {
    $programming = ($_POST["programming"]);
		  }
  
	  if (empty($_POST["country"])) {
		  $countryError = "<span style='color: red; font-weight: bold;'>Please select a Country</span>";
	  } else {
    $country = secure_input($_POST["country"]);
		  }
  
	  if (empty($_POST["feedback"])) {
		  $feedbackError = "<span style='color: red; font-weight: bold;'>Please provide a feedback</span>";
	  } else {
    $feedback = secure_input($_POST["feedback"]);
		  }
  
	  if (empty($_POST["ip"])) {
		  $ipError = "<script>alert('Stop playing with hidden fields!');</script>";
	  } else {
    $ip = secure_input($_POST["ip"]);
		  }
  
	  $datestamp = secure_input($_POST["datestamp"]);
	  $timestamp = secure_input($_POST["timestamp"]);
  }
  
  function secure_input($data) {
	  
	  trim($data);					// Lets remove whitespace and other predefined characters from both sides of a string
	  stripslashes($data);			// Lets remove backslashes
	  htmlspecialchars($data);		// Lets convert some predefined characters to HTML entities; No html tags or scripts and sql injection
	  
	  return $data;
  }
  ?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <!-- Custom Style -->
    <link rel="stylesheet" href="style.css">
    <title><?=$course_name?> - Homework-5</title>
  </head>
  <body>
    <nav class="navbar bg-ahliya mb-5">
      <a class="navbar-brand text-white ms-3"><img src="https://eclass.paluniv.edu.ps/pluginfile.php/1/core_admin/logocompact/300x300/1624053753/logo-removebg-preview.png" width="30" height="30" class="d-inline-block align-top me-3" alt=""><?=$course_name?> - Homework-5</a>
      <div class="navbar-text text-date">Current Date: <span class="text-light"><?=$current_date?></span>, Current Time: <span class="text-light"><?=$current_time?></span></div> <!-- Display Current Time and Date -->
    </nav>
    <div class="container">
      <div class="widget mt-5" id="contact-form">
        <div class="widget-heading">
          <h5>Contact Form</h5>
        </div>
        <div class="widget-content">
          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="row mb-3">
              <label for="full_name" class="col-sm-2 col-form-label">Full Name:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Please type your name" >
                <?=$nameError;?>
              </div>
            </div>
            <div class="row mb-3">
              <label for="age" class="col-sm-2 col-form-label">Age:</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" id="age" name="age" placeholder="Please enter your age">
                <?=$ageError;?>
              </div>
            </div>
            <div class="row mb-3">
              <label for="email" class="col-sm-2 col-form-label">Email:</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" placeholder="Please type your email" >
                <?=$emailError;?>
              </div>
            </div>
            <fieldset class="row mb-3">
              <legend class="col-form-label col-sm-2 pt-0">Programming Languages</legend>
              <div class="col-sm-10">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="C++" id="cplusplus" name="programming[]">
                  <label class="form-check-label" for="cplusplus">C++</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="Java" id="java" name="programming[]">
                  <label class="form-check-label" for="java">Java</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="PHP" id="php" name="programming[]">
                  <label class="form-check-label" for="php">PHP</label>
                </div>
                <?php=$programmingError;?>
              </div>
            </fieldset>
            <div class="row mb-3">
              <label for="country" class="col-sm-2 col-form-label">Your Country:</label>
              <div class="col-sm-10">
                <select class="form-select form-select-lg mb-3" name="country" aria-label="country">
                  <option selected disabled>Choose...</option>
                  <option value="Palestine">Palestine</option>
                  <option value="israel">Israel</option>
                  <option value="jordan">Jordan</option>
                </select>
                <?=$countryError;?>
              </div>
            </div>
            <div class="row mb-3">
              <label for="feedback" class="col-sm-2 col-form-label">Feedback:</label>
              <div class="col-sm-10">
                <textarea class="form-control" id="feedback" name="feedback" rows="4" placeholder="Please type your feedback about our services"></textarea>
                <?=$feedbackError;?>
              </div>
            </div>
            <input type="hidden" name="ip" value="<?=$ipAddress?>"> <!-- Hidden input to get the client ip -->
            <?=$ipError;?>
            <input type="hidden" name="timestamp" value="<?=$current_time?>"> <!-- Hidden input to get the time -->
            <input type="hidden" name="datestamp" value="<?=$current_date?>"> <!-- Hidden input to get the date -->
            <div class="d-grid gap-2">
              <button class="btn btn-primary" type="reset">Reset</button>
              <button class="btn btn-primary" type="submit">Submit</button>
            </div>
          </form>
        </div>
      </div>
      <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
      <div class="widget mt-5 mb-5">
        <div class="widget-heading">
          <h5>Your Information</h5>
        </div>
        <div class="widget-content">
          <table class="table table-borderless">
            <tbody>
              <tr>
                <th>Full Name:</th>
                <td><?= $full_name;?></td>				<!-- Display the name -->
              </tr>
              <tr>
                <th>Age:</th>
                <td><?= $age;?></td>					<!-- Display the age -->
              </tr>
              <tr>
                <th>Email:</th>
                <td><?=$email;?></td>					<!-- Display the email -->
              </tr>
              <tr>
                <th>Programming Languages:</th>
                <td>
                  <?php								// display the selected values with foreach loop
                    $programming='';
                    if (isset($_POST['programming'])) {
                    	foreach ($_POST['programming'] as $value) {
                    		$programming .= $value. ', ';
                    	}
                    }
                    $programming = substr(trim($programming), 0, strlen($programming)-2);	//Let's Remove the last comma
                    echo $programming;
                    ?>
                </td>
              </tr>
              <tr>
                <th>Country:</th>
                <td><?=$country;?></td>
              </tr>
              <tr>
                <th>Feedback:</th>
                <td><?=$feedback;?></td>	<!-- Display the feedback -->
              </tr>
              <tr>
                <th>IP Address:</th>
                <td><?=$ip;?></td>			<!-- Get the client IP -->
              </tr>
              <tr>
                <th>Timestamp:</th>
                <td><?=$datestamp;?>, <?=$timestamp;?></td> <!-- Display the date and time when was the form submitted -->
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <?php } ?>
    </div>
    <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {		// If the form was submitted and there is no errors, please hide the form using javascript
      	if (is_null($nameError) && is_null($emailError) && is_null($ageError) && is_null($programmingError) && is_null($countryError) && is_null($feedbackError)) {
      		echo "<script>document.getElementById('contact-form').style.display = 'none';</script>";
      	}
      }
      ?>
  </body>
</html>
