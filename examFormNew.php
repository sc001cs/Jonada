<?php
session_start();

$page_title = 'CIT Online Exam System';
include ('includes/header_silabus.html');

require ('mysql_connect.php');

$qrowsQ = " select * from ip_range ";
$rowsQ = mysqli_query($dbc, $qrowsQ);

?>
<?php
echo '


<ul class="nav nav-pills" >
    <li><a href="#Pergjithshme" data-toggle="tab">General data</a></li>
    <li><a href="#QuestionsAnswers" data-toggle="tab">Create the asnwers and questions</a></li>
</ul>

<div class="border-menu"></div>

<div class="tab-content">

    <div class="tab-pane active" id="Pergjithshme">        

        <form class="form-horizontal" action="examFormNew.php" method="POST">

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
                <input class="input-mesatarrr" type="text" style="width: 466px;" id="prependedInput"  name="coursetitle"   />
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
                <input class="input-mesatarrr" type="text" style="width: 466px;" id="prependedInput"  name="dean"   />
            </div>
            <br>

            <div class="input-prepend ">
                <span class="add-on">Email</span>
                <input class="input-mesatarrr" type="text" style="width: 466px;" id="prependedInput"  name="email"   />
            </div>

            <div class="input-prepend ">
                <span class="add-on">Lecturer</span>
                <input class="input-mesatarrr" type="text" style="width: 466px;" id="prependedInput"  name="lecturer"   />
            </div>

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
                <span class="add-on">Code Activation</span>
                <input class="input-mesatarrr" type="text" style="width: 466px;" id="prependedInput"  name="codeactivation"
                       name="codeactivation" />
            </div>

    </div>

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

        <div class="control-group" id="div1" >
            <input type="hidden" name="hiddenValue1" id="hiddenValue1" value="1">
            <p class="control-p text-warning" for="pyetja1">Question 1</p>
            <div class="controls">
                <textarea class="text-area-large-areaa" id="pyetja1" name="pyetja1"></textarea>
                <input type="hidden" name="hidden1" id="hidden1" value="1">
            </div>
            <p class="control-p text-warning" for="alter1">Alternative question 1</p>
            <div class="radio">
                <p>
                    <input type="radio" name="alter1" id="alter1a" value="A" checked>
                    <input type="text" class="form-control" id="alter1a" name="alter1a">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter1" id="alter1b" value="B">
                    <input type="text" class="form-control" id="alter1b" name="alter1b">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter1" id="alter1c" value="C">
                    <input type="text" class="form-control" id="alter1c" name="alter1c">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter1" id="alter1d" value="D">
                    <input type="text" class="form-control" id="alter1d" name="alter1d">
                </p>
            </div>
             <div class="border-question"></div>
        </div>
       


        <!-- PYETJA 2 -->

        <div class="control-group" style="display: none;"  id="div2" >
            <input type="hidden" name="hiddenValue2" id="hiddenValue2" value="0">
            <p class="control-p text-warning" for="pyetja1">Question 2</p>
            <div class="controls">
                <input type="hidden" name="hidden2" id="hidden2" value="2">
                <textarea class="text-area-large-areaa" id="pyetja2" name="pyetja2"></textarea>
            </div>
            <p class="control-p text-warning" for="alter2">Alternative question 2</p>
            <div class="radio">
                <p>
                    <input type="radio" name="alter2" id="alter2a" value="A" checked>
                    <input type="text" class="form-control" id="alter2a" name="alter2a">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter2" id="alter2b" value="B">
                    <input type="text" class="form-control" id="alter2b" name="alter2b">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter2" id="alter2c" value="C">
                    <input type="text" class="form-control" id="alter1c" name="alter2c">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter2" id="alter2d" value="D">
                    <input type="text" class="form-control" id="alter2d" name="alter2d">
                </p>
            </div>
             <div class="border-question"></div>
        </div>
       


        <!-- PYETJA 3 -->

        <div class="control-group" style="display: none;" id="div3" >
            <input type="hidden" name="hiddenValue3" id="hiddenValue3" value="0">
            <p class="control-p text-warning" for="pyetja3">Question 3</p>
            <div class="controls">
                <input type="hidden" name="hidden3" id="hidden3" value="3">
                <textarea class="text-area-large-areaa" id="pyetja3" name="pyetja3"></textarea>
            </div>
            <p class="control-p text-warning" for="alter3">Alternative question 3</p>
            <div class="radio">
                <p>
                    <input type="radio" name="alter3" id="alter3a" value="A" checked>
                    <input type="text" class="form-control" id="alter3a" name="alter3a">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter3" id="alter3b" value="B">
                    <input type="text" class="form-control" id="alter3b" name="alter3b">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter3" id="alter3c" value="C">
                    <input type="text" class="form-control" id="alter3c" name="alter3c">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter3" id="alter3d" value="D">
                    <input type="text" class="form-control" id="alter3d" name="alter3d">
                </p>
            </div>
             <div class="border-question"></div>
        </div>
       


        <!-- PYETJA 4 -->

        <div class="control-group" style="display: none;" id="div4" >
            <input type="hidden" name="hiddenValue4" id="hiddenValue4" value="0">
            <p class="control-p text-warning" for="pyetja4">Question 4</p>
            <div class="controls">
                <input type="hidden" name="hidden4" id="hidden4" value="4">
                <textarea class="text-area-large-areaa" id="pyetja4" name="pyetja4"></textarea>
            </div>
            <p class="control-p text-warning" for="alter4">Alternative question 4</p>
            <div class="radio">
                <p>
                    <input type="radio" name="alter4" id="alter4a" value="A" checked>
                    <input type="text" class="form-control" id="alter4a" name="alter4a">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter4" id="alter4b" value="B">
                    <input type="text" class="form-control" id="alter1b" name="alter4b">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter4" id="alter4c" value="C">
                    <input type="text" class="form-control" id="alter4c" name="alter4c">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter4" id="alter4d" value="D">
                    <input type="text" class="form-control" id="alter4d" name="alter4d">
                </p>
            </div>
             <div class="border-question"></div>
        </div>
       


        <!-- PYETJA 5 -->

        <div class="control-group" style="display: none;" id="div5" >
            <input type="hidden" name="hiddenValue5" id="hiddenValue5" value="0">
            <p class="control-p text-warning" for="pyetja1">Question 5</p>
            <div class="controls">
                <input type="hidden" name="hidden5" id="hidden5" value="5">
                <textarea class="text-area-large-areaa" id="pyetja5" name="pyetja5"></textarea>
            </div>
            <p class="control-p text-warning" for="alter1">Alternative question 5</p>
            <div class="radio">
                <p>
                    <input type="radio" name="alter5" id="alter5a" value="A" checked>
                    <input type="text" class="form-control" id="alter5a" name="alter5a">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter5" id="alter5b" value="B">
                    <input type="text" class="form-control" id="alter5b" name="alter5b">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter5" id="alter5c" value="C">
                    <input type="text" class="form-control" id="alter5c" name="alter5c">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter5" id="alter5d" value="D">
                    <input type="text" class="form-control" id="alter5d" name="alter5d">
                </p>
            </div>
             <div class="border-question"></div>
        </div>
       


        <!-- PYETJA 6 -->

        <div class="control-group" style="display: none;" id="div6" >
            <input type="hidden" name="hiddenValue6" id="hiddenValue6" value="0">
            <p class="control-p text-warning" for="pyetja6">Question 6</p>
            <div class="controls">
                <input type="hidden" name="hidden6" id="hidden6" value="6">
                <textarea class="text-area-large-areaa" id="pyetja6" name="pyetja6"></textarea>
            </div>
            <p class="control-p text-warning" for="alter6">Alternative question 6</p>
            <div class="radio">
                <p>
                    <input type="radio" name="alter6" id="alter6a" value="A" checked>
                    <input type="text" class="form-control" id="alter6a" name="alter6a">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter6" id="alter6b" value="B">
                    <input type="text" class="form-control" id="alter6b" name="alter6b">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter6" id="alter6c" value="C">
                    <input type="text" class="form-control" id="alter6c" name="alter6c">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter6" id="alter6d" value="D">
                    <input type="text" class="form-control" id="alter6d" name="alter6d">
                </p>
            </div>
              <div class="border-question"></div>
        </div>
      


        <!-- PYETJA 7 -->

        <div class="control-group" style="display: none;" id="div7" >
            <input type="hidden" name="hiddenValue7" id="hiddenValue7" value="0">
            <p class="control-p text-warning" for="pyetja7">Question 7</p>
            <div class="controls">
                <input type="hidden" name="hidden7" id="hidden7" value="7">
                <textarea class="text-area-large-areaa" id="pyetja7" name="pyetja7"></textarea>
            </div>
            <p class="control-p text-warning" for="alter7">Alternative question 7</p>
            <div class="radio">
                <p>
                    <input type="radio" name="alter7" id="alter7a" value="A" checked>
                    <input type="text" class="form-control" id="alter7a" name="alter7a">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter7" id="alter7b" value="B">
                    <input type="text" class="form-control" id="alter7b" name="alter7b">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter7" id="alter7c" value="C">
                    <input type="text" class="form-control" id="alter7c" name="alter7c">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter7" id="alter7d" value="D">
                    <input type="text" class="form-control" id="alter7d" name="alter7d">
                </p>
            </div>
             <div class="border-question"></div>
        </div>
       


        <!-- PYETJA 8 -->

        <div class="control-group" style="display: none;" id="div8" >
            <input type="hidden" name="hiddenValue8" id="hiddenValue8" value="0">
            <p class="control-p text-warning" for="pyetja8">Question 8</p>
            <div class="controls">
                <input type="hidden" name="hidden8" id="hidden8" value="8">
                <textarea class="text-area-large-areaa" id="pyetja8" name="pyetja8"></textarea>
            </div>
            <p class="control-p text-warning" for="alter8">Alternative question 8</p>
            <div class="radio">
                <p>
                    <input type="radio" name="alter8" id="alter8a" value="A" checked>
                    <input type="text" class="form-control" id="alter8a" name="alter8a">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter8" id="alter8b" value="B">
                    <input type="text" class="form-control" id="alter8b" name="alter8b">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter8" id="alter1c" value="C">
                    <input type="text" class="form-control" id="alter8c" name="alter8c">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter8" id="alter8d" value="D">
                    <input type="text" class="form-control" id="alter8d" name="alter8d">
                </p>
            </div>
             <div class="border-question"></div>
        </div>
       


        <!-- PYETJA 9 -->

        <div class="control-group" style="display: none;"  id="div9" >
            <input type="hidden" name="hiddenValue9" id="hiddenValue9" value="0">
            <p class="control-p text-warning" for="pyetja9">Question 9</p>
            <div class="controls">
                <input type="hidden" name="hidden9" id="hidden9" value="9">
                <textarea class="text-area-large-areaa" id="pyetja9" name="pyetja9"></textarea>
            </div>
            <p class="control-p text-warning" for="alter9">Alternative question 9</p>
            <div class="radio">
                <p>
                    <input type="radio" name="alter9" id="alter9a" value="A" checked>
                    <input type="text" class="form-control" id="alter9a" name="alter9a">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter9" id="alter9b" value="B">
                    <input type="text" class="form-control" id="alter9b" name="alter9b">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter9" id="alter9c" value="C">
                    <input type="text" class="form-control" id="alter9c" name="alter9c">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter9" id="alter9d" value="D">
                    <input type="text" class="form-control" id="alter9d" name="alter9d">
                </p>
            </div>
            <div class="border-question"></div>
        </div>
        


        <!-- PYETJA 10 -->

        <div class="control-group" style="display: none;"  id="div10" >
            <input type="hidden" name="hiddenValue10" id="hiddenValue10" value="0">
            <p class="control-p text-warning" for="pyetja10">Question 10</p>
            <div class="controls">
                <input type="hidden" name="hidden10" id="hidden10" value="10">
                <textarea class="text-area-large-areaa" id="pyetja10" name="pyetja10"></textarea>
            </div>
            <p class="control-p text-warning" for="alter10">Alternative question 10</p>
            <div class="radio">
                <p>
                    <input type="radio" name="alter10" id="alter10a" value="A" checked>
                    <input type="text" class="form-control" id="alter10a" name="alter10a">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter10" id="alter10b" value="B">
                    <input type="text" class="form-control" id="alter10b" name="alter10b">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter10" id="alter10c" value="C">
                    <input type="text" class="form-control" id="alter10c" name="alter10c">
                </p>
            </div>
            <div class="radio">
                <p>
                    <input type="radio" name="alter10" id="alter10d" value="D">
                    <input type="text" class="form-control" id="alter10d" name="alter10d">
                </p>
            </div>
            <div class="border-question"></div>
        </div>
        
    </div>



    <div class="control-group">
        <div class="controls">
            <button type="submit" class="btn btn-info btn-block text-center">Save the exam</button>
            <br>
            <p align="center" class="table"><a class="btn btn-info btn-block text-center" 
                                               href="http://localhost/jonada/welcome.php">Back</a>
        </div>
    </div>
