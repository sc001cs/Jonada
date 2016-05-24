<?php

session_start();

$page_title = 'CIT Online Exam System';
include ('includes/header_silabus.html');


// Check for a valid user ID, through GET or POST:
if ((isset($_GET['idlecture'])) && (is_numeric($_GET['idlecture'])) && (isset($_GET['emrilendes'])) && (!is_numeric($_GET['emrilendes']))) { // From view_users.php
    $id = $_GET['idlecture'];
    $emriLendes = $_GET['emrilendes'];
} elseif ((isset($_POST['idlecture'])) && (isset($_POST['emrilendes'])) ) { // Form submission.
    $id = $_POST['idlecture'];
    $emriLendes = $_POST['emrilendes'];
} else { // No valid ID, kill the script.
    
    echo '<p class="error">Kjo faqe nuk eshte e aksesueshme.</p>';
    include ('includes/footer_login.html');
    exit();
}

//$emriLendes = $_GET['emrilendes'];

echo "<h4 class='alert alert-error text-center'>Exam of course title: <i>$emriLendes</i></h4>";

require ('mysql_connect.php');

$qrowsQ = " select * from ip_range ";
$rowsQ = mysqli_query($dbc, $qrowsQ);

// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $errors = array();

    require ('pjesapare.php');

    if (empty($errors)) { // If everything's OK.
    
        if (true) {

        $pyetja1 = ($_POST['pyetja1']); $pyetja2 = ($_POST['pyetja2']);  $pyetja3 = ($_POST['pyetja3']); $pyetja4 = ($_POST['pyetja4']);
        $pyetja5 = ($_POST['pyetja5']); $pyetja6 = ($_POST['pyetja6']);  $pyetja7 = ($_POST['pyetja7']); $pyetja8 = ($_POST['pyetja8']);
        $pyetja9 = ($_POST['pyetja9']); $pyetja10 = ($_POST['pyetja10']);
        
        $alter1a = ($_POST['alter1a']);   $alter1b = ($_POST['alter1b']);   $alter1c = ($_POST['alter1c']);   $alter1d = ($_POST['alter1d']);
        $alter1 = $_POST['alter1'];
        $alter2a = ($_POST['alter2a']);   $alter2b = ($_POST['alter2b']);   $alter2c = ($_POST['alter2c']);   $alter2d = ($_POST['alter2d']);
        $alter2 = $_POST['alter2'];
        $alter3a = ($_POST['alter3a']);   $alter3b = ($_POST['alter3b']);   $alter3c = ($_POST['alter3c']);   $alter3d = ($_POST['alter3d']);
        $alter3 = $_POST['alter3'];
        $alter4a = ($_POST['alter4a']);   $alter4b = ($_POST['alter4b']);   $alter4c = ($_POST['alter4c']);   $alter4d = ($_POST['alter4d']);
        $alter4 = $_POST['alter4'];
        $alter5a = ($_POST['alter5a']);   $alter5b = ($_POST['alter5b']);   $alter5c = ($_POST['alter5c']);   $alter5d = ($_POST['alter5d']);
        $alter5 = $_POST['alter5'];
        $alter6a = ($_POST['alter6a']);   $alter6b = ($_POST['alter6b']);   $alter6c = ($_POST['alter6c']);   $alter6d = ($_POST['alter6d']);
        $alter6 = $_POST['alter6'];
        $alter7a = ($_POST['alter7a']);   $alter7b = ($_POST['alter7b']);   $alter7c = ($_POST['alter7c']);   $alter7d = ($_POST['alter7d']);
        $alter7 = $_POST['alter7'];
        $alter8a = ($_POST['alter8a']);   $alter8b = ($_POST['alter8b']);   $alter8c = ($_POST['alter8c']);   $alter8d = ($_POST['alter8d']);
        $alter8 = $_POST['alter8'];
        $alter9a = ($_POST['alter9a']);   $alter9b = ($_POST['alter9b']);   $alter9c = ($_POST['alter9c']);   $alter9d = ($_POST['alter9d']);
        $alter9 = $_POST['alter9'];
        $alter10a = ($_POST['alter10a']); $alter10b = ($_POST['alter10b']); $alter10c = ($_POST['alter10c']); $alter10d = ($_POST['alter10d']);
        $alter10 = $_POST['alter10'];
            
        $school = ($_POST['school']); $programs = ($_POST['programs']); $department = ($_POST['department']);
        $academicYear = ($_POST['academicYear']); $coursetitle = ($_POST['coursetitle']);
        $type = ($_POST['type']); $term = ($_POST['term']); $dean = ($_POST['dean']);
        $email = ($_POST['email']); $lecturer = ($_POST['lecturer']); 
        $classroom = ($_POST['classroom']); $activation = ($_POST['activation']); 
        $codeactivation = ($_POST['codeactivation']); 
        
        $qgeneral =  " update lecture set school = '$school', programs = '$programs', department = '$department', "
                . " academicYear = '$academicYear', coursetitle = '$coursetitle', "
                . " type = '$type', term = '$term' , dean = '$dean', "
                . " email = '$email', term = '$term' , lecturer = '$lecturer', "
                . " fullname = '$lecturer', classroom = '$classroom', activation = '$activation', "
                . " codeactivation = '$codeactivation'"
                . "  where id_lecture = $id";
        
        $hiddenValue1 = $_POST['hiddenValue1']; $hiddenValue2 = $_POST['hiddenValue2']; $hiddenValue3 = $_POST['hiddenValue3']; $hiddenValue4 = $_POST['hiddenValue4']; $hiddenValue5 = $_POST['hiddenValue5']; 
        $hiddenValue6 = $_POST['hiddenValue6']; $hiddenValue7 = $_POST['hiddenValue7']; $hiddenValue8 = $_POST['hiddenValue8']; $hiddenValue9 = $_POST['hiddenValue9']; $hiddenValue10 = $_POST['hiddenValue10']; 
        
        // Make the query:
        $qupdatea1 =" update exam_question set question = '$pyetja1' , answer1 = '$alter1a' , answer2 = '$alter1b' , answer3 = '$alter1c' , answer4 = '$alter1d' , finalanswer = '$alter1', visibility='$hiddenValue1' where id_lecture = '$id' and orders = 1 ";
        $qupdatea2 =" update exam_question set question = '$pyetja2' , answer1 = '$alter2a' , answer2 = '$alter2b' , answer3 = '$alter2c' , answer4 = '$alter2d' , finalanswer = '$alter2', visibility='$hiddenValue2' where id_lecture = '$id' and orders = 2 ";
        $qupdatea3 =" update exam_question set question = '$pyetja3' , answer1 = '$alter3a' , answer2 = '$alter3b' , answer3 = '$alter3c' , answer4 = '$alter3d', finalanswer = '$alter3', visibility='$hiddenValue3' where id_lecture = '$id' and orders = 3 ";
        $qupdatea4 =" update exam_question set question = '$pyetja4' , answer1 = '$alter4a' , answer2 = '$alter4b' , answer3 = '$alter4c' , answer4 = '$alter4d' , finalanswer = '$alter4', visibility='$hiddenValue4' where id_lecture = '$id' and orders = 4 ";
        $qupdatea5 =" update exam_question set question = '$pyetja5' , answer1 = '$alter5a' , answer2 = '$alter5b' , answer3 = '$alter5c' , answer4 = '$alter5d' , finalanswer = '$alter5', visibility='$hiddenValue5' where id_lecture = '$id' and orders = 5 ";
        $qupdatea6 =" update exam_question set question = '$pyetja6' , answer1 = '$alter6a' , answer2 = '$alter6b', answer3 = '$alter6c', answer4 = '$alter6d' , finalanswer = '$alter6', visibility='$hiddenValue6' where id_lecture = '$id' and orders = 6 ";
        $qupdatea7 =" update exam_question set question = '$pyetja7' , answer1 = '$alter7a' , answer2 = '$alter7b' , answer3 = '$alter7c' , answer4 = '$alter7d' , finalanswer = '$alter7', visibility='$hiddenValue7' where id_lecture = '$id' and orders = 7 ";
        $qupdatea8 =" update exam_question set question = '$pyetja8' , answer1 = '$alter8a' , answer2 = '$alter8b' , answer3 = '$alter8c' , answer4 = '$alter8d' , finalanswer = '$alter8', visibility='$hiddenValue8' where id_lecture = '$id' and orders = 8 ";
        $qupdatea9 =" update exam_question set question = '$pyetja9' , answer1 = '$alter9a' , answer2 = '$alter9b' , answer3 = '$alter9c' , answer4 = '$alter9d' , finalanswer = '$alter9', visibility='$hiddenValue9' where id_lecture = '$id' and orders = 9 ";
        $qupdatea10 =" update exam_question set question = '$pyetja10' , answer1 = '$alter10a' , answer2 = '$alter10b' , answer3 = '$alter10c' , answer4 = '$alter10d' , finalanswer = '$alter10', visibility='$hiddenValue10' where id_lecture = '$id' and orders = 10 ";
        
        $updategeneral = @mysqli_query($dbc, $qgeneral);
        $updr1 = @mysqli_query($dbc, $qupdatea1); $updr2 = @mysqli_query($dbc, $qupdatea2);  $updr3 = @mysqli_query($dbc, $qupdatea3);  $updr4 = @mysqli_query($dbc, $qupdatea4);  
        $updr5 = @mysqli_query($dbc, $qupdatea5);  $updr6 = @mysqli_query($dbc, $qupdatea6);  $updr7 = @mysqli_query($dbc, $qupdatea7);  $updr8 = @mysqli_query($dbc, $qupdatea8); 
        $updr9 = @mysqli_query($dbc, $qupdatea9);  $updr10 = @mysqli_query($dbc, $qupdatea10);  
            
            if (mysqli_affected_rows($dbc) > 0) { // If it ran OK.
                // Print a message:
                
                
//            echo $qupdatea1;
//            echo $qupdatea2;
//            echo $qupdatea3;
//            echo $qupdatea4;
//            echo $qupdatea5;
//            echo $qupdatea6;
//            echo $qupdatea7;
//            echo $qupdatea8;
//            echo $qupdatea9;
//            echo $qupdatea10;

                
                echo '<p class="alert alert-success text-center">Successful update</p>';
            } /* else { // If it did not run OK.
                
                
                echo '<p class="alert alert-warning text-center"">Nothing has been changed</p>'; // Public message.
            } */
        } else { // Already registered.
            echo '<p class="alert alert-error text-center">Please, contact the Administrator</p>';
        }
    } else { // Report the errors.
        echo '<p class="alert alert-error text-center">You should fill these field: <br />';
        foreach ($errors as $msg) { // Print each error.
            echo " - $msg<br />\n";
        }
        echo '</p><p class="alert alert-error text-center">Please, try again</p>';
    } // End of if (empty($errors)) IF.
} // End of submit conditional.
// Always show the form...
// Retrieve the user's information:
$q = " select * from lecture where id_lecture = $id and coursetitle = '$emriLendes' ";
$ans1 = " select * from exam_question where id_lecture = $id and orders = 1 ";
$ans2 = " select * from exam_question where id_lecture = $id and orders = 2 ";
$ans3 = " select * from exam_question where id_lecture = $id and orders = 3 ";
$ans4 = " select * from exam_question where id_lecture = $id and orders = 4 ";
$ans5 = " select * from exam_question where id_lecture = $id and orders = 5 ";
$ans6 = " select * from exam_question where id_lecture = $id and orders = 6 ";
$ans7 = " select * from exam_question where id_lecture = $id and orders = 7 ";
$ans8 = " select * from exam_question where id_lecture = $id and orders = 8 ";
$ans9 = " select * from exam_question where id_lecture = $id and orders = 9 ";
$ans10 = " select * from exam_question where id_lecture = $id and orders = 10 ";


