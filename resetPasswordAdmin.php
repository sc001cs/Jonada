<?php

session_start();

require ('mysql_connect.php');

$page_title = 'CIT Online Exam System';
include ('includes/header_login.html');

//// Check for a valid user ID, through GET or POST:
//if ((isset($_GET['id'])) && (is_numeric($_GET['id']))) { // From view_users.php
//    $username = $_GET['id'];
//} elseif ((isset($_POST['id'])) && (is_numeric($_POST['id']))) { // Form submission.
//    $id = $_POST['id'];
//} else { // No valid ID, kill the script.
//    echo '<div class="alert text-center">
//    <strong>Kujdes!</strong> Kjo faqe nuk eshte me e aksesueshme.
//    </div>';
//    include ('includes/footer_login.html');
//    exit();
//}

if (isset($errors) && !empty($errors)) {
    echo '<h4 class="alert alert-error text-center">Error!</h4>';
    foreach ($errors as $msg) {
        echo "$msg";
    }
    echo '</h4><h4 class="alert alert-error text-center">Try again</h4>';
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $password = $_POST['PasswordOld'];
    $passwordNew = $_POST['PasswordNew'];
    
    $kodi = "{$_SESSION['username']}";

    $q = "select * from student_lecturer where username = '{$_SESSION['username']}' && password = sha1('$password')";

    $r = mysqli_query($dbc, $q);

    if (mysqli_num_rows($r) > 0) {

        $sqlUpdate = "update student_lecturer set password = sha1('$passwordNew') where username = '{$_SESSION['username']}' limit 1";
        
         $r = mysqli_query($dbc, $sqlUpdate);
        
        echo '<p class="alert alert-success text-center">The password has been changed</p>';
    } else {
        echo '<br><h4 class="alert alert-error text-center">Please, check if password is correct</h4>';
    }
}


?>

<div class="container">

    <form class="form-signin" method="POST" action="resetPasswordAdmin.php">
        <h2 class="form-signin-heading text-center text-info">Change the password</h2>

        <br>

        <span><b><p class="alert alert-info">Old password</p></b><input type="text" class="input-block-level" name="PasswordOld" placeholder="Put the old password" required></span>
        <span><b><p class="alert alert-info">New password</p></b><input type="text" class="input-block-level" name="PasswordNew" placeholder="Put the new password" required></span>
        <div class="wrapper-it">
            <button class="btn btn-large btn-primary" type="Ndrysho Password">Change password</button>
            <br><br>
            <p  class='table'><a class='btn btn-info btn-large' href='adminpanel.php'>Back</a></p>
<!--            	<input type="hidden" name="id" value="' . $id . '" />
            <input type="hidden" name="id" value="' . $emriLendes . '" />-->

            
        </div>
    </form>

</div>

<?php include ('includes/footer_login.html'); ?>