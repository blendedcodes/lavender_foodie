<?php
//including the database connection
include('./config/db.php');


//server-side error and success messages
global $success_message, $email_exist, $first_nameErr, $last_nameErr, $emailErr, $password_Err;

global $firstname_emptyErr, $lastname_emptyErr, $email_emptyErr, $password_EmptyErr, $emailverify_Err, $emailverify_success;

//setting empty forms for validation mapping
$_first_name = $_last_name = $_email = $_password = "";

if (isset($_POST["submit"])) {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    //checking if the email entered already exist
    $email_check = mysqli_query($connection, "SELECT * FROM users WHERE email = '{$email}'");
    $rowcount = mysqli_num_rows($email_check);

    //PHP validation
    //verification if the form values are not empty
    if (!empty($firstname) && !empty($lastname) && !empty($email && !empty($password))) {
        
        //check if the user email already exist
        if ($rowcount > 0) {
            $email_exist = '
            <div class="alert alert-danger" role="alert" User with email already exist!
            ';
        } else {
            //clean form data before sending data to the database
            $_first_name = mysqli_real_escape_string($connection, $firstname);
            $_last_name = mysqli_real_escape_string($connection, $lastname);
            $_email = mysqli_real_escape_string($connection, $email);
            $_password = mysqli_real_escape_string($connection, $password);
        }

        //perform form validation
        if (!preg_match("/^[a-zA-Z ]*$/", $_first_name)) {
            $first_nameErr = '<div class = "alert alert-danger">ONly letter and white space allowed</div>';
        }

        if (!preg_match("/^[a-zA-Z ]*$/", $_last_name)) {
            $last_nameErr = '<div class = "alert alert-danger">
            Only letter and white space allowed.</div>';
        }

        if (!filter_var($_email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = '<div class = "alert alert-danger>
            Email format is invalid
            </div>';
        }


        if (!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{6,20}$/", $password)) {
            $password_Err = '<div class = "alert alert-danger">
            Password should be between 6 to 12 characters long, contains at least one special character, lowercase, uppercase and a digit.
            </div>';
        }

        //storing data to database if all the conditions are met
        if ((preg_match("/^[a-zA-Z ]*$/", $_first_name)) && (preg_match("/^[a-zA-Z ]*$/", $_last_name)) && (filter_var($email, FILTER_VALIDATE_EMAIL)) && (preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/", $_password))) {
            
            //generate random activation token
            $token = md5(rand().time());

            //password hashing
            $password_hash = password_hash($password, PASSWORD_BCRYPT);

            //database query
            $sql = "INSERT INTO users (firstname, lastname, email, password, token, is_active, date_time) VALUES ('{$firstname}', '{$lastname}', '{$email}', '{$password_hash}', '{$token}' '0' now())";

            //create mysql query
            $sqlQuery = mysqli_query($connection, $sql);

            if (!$sqlQuery) {
                die("MySQL query failed!" . mysqli_error($connection));
            }

            //sending verification email to the user
            if ($sqlQuery) {
                $msg = 'Click on the activation link to verify your email. <br><br> <a href="http://localhost:8080/php-user-authentication/user_verificaiton.php?token='.$token.'"> Click here to verify email</a>
                    ';

                    //create the transport
                    $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
                    ->setUsername('your_email@gmail.com')
                    ->setPassword('your_email_password');

                    //create the mailer using your created transport
                    $mailer = new Swift_Mailer($transport);

                    //create a message
                    $message = (new Swift_Message('Please Verify Email Address!'))
                    ->setFrom([$email => $firstname . '' . $lastname])
                    ->setTo($email)
                    ->addPart($msg, "text/html")
                    ->setBody('Hello! $firstname');


                    //send the message
                    $result = $mailer->send($message);

                    if (!$result) {
                        $emailverify_Err = '<div class = "alert alert-danger">
                        Verification email could not be sent!
                        </div>';
                    } else {
                        $emailverify_Err = '<div class ="alert alert-success">
                        Verification email has been sent!
                        </div>';
                    }


            }

    }




} else {
    if (empty($firstname)) {
        $firstname_emptyErr = '<div class ="alert alert-danger">
        First name can not be blank.
        </div>';
    }
    if (empty($lastname)) {
        $lastname_emptyErr = '<div class ="alert alert-danger">
        First name cannot be blank.
        </div>';
    }
    if (empty($email)) {
        $email_emptyErr = '<div class ="alert alert-danger">
        Email cannot be blank.
        </div>';
    }
    if (empty($password)) {
        $password_emptyErr = '<div class ="alert alert-danger">
        First name can not be blank.
        </div>';
     }

   }
}

?>