<?php

session_start();

require ('../../mysql_connect.php');

if ((isset($_GET['idlecture'])) && (is_numeric($_GET['idlecture'])) && (is_numeric($_GET['idstudent']))) { // From view_users.php
    $id = $_GET['idlecture'];
    $idstudent = $_GET['idstudent'];
} elseif ((isset($_POST['idlecture'])) && (is_numeric($_POST['idlecture'])) && (is_numeric($_POST['idstudent']))) { // Form submission.
    $id = $_POST['idlecture'];
    $idstudent = $_POST['idstudent'];
} else { // No valid ID, kill the script.
    echo '<p class="error">Kjo faqe nuk eshte e aksesueshme.</p>';
    include ('includes/footer_login.html');
    exit();
}


require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('CIT Online Exam System');
$pdf->SetTitle('CIT Online Exam System');
$pdf->SetSubject('CIT Online Exam System');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH);
//$pdf->getFoote

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 10);

// add a page
$pdf->AddPage();

$q = " SELECT * FROM lecture WHERE id_lecture = $id ";
$r = @mysqli_query($dbc, $q);

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

$ansStudent = "select * from exam_answer where id_student = $idstudent and id_lecture = $id";
$studentInformation = " select * from student_lecturer where id = $idstudent";
$stuInformations = @mysqli_query($dbc, $studentInformation);

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

$ansStudentQQ = @mysqli_query($dbc, $ansStudent);
$studeInfo = @mysqli_query($dbc, $studentInformation);

