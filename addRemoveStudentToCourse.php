<?php

$page_title = 'CIT Online Exam System';
include ('includes/header_silabus.html');

$studentSearch = '';

//echo '<h3 class="text-warning text-center">Fshije Silabusin</h3>';
// Check for a valid user ID, through GET or POST:
if ((isset($_GET['idlecture'])) && (is_numeric($_GET['idlecture']))) { // From view_users.php
    $id = $_GET['idlecture'];
} elseif ((isset($_POST['idlecture'])) && (is_numeric($_POST['idlecture']))) { // Form submission.
    $id = $_POST['idlecture'];
} else { // No valid ID, kill the script.
    echo '<div class="alert text-center">
    <strong>Oops! </strong> This page is not accessible.
    </div>';
    include ('includes/footer_login.html');
    exit();
}

//echo "<h4 class='alert alert-error text-center'>Silabusi i lendes: <i>$emriLendes</i></h4>";

require ('mysql_connect.php');

// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $studentSearch = $_POST['studentSearch'];

    if ($studentSearch == '') {
        $qDeleteAll = "delete from student_exam where id_lecture = '$id'";
        $rDeleteAll = @mysqli_query($dbc, $qDeleteAll);

        if (!empty($_POST['check_list'])) {
            foreach ($_POST['check_list'] as $check) {
                // Make the query:.
                $q = "insert into student_exam(username, id_lecture) values ('$check',  '$id')";
                $r = @mysqli_query($dbc, $q);
            }
            if (mysqli_affected_rows($dbc) > 0) { // If it ran OK.
                // Print a message:
                echo '<p class="alert alert-success text-center">Updated</p>'
                . '<p align="center" class="table"><a class="btn btn-info btn-block text-center" href="http://localhost/jonada/welcome.php">Back</a></p>';
            } else { // If the query did not run OK.
                echo '<p class="alert alert-error text-center">No changes</p>';
            }
        } else { // If the query did not run OK.
            echo '<p class="alert alert-success text-center">Updated</p>'
            . '<p align="center" class="table"><a class="btn btn-info btn-block text-center" href="http://localhost/jonada/welcome.php">Back</a></p>';
        }
    } else {
        // Retrieve the user's information:
        $qStudent = "SELECT coursetitle FROM lecture WHERE id_lecture = $id";
        $rStudent = @mysqli_query($dbc, $qStudent);

        $onlyStudentStudent = "select * from student_lecturer where islecturer = 0 and fullname like '%$studentSearch%' ";
        $queryStudentStudent = @mysqli_query($dbc, $onlyStudentStudent);
        
        $onlyStudentStudentNOT = "select * from student_lecturer where islecturer = 0 and fullname not like '%$studentSearch%' ";
        $queryStudentStudentNOT = @mysqli_query($dbc, $onlyStudentStudentNOT);

        if (mysqli_num_rows($rStudent) == 1 ) { // Valid user ID, show the form.
            // Get the user's information:
            $rowStudent = mysqli_fetch_array($rStudent, MYSQLI_NUM);

            // Display the record being deleted:
            echo "<h4 class='alert get-width alert-error text-center'>Course Title: <i>$rowStudent[0]</i></h4>";

            // Create the form:
            echo '
        <div class="container">';

            echo '<form class="form-inline nice-center" method="post" action="addRemoveStudentToCourse.php?idlecture='.$id.' " >
            <div class="form-group">
              <label for="studentSearch" style="color: red">Student name</label>
              <input type="text" class="form-control" id="studentSearch" name="studentSearch" required>
              <button type="submit" class="btn btn-default">Search</button>
              <input type="hidden" value="'.$studentSearch.'" />
            </div>
          </form>';

            echo ' <form class="form-student" action="addRemoveStudentToCourse.php" method="post" ';

            while ($rowsStudent = mysqli_fetch_array($queryStudentStudent, MYSQLI_ASSOC)) {

                $studentExistStudent = $rowsStudent["username"];
//            
                $checkStudentExamStudent = "select * from student_exam where username = '$studentExistStudent' and id_lecture = '$id' limit 1";
                $queryStudentsStudent = @mysqli_query($dbc, $checkStudentExamStudent);
                if (mysqli_num_rows($queryStudentsStudent) == 1) {
                    $checked = 'checked';
                } else {
                    $checked = '';
                }

                echo '<tr>
		      <td align="center">
                      <div class="checkbox">
                            <label>
                              <input type="checkbox" name="check_list[]" value="' . $rowsStudent["username"] . '" ' . $checked . ' >
                                ' . $rowsStudent["fullname"] . '
                            </label>
                          </div>
                      </td>
		 </tr>';
            }
            
            while ($rowsStudent = mysqli_fetch_array($queryStudentStudentNOT, MYSQLI_ASSOC)) {

                $studentExistStudent = $rowsStudent["username"];
//            
                $checkStudentExamStudent = "select * from student_exam where username = '$studentExistStudent' and id_lecture = '$id' limit 1";
                $queryStudentsStudent = @mysqli_query($dbc, $checkStudentExamStudent);
                if (mysqli_num_rows($queryStudentsStudent) == 1) {
                    $checked = 'checked';
                } else {
                    $checked = '';
                }

                echo '<tr>
		      <td align="center">
                      <div class="checkbox" class="hidden">
                            <label>
                              <input class="hidden" type="checkbox" name="check_list[]" value="' . $rowsStudent["username"] . '" ' . $checked . ' ><span class="hidden">
                                ' . $rowsStudent["fullname"] . '
                            </span></label>
                          </div>
                      </td>
		 </tr>';
            }

            echo '<br><br>
        <p align="center" class="table">
            <button class="btn-pushit btn text-center center" type="submit" name="submit" type="Aktivizo!">Submit</button>
        </p>
        
        <p align="center" class="table"><a class="btn btn-primary text-center" href="http://localhost/jonada/welcome.php">Back</a></p>   
	<input type="hidden" name="idlecture" value="' . $id . '" />
	</form>
        </div>';
        } else { // Not a valid user ID.
            echo '<p class="error">This page has been accessed in error2.</p>';
            echo $studentSearch;
        }
    }
} else { // Show the form.
    // Retrieve the user's information:
    $q = "SELECT coursetitle FROM lecture WHERE id_lecture = $id";
    $r = @mysqli_query($dbc, $q);

    $onlyStudent = "select * from student_lecturer where islecturer = 0";
    $queryStudent = @mysqli_query($dbc, $onlyStudent);

    if (mysqli_num_rows($r) == 1 && mysqli_num_rows($queryStudent) > 0) { // Valid user ID, show the form.
        // Get the user's information:
        $row = mysqli_fetch_array($r, MYSQLI_NUM);

        // Display the record being deleted:
        echo "<h4 class='alert get-width alert-error text-center'>Course Title: <i>$row[0]</i></h4>";

        // Create the form:
        echo '
        <div class="container">';

        echo '<form class="form-inline nice-center" method="post" action="addRemoveStudentToCourse.php?idlecture='.$id.' " >
            <div class="form-group">
              <label for="studentSearch" style="color: red">Student name</label>
              <input type="text" class="form-control" id="studentSearch" name="studentSearch" required>
              <button type="submit" class="btn btn-default">Search</button>
              <input type="hidden" value="'.$studentSearch.'" />
            </div>
          </form>';

        echo ' <form class="form-student" action="addRemoveStudentToCourse.php" method="post" ';

        while ($rows = mysqli_fetch_array($queryStudent, MYSQLI_ASSOC)) {

            $studentExist = $rows["username"];
//            
            $checkStudentExam = "select * from student_exam where username = '$studentExist' and id_lecture = '$id' limit 1";
            $queryStudents = @mysqli_query($dbc, $checkStudentExam);
            if (mysqli_num_rows($queryStudents) == 1) {
                $checked = 'checked';
            } else {
                $checked = '';
            }

            echo '<tr>
		      <td align="center">
                      <div class="checkbox">
                            <label>
                              <input type="checkbox" name="check_list[]" value="' . $rows["username"] . '" ' . $checked . ' >
                                ' . $rows["fullname"] . '
                            </label>
                          </div>
                      </td>
		 </tr>';
        }

        echo '<br><br>
        <p align="center" class="table">
            <button class="btn-pushit btn text-center center" type="submit" name="submit" type="Aktivizo!">Submit</button>
        </p>
        
        <p align="center" class="table"><a class="btn btn-info text-center" href="http://localhost/jonada/welcome.php">Back</a></p>   
	<input type="hidden" name="idlecture" value="' . $id . '" />
	</form>
        </div>';
    } else { // Not a valid user ID.
        echo '<p class="error">This page has been accessed in error1.</p>';
        echo $studentSearch;
    }
} // End of the main submission conditional.

mysqli_close($dbc);

include ('includes/footer_login.html');
?>