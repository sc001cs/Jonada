<?php

session_start();

require ('../mysql_connect.php');

$page_title = 'CIT Online Exam System';

if ((isset($_GET['id_lecture'])) && ($_GET['namelecture']) && ($_GET['activation']) ) { // From view_users.php
    $id_lecture = $_GET['id_lecture'];
    $namelecture = $_GET['namelecture'];
    $activation = $_GET['activation'];
} elseif ((isset($_POST['id_lecture'])) && isset($_POST['namelecture']) && isset($_POST['activation'])
        && isset($_POST['password'])) { // Form submission.
    $id_lecture = $_POST['id_lecture'];
    $namelecture = $_POST['namelecture'];
    $activation = $_POST['activation'];
    $password = $_POST['password'];
} else { // No valid ID, kill the script.
    echo '<div class="alert text-center">
    <strong>Oops! </strong> This page is not accessible.
    </div>';
    exit();
}

$namelecture = $_GET['namelecture'];

$id_lecture = $_GET['id_lecture'];

$activation = $_GET['activation'];

$direction = 'instructorAssessment.php';

$id = "{$_SESSION['id']}";

$query_valid = "select * from lecture where id_lecture = '$id_lecture'";

$run_query = @mysqli_query($dbc, $query_valid);

$roww = mysqli_fetch_array($run_query, MYSQLI_NUM);

include ('../includes/header_silabus2.html');

$classroomname = $roww[13];

$qRangeIP = "select * from ip_range where classroomname = '$classroomname'";
$rowsRangeIP = mysqli_query($dbc, $qRangeIP);
$rowRange = mysqli_fetch_array($rowsRangeIP, MYSQLI_NUM);

$ip1 = (int)$rowRange[2];
$ip2 = (int)$rowRange[3];

$host = gethostname();
$ip = gethostbyname($host);

function TestIT($ip, $ip1, $ip2) {

    while ($ip1 < $ip2) {

        $ipCheck = '192.168.10.'.$ip1;

        if ($ip == $ipCheck) {
            return true;
            break;
        }

        $ip1++;
    }

    return false;
};


if (!TestIT($ip, $ip1, $ip2)) {
    echo "<h4 class='alert alert-danger'><span style='text-align:left;'>Your IP has been banned " . $ip . "</h4>";
    echo "<br><div class='nice-center'> <p  class=\"table\" ><a class=\"btn btn-info btn-block\" style=\"margin-right: 75%\" href=\"../welcomestudent.php\">Back</a></p></div>";
    include('../includes/footer_login_2.html');
} else {

    if ($activation == 'Active') {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $password = $_POST['password'];

            if ($password == $roww[16]) {

                header("Location: http://localhost/jonada/classtitles/instructorAssessment.php?id_lecture=" . $id_lecture .
                    "&namelecture=" . $namelecture . "&activation=" . $activation . "");

            } else {
                echo '
            <div class="container">

                <form class="form-signin" method="post" action="checkOutPassword.php?id_lecture=' . $id_lecture . '&namelecture=' . $namelecture . '&activation=' . $activation . '">
                    <img src="../generatePDF/examples/images/LOGO-CIT.png">
                    <br><br>

                    <span><b><p class="alert alert-danger-danger">Wrong password, try again.</p></b><input type="text" class="input-block-level"
                    name="password" required></span>
                    
                    <input type="hidden" value="' . $id_lecture . '" />
                        <input type="hidden" value="' . $namelecture . '" />
                            <input type="hidden" value="' . $activation . '" />

                    <button style="float: right;" class="btn btn-info btn-block" type="submit">Submit</button>
                    <p  class="table" ><a class="btn btn-info btn-block" style="margin-right: 75%" href="../welcomestudent.php">Back</a></p>
                </form>

            </div>';
            }

        } else {

            echo '
            <div class="container">
                <form class="form-signin" method="post" action="checkOutPassword.php?id_lecture=' . $id_lecture . '&namelecture=' . $namelecture . '&activation=' . $activation . '">
                    <img src="../generatePDF/examples/images/LOGO-CIT.png">
                    <br><br>

                    <span><b><p class="alert alert-danger-danger">Please enter the password to continue...</p></b><input type="text" class="input-block-level"
                    name="password" required></span>

                    <button style="float: right;" class="btn btn-info btn-block" type="submit">Submit</button>
                    <p  class="table" ><a class="btn btn-info btn-block" style="margin-right: 75%" href="../welcomestudent.php">Back</a></p>
                </form>

            </div>';

        }

    } else {
        include('../includes/header_vleresimi.html');
        echo '<div class="nice-center">'
            . '<h3 class="alert alert-error text-center">Exam not activated yet.</h3><p align="center" class="table"></div>';
        include('../includes/footer_login_2.html');
    }

}

mysqli_close($dbc);


?>