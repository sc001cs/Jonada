<?php

session_start();

require ('mysql_connect.php');

$page_title = 'CIT Online Exam System';
include ('includes/header_login.html');

$id = "{$_SESSION['id']}";
$islecturer = "{$_SESSION['islecturer']}";

if($id != '' && $islecturer == 1) {

echo "<h4 class='alert alert-danger'><span style='text-align:left;color: white;'><a href='http://localhost/jonada/welcome.php' style='color: white'>CIT Online Exam System</a></span> <span style='float:right;color: white;'>Welcome, {$_SESSION['fullname']}</span></h4>
    ";

$studentSearch = '';
$seachMode = false;

// Define the query:
$q = "select l.* from lecture l inner join student_lecturer sl on l.id_lecturer = sl.id where sl.islecturer = 1 and sl.id = '$id' and l.deleted = 0";
$q1 = "select l.* from lecture l inner join student_lecturer sl on l.id_lecturer = sl.id where sl.islecturer = 1 and sl.id = '$id' and l.deleted = 0";
$q2 = "select l.* from lecture l inner join student_lecturer sl on l.id_lecturer = sl.id where sl.islecturer = 1 and sl.id = '$id' and l.deleted = 0";
$q3 = "select l.* from lecture l inner join student_lecturer sl on l.id_lecturer = sl.id where sl.islecturer = 1 and sl.id = '$id' and l.deleted = 0";
$q4 = "select l.* from lecture l inner join student_lecturer sl on l.id_lecturer = sl.id where sl.islecturer = 1 and sl.id = '$id' and l.deleted = 0 ";
//and sl.fullname = '%$fullnameSearch%' 


$r = mysqli_query($dbc, $q);
$r1 = mysqli_query($dbc, $q1);
$r2 = mysqli_query($dbc, $q2);
$r3 = mysqli_query($dbc, $q3);
$r4 = mysqli_query($dbc, $q4);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $studentSearch = $_POST['studentSearch'];
    $seachMode = true;
}

echo '

<ul class="nav nav-pills nav-stacked margin-20 red"  style="float: left;" >
            <li><a href="#Show" data-toggle="tab">Show result of the exam</a></li>
            <li><a href="#Krijo" data-toggle="tab">Create new exam</a></li>
            <li><a href="#Modifiko" data-toggle="tab">Modify the exam</a></li>
            <li><a href="#Fshi" data-toggle="tab">Delete the exam</a></li>
            <li><a href="#Gjenero" data-toggle="tab">Generate the exam</a></li>
          
           
            <li><a href="#Add" data-toggle="tab">Add/Remove student to the course</a></li>
        </ul>

<div class="tab-content">
<div class="tab-pane " id="Modifiko" > ';

// Table header:
echo '<br><table class="tables" class="tables table-hover"  cellspacing="3" cellpadding="3" width="75%">
	<tr>
		<td align="left"><h3 class="muted">Edit the exam: </h3></td>
	</tr>
        <tr><td>
        <select id="modifyStudent" 
        class="js-example-basic-single combobox" onchange="modifyStudent()">
        <option value="">
        ';


// Fetch and print all the records:
while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
//    echo '<tr>
//	   <td align="left"><b><a href="examFormEdit.php?idlecture=' . $row['id_lecture'] . '&emrilendes=' . $row['coursetitle'] .'">' . $row['coursetitle'] . '</a></b></td>
//	</tr>';
    echo '      
	<option value="examFormEdit.php?idlecture=' . $row['id_lecture'] . '&emrilendes=' . $row['coursetitle'] .'">' . $row['coursetitle'] . '
	'; 
}

echo '</select></td></tr></table> 
<script>

function modifyStudent() {

 location = document.getElementById("modifyStudent").value;
 
console.log(location);
}

</script>';

echo '</div>';



echo '<div class="tab-pane" id="Krijo">  ';

// Table header:
echo '<br><table class="tables" class="tables table-hover"  cellspacing="3" cellpadding="3" width="75%">
	<tr>
	</tr>
        ';

    echo '      <tr>
                    
			<td align="left"><b><a class="btn btn-danger btn-large" href="examFormNew.php?id='.$id.'">New exam</a></b></td>
		</tr>
		';

echo '</table>';

echo '</div>';






echo '<div class="tab-pane" id="Fshi">  ';

// Table header:
echo '<br><table class="tables" class="tables table-hover"  cellspacing="3" cellpadding="3" width="75%">
	<tr>
		<td align="left"><h3 class="muted">Delete the exam: </h3></td>
	</tr>
        <tr><td>
        <select id="deleteStudent" 
        class="js-example-basic-single combobox" onchange="deleteStudent()">
        <option value="">
        ';


// Fetch and print all the records:
while ($row = mysqli_fetch_array($r2, MYSQLI_ASSOC)) {
//echo '      <tr>
//
//        <td align="left"><b><a href="examFormDelete.php?idlecture=' . $row['id_lecture'] . '">' . $row['coursetitle'] . '</a></b></td>
//</tr>
//';
    echo '      
	<option value="examFormDelete.php?idlecture=' . $row['id_lecture'] . '">' . $row['coursetitle'] . '
'; 
}

echo '</select></td></tr></table> 
<script>

function deleteStudent() {

 location = document.getElementById("deleteStudent").value;
 
console.log(location);
}

</script>';

echo '</div>';




