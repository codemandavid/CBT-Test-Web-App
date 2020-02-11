<?php
session_start();
 if(!isset($_SESSION['user_id'])){
header("Location: index.php");
}?>
<?php 
include_once("../inc/system.php");  
if(isset($_COOKIE['admin'])){
$loger_in = $_COOKIE['admin'];
}else {
$loger_in ="";
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>CBT | Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="../assets/css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="../assets/css/bootswatch.min.css">
   
      <script src="../bower_components/bootstrap/assets/js/html5shiv.js"></script>
      <script src="../bower_components/bootstrap/assets/js/respond.min.js"></script>
     <script src="../assets/js/index.js" language="Javascript"></script>
    <link rel="stylesheet" type="text/css" href="../assets/css/stylesheet.css">
     <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="../index.php" class="navbar-brand">Computer Based Test (CBT)</a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">User<span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="themes">
                
                <li class="divider"></li>
				<li><a href="admin.php?action=add_user">Add User Single</a></li>
                <li><a href="admin.php?action=add_user_bulk">Add User Bulk</a></li>
                <li><a href="admin.php?action=print">Print Student Slip & SMS Parent</a></li>
                <li><a href="admin.php?action=extra">Extra-Activites</a></li>
                
              </ul>
            </li>
            
            
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download">Edit Section<span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="download">
              <li><a href="admin.php?action=populatesub">Populate Subject</a></li>
			  <li><a href="admin.php?action=quest_num">Questions Number</a></li>
			  <li class="divider"></li>
			    <li><a href="admin.php?action=insert_time">Insert Timing</a></li>
                <li><a href="admin.php?action=insert_question_bulk">Insert Question</a></li>
                <li><a href="admin.php?action=sms_log">View SMS Log</a></li>
                
                <!--<li><a href="admin.php?action=populatequest">Insert Question</a></li>
                <li><a href="admin.php?action=answer">Insert Answer</a></li>-->
                <li><a href="admin.php?action=delete">Delete Subject</a></li>
              </ul>
            </li>
			
			<li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download">Reset<span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="download">
                <li class="divider"></li>
                <li><a  onclick="sosure();" style="cursor:pointer;"><input type="hidden" id="reset_user" value="admin.php?action=reset_userdb" />Reset User db</a></li>
				<li><a  onclick="sosureq();" style="cursor:pointer;"><input type="hidden" id="reset_question" value="admin.php?action=question" />Reset Question db</a></li>
               
              </ul>
            </li>
			<li>
              <a href="admin.php?logout=out">Log Out</a>
            </li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="admin.php" target="_blank">Administrator @<?php echo $loger_in; ?></a></li>
            <li><a href="" target="_blank"></a></li>
          </ul>

        </div>
      </div>
    </div>
  </head>
  <body>
    <?php  
	$subjects_all = all_subjects();
$sql = "SELECT * FROM `student`";
$result  = query($sql);
$mysql_rows  = $result->num_rows;

	$finished_student = 0;
	$finish_exam = "yes";
for($i=0;$i<$mysql_rows;$i++){
	$row = $result->fetch_array();
	$firstname  = stripslashes($row['firstname']);
	//echo 'My firstname is '.$firstname.'<br/>';
	
	//$length  = sizeof($subjects_all);
	foreach($subjects_all as $done){
			$value = stripslashes($row[''.$done.'']);
			//echo 'This is '.$value.'<br/>';
			//echo 'The subject '.$done;
			if($value==""){
				$finish_exam  = "no";
				}
			}
		
	  if($finish_exam=="yes"){
		  $finished_student  = $finished_student + 1;
		  }
	$finish_exam = "yes";
	}
	
	//echo $mysql_rows;
	$finished_students = round(($finished_student/$mysql_rows) * 100);
	//echo $finished_students;
	echo '<h3 id="progress-animated">Exam Progress |  '.$finished_students.'% of the students have finished the exam</h3>
            <div class="bs-example">
              <div class="progress progress-striped active">
                <div class="progress-bar" style="width: '.$finished_students.'%"></div>
              </div>
            </div>';
			
	if(isset($_GET['logout'])){
unset ($_COOKIE['status']);
unset($_SESSION['user_id']);
session_unset();
session_destroy();
//header("Location: admin.php");
}
if(isset($_POST['question'])){
$question_text = $_POST['questions'];;
$subject_name = $_POST['subject'];

$option = '';
$others = array();
$questions = preg_split("[\n]",$question_text);

$lengths = sizeof($questions);

if($lengths< 2){
echo '<div class="row">
          <div class="col-lg-12" width="400px">
            <div class="bs-example">
              <div class="alert alert-dismissable alert-warning">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Operation Failed</h4>
                <p>Please Format your question well</p>
              </div>
            </div>
          </div>
        </div>';
}
else{

$questions_number = $questions[0];
//echo $questions_number;
$sha = preg_split("[\t]",$questions_number);
$question_number =  str_replace('.','',$sha[0]);
$question_gan = $sha[1];
$question_texts = $questions[1];

//echo $question_gan;
$question = preg_split("[\t]",$question_texts);
$splitter = array(0=>'[a\.]',1=>'[b\.]',2=>'[c\.]',3=>'[d\.]',4=>'[e\.]');
$length = sizeof($question);
for($i=0;$i<$length;$i++){
//$question[$i] = str_replace('.','',$question[$i]);
$value = preg_split($splitter[$i]."i",$question[$i]);
array_push($others,$value[1]);
}
//print_r($others);
$len = sizeof($others);
$option_a = $others[0];
$option_b = $others[1];
$option_c = $others[2];
$option_d = $others[3];
$option_e ='';
if($len==5){
$option_e = $others[4];
}
$check  = is_question($question_number,$subject_name);
if($check){
echo '<div class="row">
          <div class="col-lg-12" width="400px">
            <div class="bs-example">
              <div class="alert alert-dismissable alert-warning">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Operation Failed</h4>
                <p>Question '.$question_number.' exits in the database</p>
              </div>
            </div>
          </div>
        </div>';
}
else{
if(!isset($option_a) || !isset($option_b) || !isset($option_c) || !isset($option_d) || !isset($option_e)){
echo '<div class="row">
          <div class="col-lg-12" width="400px">
            <div class="bs-example">
              <div class="alert alert-dismissable alert-warning">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Operation Failed</h4>
                <p>Please Format your question well</p>
              </div>
            </div>
          </div>
        </div>';
}
else {
$sql = "INSERT INTO `questions` SET 
`quest_no`='$question_number',
`subject`='$subject_name',
`question`='$question_gan',
`option_a`='$option_a',
`option_b`='$option_b',
`option_c`='$option_c',
`option_d`='$option_d',
`option_e`='$option_e',
`answer`=''";
$result = query($sql);
if($result){
echo '<div class="col-lg-4">
            <div class="alert alert-dismissable alert-success">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>Success!</strong> Question number '.$question_number.' successfully entered into the database</div>
			  </div>';
}
else{
echo '<div class="row">
          <div class="col-lg-12" width="400px">
            <div class="bs-example">
              <div class="alert alert-dismissable alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Operation Failed</h4>
                <p>Operation Not Successfully Carried out</p>
              </div>
            </div>
          </div>
        </div>';
}
}
}

//echo $question_number;
}
form($subject_name,$question_text);
//var_dump($others);

}
else if(isset($_POST['up_time'])){
$hr = $_POST['hr'];
$min = $_POST['min'];
$sec = $_POST['sec'];
$subject  = $_POST['subject'];
$sql = "UPDATE `subject` SET 
`hr`='{$hr}',
`min`='{$min}',
`sec`='{$sec}' WHERE `subject_name`='{$subject}'";
$result = query($sql);

if($result){
		echo '<div class="row">
          <div class="col-lg-12" width="400px">
            <div class="bs-example">
              <div class="alert alert-dismissable alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Time Updated</h4>
                <p>'.$subject.' time updated to '.$hr.':'.$min.':'.$sec.' </p>
              </div>
            </div>
          </div>
        </div>';
		}
		else{
		echo '<div class="row">
          <div class="col-lg-12" width="400px">
            <div class="bs-example">
              <div class="alert alert-dismissable alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Time Not Updated</h4>
                <p>Time Update Failed</p>
              </div>
            </div>
          </div>
        </div>';
		}
		

}
else if(isset($_POST['edit_sub'])){
$subject_name = $_POST['subject']; 
	  echo '<h3 align="center">Edit '.$subject_name.'</h3>';
	  echo '<div style="margin: 0 auto; width:200px;">';
	  echo '<form name="edit_post" action="" method="post" >';
	  echo '<input type="text" class="input-block-level" name="new_subname" value="'.$subject_name.'"/>';
	  echo '<input type="hidden" name="former_name" value="'.$subject_name.'"/>';
	  echo '<input type="submit" class="btn btn-primary btn-min" name="edit_subject_name" value="Update" />';
	  echo '</form></div>';

}else if(isset($_POST['edit_subject_name'])){
$id = $_POST['former_name'];
$new_id = $_POST['new_subname'];
$sql = "UPDATE  `subject` SET `subject_name`='{$new_id}' WHERE `subject_name`='{$id}'";
$result = query($sql);



if($result){
echo '<div class="row">
          <div class="col-lg-12" width="400px">
            <div class="bs-example">
              <div class="alert alert-dismissable alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Success</h4>
                <p>Operation Successfully Carried out</p>
              </div>
            </div>
          </div>
        </div>';
}
else{
echo '<div class="row">
          <div class="col-lg-12" width="400px">
            <div class="bs-example">
              <div class="alert alert-dismissable alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Operation Failed</h4>
                <p>Operation Not Successfully Carried out</p>
              </div>
            </div>
          </div>
        </div>';
}





}
else if(isset($_POST['answer'])){
$subject_name = $_POST['subject'];
$answer = $_POST['answers'];
$idahun = array();
$numbers = array();
$each = preg_split("[\n]",$answer);
$len = sizeof($each);
for($i=0;$i<$len;$i++){
$value = $each[$i];
$value = preg_split("[.\t]",$value);
$number = $value[0];
$number = str_replace('.','',$number);
$ans = $value[1];
array_push($numbers,$number);
array_push($idahun,$ans);

} 
$finals = true;
for($i=0;$i<$len;$i++){
$result = is_answer($numbers[$i],$subject_name);
$update = "UPDATE `questions` SET `answer`='".$idahun[$i]."' WHERE `quest_no`='".$numbers[$i]."' && `subject`='$subject_name'";
 $fina = query($update);

 if(!$fina){
 $finals = false;
 }
}
if($finals){
echo '<div class="row">
          <div class="col-lg-12" width="400px">
            <div class="bs-example">
              <div class="alert alert-dismissable alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Success</h4>
                <p>Operation Successfully Carried out</p>
              </div>
            </div>
          </div>
        </div>';
}
else{
echo '<div class="row">
          <div class="col-lg-12" width="400px">
            <div class="bs-example">
              <div class="alert alert-dismissable alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Operation Failed</h4>
                <p>Operation Not Successfully Carried out</p>
              </div>
            </div>
          </div>
        </div>';
}
in_answer($subject_name,$answer);

}
if(isset($_GET['action'])){
      if($_GET['action']=="populatesub"){
	  
	  all_for_new_subject();
	  
	  }
	  else if($_GET['action']=="sms_log"){
		  sms_log();
		  }
	  else if($_GET['action']=="reset_userdb"){
	  $sql = "TRUNCATE TABLE `student`";
	  $result = query($sql);
	  if($result){
	  echo '<div class="row">
          <div class="col-lg-12" width="400px">
            <div class="bs-example">
              <div class="alert alert-dismissable alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Success</h4>
                <p>User Database Reset was Successfully Carried Out</p>
              </div>
            </div>
          </div>
        </div>';
	  }else{
	  echo '<div class="row">
          <div class="col-lg-12" width="400px">
            <div class="bs-example">
              <div class="alert alert-dismissable alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Operation Failed</h4>
                <p>User Database reseting was Not Successfully Carried out</p>
              </div>
            </div>
          </div>
        </div>';
	  }
	  }
	  else if($_GET['action']=="quest_num"){
	  form_question_number();
	  
	  }
	  else if($_GET['action']=="edit_sub"){
	  echo '<h3 align="center">Edit Subject</h3>';
	  echo '<div style="margin: 0 auto; width:200px;">';
	  echo '<form name="edit_post" action="" method="post" >';
	  echo select_subjects();
	  echo '<input type="submit" class="btn btn-primary btn-min" name="edit_sub" value="Edit" />';
	  echo '</form></div>';
	  }
	  else if($_GET['action']=="question"){
	  $sql = "TRUNCATE TABLE `questions`";
	  $result = query($sql);
	  if($result){
	  echo '<div class="row">
          <div class="col-lg-12" width="400px">
            <div class="bs-example">
              <div class="alert alert-dismissable alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Success</h4>
                <p>Question Database Reset was Successfully Carried Out</p>
              </div>
            </div>
          </div>
        </div>';
	  }
	  else{
	  echo '<div class="row">
          <div class="col-lg-12" width="400px">
            <div class="bs-example">
              <div class="alert alert-dismissable alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Operation Failed</h4>
                <p>Questions Database reseting was Not Successfully Carried out</p>
              </div>
            </div>
          </div>
        </div>';
	  }
	  
	  }
	  
	  else if($_GET['action']=="insert_time"){
	  echo '<div id="up_time">';
	  echo '<h4>Update the Subject Time</h4>';
	  time_update();
	  echo '</div>';
	  }
	  
	  else if($_GET['action']=="populatequest"){
	  ?>
	  
	  <?php
	  form('','');
	  }
	  else if($_GET['action']=="answer"){
	  in_answer('','');
	  
	  }
	  else if($_GET['action']=="insert_question_bulk"){
		  form_bulk_answer();
		  
		  }
	  else if($_GET['action']=="extra"){
	   $query = "SELECT `subject_name` FROM `subject`";
	  $result = query($query);
	  $subject = array();
	  $mysql_rows = $result->num_rows;
	  for($i=0;$i<$mysql_rows;$i++){
	  $answer = $result->fetch_array();
	  $subject_name = stripslashes($answer['subject_name']);
	  array_push($subject,$subject_name);
	  }
	  echo '<a href="admin.php?action=sms">Send Sms to Parents</a>';
	  echo '<table border="1px" class="table table-striped table-bordered table-hover">
	         <tr>
			 <td scope="row"><strong>Surname</strong></td>
			 <td scope="row"><strong>Firstname</strong></td>';
	
	$len = sizeof($subject);
	      for($r=0;$r<$len;$r++){
		  echo '<td scope="row" ><strong>'.$subject[$r].'</strong></td>';
		  }
	      echo '<td scope="row"><strong>Parent Tel No</strong></td>';
			 '</tr>';
	  $sql = "SELECT * FROM `student`";
	     $res = query($sql);
	   $mysql_rows = $res->num_rows;
	   for($i=0;$i<$mysql_rows;$i++){
	   $answer = $res->fetch_array();
	    $surname = $answer['surname'];
		$firstname = $answer['firstname'];
		$parent = $answer['parent'];
		echo '<tr>';
		echo '<td scope="col" class="success"><strong>'.$surname.'</strong></td>';
		echo '<td scope="col" class="success"><strong>'.$firstname.'</strong></td>';
	  for($r=0;$r<$len;$r++){
	  $john = $subject[$r];
	  $subject_name = $answer[$john];
		  echo '<td scope="col" class="success"><strong>'.$answer[$john].'</strong></td>';
		  }
		  echo '<td scope="col" class="success"><strong>'.$parent.'</strong></td>';
	    echo '</tr>';
	  // echo $subject_name;
	   //array_push($subject,$subject_name);
	   }
	  echo '</table>';
	  
	  }
	  else if($_GET['action']=="delete"){
	
	 delete();
	  }
	  else if($_GET['action']=="print"){
	  echo '<br/><br/>';
	  
	  echo '<a href="#" onclick="printer();">Print Slip</a>';
	  echo '<br/><hr/><br/>';
	  $sql = "SELECT * FROM `student`";
	     $res = query($sql);
	   $mysql_rows = $res->num_rows;
	   for($i=0;$i<$mysql_rows;$i++){
	   $answer = $res->fetch_array();
	    $surname = $answer['surname'];
		$firstname = $answer['firstname'];
		$exam_code = $answer['exam_code'];
		$username = $answer['username'];
		$othername = $answer['othername'];
		$parent = $answer['parent'];
		//also do the necessary messaging here
		
		echo '<fieldset id="printer">';
		echo '<legend>E-Exam Log In Details of '. $surname.' '.$firstname.'</legend>';
		echo '<label for="student_name" align="center">Name: '.$surname.' '.$firstname.' '.$othername.'</label><br/><br/>' ;
		echo '<label for="username">Username : '.$username.'</label><br/>';
		echo '<label for="exam_code">Exam Code: '.$exam_code.'</label><br/>';
		echo '<label for="prent_name">Parent Phone Number Num: '.$parent.'</label>';
		echo'</fieldset><br/><hr>';
	  }
	  
	  }
	  else if($_GET['action']=="sms"){
	  //this is just for you to see. It is the SMS area
	     $query = "SELECT `subject_name` FROM `subject`";
	  $result = query($query);
	  $subject = array();
	  $mysql_rows = $result->num_rows;
	  for($i=0;$i<$mysql_rows;$i++){
	  $answer = $result->fetch_array();
	  $subject_name = stripslashes($answer['subject_name']);
	  array_push($subject,$subject_name);
	  }
	  
	$len = sizeof($subject);
	     	  $sql = "SELECT * FROM `student`";
	     $res = query($sql);
	   $mysql_rows = $res->num_rows;
	   for($i=0;$i<$mysql_rows;$i++){
	   $answer = $res->fetch_array();
	    $surname = $answer['surname'];
		$firstname = $answer['firstname'];
		$parent = $answer['parent'];
		   echo '<fieldset>';
		   echo 'Your Kid '.$surname.' '.$firstname.' has the following scores:<br/>';
		  for($r=0;$r<$len;$r++){
	  $john = $subject[$r];
	  $subject_name = $answer[$john];
	   
	   
	   echo $john.'=================>'.$subject_name.'<br/>';
		  	  }
			  echo 'Parent Phone Number============>'.$parent;
		  echo '</fieldset>';
		    // echo $subject_name;
	   //array_push($subject,$subject_name);
	   }
	  echo '</table>';
	  }
	  else if($_GET['action']=="add_user"){
	  echo '<br/>';
	 // <a href="admin.php?action=set">Get  Student Table Ready</a>';
	   in_user('','','');
	  	  }
	else if($_GET['action']=="add_user_bulk"){
		echo '<br/>';
		form_reg_multiple();
		}
	/*else if($_GET['action']=="set"){}*/
	  
	  }
	  if(isset($_POST['form_question_number'])){
	  $question_number = stripslashes($_POST['question_number']);
	  $subject_name = stripslashes($_POST['subject']);
	  $sql = "UPDATE `subject` SET `quest_num`='{$question_number}' WHERE `subject_name`='{$subject_name}'";
	  $result = query($sql);
	 
	 if($result){
	  echo '<div class="row">
          <div class="col-lg-12" width="400px">
            <div class="bs-example">
              <div class="alert alert-dismissable alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Success</h4>
                <p>Question Number updated to '.$question_number.' for '.$subject_name.'</p>
              </div>
            </div>
          </div>
        </div>';
	  }else{
	  echo '<div class="row">
          <div class="col-lg-12" width="400px">
            <div class="bs-example">
              <div class="alert alert-dismissable alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Operation Failed</h4>
                <p>Question number update was not successfully carried out</p>
              </div>
            </div>
          </div>
        </div>';
	  }
	  form_question_number();
	  }
	  if(isset($_POST['student_bulk_reg'])){
		  
		 
$filetype = $_FILES['student_reg']['type'];
$filename = $_FILES['student_reg']['tmp_name'];
$filesize  = $_FILES['student_reg']['size'];
$array_filetype = array("text/csv","application/vnd.ms-excel");
$success = 0;

if(!in_array($filetype,$array_filetype)){
echo '<p style="color:red;" align="center"><img src="../img/cancel.png" /> Wrong File Type</p>';

}else if($filesize>500009){
	echo '<p style="color:red;" align="center"><img src="../img/cancel.png" /> FIle too Large</p>';
	}else{

$array = file_get_contents($filename);
$array_new = explode(PHP_EOL,$array);
$array_size = sizeof($array_new);


	
	for($i=1;$i<$array_size;$i++){
$each = array();
$each = explode(",",$array_new[$i]);
//print_r($each);
if(isset($each[0]) && isset($each[1]) && isset($each[2]) && isset($each[3])){
	 $exam_code = rand(00000,99999);
		  $isexam_code = check_exam_code($exam_code);
		  while($isexam_code){
			  $exam_code = rand(00000,99999);
			  
			  }
			  
	$surname = ucword($each[0]);
$firstname = ucword($each[1]);
$othername = ucword($each[2]);
$parent = $each[3];
$username  = strtolower($surname);
$user_exist = is_student($surname,$firstname,$othername);
if($user_exist){
	echo '<p style="color:red;" align="center"><img src="../img/cancel.png" /> Student has been registered Before';

	}else{
  $sql ="INSERT INTO `student` SET
	  `username`='$username',
	   `exam_code`='$exam_code',
	  `surname`='$surname',
	  `firstname`='$firstname',
	  `othername`='$othername',
	  `parent`='$parent'";
	  
	  $result = query($sql);
//send_sms($phone_number,$message);
if($result){
	$success = $success + 1;
	}
	}
		}


}

 echo '<div class="row">
          <div class="col-lg-12" width="400px">
            <div class="bs-example">
              <div class="alert alert-dismissable alert-info">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Student Registration</h4>
                <p>'.$success.' students  has been registered  out of '.($array_size-2).'</p>
              </div>
            </div>
          </div>
        </div>';
}

 
		  form_reg_multiple();
		  
		  
		  }
	  if(isset($_POST['question_bulk'])){
		  
		  $subject_name  = stripslashes($_POST['subject']);
$filetype = $_FILES['question_upload']['type'];
$filename = $_FILES['question_upload']['tmp_name'];
$filesize  = $_FILES['question_upload']['size'];
$array_filetype = array("text/csv","application/vnd.ms-excel");
$success = 0;

if(!in_array($filetype,$array_filetype)){
echo '<p style="color:red;" align="center"><img src="../img/cancel.png" /> Wrong File Type</p>';

}else if($filesize>500009){
	echo '<p style="color:red;" align="center"><img src="../img/cancel.png" /> FIle too Large</p>';
	}else{

$array = file_get_contents($filename);
$array_new = explode(PHP_EOL,$array);
$array_size = sizeof($array_new);


	
	for($i=1;$i<$array_size;$i++){
$each = array();
$each = explode(",",$array_new[$i]);
//print_r($each);
if(isset($each[0]) && isset($each[1]) && isset($each[2]) && isset($each[3]) && isset($each[4]) && isset($each[5])){
	$question = $each[0];
$option_a = $each[1];
$option_b = $each[2];
$option_c = $each[3];
$option_d = $each[4];
$option_e = $each[5];
$question_exist = check_question($question);
if($question_exist){
	echo '<p style="color:red;" align="center"><img src="../img/cancel.png" /> Question exists in the database</p>';

	}else{
		$answer = trim(strtolower($each[6]));
$sql = "INSERT INTO `questions` SET
`quest_no`='{}',
`subject`='{$subject_name}',
`question`='{$question}',
`option_a`='{$option_a}',
`option_b`='{$option_b}',
`option_c`='{$option_c}',
`option_d`='{$option_d}',
`option_e`='{$option_e}',
`answer`='{$answer}'
";

$result = query($sql);
if($result){
	$success = $success + 1;
	}
	}
		}


}

 echo '<div class="row">
          <div class="col-lg-12" width="400px">
            <div class="bs-example">
              <div class="alert alert-dismissable alert-info">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Question Upload</h4>
                <p>'.$success.' questions inserted out of '.($array_size-2).'</p>
              </div>
            </div>
          </div>
        </div>';
}

 
		  form_bulk_answer();
		  }
	  if(isset($_POST['put_inside'])){
	  $subject_name =  $_POST['subject_name']; 
	  
	  $hr = $_POST['hr'];
	  $min = $_POST['min'];
	  $sec = $_POST['sec'];
	   $question_number = stripslashes($_POST['question_number']);
	  $check = is_Subject($subject_name);
	  if($check){
	  echo '<div class="row">
          <div class="col-lg-12" width="400px">
            <div class="bs-example">
              <div class="alert alert-dismissable alert-info">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Registered Before</h4>
                <p>This Subject has been registered before</p>
              </div>
            </div>
          </div>
        </div>';
	 all_for_new_subject();
	  }
	  else{
	  $query = "INSERT INTO `subject` set
	  `subject_name`='{$subject_name}',
	  `hr`='{$hr}',
	  `min`='{$min}',
	  `sec`='{$sec}',
	  `quest_num`='{$question_number}'";
	  $result = query($query);
	  if($result){
	  echo '<br/><span style="color:green;">'.$subject_name.' has been successfully added to the Subjects</span><br/>';
	 all_for_new_subject();
	  }
	  else{
	  echo '<div class="row">
          <div class="col-lg-12" width="400px">
            <div class="bs-example">
              <div class="alert alert-dismissable alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Operation Failed</h4>
                <p>Operation Not Successfully Carried out</p>
              </div>
            </div>
          </div>
        </div>';
	 all_for_new_subject();
	  }
	  }
	  }
	  //here is the deleting section
	  if(isset($_POST['delete'])){
	  $subject_name = $_POST['subject'];
	 $sql = "ALTER TABLE `student` DROP `$subject_name`";
	 $query = "DELETE FROM `questions` WHERE `subject`='$subject_name'";
	 $personal ="DELETE FROM `subject` WHERE `subject_name`='$subject_name'";
	 $res_sql = query($sql);
	 $res_query = query($query) ;
	 $res_personal = query($personal);
	 if($res_sql &&$res_query  &&$res_personal ){
	 echo '<div class="row">
          <div class="col-lg-12" width="400px">
            <div class="bs-example">
              <div class="alert alert-dismissable alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Operation Successfull</h4>
                <p> '.$subject_name.' successfully deleted</p>
              </div>
            </div>
          </div>
        </div>';
	 }
	 delete();
	  }
	  if(isset($_POST['student_reg'])){
	  $exam_codes = $_POST['exam_code'];
	  $exam_code = rand(00000,99999);
	  $firstname = $_POST['firstname'];
	  $firstname = ucword($firstname);
	  $surname   = $_POST['surname'];
	  $surname = ucword($surname);
	  $username = strtolower($surname);
	  $othername = $_POST['othername'];
	  $othername = ucword($othername);
	  $parent = $_POST['parent'];
	  //echo 'Your exam code is'.$exam_code;
	  $check =is_student($surname,$firstname,$othername);
	  if($check){
	  echo '<div class="row">
          <div class="col-lg-12" width="400px">
            <div class="bs-example">
              <div class="alert alert-dismissable alert-warning">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Operation Failed</h4>
                <p>Student has been registered before</p>
              </div>
            </div>
          </div>
        </div>';
	   echo '<br/>
	  <a href="admin.php?action=set">Get  Student Table Ready</a>';
	   in_user('','','');
	  }
	  else{
	   $sql ="INSERT INTO `student` SET
	  `username`='$username',
	   `exam_code`='$exam_code',
	  `surname`='$surname',
	  `firstname`='$firstname',
	  `othername`='$othername',
	  `parent`='$parent'";
	  
	  $result = query($sql);
	  if($result){
		  $message = "Your child ".$surname." ".$firstname." has been successfully registered for a CBT exam. Username is==>".$username." Exam code is ==>".$exam_code."";
		  send_sms($parent,$message);
	  echo '<div class="row">
          <div class="col-lg-12" width="400px">
            <div class="bs-example">
              <div class="alert alert-dismissable alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Registeration Successfull</h4>
                <p>Your ward username is <strong>'.$username.'</strong> and exam-code is <strong>'.$exam_code.'</strong> </p>
              </div>
            </div>
          </div>
        </div>';
	  echo '<br/>
	  <a href="admin.php?action=set">Get  Student Table Ready</a>';
	   in_user('','','');
	   //here sms is sent to the parents of the student giving them the details of the student registaration
     //status
	 }
	  }
	  }
	
	 if(!isset($_SESSION['user_id'])){
//header("Location: index.php");
}
	?>


      <footer>
        <div class="row">
          <div class="col-lg-12">
            
            <ul class="list-unstyled">
              <li class="pull-right"><a href="#top">Back to top</a></li>
             
             
			</ul>
            <p>Made by <a href="www.damisagurus.com">Damisa Gurus LTD</a>. Contact us at <a href="mailto:admin@damisagurus.com">hello@damisa</a>.</p>
                        
          </div>
        </div>
        
      </footer>
    

    </div>


    <script src="../bower_components/jquery/jquery.min.js"></script>
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/bootswatch.js"></script>
	<script src="../assets/js/bsa.js"></script>
	<script src="../assets/js/index.js"></script>
	<script type="text/javascript">

     var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-23019901-1']);
      _gaq.push(['_setDomainName', "bootswatch.com"]);
        _gaq.push(['_setAllowLinker', true]);
      _gaq.push(['_trackPageview']);

     (function() {
       var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
       ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
       var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
     })();

    </script>
  </body>
</html>