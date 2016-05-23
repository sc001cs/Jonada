<?php

session_start();

$page_title = 'Log out!';
include ('includes/header_login.html');

if (!isset($_SESSION['fullname'])) {

    require ('login_functions.php');
    redirect_user();
} else {
    $_SESSION = array(); // Clear the variables.
    session_destroy(); // Destroy the session itself.
}

echo "<h4 class='alert alert-error text-center'>Log out with success</h4>

<h3 align='center' class='alert alert-info'><a href=\"index.php\">Return to Homepage</a></h3>";
?>

<?php include ('includes/footer_login_1.html'); ?>