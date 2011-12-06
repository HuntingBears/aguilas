<?php

/**********************************
 * CONFIGURATION FILE FOR AGUILAS *
 **********************************/

// BRANDING
// name of the Application. e.g. "Debian User Management"
$app_name = "@@APP_NAME@@";
// Operator
// the person or group responsible for managing the application
$app_operator = "@@APP_OPERATOR@@";
// Application e-mail
// will appear as sender in all operation e-mails to registered users
$app_mail = "@@APP_MAIL@@";
// Operator e-mail
// will be used for sending error reports
$op_mail = "@@OP_MAIL@@";
// Application language
// must be available in the locales/ folder
$app_locale = "@@APP_MAIL@@";
// Application theme
// must be available in the themes/ folder
$app_theme = "@@APP_THEME@@";
// Application URL
// the public address of the aplication, *essential* for including the correct
// address on the confirmation e-mails
$app_url = "@@APP_URL@@";
// Application links
// an array of link_title => link of the applications connected
// to the LDAP and whose registration process have been delegated to AGUILAS
// this will appear on the main menu
$app_links = array("APP1" => "http://$app_url", "APP2" => "http://$app_url", "APP3" => "http://$app_url", "APP4" => "http://$app_url");

// MYSQL
// IP or Domain of the server where the MYSQL database is located
$mysql_host = "@@MYSQL_HOST@@";
// Database name, it will be created if it doesn't exist
$mysql_dbname = "@@MYSQL_DBNAME@@";
// User with permissions to read and create tables on the database
$mysql_user = "@@MYSQL_USER@@";
// Password for the user
$mysql_pass = "@@MYSQL_PASS@@";

// LDAP
// IP or Domain of the server where the LDAP service is located
$ldap_server = "@@LDAP_SERVER@@";
// Port for connecting to the server
// 389 for non-secure connection
// 636 for secure connection
// must be an integer
$ldap_port = 389;
// DN with read-write priviledges on the LDAP server
$ldap_dn = "@@LDAP_DN@@";
// Password for the writer DN
$ldap_pass = "@@LDAP_PASS@@";
// Base DN to perform searches and include new users
$ldap_base = "@@LDAP_BASE@@";
// Encrypt algorithm used to save passwords on LDAP
// Options:
// PLAIN = no encryption (default) | MD5 = MD5 Encryption | SSHA = SSHA Encryption
$ldap_enc = "PLAIN";
// Use secure tunnel connection (TLS)
// Options:
// FALSE = Don't use TLS (default) | TRUE = Use TLS
$ldap_tls = FALSE;
// Entry used as reference to determine the uidNumber of new users
// will be incremented automatically with each new user
// will be created if it doesn't exist
// must be contained within $ldap_base
$maxuid = "uid=maxUID";
$maxuidbase = $ldap_base;
$maxuiddn = $maxuid . "," . $maxuidbase;
// The start number for the uidNumber attribute of the first user
$maxuidstart = "1100";
// Asociative array containing Group Name => Group ID (gidNumber)
// this is used to parse the name of the group according to the
// gidNumber assigned to each LDAP DN entry
$ldap_gid = array("people" => "100", "admin" => "200");
// The default group assigned to new users
$ldap_default_group = "people";

?>