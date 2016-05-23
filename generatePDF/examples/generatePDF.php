<?php

session_start();

require ('../../mysql_connect.php');

if ((isset($_GET['idlecture'])) && (is_numeric($_GET['idlecture'])) && (!is_numeric($_GET['emrilendes']))) { // From view_users.php
    $id = $_GET['idlecture'];
    $emriLendes = $_GET['emrilendes'];
} elseif ((isset($_POST['idlecture'])) && (is_numeric($_POST['idlecture'])) && (!is_numeric($_POST['emrilendes']))) { // Form submission.
    $id = $_POST['idlecture'];
    $emriLendes = $_POST['emrilendes'];
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

// Valid user ID, show the form.
    // Get the user's information:
    $row = mysqli_fetch_array($r, MYSQLI_NUM);
    
    $roww1 = mysqli_fetch_array($rans1, MYSQLI_NUM); $roww2 = mysqli_fetch_array($rans2, MYSQLI_NUM); $roww3 = mysqli_fetch_array($rans3, MYSQLI_NUM);
    $roww4 = mysqli_fetch_array($rans4, MYSQLI_NUM); $roww5 = mysqli_fetch_array($rans5, MYSQLI_NUM); $roww6 = mysqli_fetch_array($rans6, MYSQLI_NUM);
    $roww7 = mysqli_fetch_array($rans7, MYSQLI_NUM); $roww8 = mysqli_fetch_array($rans8, MYSQLI_NUM); $roww9 = mysqli_fetch_array($rans9, MYSQLI_NUM);
    $roww10 = mysqli_fetch_array($rans10, MYSQLI_NUM);

    $altansw1 = $roww1[7]; $altansw2 = $roww2[7]; $altansw3 = $roww3[7]; $altansw4 = $roww4[7]; $altansw5 = $roww5[7]; 
    $altansw6 = $roww6[7]; $altansw7 = $roww7[7]; $altansw8 = $roww8[7]; $altansw9 = $roww9[7]; $altansw10 = $roww10[7];
    
    $altansw1a = ($altansw1=='A')?"( X )":""; $altansw1b = ($altansw1=='B')?"( X )":""; $altansw1c = ($altansw1=='C')?"( X )":""; $altansw1d = ($altansw1=='D')?"( X )":"";
    $altansw2a = ($altansw2=='A')?"( X )":""; $altansw2b = ($altansw2=='B')?"( X )":""; $altansw2c = ($altansw2=='C')?"( X )":""; $altansw2d = ($altansw2=='D')?"( X )":"";
    $altansw3a = ($altansw3=='A')?"( X )":""; $altansw3b = ($altansw3=='B')?"( X )":""; $altansw3c = ($altansw3=='C')?"( X )":""; $altansw3d = ($altansw3=='D')?"( X )":"";
    $altansw4a = ($altansw4=='A')?"( X )":""; $altansw4b = ($altansw4=='B')?"( X )":""; $altansw4c = ($altansw4=='C')?"( X )":""; $altansw4d = ($altansw4=='D')?"( X )":"";
    $altansw5a = ($altansw5=='A')?"( X )":""; $altansw5b = ($altansw5=='B')?"( X )":""; $altansw5c = ($altansw5=='C')?"( X )":""; $altansw5d = ($altansw5=='D')?"( X )":"";
    $altansw6a = ($altansw6=='A')?"( X )":""; $altansw6b = ($altansw6=='B')?"( X )":""; $altansw6c = ($altansw6=='C')?"( X )":""; $altansw6d = ($altansw6=='D')?"( X )":"";
    $altansw7a = ($altansw7=='A')?"( X )":""; $altansw7b = ($altansw7=='B')?"( X )":""; $altansw7c = ($altansw7=='C')?"( X )":""; $altansw7d = ($altansw7=='D')?"( X )":"";
    $altansw8a = ($altansw8=='A')?"( X )":""; $altansw8b = ($altansw8=='B')?"( X )":""; $altansw8c = ($altansw8=='C')?"( X )":""; $altansw8d = ($altansw8=='D')?"( X )":"";
    $altansw9a = ($altansw9=='A')?"( X )":""; $altansw9b = ($altansw9=='B')?"( X )":""; $altansw9c = ($altansw9=='C')?"( X )":""; $altansw9d = ($altansw9=='D')?"( X )":"";
    $altansw10a = ($altansw10=='A')?"( X )":""; $altansw10b = ($altansw10=='B')?"( X )":""; $altansw10c = ($altansw10=='C')?"( X )":""; $altansw10d = ($altansw10=='D')?"( X )":"";
    
    $hiddenValue1 = $roww1[8]; $hiddenValue2 = $roww2[8]; $hiddenValue3 = $roww3[8]; $hiddenValue4 = $roww4[8]; $hiddenValue5 = $roww5[8]; 
    $hiddenValue6 = $roww6[8]; $hiddenValue7 = $roww7[8]; $hiddenValue8 = $roww8[8]; $hiddenValue9 = $roww9[8]; $hiddenValue10 = $roww10[8];
    
    $deanFac = 'Prof. Petraq Papajorgji';
    
    

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
<h3 class="header-text">'.''.$row[1].'</h3>        

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
       <div id="v1">
       <h3>Question 1.</h3>
       <p>'. $roww1[2] .'</p>
           
       <p><b>Alternative question 1</b></p>
       <ul>
        <li>'. $roww1[3] . ' <b>' . $altansw1a . '</b></li>
        <li>'. $roww1[4] . ' <b>' . $altansw1b . '</b></li>
        <li>'. $roww1[5] . ' <b>' . $altansw1c . '</b></li>
        <li>'. $roww1[6] . ' <b>' . $altansw1d . '</b></li>    
       </ul> </div>';
       
$v2 = '
       <!-- PYETJA 2 -->
       <div id="v2">
       <h3>Question 2.</h3>
       <p>'. $roww2[2] .'</p>
           
       <p><b>Alternative question 2</b></p>
       <ul>
        <li>'. $roww2[3] . ' <b>' . $altansw2a . '</b></li>
        <li>'. $roww2[4] . ' <b>' . $altansw2b . '</b></li>
        <li>'. $roww2[5] . ' <b>' . $altansw2c . '</b></li>
        <li>'. $roww2[6] . ' <b>' . $altansw2d . '</b></li>    
       </ul></div >';
 
$v3 = '
       <!-- PYETJA 3 -->
       <div id="v3">
       <h3>Question 3.</h3>
       <p>'. $roww3[2] .'</p>
           
       <p><b>Alternative question 3</b></p>
       <ul>
        <li>'. $roww3[3] . ' <b>' . $altansw3a . '</b></li>
        <li>'. $roww3[4] . ' <b>' . $altansw3b . '</b></li>
        <li>'. $roww3[5] . ' <b>' . $altansw3c . '</b></li>
        <li>'. $roww3[6] . ' <b>' . $altansw3d . '</b></li>    
       </ul></div >';
  
$v4 = '        
       <!-- PYETJA 4 -->
       <div id="v4">
       <h3>Question 4.</h3>
       <p>'. $roww4[2] .'</p>
           
       <p><b>Alternative question 4</b></p>
       <ul>
        <li>'. $roww4[3] . ' <b>' . $altansw4a . '</b></li>
        <li>'. $roww4[4] . ' <b>' . $altansw4b . '</b></li>
        <li>'. $roww4[5] . ' <b>' . $altansw4c . '</b></li>
        <li>'. $roww4[6] . ' <b>' . $altansw4d . '</b></li>    
       </ul></div >';

$v5 = '
       <!-- PYETJA 5 -->
       <div id="v5">
       <h3>Question 5.</h3>
       <p>'. $roww5[2] .'</p>
           
       <p><b>Alternative question 5</b></p>
       <ul>
        <li>'. $roww5[3] . ' <b>' . $altansw5a . '</b></li>
        <li>'. $roww5[4] . ' <b>' . $altansw5b . '</b></li>
        <li>'. $roww5[5] . ' <b>' . $altansw5c . '</b></li>
        <li>'. $roww5[6] . ' <b>' . $altansw5d . '</b></li>    
       </ul></div >';
      
$v6 = '        
       <!-- PYETJA 6 -->
       <div id="v6">
       <h3>Question 6.</h3>
       <p>'. $roww6[2] .'</p>
           
       <p><b>Alternative question 6</b></p>
       <ul>
        <li>'. $roww6[3] . ' <b>' . $altansw6a . '</b></li>
        <li>'. $roww6[4] . ' <b>' . $altansw6b . '</b></li>
        <li>'. $roww6[5] . ' <b>' . $altansw6c . '</b></li>
        <li>'. $roww6[6] . ' <b>' . $altansw6d . '</b></li>    
       </ul></div >';

$v7 = '
       <!-- PYETJA 7 -->
       <div id="v7">
       <h3>Question 7.</h3>
       <p>'. $roww7[2] .'</p>
           
       <p><b>Alternative question 7</b></p>
       <ul>
        <li>'. $roww7[3] . ' <b>' . $altansw7a . '</b></li>
        <li>'. $roww7[4] . ' <b>' . $altansw7b . '</b></li>
        <li>'. $roww7[5] . ' <b>' . $altansw7c . '</b></li>
        <li>'. $roww7[6] . ' <b>' . $altansw7d . '</b></li>    
       </ul></div >';

$v8 = '        
       <!-- PYETJA 8 -->
       <div id="v8">
       <h3>Question 8.</h3>
       <p>'. $roww8[2] .'</p>
           
       <p><b>Alternative question 8</b></p>
       <ul>
        <li>'. $roww8[3] . ' <b>' . $altansw8a . '</b></li>
        <li>'. $roww8[4] . ' <b>' . $altansw8b . '</b></li>
        <li>'. $roww8[5] . ' <b>' . $altansw8c . '</b></li>
        <li>'. $roww8[6] . ' <b>' . $altansw8d . '</b></li>    
       </ul></div >';
    
$v9 = '
       <!-- PYETJA 9 -->
       <div id="v9">
       <h3>Question 9.</h3>
       <p>'. $roww9[2] .'</p>
           
       <p><b>Alternative question 9</b></p>
       <ul>
        <li>'. $roww9[3] . ' <b>' . $altansw9a . '</b></li>
        <li>'. $roww9[4] . ' <b>' . $altansw9b . '</b></li>
        <li>'. $roww9[5] . ' <b>' . $altansw9c . '</b></li>
        <li>'. $roww9[6] . ' <b>' . $altansw9d . '</b></li>    
       </ul></div >';
  
$v10 = '
       <!-- PYETJA 10 -->
       <div id="10">
       <h3>Question 10.</h3>
       <p>'. $roww10[2] .'</p>
        
       <p><b>Alternative question 10</b></p>
       <ul>
        <li>'. $roww10[3] . ' <b>' . $altansw10a . '</b></li>
        <li>'. $roww10[4] . ' <b>' . $altansw10b . '</b></li>
        <li>'. $roww10[5] . ' <b>' . $altansw10c . '</b></li>
        <li>'. $roww10[6] . ' <b>' . $altansw10d . '</b></li>    
       </ul></div >';

$default = '
  </td>
 </tr>
 

</table>';

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