$r = @mysqli_query($dbc, $q);

$rans1 = @mysqli_query($dbc, $ans1);
$rans2 = @mysqli_query($dbc, $ans2);
$rans3 = @mysqli_query($dbc, $ans3);
$rans4 = @mysqli_query($dbc, $ans4);
$rans5 = @mysqli_query($dbc, $ans5);
$rans6 = @mysqli_query($dbc, $ans6);
$rans7 = @mysqli_query($dbc, $ans7);
$rans8 = @mysqli_query($dbc, $ans8);
$rans9 = @mysqli_query($dbc, $ans9);
$rans10 = @mysqli_query($dbc, $ans10);

if (mysqli_num_rows($r) == 1) { // Valid user ID, show the form.
    // Get the user's information:
    $row = mysqli_fetch_array($r, MYSQLI_NUM);
    
    $roww1 = mysqli_fetch_array($rans1, MYSQLI_NUM); $roww2 = mysqli_fetch_array($rans2, MYSQLI_NUM); $roww3 = mysqli_fetch_array($rans3, MYSQLI_NUM);
    $roww4 = mysqli_fetch_array($rans4, MYSQLI_NUM); $roww5 = mysqli_fetch_array($rans5, MYSQLI_NUM); $roww6 = mysqli_fetch_array($rans6, MYSQLI_NUM);
    $roww7 = mysqli_fetch_array($rans7, MYSQLI_NUM); $roww8 = mysqli_fetch_array($rans8, MYSQLI_NUM); $roww9 = mysqli_fetch_array($rans9, MYSQLI_NUM);
    $roww10 = mysqli_fetch_array($rans10, MYSQLI_NUM);

    $altansw1 = $roww1[7]; $altansw2 = $roww2[7]; $altansw3 = $roww3[7]; $altansw4 = $roww4[7]; $altansw5 = $roww5[7]; 
    $altansw6 = $roww6[7]; $altansw7 = $roww7[7]; $altansw8 = $roww8[7]; $altansw9 = $roww9[7]; $altansw10 = $roww10[7];
    
    $hiddenValue1 = $roww1[8]; $hiddenValue2 = $roww2[8]; $hiddenValue3 = $roww3[8]; $hiddenValue4 = $roww4[8]; $hiddenValue5 = $roww5[8]; 
    $hiddenValue6 = $roww6[8]; $hiddenValue7 = $roww7[8]; $hiddenValue8 = $roww8[8]; $hiddenValue9 = $roww9[8]; $hiddenValue10 = $roww10[8];
    
    $altansw1a = ($altansw1=='A')?"checked":""; $altansw1b = ($altansw1=='B')?"checked":""; $altansw1c = ($altansw1=='C')?"checked":""; $altansw1d = ($altansw1=='D')?"checked":"";
    $altansw2a = ($altansw2=='A')?"checked":""; $altansw2b = ($altansw2=='B')?"checked":""; $altansw2c = ($altansw2=='C')?"checked":""; $altansw2d = ($altansw2=='D')?"checked":"";
    $altansw3a = ($altansw3=='A')?"checked":""; $altansw3b = ($altansw3=='B')?"checked":""; $altansw3c = ($altansw3=='C')?"checked":""; $altansw3d = ($altansw3=='D')?"checked":"";
    $altansw4a = ($altansw4=='A')?"checked":""; $altansw4b = ($altansw4=='B')?"checked":""; $altansw4c = ($altansw4=='C')?"checked":""; $altansw4d = ($altansw4=='D')?"checked":"";
    $altansw5a = ($altansw5=='A')?"checked":""; $altansw5b = ($altansw5=='B')?"checked":""; $altansw5c = ($altansw5=='C')?"checked":""; $altansw5d = ($altansw5=='D')?"checked":"";
    $altansw6a = ($altansw6=='A')?"checked":""; $altansw6b = ($altansw6=='B')?"checked":""; $altansw6c = ($altansw6=='C')?"checked":""; $altansw6d = ($altansw6=='D')?"checked":"";
    $altansw7a = ($altansw7=='A')?"checked":""; $altansw7b = ($altansw7=='B')?"checked":""; $altansw7c = ($altansw7=='C')?"checked":""; $altansw7d = ($altansw7=='D')?"checked":"";
    $altansw8a = ($altansw8=='A')?"checked":""; $altansw8b = ($altansw8=='B')?"checked":""; $altansw8c = ($altansw8=='C')?"checked":""; $altansw8d = ($altansw8=='D')?"checked":"";
    $altansw9a = ($altansw9=='A')?"checked":""; $altansw9b = ($altansw9=='B')?"checked":""; $altansw9c = ($altansw9=='C')?"checked":""; $altansw9d = ($altansw9=='D')?"checked":"";
    $altansw10a = ($altansw10=='A')?"checked":""; $altansw10b = ($altansw10=='B')?"checked":""; $altansw10c = ($altansw10=='C')?"checked":""; $altansw10d = ($altansw10=='D')?"checked":"";
    
    function getVisibility($hiddenV) {
        
        if($hiddenV == "1") {
            return '';
        } else {
            return 'style="display: none;" ';
        }
        return '';
    }
    
    function counterQuest($hiddenValue2, $hiddenValue3, $hiddenValue4, $hiddenValue5,
            $hiddenValue6, $hiddenValue7, $hiddenValue8, $hiddenValue9, $hiddenValue10) {
        
        $counter = 1;
        
        if($hiddenValue2 == "1")
            $counter++;
        if($hiddenValue3 == "1")
            $counter++;
        if($hiddenValue4 == "1")
            $counter++;
        if($hiddenValue5 == "1")
            $counter++;
        if($hiddenValue6 == "1")
            $counter++;
        if($hiddenValue7 == "1")
            $counter++;
        if($hiddenValue8 == "1")
            $counter++;
        if($hiddenValue9 == "1")
            $counter++;
        if($hiddenValue10 == "1")
            $counter++;
        
        return $counter;
    }




    // Create the form: 
    echo ' 
        
<ul class="nav nav-pills" >
    <li><a href="#Pergjithshme" data-toggle="tab">General data</a></li>
    <li><a href="#QuestionsAnswers" data-toggle="tab">Create the asnwers and questions</a></li>
</ul>

<div class="border-menu"></div>

<div class="tab-content">

    <div class="tab-pane active" id="Pergjithshme">        

        <form class="form-horizontal" action="examFormEdit.php" method="post">


    <div class="input-prepend ">
        <span class="add-on">School</span>
        <select class="combobox" name="school" style="width: 480px;" id="selectSchool" >
            <option></option>
            <option value="ECONOMY">Economy</option>
            <option value="ENGINEERING">Engineering</option>
        </select>
    </div><br>

    <div class="input-prepend ">
        <span class="add-on">Programs</span>
        <select class="combobox" name="programs" style="width: 480px;" id="selectProgram" >
            <option></option>
            <option value="UNDER">Undergraduate</option>
            <option value="GRATUATE">Graduate</option>
        </select>
    </div><br>

    <div class="input-prepend ">
        <span class="add-on">Department</span>
        <select class="combobox" name="department" style="width: 480px;" id="selectDepartment" >
            <option></option>
            <option value="Industrial Engineering">Industrial Engineering</option>
            <option value="Software Engineering">Software Engineering</option>
            <option value="MBA">MBA</option>
            <option value="Business Administration and IT">Business Administration and IT</option>
        </select>
    </div><br>

    <div class="input-prepend ">
        <span class="add-on">Academic year</span>
        <select class="combobox" name="academicYear" style="width: 480px;" id="selectAcademicYear" >
            <option></option>
            <option value="I Year">I Year</option>
            <option value="II Year">II Year</option>
            <option value="III Year">III Year</option>
        </select>
    </div><br>

    <div class="input-prepend ">
        <span class="add-on">Course title</span>
        <input class="input-mesatarrr" type="text" id="prependedInput"  style="width: 466px;" name="coursetitle" 
         name="emrilendes"   value="' . $row[1] . '" />
    </div> <br>

    <div class="input-prepend ">
        <span class="add-on">Type</span>
        <select class="combobox" name="type" style="width: 480px;" id="selectType" >
            <option></option>
            <option value="Elective">Elective</option>
            <option value="Required">Required</option>
        </select>
    </div><br>

    <div class="input-prepend ">
        <span class="add-on">Term</span>
        <select class="combobox" name="term" style="width: 480px;" id="selectTerm" >
            <option></option>
            <option value="FALL">Fall</option>
            <option value="SPRING">Spring</option>
            <option value="MAKE">Make up season</option>
        </select>
    </div><br>

    <div class="input-prepend">
        <span class="add-on">Dean</span>
        <input class="input-mesatarrr" type="text" id="prependedInput" style="width: 466px;"  name="dean" 
         name="emrilendes"   value="' . $row[7] . '" />
    </div>
    <br>

    <div class="input-prepend ">
        <span class="add-on">Email</span>
        <input class="input-mesatarrr" type="text" id="prependedInput"style="width: 466px;"  name="email" 
         name="emrilendes"   value="' . $row[9] . '" />
    </div><br>

    <div class="input-prepend ">
        <span class="add-on">Lecturer</span>
        <input class="input-mesatarrr" type="text" id="prependedInput" style="width: 466px;"  name="lecturer" 
         name="emrilendes"   value="' . $row[8] . '" />
    </div><br>

    <div class="input-prepend ">
        <span class="add-on">The classroom lecture</span>
        <select class="combobox" name="classroom" style="width: 480px;" id="selectClass" >
            <option></option>';
    while ($row2 = mysqli_fetch_array($rowsQ, MYSQLI_ASSOC)) {
        echo '
        <option value = "'.$row2['classroomname'].'" > '.$row2['classroomname'].' - Range(192.168.1.'.$row2['ip1'].' - 192.168.1.'.$row2['ip2'].')</option >';
    }
    echo '
        </select>
    </div><br>

    <div class="input-prepend ">
        <span class="add-on">Activation</span>
        <select class="combobox" name="activation" style="width: 480px;" id="selectActivation" >
            <option value="Not Active">Not Active</option>
            <option value="Active">Active</option>
        </select>
    </div><br>

    <div class="input-prepend ">
        <span class="add-on">Code Activation</span>
        <input class="input-mesatarrr" type="text" id="prependedInput"  style="width: 466px;" name="codeactivation" 
         name="codeactivation"   value="' . $row[9] . '" />
    </div> <br>

    <input type="hidden"  value="' . $id . '" name="idlecture" />      
    <input type="hidden"  value="' . $emriLendes . '" name="emrilendes" />  
    </div>
	
<script>
    $(document).ready(function(){
    
      document.getElementById("selectSchool").value="'. $row[2] .'";
      document.getElementById("selectProgram").value="'. $row[3] .'";
      document.getElementById("selectDepartment").value="'. $row[12] .'";
      document.getElementById("selectAcademicYear").value="'. $row[4] .'";
      document.getElementById("selectType").value="'. $row[5] .'";    
      document.getElementById("selectTerm").value="'. $row[6] .'";   
      document.getElementById("selectActivation").value="'. $row[15] .'";       


      document.getElementById("selectClass").value="'. $row[13] .'";
    });
</script>

    <div class="tab-pane" id="QuestionsAnswers"> 

        <div class="control-group">
            <div class="controls">
                <p align="center" class="table">
                    <a class="btn btn-info btn-block text-center" onclick="addQuestion()" >
                        Create new question</a>
                </p>
            </div>
        </div>

        <!-- PYETJA 1 -->

        <div class="control-group" '. getVisibility($hiddenValue1) .' id="div1" >
            <input type="hidden" name="hiddenValue1" id="hiddenValue1" value="'.$hiddenValue1.'">
            <p class="control-p text-warning" for="pyetja1">Question 1</p>
            <div class="controls">
                <textarea class="text-area-large-areaa" id="pyetja1" name="pyetja1"> '. $roww1[2] .' </textarea>
            </div>
            <p class="control-p text-warning" for="alter1">Alternative question 1</p>
            <div class="radio">
                <p>
                    <input type="radio" name="alter1" id="alter1a" value="A" '.$altansw1a.'>
                    <input type="text" class="form-control" id="alter1a" name="alter1a" value="' . $roww1[3] . '">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter1" id="alter1b" value="B" '.$altansw1b.'>
                    <input type="text" class="form-control" id="alter1b" name="alter1b"  value="' . $roww1[4] . '">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter1" id="alter1c" value="C" '.$altansw1c.'>
                    <input type="text" class="form-control" id="alter1c" name="alter1c"  value="' . $roww1[5] . '">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter1" id="alter1d" value="D" '.$altansw1d.'>
                    <input type="text" class="form-control" id="alter1d" name="alter1d" value="' . $roww1[6] . '">
                </p>
            </div>
            <div class="border-question"></div>
        </div>
        


        <!-- PYETJA 2 -->

        <div class="control-group" '. getVisibility($hiddenValue2) .' id="div2" >
            <input type="hidden" name="hiddenValue2" id="hiddenValue2" value="'.$hiddenValue2.'">
            <p class="control-p text-warning" for="pyetja1">Question 2</p>
            <div class="controls">
                <textarea class="text-area-large-areaa" id="pyetja2" name="pyetja2"> '. $roww2[2] .' </textarea>
            </div>
            <p class="control-p text-warning" for="alter2">Alternative question 2</p>
            <div class="radio">
                <p>
                    <input type="radio" name="alter2" id="alter2a" value="A" ' . $altansw2a .  '>
                    <input type="text" class="form-control" id="alter2a" name="alter2a" value="' . $roww2[3] . '">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter2" id="alter2b" value="B"  ' . $altansw2b .  '>
                    <input type="text" class="form-control" id="alter2b" name="alter2b" value="' . $roww2[4] . '">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter2" id="alter2c" value="C"  ' . $altansw2c .  '>
                    <input type="text" class="form-control" id="alter1c" name="alter2c" value="' . $roww2[5] . '">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter2" id="alter2d" value="D"  ' . $altansw2d .  '>
                    <input type="text" class="form-control" id="alter2d" name="alter2d" value="' . $roww2[6] . '">
                </p>
            </div>
             <div class="border-question"></div>
        </div>
       


        <!-- PYETJA 3 -->

        <div class="control-group" '. getVisibility($hiddenValue3) .' id="div3" >
            <input type="hidden" name="hiddenValue3" id="hiddenValue3" value="'.$hiddenValue3.'">
            <p class="control-p text-warning" for="pyetja3">Question 3</p>
            <div class="controls">
                <textarea class="text-area-large-areaa" id="pyetja3" name="pyetja3"> '. $roww3[2] .' </textarea>
            </div>
            <p class="control-p text-warning" for="alter3">Alternative question 3</p>
            <div class="radio">
                <p>
                    <input type="radio" name="alter3" id="alter3a" value="A" ' . $altansw3a .  '>
                    <input type="text" class="form-control" id="alter3a" name="alter3a" value="' . $roww3[3] . '">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter3" id="alter3b" value="B"  ' . $altansw3b .  '>
                    <input type="text" class="form-control" id="alter3b" name="alter3b" value="' . $roww3[4] . '">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter3" id="alter3c" value="C"  ' . $altansw3c .  '>
                    <input type="text" class="form-control" id="alter3c" name="alter3c" value="' . $roww3[5] . '">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter3" id="alter3d" value="D"  ' . $altansw3d .  '>
                    <input type="text" class="form-control" id="alter3d" name="alter3d" value="' . $roww3[6] . '">
                </p>
            </div>
            <div class="border-question"></div>
        </div>
        


        <!-- PYETJA 4 -->

        <div class="control-group" '. getVisibility($hiddenValue4) .' id="div4" >
            <input type="hidden" name="hiddenValue4" id="hiddenValue4" value="'.$hiddenValue4.'">
            <p class="control-p text-warning" for="pyetja4">Question 4</p>
            <div class="controls">
                <textarea class="text-area-large-areaa" id="pyetja4" name="pyetja4"> '. $roww4[2] .' </textarea>
            </div>
            <p class="control-p text-warning" for="alter4">Alternative question 4</p>
            <div class="radio">
                <p>
                    <input type="radio" name="alter4" id="alter4a" value="A" ' . $altansw4a .  '>
                    <input type="text" class="form-control" id="alter4a" name="alter4a" value="' . $roww4[3] . '">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter4" id="alter4b" value="B"  ' . $altansw4b .  '>
                    <input type="text" class="form-control" id="alter1b" name="alter4b" value="' . $roww4[4] . '">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter4" id="alter4c" value="C"  ' . $altansw4c .  '>
                    <input type="text" class="form-control" id="alter4c" name="alter4c" value="' . $roww4[5] . '">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter4" id="alter4d" value="D"  ' . $altansw4d .  '>
                    <input type="text" class="form-control" id="alter4d" name="alter4d" value="' . $roww4[6] . '">
                </p>
            </div>
            <div class="border-question"></div>
        </div>
        


        <!-- PYETJA 5 -->

        <div class="control-group" '. getVisibility($hiddenValue5) .' id="div5" >
            <input type="hidden" name="hiddenValue5" id="hiddenValue5" value="'.$hiddenValue5.'">
            <p class="control-p text-warning" for="pyetja1">Question 5</p>
            <div class="controls">
                <textarea class="text-area-large-areaa" id="pyetja5" name="pyetja5"> '. $roww5[2] .' </textarea>
            </div>
            <p class="control-p text-warning" for="alter1">Alternative question 5</p>
            <div class="radio">
                <p>
                    <input type="radio" name="alter5" id="alter5a" value="A" ' . $altansw5a .  '>
                    <input type="text" class="form-control" id="alter5a" name="alter5a" value="' . $roww5[3] . '">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter5" id="alter5b" value="B"  ' . $altansw5b .  '>
                    <input type="text" class="form-control" id="alter5b" name="alter5b" value="' . $roww5[4] . '">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter5" id="alter5c" value="C"  ' . $altansw5c .  '>
                    <input type="text" class="form-control" id="alter5c" name="alter5c" value="' . $roww5[5] . '">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter5" id="alter5d" value="D"  ' . $altansw5d .  '>
                    <input type="text" class="form-control" id="alter5d" name="alter5d" value="' . $roww5[6] . '">
                </p>
            </div>
            <div class="border-question"></div>
        </div>
        


        <!-- PYETJA 6 -->

        <div class="control-group" '. getVisibility($hiddenValue6) .' id="div6" >
            <input type="hidden" name="hiddenValue6" id="hiddenValue6" value="'.$hiddenValue6.'">
            <p class="control-p text-warning" for="pyetja6">Question 6</p>
            <div class="controls">
                <textarea class="text-area-large-areaa" id="pyetja6" name="pyetja6"> '. $roww6[2] .' </textarea>
            </div>
            <p class="control-p text-warning" for="alter6">Alternative question 6</p>
            <div class="radio">
                <p>
                    <input type="radio" name="alter6" id="alter6a" value="A" ' . $altansw6a .  '>
                    <input type="text" class="form-control" id="alter6a" name="alter6a" value="' . $roww6[3] . '">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter6" id="alter6b" value="B"  ' . $altansw6b .  '>
                    <input type="text" class="form-control" id="alter6b" name="alter6b" value="' . $roww6[4] . '">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter6" id="alter6c" value="C"  ' . $altansw6c .  '>
                    <input type="text" class="form-control" id="alter6c" name="alter6c" value="' . $roww6[5] . '">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter6" id="alter6d" value="D"  ' . $altansw6d .  '>
                    <input type="text" class="form-control" id="alter6d" name="alter6d" value="' . $roww6[6] . '">
                </p>
            </div>
             <div class="border-question"></div>
        </div>
       


        <!-- PYETJA 7 -->

        <div class="control-group" '. getVisibility($hiddenValue7) .' id="div7" >
            <input type="hidden" name="hiddenValue7" id="hiddenValue7" value="'.$hiddenValue7.'">
            <p class="control-p text-warning" for="pyetja7">Question 7</p>
            <div class="controls">
                <textarea class="text-area-large-areaa" id="pyetja7" name="pyetja7"> '. $roww7[2] .' </textarea>
            </div>
            <p class="control-p text-warning" for="alter7">Alternative question 7</p>
            <div class="radio">
                <p>
                    <input type="radio" name="alter7" id="alter7a" value="A" ' . $altansw7a .  '>
                    <input type="text" class="form-control" id="alter7a" name="alter7a" value="' . $roww7[3] . '">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter7" id="alter7b" value="B"  ' . $altansw7b .  '>
                    <input type="text" class="form-control" id="alter7b" name="alter7b" value="' . $roww7[4] . '">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter7" id="alter7c" value="C"  ' . $altansw7c .  '>
                    <input type="text" class="form-control" id="alter7c" name="alter7c" value="' . $roww7[5] . '">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter7" id="alter7d" value="D"  ' . $altansw7d .  '>
                    <input type="text" class="form-control" id="alter7d" name="alter7d" value="' . $roww7[6] . '">
                </p>
            </div>
            <div class="border-question"></div>
        </div>
        


        <!-- PYETJA 8 -->

        <div class="control-group" '. getVisibility($hiddenValue8) .' id="div8" >
            <input type="hidden" name="hiddenValue8" id="hiddenValue8" value="'.$hiddenValue8.'">
            <p class="control-p text-warning" for="pyetja8">Question 8</p>
            <div class="controls">
                <textarea class="text-area-large-areaa" id="pyetja8" name="pyetja8"> '. $roww8[2] .' </textarea>
            </div>
            <p class="control-p text-warning" for="alter8">Alternative question 8</p>
            <div class="radio">
                <p>
                    <input type="radio" name="alter8" id="alter8a" value="A" ' . $altansw8a .  '>
                    <input type="text" class="form-control" id="alter8a" name="alter8a" value="' . $roww8[3] . '">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter8" id="alter8b" value="B"  ' . $altansw8b .  '>
                    <input type="text" class="form-control" id="alter8b" name="alter8b" value="' . $roww8[4] . '">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter8" id="alter1c" value="C"  ' . $altansw8c .  '>
                    <input type="text" class="form-control" id="alter8c" name="alter8c" value="' . $roww8[5] . '">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter8" id="alter8d" value="D"  ' . $altansw8d .  '>
                    <input type="text" class="form-control" id="alter8d" name="alter8d" value="' . $roww8[6] . '">
                </p>
            </div>
             <div class="border-question"></div>
        </div>
       


        <!-- PYETJA 9 -->

        <div class="control-group" '. getVisibility($hiddenValue9) .' id="div9" >
            <input type="hidden" name="hiddenValue9" id="hiddenValue9" value="'.$hiddenValue9.'">
            <p class="control-p text-warning" for="pyetja9">Question 9</p>
            <div class="controls">
                <textarea class="text-area-large-areaa" id="pyetja9" name="pyetja9"> '. $roww9[2] .' </textarea>
            </div>
            <p class="control-p text-warning" for="alter9">Alternative question 9</p>
            <div class="radio">
                <p>
                    <input type="radio" name="alter9" id="alter9a" value="A" ' . $altansw9a .  '>
                    <input type="text" class="form-control" id="alter9a" name="alter9a" value="' . $roww9[3] . '">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter9" id="alter9b" value="B"  ' . $altansw9b .  '>
                    <input type="text" class="form-control" id="alter9b" name="alter9b" value="' . $roww9[4] . '">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter9" id="alter9c" value="C"  ' . $altansw9c .  '>
                    <input type="text" class="form-control" id="alter9c" name="alter9c" value="' . $roww9[5] . '">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter9" id="alter9d" value="D"  ' . $altansw9d .  '>
                    <input type="text" class="form-control" id="alter9d" name="alter9d" value="' . $roww9[6] . '">
                </p>
            </div>
            <div class="border-question"></div>
        </div>
        


        <!-- PYETJA 10 -->

        <div class="control-group" '. getVisibility($hiddenValue10) .' id="div10" >
            <input type="hidden" name="hiddenValue10" id="hiddenValue10" value="'.$hiddenValue10.'">
            <p class="control-p text-warning" for="pyetja10">Question 10</p>
            <div class="controls">
                <textarea class="text-area-large-areaa" id="pyetja10" name="pyetja10"> '. $roww10[2] .' </textarea>
            </div>
            <p class="control-p text-warning" for="alter10">Alternative question 10</p>
            <div class="radio">
                <p>
                    <input type="radio" name="alter10" id="alter10a" value="A" ' . $altansw10a .  '>
                    <input type="text" class="form-control" id="alter10a" name="alter10a" value="' . $roww10[3] . '">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter10" id="alter10b" value="B"  ' . $altansw10b .  '>
                    <input type="text" class="form-control" id="alter10b" name="alter10b" value="' . $roww10[4] . '">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter10" id="alter10c" value="C"  ' . $altansw10c .  '>
                    <input type="text" class="form-control" id="alter10c" name="alter10c" value="' . $roww10[5] . '">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter10" id="alter10d" value="D"  ' . $altansw10d .  '>
                    <input type="text" class="form-control" id="alter10d" name="alter10d" value="' . $roww10[6] . '">
                </p>
            </div>
            <div class="border-question"></div>
        </div>
        
    </div>


    <div class="control-group">
        <div class="controls">
          <button type="submit" class="btn btn-danger btn-large btn-block text-center">Update</button>
          <br>
            <p align="center" class="table"><a class="btn btn-danger btn-large btn-block text-center" href="http://localhost/jonada/welcome.php">Back</a></p>        
            <input type="hidden" name="id" value="' . $id . '" />

        </div>
      </div>
    </form>
    
<script>

    var count = '.  counterQuest($hiddenValue1, $hiddenValue2, $hiddenValue3, $hiddenValue4, $hiddenValue5, $hiddenValue6, $hiddenValue7, $hiddenValue8, $hiddenValue9, $hiddenValue10).';
    var divAcces;
    var changeVisible;

    function addQuestion() {
        
        divAcces = "#div" + count;
        changeVisible = "hiddenValue" + count;
        
        $(divAcces).removeAttr("style");
        document.getElementById(changeVisible).value = 1;
        
        console.log(count);
        console.log(divAcces);
        console.log(changeVisible);
        count++;
    }
</script>

';
} else { // Not a valid user ID.
    echo $q;
    echo '<p class="error">This page has been accessed in error.</p>';
    
//    echo $q;
//    echo mysqli_num_rows($r);
}

mysqli_close($dbc);

include ('includes/footer_login_1.html');
?>