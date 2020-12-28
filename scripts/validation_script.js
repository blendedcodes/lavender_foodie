//defining function for error message
function printerror(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}

//defining function to validate reg form
function validateForm() {
    //collecting values of the form elements

    var firstname = document.RegForm.firstname.value;
    var lastname = document.RegForm.lastname.value;
    var email = document.RegForm.email.value;
    var password = document.RegForm.password.value;

    // var mobile = document.RegForm.mobile.value;
    // var country = document.RegForm.country.value;
    // var gender = document.RegForm.gender.value;

    // var hobbies = [];
    // var checkboxes = document.getElementsByName("hobbies[]");
    // for (var i = 0; i < checkboxes.length; i++) {
    //     if (checkboxes[i].checked) {
    //         //populating hobbies array with selected values
    //         hobbies.push(checkboxes[i].value);
    //     }
    // }

    //defining error variable with a default value
    var firstnameErr =  lastnameErr = emailErr = passwordErr = true;

    //validating first name input
    if (firstname == "") {
        printerror("firstnameErr", "Please enter your first name")
    }
    else {
        var regex = /^[a-zA-Z\s]+$/;
        if (regex.test(firstname) == false) {
            printerror("firstnameErr", "Please enter a valid name");
        }
        else {
            printerror("firstnameErr", "");
            firstnameErr = false;
        }
    }
    //validating last name input
    if (lastname == "") {
        printerror("lastnameErr", "Please enter your last name")
    }
    else {
        var regex = /^[a-zA-Z\s]+$/;
        if (regex.test(lastname) == false) {
            printerror("lastnameErr", "Please enter a valid name");
        }
        else {
            printerror("lastnameErr", "");
            lastnameErr = false;
        }
    }

    //validating email input
    if (email == "") {
        printerror("emailErr", "Please enter your email address");
    }
    else {
        //regular expression for simple email validation
        var regex = /^\S+@\S+\.\S+$/;
        if (regex.test(email) == false) {
            printerror("emailErr", "Please enter a valid email address");
        } else {
            printerror("emailErr", "");
            emailErr = false;
        }
    }

    // //validating mobile number
    // if (mobile == "") {
    //     printerror("mobileErr", "Please enter your mobile number");
    // } else {
    //     var regex = /^[1-9]\d{9}$/;
    //     if (regex.test(mobile) == false) {
    //         printerror("mobileErr", "Please enter a valid 10 digit mobile number");
    //     } else {
    //         printerror("mobileErr", "");
    //         mobileErr = false;
    //     }
    // }

    //validating country input
    // if (country == "Selected") {
    //     printerror("countryErr", "Please select a country");
    // } else {
    //     printerror("countryErr", "");
    //     countryErr = false;
    // }

    // //validating gender input
    // if (gender == "") {
    //     printerror("genderErr", "Please select a gender");
    // } else {
    //     printerror("genderErr", "");
    //     genderErr = false;
    // }

    //preventing the form from been submitted if any input has an error

    if ((firstnameErr || lastnameErr || emailErr || passwordErr) == true) {
        return false;
    } else {
        //creating a string to hold the data submitted for previewing
        var dataPreview = "You've enter the following details: \n" + "First Name: " + firstname + "\n" + "Last Name: " + lastname + "\n" + "Email Address: " + email + "\n" + "Password: " + password + "\n";


        //displaying the data input in a dialog box before submitting the form
        alert(dataPreview);
    }

};