if (mysqli_num_rows($r) == 1) { // Valid user ID, show the form.
    // Get the user's information:
    $row = mysqli_fetch_array($r, MYSQLI_NUM);
    
    $roww1 = mysqli_fetch_array($rans1, MYSQLI_NUM); $roww2 = mysqli_fetch_array($rans2, MYSQLI_NUM); $roww3 = mysqli_fetch_array($rans3, MYSQLI_NUM);
    $roww4 = mysqli_fetch_array($rans4, MYSQLI_NUM); $roww5 = mysqli_fetch_array($rans5, MYSQLI_NUM); $roww6 = mysqli_fetch_array($rans6, MYSQLI_NUM);
    $roww7 = mysqli_fetch_array($rans7, MYSQLI_NUM); $roww8 = mysqli_fetch_array($rans8, MYSQLI_NUM); $roww9 = mysqli_fetch_array($rans9, MYSQLI_NUM);
    $roww10 = mysqli_fetch_array($rans10, MYSQLI_NUM);
    
    $ansStudentQ = mysqli_fetch_array($ansStudentQQ, MYSQLI_NUM);
    $sstudentInf = mysqli_fetch_array($stuInformations, MYSQLI_NUM);

    $altansw1 = $roww1[7]; $altansw2 = $roww2[7]; $altansw3 = $roww3[7]; $altansw4 = $roww4[7]; $altansw5 = $roww5[7]; 
    $altansw6 = $roww6[7]; $altansw7 = $roww7[7]; $altansw8 = $roww8[7]; $altansw9 = $roww9[7]; $altansw10 = $roww10[7];
    
    $altansw1a = ($altansw1=='A')?"( Correct answer )":""; $altansw1b = ($altansw1=='B')?"( Correct answer )":""; $altansw1c = ($altansw1=='C')?"( Correct answer )":""; $altansw1d = ($altansw1=='D')?"( Correct answer )":"";
    $altansw2a = ($altansw2=='A')?"( Correct answer )":""; $altansw2b = ($altansw2=='B')?"( Correct answer )":""; $altansw2c = ($altansw2=='C')?"( Correct answer )":""; $altansw2d = ($altansw2=='D')?"( Correct answer )":"";
    $altansw3a = ($altansw3=='A')?"( Correct answer )":""; $altansw3b = ($altansw3=='B')?"( Correct answer )":""; $altansw3c = ($altansw3=='C')?"( Correct answer )":""; $altansw3d = ($altansw3=='D')?"( Correct answer )":"";
    $altansw4a = ($altansw4=='A')?"( Correct answer )":""; $altansw4b = ($altansw4=='B')?"( Correct answer )":""; $altansw4c = ($altansw4=='C')?"( Correct answer )":""; $altansw4d = ($altansw4=='D')?"( Correct answer )":"";
    $altansw5a = ($altansw5=='A')?"( Correct answer )":""; $altansw5b = ($altansw5=='B')?"( Correct answer )":""; $altansw5c = ($altansw5=='C')?"( Correct answer )":""; $altansw5d = ($altansw5=='D')?"( Correct answer )":"";
    $altansw6a = ($altansw6=='A')?"( Correct answer )":""; $altansw6b = ($altansw6=='B')?"( Correct answer )":""; $altansw6c = ($altansw6=='C')?"( Correct answer )":""; $altansw6d = ($altansw6=='D')?"( Correct answer )":"";
    $altansw7a = ($altansw7=='A')?"( Correct answer )":""; $altansw7b = ($altansw7=='B')?"( Correct answer )":""; $altansw7c = ($altansw7=='C')?"( Correct answer )":""; $altansw7d = ($altansw7=='D')?"( Correct answer )":"";
    $altansw8a = ($altansw8=='A')?"( Correct answer )":""; $altansw8b = ($altansw8=='B')?"( Correct answer )":""; $altansw8c = ($altansw8=='C')?"( Correct answer )":""; $altansw8d = ($altansw8=='D')?"( Correct answer )":"";
    $altansw9a = ($altansw9=='A')?"( Correct answer )":""; $altansw9b = ($altansw9=='B')?"( Correct answer )":""; $altansw9c = ($altansw9=='C')?"( Correct answer )":""; $altansw9d = ($altansw9=='D')?"( Correct answer )":"";
    $altansw10a = ($altansw10=='A')?"( Correct answer )":""; $altansw10b = ($altansw10=='B')?"( Correct answer )":""; $altansw10c = ($altansw10=='C')?"( Correct answer )":""; $altansw10d = ($altansw10=='D')?"( Correct answer )":"";
    
    $resp1 = $ansStudentQ[1]; $resp2 = $ansStudentQ[2]; $resp3 = $ansStudentQ[3]; $resp4 = $ansStudentQ[4]; $resp5 = $ansStudentQ[5]; 
    $resp6 = $ansStudentQ[6]; $resp7 = $ansStudentQ[7]; $resp8 = $ansStudentQ[8]; $resp9 = $ansStudentQ[9]; $resp10 = $ansStudentQ[10]; 

    $resp1a = ($resp1=='A')?"( Your answer )":""; $resp1b = ($resp1=='B')?"( Your answer )":""; $resp1c = ($resp1=='C')?"( Your answer )":""; $resp1d = ($resp1=='D')?"( Your answer )":"";
    $resp2a = ($resp2=='A')?"( Your answer )":""; $resp2b = ($resp2=='B')?"( Your answer )":""; $resp2c = ($resp2=='C')?"( Your answer )":""; $resp2d = ($resp2=='D')?"( Your answer )":"";
    $resp3a = ($resp3=='A')?"( Your answer )":""; $resp3b = ($resp3=='B')?"( Your answer )":""; $resp3c = ($resp3=='C')?"( Your answer )":""; $resp3d = ($resp3=='D')?"( Your answer )":"";
    $resp4a = ($resp4=='A')?"( Your answer )":""; $resp4b = ($resp4=='B')?"( Your answer )":""; $resp4c = ($resp4=='C')?"( Your answer )":""; $resp4d = ($resp4=='D')?"( Your answer )":"";
    $resp5a = ($resp5=='A')?"( Your answer )":""; $resp5b = ($resp5=='B')?"( Your answer )":""; $resp5c = ($resp5=='C')?"( Your answer )":""; $resp5d = ($resp5=='D')?"( Your answer )":"";
    $resp6a = ($resp6=='A')?"( Your answer )":""; $resp6b = ($resp6=='B')?"( Your answer )":""; $resp6c = ($resp6=='C')?"( Your answer )":""; $resp6d = ($resp6=='D')?"( Your answer )":"";
    $resp7a = ($resp7=='A')?"( Your answer )":""; $resp7b = ($resp7=='B')?"( Your answer )":""; $resp7c = ($resp7=='C')?"( Your answer )":""; $resp7d = ($resp7=='D')?"( Your answer )":"";
    $resp8a = ($resp8=='A')?"( Your answer )":""; $resp8b = ($resp8=='B')?"( Your answer )":""; $resp8c = ($resp8=='C')?"( Your answer )":""; $resp8d = ($resp8=='D')?"( Your answer )":"";
    $resp9a = ($resp9=='A')?"( Your answer )":""; $resp9b = ($resp9=='B')?"( Your answer )":""; $resp9c = ($resp9=='C')?"( Your answer )":""; $resp9d = ($resp9=='D')?"( Your answer )":"";
    $resp10a = ($resp10=='A')?"( Your answer )":""; $resp10b = ($resp10=='B')?"( Your answer )":""; $resp10c = ($resp10=='C')?"( Your answer )":""; $resp10d = ($resp10=='D')?"( Your answer )":"";

    $hiddenValue1 = $roww1[8]; $hiddenValue2 = $roww2[8]; $hiddenValue3 = $roww3[8]; $hiddenValue4 = $roww4[8]; $hiddenValue5 = $roww5[8]; 
    $hiddenValue6 = $roww6[8]; $hiddenValue7 = $roww7[8]; $hiddenValue8 = $roww8[8]; $hiddenValue9 = $roww9[8]; $hiddenValue10 = $roww10[8];
    
    $deanFac = 'Prof. Petraq Papajorgji';
        
    $count = 0;
    $countTotal = 0;
    
    if($resp1 == $altansw1 && $hiddenValue1 == "1") {
        $count++;
    }
    if($resp2 == $altansw2 && $hiddenValue1 == "1") {
        $count++;
    }
    if($resp3 == $altansw3 && $hiddenValue1 == "1") {
        $count++;
    }
    if($resp4 == $altansw4 && $hiddenValue1 == "1") {
        $count++;
    }
    if($resp5 == $altansw5 && $hiddenValue1 == "1") {
        $count++;
    }
    if($resp6 == $altansw6 && $hiddenValue1 == "1") {
        $count++;
    }
    if($resp7 == $altansw7 && $hiddenValue1 == "1") {
        $count++;
    }
    if($resp8 == $altansw8 && $hiddenValue1 == "1") {
        $count++;
    }
    if($resp9 == $altansw9 && $hiddenValue1 == "1") {
        $count++;
    }
    if($resp10 == $altansw10 && $hiddenValue10 == "1") {
        $count++;
    }
    
    if($hiddenValue1 == "1")
        $countTotal++;
    if($hiddenValue2 == "1")
        $countTotal++;
    if($hiddenValue3 == "1")
        $countTotal++;
    if($hiddenValue4 == "1")
        $countTotal++;
    if($hiddenValue5 == "1")
        $countTotal++;
    if($hiddenValue6 == "1")
        $countTotal++;
    if($hiddenValue7 == "1")
        $countTotal++;
    if($hiddenValue8 == "1")
        $countTotal++;
    if($hiddenValue9 == "1")
        $countTotal++;
    if($hiddenValue10 == "1")
        $countTotal++;
    
    $result = round(($count/$countTotal) * 100, 2);
    
$html = '
<style>
	h1 {. 
		color: navy;
		font-family: times;
		font-size: 24pt;
		text-decoration: underline;
	}
	p.first {
		color: #003300;
		font-family: helvetica;
		font-size: 12pt;
                text-align: justify;
	}
	p.first span {
		color: #006600;
		font-style: italic;
                text-align: justify;
	}
	p#second {
		color: rgb(00,63,127);
		font-family: times;
		font-size: 12pt;
		text-align: justify;
	}
	p#second > span {
		background-color: #FFFFAA;
	}
	table {
		font-family: helvetica;
		font-size: 11pt;
                text-align: justify;
	}
	td {
		border: 1px solid black;
                text-align: justify;
	}
	div.test {
		color: #CC0000;
		background-color: #FFFF66;
		font-family: helvetica;
		font-size: 10pt;
		border-style: solid solid solid solid;
		border-width: 2px 2px 2px 2px;
		border-color: green #FF00FF blue red;
		text-align: justify;
	}
	.lowercase {
		text-transform: lowercase;
	}
	.uppercase {
		text-transform: uppercase;
	}
	.capitalize {
		text-transform: capitalize;
	}
        
        .titlee {
		padding: 150px;
        margin-left: 200px;
	}
        
        .header-text {
        margin-left: 5px;
        }
        
