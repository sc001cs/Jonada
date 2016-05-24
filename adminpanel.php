<?php

session_start();

require ('mysql_connect.php');

$page_title = 'CIT Online Exam System';
include ('includes/header_login.html');

$id = "{$_SESSION['id']}";
$islecturer = "{$_SESSION['islecturer']}";

if($id != '' && $islecturer == 2) {

echo "<h4 class='alert alert-danger'><span style='text-align:left;'>CIT Online Exam System</span> "
. "<span style='float:right;'>Welcome, {$_SESSION['fullname']}</span></h4>";


// Define the query:
$q = "select * from student_lecturer where islecturer = 1";
$qStudent = "select * from student_lecturer where islecturer = 0";
$q1 = "select l.* from lecture l inner join student_lecturer sl on l.id_lecturer = sl.id where sl.islecturer = 1 and sl.id = '$id' and l.deleted = 0";
$q2 = "select * from student_lecturer where islecturer = 0";
$q2Lecturer = "select * from student_lecturer where islecturer = 1";
$q3 = "select l.* from lecture l inner join student_lecturer sl on l.id_lecturer = sl.id where sl.islecturer = 1 and sl.id = '$id' and l.deleted = 0";
//$q = "SELECT * FROM lenda INNER JOIN pedagogu ON lenda.IDPedagogu = pedagogu.IDPedagogu WHERE (((pedagogu.IDPedagogu)='$idPedagogu'))";
//$q1 = "SELECT * FROM lenda INNER JOIN pedagogu ON lenda.IDPedagogu = pedagogu.IDPedagogu WHERE (((pedagogu.IDPedagogu)='$idPedagogu'))";
//$q2 = "SELECT * FROM lenda INNER JOIN pedagogu ON lenda.IDPedagogu = pedagogu.IDPedagogu WHERE (((pedagogu.IDPedagogu)='$idPedagogu'))";

$r = mysqli_query($dbc, $q);
$rStudent = mysqli_query($dbc, $qStudent);
$r1 = mysqli_query($dbc, $q1);
$r2 = mysqli_query($dbc, $q2);
$r2Lecturer = mysqli_query($dbc, $q2Lecturer);
$r3 = mysqli_query($dbc, $q3);


echo '

<ul class="nav nav-pills nav-stacked margin-20"  style="float: left;" >
    
            <!--
            <li><a href="#Krijo" data-toggle="tab">Create new exam</a></li>
            <li><a href="#Gjenero" data-toggle="tab">Generate the exam</a></li>
            <li><a href="#Add" data-toggle="tab">Add/Remove student to the course</a></li>
            -->
            
            <li><a href="#Modifiko" data-toggle="tab">Modify the lecturer</a></li>
            <li><a  href="createNewLecturer.php?id='.$id.'">Create new lecturer</a><li>
            <li><a href="#FshiLectuer" data-toggle="tab">Delete the lecturer</a></li>
            
            <li><a href="#ModifikoStudent" data-toggle="tab">Modify the student</a></li>
            <li><a  href="createNewUser.php?id='.$id.'">Create new student</a><li>
            <li><a href="#Fshi" data-toggle="tab">Delete the student</a></li>    
            <li><a  href="ipRangeClassrom.php?islecturer='.$islecturer.'">Create/Delete IP range</a><li>

        </ul> 

<div class="tab-content">
<div class="tab-pane active" id="Modifiko" > ';

// Table header:
echo '<br><table class="tables" class="tables table-hover"  cellspacing="3" cellpadding="3" width="75%">
	<tr>
		<td align="left"><h3 class="muted">Modify the user (lecturer): </h3></td>
	</tr>
        ';


// Fetch and print all the records:
while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
    echo '      <tr>
                    
			<td align="left"><b><a href="userFormEdit.php?id=' . $row['id'] . '">' . $row['fullname'] . '</a></b></td>
		</tr>
		';
}

echo '</table>';

echo '</div>';


echo '<div class="tab-pane " id="ModifikoStudent">  ';

// Table header:
echo '<br><table class="tables" class="tables table-hover"  cellspacing="3" cellpadding="3" width="75%">
	<tr>
		<td align="left"><h3 class="muted">Modify the user (student): </h3></td>
	</tr>
        ';


