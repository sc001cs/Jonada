<?php

session_start();

require ('mysql_connect.php');

$page_title = 'CIT Online Exam System';
include ('includes/header_login.html');



if (isset($errors) && !empty($errors)) {
    echo '<h4 class="alert alert-error text-center">Error!</h4>';
    foreach ($errors as $msg) {
        echo "$msg";
    }
    echo '</h4><h4 class="alert alert-error text-center">Provoni perseri.</h4>';
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['classroomname']))
        $classroomname = strip_tags($_POST['classroomname']);
    if (isset($_POST['ip1']))
        $ip1 = strip_tags($_POST['ip1']);
    if (isset($_POST['ip2']))
        $ip2 = strip_tags($_POST['ip2']);
    if (isset($_POST['deletedId']))
        $deletedId = strip_tags($_POST['deletedId']);

    if(isset($classroomname)) {
    $inserted = " insert into ip_range(classroomname, ip1, ip2) values (?, ?, ?)";

    $stmtInsert = mysqli_prepare($dbc, $inserted);
    mysqli_stmt_bind_param($stmtInsert, 'sss', $classroomname, $ip1, $ip2);
    mysqli_stmt_execute($stmtInsert);
    } elseif (isset($deletedId)) {
        $deleted = "delete from ip_range where id = ?";
        $stmtDelete = mysqli_prepare($dbc, $deleted);
        mysqli_stmt_bind_param($stmtDelete, 'd', $deletedId);
        mysqli_stmt_execute($stmtDelete);
    }

    $q = "select * from ip_range";

    $r = mysqli_query($dbc, $q);


}


?>

    <form class="form-inline nice-center-2" method="post" action="ipRangeClassrom.php" >
        <div class="nice-center-2">
        <label for="classroomname" style="color: red">Classroom name</label>
        <input type="text" class="form-control" id="classroomname" name="classroomname" required><br><br></div>
    <div class="form-group">

        <label for="ip1" style="color: red">192.168.1 : </label>
        <input type="text" class="form-control" id="ip1" name="ip1" required>
        <label for="ip2" style="color: red"> <- -> 192.168.1 : </label>
        <input type="text" class="form-control" id="ip2" name="ip2" required>
        <button type="submit" class="btn btn-default">Create IP range</button>
<!--        <input type="hidden" value="'.$studentSearch.'" />-->
    </div>
</form>

<?php

$q = "select * from ip_range";

$r = mysqli_query($dbc, $q);

if (mysqli_num_rows($r) > 0){
    echo '<br><table class="tables" class="tables table-hover"  cellspacing="3" cellpadding="3" width="75%">
	<tr>
		<td align="left"><h3 class="muted">List of IP Range: </h3></td>
	</tr>
        ';

    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        echo '      <tr>
            
			    <td align="left"><b style="color: red"> <i style="color: black">Classroom name: ' . $row['classroomname'] . '</i> -> 192.168.1.' . $row['ip1'] . ' - 192.168.1.' . $row['ip2'] . '</a></b>
			    <span style="float: right">
			    <form method="post" action="ipRangeClassrom.php" >
			        <input type="hidden" name="deletedId" value="'.$row['id'].'">
			        <input type="submit" value="X">
			    </form>
			    </span></td>
			
		</tr>
		';
    }

    echo '</table><br><br>';

} else {

    echo '<p class="alert alert-danger-danger text-center">No records on DB.</p>';
}

echo '<div class="nice-center">
<a class=\'btn btn-info btn-block\' href=\'adminpanel.php\'>Back</a>
</div>';

?>

<?php include ('includes/footer_login_1.html'); ?>