</style>

<h3 class="header-text">CIT Online Exam System</h3> 
<h3>Student name: '.$sstudentInf[3].'</h3>
<h3>The result: '.$result.'%</h3>

<table cellpadding="10" cellspacing="15">
 <tr>
  <td><p>'
        . '<b>Course Title: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>' . $row[1] . '<br>'
        . '<b>Type of course: </b>' . $row[5] . '<br>'
        . '<b>Department: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>' . $row[12] . '<br>'
        . '<b>Academic Year:&nbsp;</b>' . $row[4] . '<br>'
        . '<b>Dean: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
        . '</b>' . $row[7] . '<br>'
        . '<b>Lecturer: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>' . $row[8] . '<br>'
        . '<b>Email: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>' . $row[9] . '<br>'
        . '</p></td>
 </tr>
 
 <tr>
  <td>
       <!-- PYETJA 1 -->
       <h3>Question 1.</h3>
       <p>'. $roww1[2] .'</p>
           
       <p><b>Alternative question 1</b></p>
       <ul>
        <li>'. $roww1[3] . ' <b>' . $altansw1a . ' ' .$resp1a. '</b></li>
        <li>'. $roww1[4] . ' <b>' . $altansw1b . ' ' .$resp1b. '</b></li>
        <li>'. $roww1[5] . ' <b>' . $altansw1c . ' ' .$resp1c. '</b></li>
        <li>'. $roww1[6] . ' <b>' . $altansw1d . ' ' .$resp1d. '</b></li>    
       </ul>';
       
