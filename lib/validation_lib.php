<php?<?php
function is_phone_number($par)
{
	if (preg_match("/[^0-9]/","$par")) {
		return false;
	} else {
		return true;
	}
}

function check_for_whitespace($string) {
	return (preg_match("/[\s]/", $string)) ? $string : false;
}

function password_character($string_char) {
	if (preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{6,13}$/",$string_char)){
        return false;
    }   else {
        return true;
    }
}




?>