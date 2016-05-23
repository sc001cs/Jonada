<?php

$errors = array();

if (empty($_POST['alter1'])) {
    $errors[] = 'You forgot to enter your Alternative question 1.';
} else {
    $alter1 = mysqli_real_escape_string($dbc, trim($_POST['alter1']));
}

if (empty($_POST['alter2'])) {
    $errors[] = 'You forgot to enter your Alternative question 2.';
} else {
    $alter2 = mysqli_real_escape_string($dbc, trim($_POST['alter2']));
}

if (empty($_POST['alter3'])) {
    $errors[] = 'You forgot to enter your Alternative question 3.';
} else {
    $alter3 = mysqli_real_escape_string($dbc, trim($_POST['alter3']));
}

if (empty($_POST['alter4'])) {
    $errors[] = 'You forgot to enter your Alternative question 4.';
} else {
    $alter4 = mysqli_real_escape_string($dbc, trim($_POST['alter4']));
}

if (empty($_POST['alter5'])) {
    $errors[] = 'You forgot to enter your Alternative question 5.';
} else {
    $alter5 = mysqli_real_escape_string($dbc, trim($_POST['alter5']));
}

if (empty($_POST['alter6'])) {
    $errors[] = 'You forgot to enter your Alternative question 6.';
} else {
    $alter6 = mysqli_real_escape_string($dbc, trim($_POST['alter6']));
}

if (empty($_POST['alter7'])) {
    $errors[] = 'You forgot to enter your Alternative question 7.';
} else {
    $alter7 = mysqli_real_escape_string($dbc, trim($_POST['alter7']));
}

if (empty($_POST['alter8'])) {
    $errors[] = 'You forgot to enter your Alternative question 8.';
} else {
    $alter8 = mysqli_real_escape_string($dbc, trim($_POST['alter8']));
}

if (empty($_POST['alter9'])) {
    $errors[] = 'You forgot to enter your Alternative question 9.';
} else {
    $alter9 = mysqli_real_escape_string($dbc, trim($_POST['alter9']));
}

if (empty($_POST['alter10'])) {
    $errors[] = 'You forgot to enter your Alternative question 10.';
} else {
    $alter10 = mysqli_real_escape_string($dbc, trim($_POST['alter10']));
}
?>