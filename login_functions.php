<?php

function redirect_user($page = 'page.php') {

    $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);

    $url = rtrim($url, '/\\');

    $url .= '/' . $page;

    header("Location: $url");
    exit();
}

function check_login($dbc, $kodi = '', $password = '') {

    $errors = array();

    if (empty($kodi)) {
        $errors[] = 'Set your username';
    } else {
        $k = mysqli_real_escape_string($dbc, trim($kodi));
    }

    if (empty($password)) {
        $errors[] = 'Set your password';
    } else {
        $p = mysqli_real_escape_string($dbc, trim($password));
    }

    if (empty($errors)) {

   //     $q = "SELECT * FROM pedagogu WHERE Username='$k' AND Password= sha1('$p')";
        $q = "SELECT * FROM student_lecturer WHERE student_lecturer.username='$k' AND student_lecturer.password= sha1('$p')";
        $r = @mysqli_query($dbc, $q);

        if (mysqli_num_rows($r) > 0) {

            $row = mysqli_fetch_array($r, MYSQLI_ASSOC);

            return array(true, $row);
        } else {
            $errors[] = '<h4 class="alert alert-error text-center">Your username or password was incorrect</h4>';
        }
    }
    return array(false, $errors);
}