echo '<div class="tab-pane" id="Gjenero">  ';

// Table header:
echo '<br><table class="tables" class="tables table-hover"  cellspacing="3" cellpadding="3" width="75%">
	<tr>
		<td align="left"><h3 class="muted">Generate the exam: </h3></td>
	</tr>
        <tr><td>
        <select id="generateStudent" 
        class="js-example-basic-single combobox" onchange="generateStudent()">
        <option value="">
        ';


// Fetch and print all the records:
while ($row = mysqli_fetch_array($r1, MYSQLI_ASSOC)) {
//    echo '      <tr>
//
//        <td align="left"><b><a target="_blank" href="generatePDF/examples/generatePDF.php?idlecture=' . $row['id_lecture'] . '&emrilendes=' . $row['coursetitle'] .'">' . $row['coursetitle'] . '</a></b></td>
//</tr>
//';
echo '      
	<option value="generatePDF/examples/generatePDF.php?idlecture=' . $row['id_lecture'] . '&emrilendes=' . $row['coursetitle'] .'">' . $row['coursetitle'] . '
';    
}

echo '</select></td></tr></table> 
<script>

function generateStudent() {

 window.open(document.getElementById("generateStudent").value, "_blank");
 
console.log(location);
}

</script>';

echo '</div>';



echo '<div class="tab-pane active" id="Show">  ';

//echo '<form class="form-inline" method="post" action="welcome.php">
//  <div class="form-group">
//    <label for="studentSearch" style="color: red">Student name</label>
//    <input type="text" class="form-control" id="studentSearch" name="studentSearch" required>
//    <button type="submit" class="btn btn-default">Search</button>
//  </div>
//</form>';

// Table header:
echo '<br><table class="tables" class="tables table-hover"  cellspacing="3" cellpadding="3" width="75%">';

// Fetch and print all the records:
$countAdd = 1;
while ($row = mysqli_fetch_array($r4, MYSQLI_ASSOC)) {
    
    $countAdd++;
    
    $idlect = $row['id_lecture'];
    echo '<tr><td align="left">
          <h4 class="muted">Student in course title: '.$row['coursetitle'].'</h4>    
	 </td></tr>
        <tr><td>
        <select id="addRemoveStudents'.$countAdd.'" 
        class="js-example-basic-single combobox" onchange="addRemoveStudents'.$countAdd.'()">
        <option value="">
        <option value="generatePDF/examples/showTheResultPDFAllStudents.php?idlecture=' . $idlect . '">All students
        ';
    
    if(!$seachMode) {
        $q5 = "select sl.* from student_lecturer sl inner join student_exam se on sl.username = se.username where se.id_lecture = $idlect and sl.islecturer = 0 ";
        $r5 = mysqli_query($dbc, $q5);
    } else {
       $q5 = "select sl.* from student_lecturer sl inner join student_exam se on sl.username = se.username where se.id_lecture = $idlect and sl.islecturer = 0 and sl.fullname like '%$studentSearch%' ";
       $r5 = mysqli_query($dbc, $q5); 
    }
    
    while ($row5 = mysqli_fetch_array($r5, MYSQLI_ASSOC)) {
//        echo '<tr><td align="left"><b><a target="_blank" href="generatePDF/examples/showTheResultPDF.php?idlecture=' . $idlect . '&idstudent=' . $row5['id'] .'">' . $row5['fullname'] . '</a></b></td><tr>';
        echo '      
        <option value="generatePDF/examples/showTheResultPDF.php?idlecture=' . $idlect . '&idstudent=' . $row5['id'] .'" >' . $row5['fullname'] . '
	'; 
    }
    
    echo '</select></td></tr><script>

        function addRemoveStudents'.$countAdd.'() {

      // location = document.getElementById("addRemoveStudents'.$countAdd.'").value;
        window.open(document.getElementById("addRemoveStudents'.$countAdd.'").value, "_blank")
        console.log(location);
        }

        </script>';
}

echo '</table> 

';

echo '</div>';



echo '<div class="tab-pane" id="Add">  ';

// Table header:
echo '<br><table class="tables" class="tables table-hover"  cellspacing="3" cellpadding="3" width="75%">
	<tr>
		<td align="left"><h3 class="muted">Add or remove student to specific course: </h3></td>
	</tr>
        <tr><td>
        <select id="addRemoveStudent" 
        class="js-example-basic-single combobox" onchange="addRemoveStudent()">
        <option value="">
        ';


// Fetch and print all the records:
while ($row = mysqli_fetch_array($r3, MYSQLI_ASSOC)) {
    echo '      
	
        <option value="addRemoveStudentToCourse.php?idlecture=' . $row['id_lecture'] . '">' . $row['coursetitle'] . '
	';
}

echo '</select>></td></tr></table> 
<script>

function addRemoveStudent() {

 location = document.getElementById("addRemoveStudent").value;
 
console.log(location);
}

</script>
';

echo '</div>';

echo '<div class="nav nav-pills nav-stacked" style="float: right; margin-top: 26%;" >
    
    <li><a class="btn btn-info" href="resetPassword.php?id='.$id.'">Change password</a><li>
    <li><a class="btn btn-info" href="logout.php">Logout</a><li>
    </div>';

mysqli_free_result($r);


} else {
     header("Location: http://localhost/jonada/index.php");
}
    

?>

<?php include ('includes/footer_login.html'); ?>