$v2 = '
       <!-- PYETJA 2 -->
       <h3>Question 2.</h3>
       <p>'. $roww2[2] .'</p>
           
       <p><b>Alternative question 2</b></p>
       <ul>
        <li>'. $roww2[3] . ' <b>' . $altansw2a . ' ' .$resp2a. '</b></li>
        <li>'. $roww2[4] . ' <b>' . $altansw2b . ' ' .$resp2b. '</b></li>
        <li>'. $roww2[5] . ' <b>' . $altansw2c . ' ' .$resp2c. '</b></li>
        <li>'. $roww2[6] . ' <b>' . $altansw2d . ' ' .$resp2d. '</b></li>    
       </ul>';
    
$v3 = '        
       <!-- PYETJA 3 -->
       <h3>Question 3.</h3>
       <p>'. $roww3[2] .'</p>
           
       <p><b>Alternative question 3</b></p>
       <ul>
        <li>'. $roww3[3] . ' <b>' . $altansw3a . ' ' .$resp3a. '</b></li>
        <li>'. $roww3[4] . ' <b>' . $altansw3b . ' ' .$resp3b. '</b></li>
        <li>'. $roww3[5] . ' <b>' . $altansw3c . ' ' .$resp3c. '</b></li>
        <li>'. $roww3[6] . ' <b>' . $altansw3d . ' ' .$resp3d. '</b></li>    
       </ul>';
   
$v4 = '
       <!-- PYETJA 4 -->
       <h3>Question 4.</h3>
       <p>'. $roww4[2] .'</p>
           
       <p><b>Alternative question 4</b></p>
       <ul>
        <li>'. $roww4[3] . ' <b>' . $altansw4a . ' ' .$resp4a. '</b></li>
        <li>'. $roww4[4] . ' <b>' . $altansw4b . ' ' .$resp4b. '</b></li>
        <li>'. $roww4[5] . ' <b>' . $altansw4c . ' ' .$resp4c. '</b></li>
        <li>'. $roww4[6] . ' <b>' . $altansw4d . ' ' .$resp4d. '</b></li>    
       </ul>';
     
$v5 = '        
       <!-- PYETJA 5 -->
       <h3>Question 5.</h3>
       <p>'. $roww5[2] .'</p>
           
       <p><b>Alternative question 5</b></p>
       <ul>
        <li>'. $roww5[3] . ' <b>' . $altansw5a . ' ' .$resp5a. '</b></li>
        <li>'. $roww5[4] . ' <b>' . $altansw5b . ' ' .$resp5b. '</b></li>
        <li>'. $roww5[5] . ' <b>' . $altansw5c . ' ' .$resp5c. '</b></li>
        <li>'. $roww5[6] . ' <b>' . $altansw5d . ' ' .$resp5d. '</b></li>    
       </ul>';
       
