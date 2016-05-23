<?php

$page_title = 'CIT Online Exam System';
include ('includes/header_silabus.html');
//echo '<h3 class="text-warning text-center">Fshije Silabusin</h3>';

// Check for a valid user ID, through GET or POST:
if ((isset($_GET['id'])) && (is_numeric($_GET['id']))) { // From view_users.php
    $id = $_GET['id'];
} elseif ((isset($_POST['id'])) && (is_numeric($_POST['id']))) { // Form submission.
    $id = $_POST['id'];
} else { // No valid ID, kill the script.
    echo '<div class="alert text-center">
    <strong>Oops! </strong> This page is not accesible.
    </div>';
    include ('includes/footer_login.html');
    exit();
}

//echo "<h4 class='alert alert-error text-center'>Silabusi i lendes: <i>$emriLendes</i></h4>";

require ('mysql_connect.php');

// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if ($_POST['sure'] == 'Yes') { // Delete the record.

		// Make the query:.
		$q = "delete from student_lecturer where id = $id";		
		$r = @mysqli_query ($dbc, $q);
		if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.

			// Print a message:
			echo '<p class="alert alert-success text-center">The user has been deleted</p>'
                    . '<p align="center" class="table"><a class="btn btn-info text-center" href="http://localhost/jonada/adminpanel.php">Back</a></p>';
                        

		} else { // If the query did not run OK.
			echo '<p class="alert alert-error text-center">Please, contact with the Administrator</p>'
                    . '<p align="center" class="table"><a class="btn btn-info text-center" href="http://localhost/jonada/adminpanel.php">Back</a></p>';
		}
	
	} else { // No confirmation of deletion.
		echo '<p class="alert alert-warning text-center"">The user has not been deleted</p>'
            . '<p align="center" class="table"><a class="btn btn-info text-center" href="http://localhost/jonada/adminpanel.php">Back</a></p>';
	}

} else { // Show the form.

	// Retrieve the user's information:
	$q = "SELECT fullname FROM student_lecturer WHERE id = $id";
	$r = @mysqli_query ($dbc, $q);

	if (mysqli_num_rows($r) == 1) { // Valid user ID, show the form.

		// Get the user's information:
		$row = mysqli_fetch_array ($r, MYSQLI_NUM);
		
		// Display the record being deleted:
                echo "<h4 class='alert get-width alert-error text-center'>User name: <i>$row[0]</i><br><br>Are you sure to delete this user?</h4>";
		
		// Create the form:
		echo '
        <div class="container">                    
        <form class="form-delete" action="userFormDelete.php" method="post">
        <label class="radio-form">
        <input type="radio" name="sure" id="optionsRadios2" value="Yes">
        Yes
        </label>
        
        <label class="radio-form">
        <input type="radio" name="sure" id="optionsRadios2" value="No">
        No
        </label>

	<br><br>
        <div class="wrapper-it">
        <button class="btn-pushit btn btn-danger" type="submit" name="submit" type="Aktivizo!">Delete</button>
        <br><br>
        <p align="center"><a class="btn btn-info text-center" href="http://localhost/jonada/adminpanel.php">Back</a></p>
	<input type="hidden" name="id" value="' . $id . '" />
	</form>
        </div>';
	
	} else { // Not a valid user ID.
		echo '<p class="error">This page has been accessed in error.</p>'
               . ' <p align="center" class="table"><a class="btn btn-info text-center" href="http://localhost/jonada/adminpanel.php">Back</a></p> ';
	}

} // End of the main submission conditional.

mysqli_close($dbc);
		
include ('includes/footer_login_1.html');
?>