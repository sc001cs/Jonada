<?php

session_start();

require ('../../mysql_connect.php');

if ((isset($_GET['idlecture'])) && (is_numeric($_GET['idlecture']))) { // From view_users.php
    $id = $_GET['idlecture'];
} elseif ((isset($_POST['idlecture'])) && (is_numeric($_POST['idlecture']))) { // Form submission.
    $id = $_POST['idlecture'];
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

$qListStudent = " select sl.fullname, ea.theResult from student_lecturer 
    sl inner join exam_answer ea on ea.id_student = sl.id where ea.id_lecture = $id ";

$qListStudent1 = " select sl.fullname, sl.username from student_exam se inner join lecture l on se.id_lecture = l.id_lecture 
  inner join student_lecturer sl on sl.username = se.username where  l.id_lecture = $id ";

$rListStudent = @mysqli_query($dbc, $qListStudent);
$rListStudent1 = @mysqli_query($dbc, $qListStudent1);

if (mysqli_num_rows($r) == 1) { // Valid user ID, show the form.

    $row = mysqli_fetch_array($r, MYSQLI_NUM);
    $studentArray = array();
    
    while( $stud = mysqli_fetch_array( $rListStudent)){
        array_push($studentArray, $stud); // Inside while loop
    }
    
    $studentArray1 = array();
    while( $stud1 = mysqli_fetch_array( $rListStudent1)){
        array_push($studentArray1, $stud1); // Inside while loop
    }
    
    
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
           
       <p><b>List of students</b></p>
       <ol>';

$html2 = '';

$count = 0;
$countTotal = 0;
$empty = 0;

//foreach($studentArray1 as $s) {
foreach ($studentArray as $student) {

    
            $html2 .= '<li> - ' . $student[0] . ' - ' . $student[1] . ' % </li>';
            $count++;
            $countTotal += $student[1];
    }
//}

    $default = '
       </ol>
       
 <h3><b>The average is : '.$countTotal/$count.' %</h3></b>
  </td>
 
 </tr>
 

</table>
';
}

$theEnd = '';
$theEnd .= $html;
$theEnd .= $html2;
        
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
