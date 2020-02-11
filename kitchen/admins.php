<html>
<?php
session_start();
 if(!isset($_SESSION['user_id'])){
header("Location: index.php");
}?>
<script src="../assets/js/index.js" language="Javascript"></script>
<link rel="stylesheet" type="text/css" href="../css/stylesheet.css">
<?php include_once("../system.php");  ?>
<head>
<title>E-exam Platform: Admin Section</title>
</head>

<body>
<div id="header">
<a href="admin.php?action=populatesub">Populate Subject</a>
<a href="admin.php?action=populatequest">Insert Question</a>
<a href="admin.php?action=answer">Insert Answer</a>
<a href="admin.php?action=extra">Extra-Activites</a>
<a href="admin.php?action=print">Print Student Slip & SMS Parent</a>
<a href="admin.php?action=add_user">Add User</a>
<a href="admin.php?action=delete">Delete Subject</a>
<a href="admin.php?logout=out">Log Out</a><br/>
</div><br/><br/>

<?php
if(isset($_GET['logout'])){
unset ($_COOKIE['status']);
unset($_SESSION['user_id']);
session_unset();
session_destroy();
header("Location: index.php");
}
if(isset($_POST['question'])){
$question_text = $_POST['questions'];;
$subject_name = $_POST['subject'];

$option = '';
$others = array();
$questions = preg_split("[\n]",$question_text);

$lengths = sizeof($questions);

if($lengths< 2){
echo '<br/><span style="color:red;">Please Format Your Questions Well</span>';
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
echo '<br/><span style="color:red;">Question number '.$question_number.' exists in the database</span>';
}
else{
if(!isset($option_a) || !isset($option_b) || !isset($option_c) || !isset($option_d) || !isset($option_e)){
echo '<br/><span style="color:red;">Please Format Your Questions Well</span>';
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
echo '<br/><span style="color:green;">Question Number '.$question_number.' sucessfully inserted into the database</span>';
}
else{
echo '<br/><span style="color:red;">Operation Not Sucessful</span>';
}
}
}
form($subject_name,$question_text);
//echo $question_number;
}
//var_dump($others);

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
echo '<br/><span style="color:green;">Operation Successfully Carried Out</span>';
}
else{
echo '<br/><span style="color:red;">Operation Failed</span>';
}
in_answer($subject_name,$answer);

}
if(isset($_GET['action'])){
      if($_GET['action']=="populatesub"){
	  
	  ?>
	  <form name="populate_subject" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return fform(this);">
	  Enter the name of the Subject:<input type="text" name="subject_name"/><br/>
	  Time Limit Hour(s):<input type="text" name="hr" /><br/>
	  Min(s):<input type="text" name="min">&nbsp;&nbsp;&nbsp;&nbsp;Sec:<input type="text" name="sec" /><br/>
	  <input type="submit" name="put_inside" value="Insert">
	  
	  </form>
	  <?php
	  
	  }
	  else if($_GET['action']=="populatequest"){
	  ?>
	  
	  <?php
	  form('','');
	  }
	  else if($_GET['action']=="answer"){
	  in_answer('','');
	  
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
	  echo '<table border="1px">
	         <tr>
			 <td scope="row">Surname</td>
			 <td scope="row">Firstname</td>';
	
	$len = sizeof($subject);
	      for($r=0;$r<$len;$r++){
		  echo '<td scope="row">'.$subject[$r].'</td>';
		  }
	      echo '<td scope="row">Parent Tel No</td>';
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
		echo '<td scope="col">'.$surname.'</td>';
		echo '<td scope="col">'.$firstname.'</td>';
	  for($r=0;$r<$len;$r++){
	  $john = $subject[$r];
	  $subject_name = $answer[$john];
		  echo '<td scope="col">'.$answer[$john].'</td>';
		  }
		  echo '<td scope="col">'.$parent.'</td>';
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
	  echo '<br/>
	  <a href="admin.php?action=set">Get  Student Table Ready</a>';
	   in_user('','','');
	  	  }
	else if($_GET['action']=="set"){
	$query = "SELECT `subject_name` FROM `subject`";
	  $result = query($query);
	  $mysql_rows = $result->num_rows;
	   $subjects = array();
	  for($i=0;$i<$mysql_rows;$i++){
	  $answer = $result->fetch_array();
	  $subject_name = stripslashes($answer['subject_name']);
	  //echo $subject_name;
array_push($subjects,$subject_name)	;   
	  	  }
	
	
	$len = sizeof($subjects);
	
	for($i=0;$i<$len;$i++){
	$sql = "ALTER TABLE `student` ADD `$subjects[$i]` VARCHAR(100) NOT NULL";
	  $result = query($sql);
		}
		if(isset($result)){
		echo '<span style="color:green;">Student Table is Ready</span>';
		}
		else{
		echo '<span style="color:red;">You must have gotten them ready before</span>';
		}
	
	
	
	}
	  
	  }
	  
	  if(isset($_POST['put_inside'])){
	  $subject_name =  $_POST['subject_name']; 
	  
	  $hr = $_POST['hr'];
	  $min = $_POST['min'];
	  $sec = $_POST['sec'];
	  
	  $check = is_Subject($subject_name);
	  if($check){
	  echo '<br/><span style="color:red;">This Subject Has been Registered Before</span>';
	  ?>
	  
	  <form name="populate_subject" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return fform(this);">
	  Enter the name of the Subject:<input type="text" name="subject_name"/><br/>
	  Time Limit Hour(s):<input type="text" name="hr" /><br/>
	  Min(s):<input type="text" name="min">&nbsp;&nbsp;&nbsp;&nbsp;
	  Sec:<input type="text" name="sec" /><br/>
	  <input type="submit" name="put_inside" value="Insert">
	  
	  </form>
	  <?php 
	  }
	  else{
	  $query = "INSERT INTO `subject` set
	  `subject_name`='$subject_name',
	  `hr`='$hr',
	  `min`='$min',
	  `sec`='$sec'";
	  $result = query($query);
	  if($result){
	  echo '<br/><span style="color:green;">'.$subject_name.' has been successfully added to the Subjects</span><br/>';
	  ?>
      <form name="populate_subject" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return fform(this);">
	  Enter the name of the Subject:<input type="text" name="subject_name"/><br/>
	  Time Limit Hour(s):<input type="text" name="hr" /><br/>
	  Min(s):<input type="text" name="min">&nbsp;&nbsp;&nbsp;&nbsp;
	  Sec:<input type="text" name="sec" /><br/>
	  <input type="submit" name="put_inside" value="Insert">
	  
	  </form>
	  <?php
	  }
	  else{
	  echo '<br/><span style="color:red;">Operation Fail</span><br/>';
	  ?>
      <form name="populate_subject" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	  Enter the name of the Subject:<input type="text" name="subject_name"/><br/>
	  <input type="submit" name="put_inside" value="Insert">
	  
	  </form>
	  <?php
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
	 echo '<span style="color:green;">'.$subject_name.' Records Successfully Deleted</span>';
	 }
	 delete();
	  }
	  if(isset($_POST['student_reg'])){
	  $exam_code = $_POST['exam_code'];
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
	  echo '<span style="color:red;">You have register this student before</span>';
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
	  echo '<p align="center>"<span style="color:green;">Registration Sucessful<br/>
	       Your Username is '.$username.' and your exam code is '.$exam_code.'
		   </span></p>';
	  echo '<br/>
	  <a href="admin.php?action=set">Get  Student Table Ready</a>';
	   in_user('','','');
	   //here sms is sent to the parents of the student giving them the details of the student registaration
     //status
	 }
	  }
	  }
	  ?>
</body>
</html>