<?php  include('./controller/registration.php'); ?>


<!DOCTYPE html>
<html lang="eng">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/user_styles.css">
    <script src="../scripts/jquery-3.5.1.min.js"></script>

    <script src="../scripts/validation_script.js"></script>
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">

    <link rel="stylesheet" href="../css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="../css/owl-carousel.css">

    <link rel="stylesheet" href="../css/lightbox.css">

</head>

<body>
    <?php include('../header.php'); ?>

    <form name="RegForm" id="form" onsubmit="return validateForm()" action="" method="post">

        <!-- signup script -->


        <h2>User Registration</h2>

        <?php echo $success_message; ?>
        <?php echo $email_exist; ?> 
         <?php echo $emailverify_Err; ?>
        <?php echo $emailverify_success; ?>

        <div class="row">
            <!-- <label>First Name</label> -->
            <input type="text" name="firstname" placeholder="First Name">
            <div class="error" id="firstnameErr"></div>
        </div>
        <div class="row">
            <!-- <label>Last Name</label> -->
            <input type="text" name="lastname" placeholder="Last Name">
            <div class="error" id="lastnameErr"></div>
        </div>
        <div class="row">
            <!-- <label>Email Address</label> -->
            <input type="text" name="email" placeholder="Email">
            <div class="error" id="emailErr"></div>
        </div>
        <div class="row">
            <!-- <label>Password</label> -->
            <input type="password" id="password" name="password" placeholder="Password">
            <!-- <div class="error" id="password"></div> -->
        </div>
        <div class="row">
            <!-- <label>Confirm Password</label> -->
            <input type="password" id="confirm_pass" name="confirm_pass" placeholder="Confirm Password"
                onkeyup='check();'>
            <div class="error" id='message'></div>
        </div>
        <!-- <div class="row">
        <label>Mobile Number</label>
        <input type="text" name="mobile" maxlength="10" placeholder="Mobile Number">
        <div class="error" id="mobileErr"></div>
    </div>
    <div class="row">
        <label>Country</label>
        <select name="country">
            <option>Select</option>
            <option>Australia</option>
            <option>India</option>
            <option>United States</option>
            <option>United Kingdom</option>
            <option>Nigeria</option>
            <option>Ghana</option>
            <option>South Africa</option>
        </select>
        <div class="error" id="countryErr"></div>
    </div>
    <div class="row">
        <label>Gender</label>
        <div class="form-inline">
            <label><input type="radio" name="gender" value="male"> Male</label>
            <label><input type="radio" name="gender" value="female"> Female</label>
        </div>
        <div class="error" id="genderErr"></div>
    </div>
    <div class="row">
        <label>Hobbies <i>(Optional)</i></label>
        <div class="form-inline">
            <label><input type="checkbox" name="hobbies[]" value="sports"> Sports</label>
            <label><input type="checkbox" name="hobbies[]" value="movies"> Movies</label>
            <label><input type="checkbox" name="hobbies[]" value="music"> Music</label>
        </div>
    </div> -->
        <div class="row">
            <input type="submit" id="submit" class="btn btn-outline-primary btn-lg btn-block btn-primary"
                value="Get Started">
        </div>
        <div class="row user_ready">
            Already a user? <a href="login.php">Sign In</a>
        </div>


        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="../scripts/jquery-3.5.1.min.js"></script>

        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>