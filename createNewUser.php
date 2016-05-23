<?php

session_start();

require ('mysql_connect.php');

$page_title = 'CIT Online Exam System';
include ('includes/header_login.html');



if (isset($errors) && !empty($errors)) {
    echo '<h4 class="alert alert-error text-center">Error!</h4>';
    foreach ($errors as $msg) {
        echo "$msg";
    }
    echo '</h4><h4 class="alert alert-error text-center">Provoni perseri.</h4>';
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $password = $_POST['password'];
    $studentcode = $_POST['studentcode'];
    $email = $_POST['email'];
    
    $q = "select * from student_lecturer where username = '$username'";
    $q1 = "select * from student_lecturer where studentcode = '$studentcode'";

    $r = mysqli_query($dbc, $q);
    $r1 = mysqli_query($dbc, $q1);

    if (mysqli_num_rows($r1) > 0){
        echo '<p class="alert alert-danger-danger text-center">This user exist on database</p>';
        
    } else {
    
    if (mysqli_num_rows($r) > 0){
        echo '<p class="alert alert-danger-danger text-center">This user exist on database</p>';
        
             
        
    } else {
        
        $sqlUpdate = "insert into student_lecturer "
                . " (username, password, fullname, studentcode, email, islecturer) "
                . " values('$username', sha1('$password'), '$fullname', '$studentcode', '$email', '0')";
        
         $r = mysqli_query($dbc, $sqlUpdate);
        echo '<p class="alert alert-danger-danger text-center">New user has been created</p>';
    }
    }
}


?>

<div class="container">

    <form class="form-signin" method="post" action="createNewUser.php">
        <img src="generatePDF/examples/images/LOGO-CIT.png">
        <br>
        <br>

        <span><b><p class="alert alert-danger-danger">Username</p></b><input type="text" class="input-block-level" name="username" required></span>
        <span><b><p class="alert alert-danger-danger">Email</p></b><input type="email" class="input-block-level" name="email" required></span>
        <span><b><p class="alert alert-danger-danger">Fullname</p></b><input type="text" class="input-block-level" name="fullname" required></span>
        <span><b><p class="alert alert-danger-danger">Password</p></b><input type="text" class="input-block-level" name="password" required></span>
        <span><b><p class="alert alert-danger-danger">Student Code</p></b><input type="text" class="input-block-level" name="studentcode" required></span>
        
        <button style="float: right;" class="btn btn-info btn-block" type="submit">Submit</button>
        <p  class='table' ><a class='btn btn-info btn-block' style='margin-right: 75%' href='adminpanel.php'>Back</a></p>
    </form>

</div>

<?php include ('includes/footer_login_1.html'); ?>