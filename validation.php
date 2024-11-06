<?php
function validate($email, $password, $count, $option) {
    if ($option == "login") {
        if (!preg_match('/@emsi\.ma$/', $email)) {
            $_SESSION['erroremailLogin'] = "Enter a valid EMSI email";
        } else {
            $_SESSION['erroremailLogin'] = '';
            $count++;
        }
        
        if (strlen($password) < 7) {
            $_SESSION['errorpasswordLogin'] = "Password must be at least 7 characters";
        } else {
            $_SESSION['errorpasswordLogin'] = '';
            $count++;
        }
    } 
    else if ($option == "register") {
        if (!preg_match('/@emsi\.ma$/', $email)) {
            $_SESSION['erroremail'] = "Email must be from EMSI domain";
        } else {
            $_SESSION['erroremail'] = '';
            $count++;
        }

        if ($password !== $_POST['passwordconfirm']) {
            $_SESSION['errorpass'] = "Passwords do not match";
        } else {
            $_SESSION['errorpass'] = '';
            $count++;
        }
    }
    
    return $count;
}
?>
