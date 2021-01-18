<!DOCTYPE html>
<html lang="eng">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/user_login.css">
    <script src="../scripts/validation_script.js"></script>
    <!-- Bootstrap CSS -->
    <script src="../scripts/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">

<link rel="stylesheet" href="../css/templatemo-klassy-cafe.css">

<link rel="stylesheet" href="../css/owl-carousel.css">

<link rel="stylesheet" href="../css/lightbox.css">
</head>

<body>

    <!-- Header -->
    <?php include('../header.php'); ?>

    <!-- Login script -->
    <?php include('../controller/login.php'); ?>

    <form name="RegForm" onsubmit="return validateForm()" action="confirmation.php" method="post">
        <h2>User Login</h2>

                    <?php echo $account_notexist_error; ?>
                    <?php echo $email_pass_error; ?>
                    <?php echo $verificationRequired_error; ?>
                    <?php echo $email_empty_error; ?>
                    <?php echo $pass_empty_error; ?>

        <div class="row">
            <!-- <label>Email Address</label> -->
            <input type="text" name="email" placeholder="Email">
            <div class="error" id="emailErr"></div>
        </div>
        <div class="row">
            <!-- <label>Password</label> -->
            <input type="password" name="password" placeholder="Password">
            <div class="error" id="passErr"></div>
        </div>

        <!-- Submit button -->
        <div class="row">
            <input type="submit" class="btn btn-primary" value="Sign In">
        </div>

        <div class="row user_ready">
            Not yet a user? <a href="signup.php"> Get Started</a>
        </div>

        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>