</form>

<script>

    var count = 2;
    var divAcces;
    var changeVisible;

    function addQuestion() {
        
        divAcces = "#div" + count;
        changeVisible = "hiddenValue" + count;
        
        $(divAcces).removeAttr("style");
        document.getElementById(changeVisible).value = "1";
        
        console.log(count);
        console.log(divAcces);
        console.log(changeVisible);
        count++;
    }
</script>       ';
?>
        
<?php
// Check if the form has been submitted:
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

//        require ('pjesapare.php');
        
//        $emrilendes = ($_POST['emrilendes']);
////        $emri = ($_POST['emri']);
//        $tipology = ($_POST['tipology']);
////        $academicyear = ($_POST['academicyear']);
//        $mandatoy = ($_POST['mandatoy']);
//        $codelecture = ($_POST['lecturecode']);
//        $email = ($_POST['email']);  
//		$classroom = ($_POST['classroom']);  
//        $department = ($_POST['department']);
        
        $school = ($_POST['school']); $programs = ($_POST['programs']); $department = ($_POST['department']);
        $academicYear = ($_POST['academicYear']); $coursetitle = ($_POST['coursetitle']);
        $type = ($_POST['type']); $term = ($_POST['term']); $dean = ($_POST['dean']);
        $email = ($_POST['email']); $lecturer = ($_POST['lecturer']); 
        $classroom = ($_POST['classroom']); $codeactivation = ($_POST['codeactivation']); 
        
        
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

        $hidden1 = $_POST['hidden1']; $hidden2 = $_POST['hidden2']; $hidden3 = $_POST['hidden3']; $hidden4 = $_POST['hidden4']; $hidden5 = $_POST['hidden5']; 
        $hidden6 = $_POST['hidden6']; $hidden7 = $_POST['hidden7']; $hidden8 = $_POST['hidden8']; $hidden9 = $_POST['hidden9']; $hidden10 = $_POST['hidden10']; 
        
        $hiddenValue1 = $_POST['hiddenValue1']; $hiddenValue2 = $_POST['hiddenValue2']; $hiddenValue3 = $_POST['hiddenValue3']; $hiddenValue4 = $_POST['hiddenValue4']; $hiddenValue5 = $_POST['hiddenValue5']; 
        $hiddenValue6 = $_POST['hiddenValue6']; $hiddenValue7 = $_POST['hiddenValue7']; $hiddenValue8 = $_POST['hiddenValue8']; $hiddenValue9 = $_POST['hiddenValue9']; $hiddenValue10 = $_POST['hiddenValue10']; 
        
        $qUpdateGeneral =  " insert into lecture "
                  . " (school, programs, department, academicYear, coursetitle, type, "
                . "term, dean, email, lecturer, fullname, classroom, codeactivation, id_lecturer) "
       . " values('$school', '$programs', '$department', '$academicYear', '$coursetitle', '$type', "
                . "'$term', '$dean', '$email', '$lecturer', '$lecturer', '$classroom', '$codeactivation', '{$_SESSION['id']}')";
                
        $qGetIdLecture = " select id_lecture "
                       . " from lecture order by id_lecture desc limit 1 ";
        $rIdLecture = @mysqli_query($dbc, $qGetIdLecture);
        $row = mysqli_fetch_array($rIdLecture, MYSQLI_NUM);
        $idLecture = $row[0] + 1;
        
        $qUpdateQuestionAnswer1 = " insert into exam_question "
                                . " (orders, question, answer1, answer2, answer3, answer4, finalanswer, visibility, id_lecture) "
                                . " values('$hidden1', '$pyetja1', '$alter1a', '$alter1b', '$alter1c', '$alter1d', '$alter1', '$hiddenValue1', '$idLecture')";
        $qUpdateQuestionAnswer2 = " insert into exam_question "
                                . " (orders, question, answer1, answer2, answer3, answer4, finalanswer, visibility, id_lecture) "
                                . " values('$hidden2', '$pyetja2', '$alter2a', '$alter2b', '$alter2c', '$alter2d', '$alter2', '$hiddenValue2', '$idLecture')";
        $qUpdateQuestionAnswer3 = " insert into exam_question "
                                . " (orders, question, answer1, answer2, answer3, answer4, finalanswer, visibility, id_lecture) "
                                . " values('$hidden3', '$pyetja3', '$alter3a', '$alter3b', '$alter3c', '$alter3d', '$alter3', '$hiddenValue3', '$idLecture')";
        $qUpdateQuestionAnswer4 = " insert into exam_question "
                                . " (orders, question, answer1, answer2, answer3, answer4, finalanswer, visibility, id_lecture) "
                                . " values('$hidden4', '$pyetja4', '$alter4a', '$alter4b', '$alter4c', '$alter4d', '$alter4', '$hiddenValue4', '$idLecture')";
        $qUpdateQuestionAnswer5 = " insert into exam_question "
                                . " (orders, question, answer1, answer2, answer3, answer4, finalanswer, visibility, id_lecture) "
                                . " values('$hidden5', '$pyetja5', '$alter5a', '$alter5b', '$alter5c', '$alter5d', '$alter5', '$hiddenValue5', '$idLecture')";
        $qUpdateQuestionAnswer6 = " insert into exam_question "
                                . " (orders, question, answer1, answer2, answer3, answer4, finalanswer, visibility, id_lecture) "
                                . " values('$hidden6', '$pyetja6', '$alter6a', '$alter6b', '$alter6c', '$alter6d', '$alter6', '$hiddenValue6', '$idLecture')";
        $qUpdateQuestionAnswer7 = " insert into exam_question "
                                . " (orders, question, answer1, answer2, answer3, answer4, finalanswer, visibility, id_lecture) "
                                . " values('$hidden7', '$pyetja7', '$alter7a', '$alter7b', '$alter7c', '$alter7d', '$alter7', '$hiddenValue7', '$idLecture')";
        $qUpdateQuestionAnswer8 = " insert into exam_question "
                                . " (orders, question, answer1, answer2, answer3, answer4, finalanswer, visibility, id_lecture) "
                                . " values('$hidden8', '$pyetja8', '$alter8a', '$alter8b', '$alter8c', '$alter8d', '$alter8', '$hiddenValue8', '$idLecture')";
        $qUpdateQuestionAnswer9 = " insert into exam_question "
                                . " (orders, question, answer1, answer2, answer3, answer4, finalanswer, visibility, id_lecture) "
                                . " values('$hidden9', '$pyetja9', '$alter9a', '$alter9b', '$alter9c', '$alter9d', '$alter9', '$hiddenValue9', '$idLecture')";
        $qUpdateQuestionAnswer10 = " insert into exam_question "
                                . " (orders, question, answer1, answer2, answer3, answer4, finalanswer, visibility, id_lecture) "
                                . " values('$hidden10', '$pyetja10', '$alter10a', '$alter10b', '$alter10c', '$alter10d', '$alter10', '$hiddenValue10', '$idLecture')";
        
                  
        $r = @mysqli_query($dbc, $qUpdateGeneral);
        $a1 = @mysqli_query($dbc, $qUpdateQuestionAnswer1);
        $a2 = @mysqli_query($dbc, $qUpdateQuestionAnswer2);
        $a3 = @mysqli_query($dbc, $qUpdateQuestionAnswer3);
        $a4 = @mysqli_query($dbc, $qUpdateQuestionAnswer4);
        $a5 = @mysqli_query($dbc, $qUpdateQuestionAnswer5);
        $a6 = @mysqli_query($dbc, $qUpdateQuestionAnswer6);
        $a7 = @mysqli_query($dbc, $qUpdateQuestionAnswer7);
        $a8 = @mysqli_query($dbc, $qUpdateQuestionAnswer8);
        $a9 = @mysqli_query($dbc, $qUpdateQuestionAnswer9);
        $a10 = @mysqli_query($dbc, $qUpdateQuestionAnswer10);
        if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.
            // Print a message:
          
//            echo $qUpdateGeneral;
//            
//            echo $qUpdateQuestionAnswer1;
//            
//            echo $qUpdateQuestionAnswer2;
//            
//            echo $qUpdateQuestionAnswer3;
//            
//            echo $qUpdateQuestionAnswer4;
//            
//            echo $qUpdateQuestionAnswer5;
//            
//            echo $qUpdateQuestionAnswer6;
//            
//            echo $qUpdateQuestionAnswer7;
//            
//            echo $qUpdateQuestionAnswer8;
//            
//            echo $qUpdateQuestionAnswer9;
//            
//            echo $qUpdateQuestionAnswer10;
            
            echo '<p class="alert alert-success text-center">Successful update</p>'
            . '<p align="center" class="table"><a class="btn btn-info btn-block text-center" href="http://localhost/jonada/welcome.php">Back to exams</a></p>';
        } else { // If it did not run OK.
            echo '<p class="alert alert-error text-center"">Fail to update the data</p>'; 
            
            echo $qUpdateGeneral;
            echo $idLecture;
            echo mysqli_affected_rows($dbc);
            echo $qUpdateQuestionAnswer1;
            
        }
    }


    mysqli_close($dbc);

    include ('includes/footer_login.html');
    ?>