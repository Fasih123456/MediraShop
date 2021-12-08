<!--
	 CSCI 2170: Fall 2021, Group Project
	 logout.php
	 Author: Fasih Ul Islam
-->

<?php
include_once "acesscontrol.php";

/*Zybooks code was used for this assigment
   Date acessed: 25 Nov 2021
   URL : https://www.zybooks.com/, chapter 8
Author: Zybooks
*/


// Initialize the session.
// If you are using session_name("something"), don't forget it now!
session_start();

// Unset all of the session variables.
$_SESSION = array();

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finally, destroy the session.
session_destroy();

header("Location: ../index.php");
die();
?>