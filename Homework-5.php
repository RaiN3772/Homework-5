<?php
  // Total Time Spent on this assingment: 3.5 Hours
  
  // Initialize variables
  $course_name = "PHP Course";
  $student_name = "Amir Alatrash";
  $student_no = 21910190;
  date_default_timezone_set('Asia/Jerusalem'); # Set the default timezone to Jerusalem
  $current_date = date('m/d/Y'); # Month / Day / Year
  $current_time = date('h:i:sa'); # Hour : Minutes : Seconds AM/PM
  $ip = $_SERVER['REMOTE_ADDR']; # Get client IP Address
  
  // Form variables #Errors
  $nameError = "<span style='color: red; font-weight: bold;'>Name is required</span>";
  $ageError = "<span style='color: red; font-weight: bold;'>Age is required</span>";
  $emailError = "<span style='color: red; font-weight: bold;'>Email is required</span>";
  $programmingError = "<span style='color: red; font-weight: bold;'>Choose your Programming Languages</span>";
  $countryError = "<span style='color: red; font-weight: bold;'>Choose your Country</span>";
  $feedbackError = "<span style='color: red; font-weight: bold;'>Please provide a feedback</span>";
  
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
      <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {?> <!-- IF the form was subbmited please show the information -->
      <div class="widget mt-5">
        <div class="widget-heading">
          <h5>Your Information</h5>
        </div>
        <div class="widget-content">
          <table class="table table-borderless">
            <tbody>
              <tr>
                <th>Full Name:</th>
                <td>
                  <?= htmlentities($_POST["full_name"]); ?>				<!-- Display the name -->
                  <?php if (empty($_POST["full_name"])) {	// if the input was empty please show an error
                    echo ($nameError);
                    }
                    ?>
                </td>
              </tr>
              <tr>
                <th>Age:</th>
                <td>
                  <?= htmlentities($_POST["age"]); ?>			<!-- Display the age -->
                  <?php if (empty($_POST["age"])) { // if the input was empty please show an error
                    echo ($ageError);
                    }
                    ?>
                </td>
              </tr>
              <tr>
                <th>Email:</th>
                <td>
                  <?= htmlentities($_POST["email"]); ?> <!-- Display the email -->
                  <?php if (empty($_POST["email"])) { // if the input was empty please show an error
                    echo ($emailError);
                    }
                    ?>
                </td>
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
                    //Let's Remove the last comma
                    $programming = substr(trim($programming),0,strlen($programming)-2);
                    echo $programming;
                    if (empty($_POST["programming"])) {	// if no selected values please show an error
                    	echo ($programmingError);
                    }
                    ?>
                </td>
              </tr>
              <tr>
                <th>Country:</th>
                <td>
                  <?php
                    if(isset($_POST['country'])) { // Display the selected value
                    $selected = $_POST['country'];
                    echo $selected;
                    }
                    else if (empty($_POST["country"])) { // if no selected values please show an error
                    	echo ($countryError);
                    }
                    ?>
                </td>
              </tr>
              <tr>
                <th>Feedback:</th>
                <td>
                  <?= htmlentities($_POST["feedback"]); ?> <!-- Display the feedback -->
                  <?php if (empty($_POST["feedback"])) { // if the input was empty please show an error
                    echo ($feedbackError);
                    }
                    ?>
                </td>
              </tr>
              <tr>
                <th>IP Address:</th>
                <td><?= htmlentities($_POST["ip"]); ?></td> <!-- Get the client IP -->
              </tr>
              <tr>
                <th>Timestamp:</th>
                <td><?= htmlentities($_POST["datestamp"]); ?>, <?= htmlentities($_POST["timestamp"]); ?></td> <!-- Display the date and time when was the form submmited -->
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <?php }
        else { ?>
      <div class="widget mt-5">
        <div class="widget-heading">
          <h5>Contact Form</h5>
        </div>
        <div class="widget-content">
          <form action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>" method="post">
            <div class="row mb-3">
              <label for="full_name" class="col-sm-2 col-form-label">Full Name:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Please type your name" >
              </div>
            </div>
            <div class="row mb-3">
              <label for="age" class="col-sm-2 col-form-label">Age:</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" id="age" name="age" placeholder="Please enter your age">
              </div>
            </div>
            <div class="row mb-3">
              <label for="email" class="col-sm-2 col-form-label">Email:</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" placeholder="Please type your email" >
              </div>
            </div>
            <fieldset class="row mb-3">
              <legend class="col-form-label col-sm-2 pt-0">Programming Languages</legend>
              <div class="col-sm-10">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="C++" id="cplusplus" name="programming[]">
                  <label class="form-check-label" for="cplusplus">
                  C++
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="Java" id="java" name="programming[]">
                  <label class="form-check-label" for="java">
                  Java
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="PHP" id="php" name="programming[]">
                  <label class="form-check-label" for="php">
                  PHP
                  </label>
                </div>
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
              </div>
            </div>
            <div class="row mb-3">
              <label for="feedback" class="col-sm-2 col-form-label">Feedback:</label>
              <div class="col-sm-10">
                <textarea class="form-control" id="feedback" name="feedback" rows="4" placeholder="Please type your feedback about our services"></textarea >
              </div>
            </div>
            <input type="hidden" name="ip" value="<?=$ip?>"> <!-- Hidden input to get the client ip -->
            <input type="hidden" name="timestamp" value="<?=$current_time?>"> <!-- Hidden input to get the time -->
            <input type="hidden" name="datestamp" value="<?=$current_date?>"> <!-- Hidden input to get the date -->
            <div class="d-grid gap-2">
              <button class="btn btn-primary" type="reset">Reset</button>
              <button class="btn btn-primary" type="submit">Submit</button>
            </div>
          </form>
        </div>
      </div>
      <?php } ?>
    </div>
  </body>
</html>