$v6 = '
       <!-- PYETJA 6 -->
       <h3>Question 6.</h3>
       <p>'. $roww6[2] .'</p>
           
       <p><b>Alternative question 6</b></p>
       <ul>
        <li>'. $roww6[3] . ' <b>' . $altansw6a . ' ' .$resp6a. '</b></li>
        <li>'. $roww6[4] . ' <b>' . $altansw6b . ' ' .$resp6b. '</b></li>
        <li>'. $roww6[5] . ' <b>' . $altansw6c . ' ' .$resp6c. '</b></li>
        <li>'. $roww6[6] . ' <b>' . $altansw6d . ' ' .$resp6d. '</b></li>    
       </ul>';
       
$v7 = '
       <!-- PYETJA 7 -->
       <h3>Question 7.</h3>
       <p>'. $roww7[2] .'</p>
           
       <p><b>Alternative question 7</b></p>
       <ul>
        <li>'. $roww7[3] . ' <b>' . $altansw7a . ' ' .$resp7a. '</b></li>
        <li>'. $roww7[4] . ' <b>' . $altansw7b . ' ' .$resp7b. '</b></li>
        <li>'. $roww7[5] . ' <b>' . $altansw7c . ' ' .$resp7c. '</b></li>
        <li>'. $roww7[6] . ' <b>' . $altansw7d . ' ' .$resp7d. '</b></li>    
       </ul>';
       
$v8 = '
       <!-- PYETJA 8 -->
       <h3>Question 8.</h3>
       <p>'. $roww8[2] .'</p>
           
       <p><b>Alternative question 8</b></p>
       <ul>
        <li>'. $roww8[3] . ' <b>' . $altansw8a . ' ' .$resp8a. '</b></li>
        <li>'. $roww8[4] . ' <b>' . $altansw8b . ' ' .$resp8b. '</b></li>
        <li>'. $roww8[5] . ' <b>' . $altansw8c . ' ' .$resp8c. '</b></li>
        <li>'. $roww8[6] . ' <b>' . $altansw8d . ' ' .$resp8d. '</b></li>    
       </ul>';
       
$v9 = '
       <!-- PYETJA 9 -->
       <h3>Question 9.</h3>
       <p>'. $roww9[2] .'</p>
           
       <p><b>Alternative question 9</b></p>
       <ul>
        <li>'. $roww9[3] . ' <b>' . $altansw9a . ' ' .$resp9a. '</b></li>
        <li>'. $roww9[4] . ' <b>' . $altansw9b . ' ' .$resp9b. '</b></li>
        <li>'. $roww9[5] . ' <b>' . $altansw9c . ' ' .$resp9c. '</b></li>
        <li>'. $roww9[6] . ' <b>' . $altansw9d . ' ' .$resp9d. '</b></li>    
       </ul>';
       
$v10 = '
       <!-- PYETJA 10 -->
       <h3>Question 10.</h3>
       <p>'. $roww10[2] .'</p>
           
       <p><b>Alternative question 10</b></p>
       <ul>
        <li>'. $roww10[3] . ' <b>' . $altansw10a . ' ' .$resp10a. '</b></li>
        <li>'. $roww10[4] . ' <b>' . $altansw10b . ' ' .$resp10b. '</b></li>
        <li>'. $roww10[5] . ' <b>' . $altansw10c . ' ' .$resp10c. '</b></li>
        <li>'. $roww10[6] . ' <b>' . $altansw10d . ' ' .$resp10d. '</b></li>    
       </ul>';

$default = '
  </td>
 </tr>
 

</table>';
}

$theEnd = '';
$theEnd .= $html;

        if($hiddenValue2 == "1")
            $theEnd = $theEnd . $v2;
        if($hiddenValue3 == "1")
            $theEnd = $theEnd . $v3;
        if($hiddenValue4 == "1")
            $theEnd = $theEnd . $v4;
        if($hiddenValue5 == "1")
            $theEnd = $theEnd . $v5;
        if($hiddenValue6 == "1")
            $theEnd = $theEnd . $v6;
        if($hiddenValue7 == "1")
            $theEnd = $theEnd . $v7;
        if($hiddenValue8 == "1")
            $theEnd = $theEnd . $v8;
        if($hiddenValue9 == "1")
            $theEnd = $theEnd . $v9;
        if($hiddenValue10 == "1")
            $theEnd = $theEnd . $v10;
        
        $theEnd = $theEnd . $default;

// output the HTML content
$pdf->writeHTML($theEnd, true, false, true, false, '');

// add a page
$pdf->AddPage();

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('ExamPDF.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
