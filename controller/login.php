<?php 
//database connection
include('./config/db.php');

global $wrong_password_error, $account_notexist_error, $email_pass_error, $verificationRequired_error, $email_empty_error, $pass_empty_error;

if (isset($_POST['login'])) {
    $email_signin = $_POST['email_signin'];
    $password_signin = $_POST['password_signin'];

    //cleaning data before retrieving from dbase
    $user_email = filter_var($email_signin, FILTER_SANITIZE_EMAIL);
    $pass_word = mysqli_real_escape_string($connection, $password_signin);

    //query database to see if the email exists in database
    $sql = "SELECT * FROM users WHERE email = '{$email_signin}'";
    $query = mysqli_query($connection, $sql);
    $rowcount = mysqli_num_rows($query);

    //incase the query fails, show the reason for the failure
    if (!$query) {
        die("SQL query failed: " . mysqli_error($connection));
    }

    if (!empty($email_signin) && !empty($password_signin)) {
        if (!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{6,20}$/", $pass_word)) {
            $wrong_password_error = '<div class ="alert alert-danger">
            Password should have been between 6 to 20 characters long, contains at least one special character, lowercase, uppercase and a digit.
            </div>';
        }

        //check if the email exist
        if ($rowcount <= 0) {
            $account_notexist_error = '<div class ="alert alert-danger">
            User account does not exist.
            </div>';
        } else {
            //fetch the user data and store it in a php session
            while ($row = mysqli_fetch_array($query)) {
                $id   = $row['id'];
                $_first_name = $row['firstname'];
                $_last_name = $row['lastname'];
                $email = $row['email'];
                $pass_word = $row['password'];
                $token = $row['token'];
                $is_active  = $row['is_active'];
            }


            //verify password
            $password = password_verify($password_signin, $pass_word);

            //allow only verified users
            if ($is_active == '1') {
                if ($email_signin == $email && $password_signin == $password) {
                    header("Location: ./dashboard.php");

                    $_SESSION['id'] = $id;
                    $_SESSION['firstname'] = $_first_name;
                    $_SESSION['lastname'] = $_last_name;
                    $_SESSION['email'] = $email;
                    $_SESSION['token'] = $token;
                } else {
                    $email_pass_error = '<div class ="alert alert-danger">
                    Either email or password is incorrect.
                    </div>';
                }
            } else {
                $verificationRequired_error = '<div class ="alert alert-danger">
                Account verification is required for login.
                </div>';
            }
        }
    }
    
} else {
    if (empty($email_signin)) {
        $email_empty_error = "<div class ='alert alert-danger email_alert'>
        Email not provided. 
        </div>";
    }

    if (empty($password_signin)) {
        $pass_empty_error = "<div class ='alert alert-danger email_alert'>
        Password not provided.
        </div>";
    }
}


?>