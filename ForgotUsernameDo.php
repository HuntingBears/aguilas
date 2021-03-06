<?php

$allowed_ops = array("mail", "image_captcha");

require_once "./setup/config.php";
require_once "./libraries/Locale.inc.php";
require_once "./themes/$app_theme/header.php";
require_once "./libraries/Functions.inc.php";
require_once "./libraries/Parameters.inc.php";
require_once "./libraries/LDAPConnection.inc.php";

?>

<h2><?= _("Search Results") ?></h2>

<?php

// USER INPUT VALIDATION ------------------------------------------------------- 
// Some of the parameters were not set, the form was not used to get here
if (!isset($mail) || !isset($image_captcha)) {

    VariableNotSet();

// Some of the parameters are empty
} elseif ($mail == '' || $image_captcha == '') {

    EmptyVariable();
    
// The cookie has expired
} elseif (!isset($session_captcha)) {

    ExpiredCaptcha();

// We compare the cookie hash with the user entry
// If they are different, the user messed up
} elseif ($session_captcha <> $image_captcha) {

    WrongCaptcha();

// Invalid e-mail
} elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {

    InvalidEMail();

} else {

    // VALIDATION PASSED -----------------------------------------------------------
    // We stablish what attributes are going to be retrieved from each entry
    $search_limit = array("uidNumber", "uid", "cn", "gidNumber");

    // The filter string to search through LDAP
    $search_string = "(mail=" . $mail . ")";

    // The attribute the array of entries is going to be sorted by
    $sort_string = 'cn';

    // Searching ...
    $search_entries = AssistedLDAPSearch($ldapc, $ldap_base, $search_string, $search_limit, $sort_string);

    // How much did we get?
    $result_count = $search_entries['count'];

    // If we didn't get any entries, then something is wrong
    if ($result_count == 0) {

        NoResults();

    // We can have more than one result
    } else {
        
        echo _("The following users are associated to the email account ") . '"<strong>' . $mail . '<strong>".';

        // Parsing the user table with the result entries
        ParseUserTable($search_entries, $result_count);
    
    }
    
}

// Closing the connection
$ldapx = AssistedLDAPClose($ldapc);

require_once "./themes/$app_theme/footer.php";

?>