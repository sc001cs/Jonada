<?php
$page_title = 'CIT Online Exam System';
include ('includes/header_login.html');

if (isset($errors) && !empty($errors)) {
    echo '<h4 class="alert alert-error text-center">Error!</h4>';
    foreach ($errors as $msg) {
        echo "$msg";
    }
    echo '</h4><h4 class="alert alert-error text-center">Try again.</h4>';
}
?>

<!--<h4 class="alert alert-info get-width text-center">Pershendetje, Miresevini ne portalin e gjenerimit te Silabuseve</h4>-->

<div class="container">

    <form class="form-signin" method="post" action="validation.php">
        <img src="generatePDF/examples/images/LOGO-CIT.png">
<!--        <h2 class="form-signin-heading text-center text-info">Logohuni</h2>-->
        <br>
        <br>

        <span><b><p class="alert alert-danger-danger">Your username</p></b><input type="text" class="input-block-level" name="username" placeholder="Your username..." required></span>
        <span><b><p class="alert alert-danger-danger">Your password</p></b><input type="password" class="input-block-level" name="password" placeholder="Your password..." required></span>

        <button class="btn btn-info pull-right " type="Aktivizo!">Log In</button>
        <br><br><br>
         
    </form>

</div>

<?php include ('includes/footer_login.html'); ?>