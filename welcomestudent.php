<?php

session_start();

require ('mysql_connect.php');

$page_title = 'CIT Online Exam System!';
include ('includes/header_login.html');

$username = "{$_SESSION['username']}";

$id = "{$_SESSION['id']}";
$islecturer = "{$_SESSION['islecturer']}";

$host= gethostname();
$ip = gethostbyname($host);


    
if($id != '' && $islecturer == 0) {

echo "<h4 class='alert alert-danger'><span style='text-align:left;'>CIT Online Exam System</span> <span style='float:right;'>Welcome, {$_SESSION['fullname']}</span></h4>
   ";

// Define the query:
$q = "SELECT l.* FROM lecture l INNER JOIN student_exam se ON l.id_lecture = se.id_lecture WHERE se.username='$username' and l.deleted = '0'";


$r = mysqli_query($dbc, $q);

// Table header:
echo '<br><table class="tables" class="tables table-hover"  cellspacing="3" cellpadding="3" width="75%">
	<tr>
		<td align="left"><h3 class="muted">List of exams: </h3></td>
	</tr>
        ';

// Fetch and print all the records:
while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
    echo '<tr>
            
            <td align="left"><b>
            
                <form target="_blank" method="get" action="classtitles/checkOutPassword.php">
                    <input type="hidden" name="id_lecture" value="' . $row['id_lecture'] . '">
                    <input type="hidden" name="namelecture" value="' . $row['coursetitle'] . '"> 
                    <input type="hidden" name="activation" value="' . $row['activation'] . '">
                    
                    <input class="btn btn-danger" type="submit" value="' . $row['coursetitle'] . '" >
                </form>
                
            </b></td>
            
          </tr>
	  ';
}

echo '</table>';

echo '<div class="nav nav-pills nav-stacked" style="float: right; margin-top: 1%;" >
    <li><a class="btn btn-info" href="resetPasswordStudent.php?id='.$id.'">Change password</a><li>
    <li><a class="btn btn-info" href="logout.php">Logout</a><li>
    </div>';

mysqli_free_result($r);

} else {
     header("Location: http://localhost/jonada/index.php");
}

?>

<?php include ('includes/footer_login_1.html'); 