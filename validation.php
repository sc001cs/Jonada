<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require ('login_functions.php');

    require ('mysql_connect.php');

    list ($check, $data) = check_login($dbc, $_POST['username'], $_POST['password']);

    $usernam =  $_POST['username'];
    $qCheckIfStudent = "select * from student_lecturer where username ='$usernam' ";
    $qr = mysqli_query($dbc, $qCheckIfStudent);
    $qrow = mysqli_fetch_array($qr, MYSQLI_NUM);
    $isStudent = $qrow[6];
    
    if ($check) {
        session_start();
        
        if ($isStudent == 2) {
            $_SESSION['fullname'] = $data['fullname'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['id'] = $data['id'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['islecturer'] = $data['islecturer'];
            header("Location: http://localhost/jonada/adminpanel.php");
//            redirect_user('adminpanel.php');
        } else if($isStudent == 1) {
            $_SESSION['fullname'] = $data['fullname'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['id'] = $data['id'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['islecturer'] = $data['islecturer'];
            header("Location: http://localhost/jonada/welcome.php");
//            redirect_user('http://localhost/jonada/hyrje.php');
        } else {
            $_SESSION['fullname'] = $data['fullname'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['id'] = $data['id'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['islecturer'] = $data['islecturer'];
            header("Location: http://localhost/jonada/welcomestudent.php");
        }
    } else {
        $errors = $data;
    }

    mysqli_close($dbc);
}

include ('./index.php');
?>