// Fetch and print all the records:
while ($row = mysqli_fetch_array($rStudent, MYSQLI_ASSOC)) {
    echo '      <tr>
                    
			<td align="left"><b><a href="userFormEdit.php?id=' . $row['id'] . '">' . $row['fullname'] . '</a></b></td>
		</tr>
		';
}

echo '</table>';

echo '</div>';


echo '<div class="tab-pane " id="Krijo">  ';

// Table header:
echo '<br><table class="tables" class="tables table-hover"  cellspacing="3" cellpadding="3" width="75%">
	<tr>
	</tr>
        ';

    echo '      <tr>
                    
			<td align="left"><b><a class="btn btn-info btn-large" href="examFormNew.php?id='.$id.'">New exam</a></b></td>
		</tr>
		';

echo '</table>';

echo '</div>';






echo '<div class="tab-pane " id="Fshi">  ';

// Table header:
echo '<br><table class="tables" class="tables table-hover"  cellspacing="3" cellpadding="3" width="75%">
	<tr>
		<td align="left"><h3 class="muted">Delete the user: </h3></td>
	</tr>
        ';


// Fetch and print all the records:
while ($row = mysqli_fetch_array($r2, MYSQLI_ASSOC)) {
    echo '      <tr>
                    
			<td align="left"><b><a href="userFormDelete.php?id=' . $row['id'] . '">' . $row['fullname'] . '</a></b></td>
		</tr>
		';
}

echo '</table>';

echo '</div>';



echo '<div class="tab-pane " id="FshiLectuer">  ';

// Table header:
echo '<br><table class="tables" class="tables table-hover"  cellspacing="3" cellpadding="3" width="75%">
	<tr>
		<td align="left"><h3 class="muted">Delete the user: </h3></td>
	</tr>
        ';


// Fetch and print all the records:
while ($row = mysqli_fetch_array($r2Lecturer, MYSQLI_ASSOC)) {
    echo '      <tr>
                    
			<td align="left"><b><a href="userFormDelete.php?id=' . $row['id'] . '">' . $row['fullname'] . '</a></b></td>
		</tr>
		';
}

echo '</table>';

echo '</div>';


echo '<div class="tab-pane" id="Gjenero">  ';

// Table header:
echo '<br><table class="tables" class="tables table-hover"  cellspacing="3" cellpadding="3" width="75%">
	<tr>
		<td align="left"><h3 class="muted">Generate the exam: </h3></td>
	</tr>
        ';


// Fetch and print all the records:
while ($row = mysqli_fetch_array($r1, MYSQLI_ASSOC)) {
    echo '      <tr>
                    
			<td align="left"><b><a target="_blank" href="generatePDF/examples/gjenerimpdf.php?idlecture=' . $row['id_lecture'] . '&emrilendes=' . $row['namelecture'] .'">' . $row['namelecture'] . '</a></b></td>
		</tr>
		';
}

echo '</table>';

echo '</div>';



echo '<div class="tab-pane" id="Add">  ';

// Table header:
echo '<br><table class="tables" class="tables table-hover"  cellspacing="3" cellpadding="3" width="75%">
	<tr>
		<td align="left"><h3 class="muted">Add or remove student to specific course: </h3></td>
	</tr>
        ';


// Fetch and print all the records:
while ($row = mysqli_fetch_array($r3, MYSQLI_ASSOC)) {
    echo '      <tr>
                    
			<td align="left"><b><a href="addRemoveStudentToCourse.php?idlecture=' . $row['id_lecture'] . '">' . $row['namelecture'] . '</a></b></td>
		</tr>
		';
}

echo '</table>';

echo '</div>';

echo '<div class="nav nav-pills nav-stacked" style="float: right; margin-top: 24%;" >
    
    <li><a class="btn btn-info" href="resetPasswordAdmin.php?id='.$id.'">Change password</a><li>
    <li><a class="btn btn-info" href="logout.php">Logout</a><li>
    </div>';


mysqli_free_result($r);

} else {
     header("Location: http://localhost/jonada/index.php");
}

?>

<?php include ('includes/footer_login.html'); 