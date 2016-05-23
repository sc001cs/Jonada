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

                $username = ($_POST['username']); $email = ($_POST['email']); $fullname = ($_POST['fullname']);
                
		// Make the query:.
		$q = "update student_lecturer set username='$username', email='$email', fullname='$fullname'  where id = $id";
		$r = @mysqli_query ($dbc, $q);
		if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.

			// Print a message:
			echo '<p class="alert alert-error text-center">The user has been updated</p>'
                    . '<p align="center" class="table"><a class="btn btn-info text-center" href="http://localhost/jonada/adminpanel.php">Back</a></p>';
                        

		} else { // If the query did not run OK.
			echo '<p class="alert alert-error text-center">Please, contact with the Administrator</p>'
                    . '<p align="center" class="table"><a class="btn btn-info text-center" href="http://localhost/jonada/adminpanel.php">Back</a></p>';
		}
	
} else { // Show the form.

	// Retrieve the user's information:
	$q = "select * FROM student_lecturer where id = $id";
	$r = @mysqli_query ($dbc, $q);

	if (mysqli_num_rows($r) == 1) { // Valid user ID, show the form.

		// Get the user's information:
		$row = mysqli_fetch_array ($r, MYSQLI_NUM);

        echo '
        <div class="container">                    
            <form class="form-signin" method="post" action="userFormEdit.php">
                <img src="generatePDF/examples/images/LOGO-CIT.png">
                <br>
                <br>
                                
                <span><b><p class="alert alert-error">Username</p></b><input type="text" class="input-block-level" name="username" value="'.$row["1"].'" required></span>
                <span><b><p class="alert alert-error">Email</p></b><input type="email" class="input-block-level" name="email" value="'.$row["5"].'" required></span>
                <span><b><p class="alert alert-error">Fullname</p></b><input type="text" class="input-block-level" name="fullname" value="'.$row["3"].'" required></span>
                <!--<span><b><p class="alert alert-error">Password</p></b><input type="text" class="input-block-level" name="password" value="'.$row["2"].'" required></span>-->
                <input type="hidden" name="id" value="' . $id . '" />    
                <button style="float: right;" class="btn btn-info" type="submit">Submit</button>
                <p  class="table" ><a class="btn btn-info" href="adminpanel.php">Back</a></p>
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