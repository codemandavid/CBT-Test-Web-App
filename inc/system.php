<?php


$user = "root";
$pass = "";
$host = "localhost";
$dbase = "cbt";
global $result;
date_default_timezone_set("Africa/Lagos");
$mysqli = new mysqli($host,$user,$pass,$dbase);
reload_student_account();
function is_Subject($subject_name){
   $check = query("SELECT * FROM `subject` WHERE `subject_name`='{$subject_name}'");
   return ($check->num_rows > 0 ) ? true : false;
   
   }
   function is_question($question_number,$subject_name){
   $check = query("SELECT * FROM `questions` WHERE `quest_no`='{$question_number}' && `subject`='{$subject_name}'");
   return ($check->num_rows > 0 ) ? true : false;
   }
   
    function is_student($surname,$firstname,$othername){
   $check = query("SELECT * FROM `student` WHERE `surname`='{$surname}' && `firstname`='{$firstname}' && `othername`='{$othername}'");
   return ($check->num_rows > 0 ) ? true : false;
   }

    function is_answer($question_number,$subject_name){
   $check = query("SELECT * FROM `questions` WHERE `quest_no`='{$question_number}'&& `subject`='{$subject_name}' &&  `answer`!=''");
   return ($check->num_rows > 0 ) ? true : false;
   }
   
   
function close_db()
	{
		global $mysqli;
		$mysqli->close();
	}
	

	function query($query)
	{
		global $result, $mysqli;
		$result = $mysqli->query($query);
		return $result;
	}
	
	function format_phone($phone_number){

$first_numbers = substr($phone_number,0,3);
if($first_numbers!='234'){
$phone_number = '234'.substr($phone_number,1,11);
}
return $phone_number;
}



function send_sms($phone_number,$message){
$phone_number = format_phone($phone_number);
$ordinary = $message;
$message = urlencode($message);

$sender_id ="CBT Exam";
$id = '18573270';
$sender_id = urlencode($sender_id);
$id = urlencode($id);
$password = 'damisa2014';
$file = @file_get_contents("http://developers.cloudsms.com.ng/api.php?userid=$id&password=$password&type=5&destination=$phone_number&sender=$sender_id&message=$message");

$new_answer = trim(substr($file,3));
if($new_answer=="101"){
$status = "Message Sent";
}else{
$status = "Message Not Sent";
}
$current_timestamp = time();
$today = date('F,j,Y, g:ia');

$sql ="INSERT INTO `sms_tracker` SET 
`phone_number`='{$phone_number}',
`message`='{$ordinary}',
`status`='{$status}',
`date`='{$today}',
`timestamp`='{$current_timestamp}'";
query($sql);
}

	function is_donesub($subject_name,$id){
	$query = "SELECT *  FROM `student` WHERE id='{$id}' && `".$subject_name."`!=''";
	  $check = query($query);
	 
	   return ($check->num_rows > 0 ) ? true : false;
	
	}
	
function check_exam_code($exam_code){
	$query = "SELECT *  FROM `student` WHERE `exam_code`='{$exam_code}'";
	  $check = query($query);
	 
	   return ($check->num_rows > 0 ) ? true : false;
	}
function check_question($question){
	$sql = "SELECT * FROM `questions` WHERE `question`='{$question}'";
	$result = query($sql);
	 
	   return ($result->num_rows > 0 ) ? true : false;
	}
	
	
	function sms_log(){
$sql = "SELECT * FROM `sms_tracker` order by id DESC";


$result = query($sql);
                   
				   $mysql_rows = $result->num_rows;

echo '<table align="center" class="table table-striped">';
     echo ' <tr bgcolor="">
	   <td scope="row" ><strong>Phone Number</strong></td>
	   <td scope="row"><strong>Message</strong></td>
	   <td scope="row"><strong>Status</strong></td>
	   <td scope="row"><strong>Date</strong></td>
	   </tr>';
for ($i=0; $i<$mysql_rows; $i++){

$row  = $result->fetch_array();
     $phone_number = stripslashes($row['phone_number']);
     $message = stripslashes($row['message']);
	 $status = stripslashes($row['status']);
	 $date = stripslashes($row['date']);
	 
	 $time_stamp = stripslashes($row['timestamp']);
	 
	 
	 echo '<tr>
				<td scope="col">'.$phone_number.'</td>
  <td scope="col">'.$message.'</td>
  <td scope="col">'.$status.'</td>
  <td scope="col">'.$date.'</td>
	
		      </tr>';
	 }
	 echo '</table>';

}

	function form($subject_name,$question_text){
       $query = "SELECT `subject_name` FROM `subject`";
	  $result = query($query);
	  $mysql_rows = $result->num_rows;
	  
	  
	  echo '<br/>
	  <form name="populate_question" action="'.$_SERVER['PHP_SELF'].'" method="post" onsubmit="return sform(this);">
	  Select Subject:
	  <select name="subject" required>
	  <option value="'.(isset($_POST['question'])?$subject_name:'').'">'.(isset($_POST['question'])?$subject_name:'--Select--').'</option>
	  ';
	  
	  for($i=0;$i<$mysql_rows;$i++){
	  $answer = $result->fetch_array();
	  $subject_name = stripslashes($answer['subject_name']);
	  //echo $subject_name;
	  echo ' <option value="'.$subject_name.'">'.$subject_name.'</option>';
	  	  }
	  
	  
	  echo '</select><br/>
	  Question: <br/><textarea name="questions" cols="60" rows="9" required placeholder="Question">'.(isset($_POST['question'])?$question_text:'').'</textarea><br/>
	  <input type="submit" name="question" value="Insert" class="btn btn-success" />
	  </form>';
		  
	  }
	function in_answer($subject_name,$question_answer){
	
	$query = "SELECT `subject_name` FROM `subject`";
	  $result = query($query);
	  $mysql_rows = $result->num_rows;
	  
	  
	  echo '<br/>
	  <form name="populate_answer" action="'.$_SERVER['PHP_SELF'].'" method="post" onsubmit="return tform(this);">
	  Select Subject:
	  <select name="subject" required>
	  <option value="'.(isset($_POST['answer'])?$subject_name:'').'">'.(isset($_POST['answer'])?$subject_name:'--Select--').'</option>
	  ';
	  
	  for($i=0;$i<$mysql_rows;$i++){
	  $answer = $result->fetch_array();
	  $subject_name = stripslashes($answer['subject_name']);
	  //echo $subject_name;
	  echo ' <option value="'.$subject_name.'">'.$subject_name.'</option>';
	  	  }
	  
	  
	  echo '</select><br/>
	  Answer: <br/><textarea name="answers" cols="60" rows="9" required placeholder="Answer">'.(isset($_POST['answer'])?$question_answer:'').'</textarea><br/>
	  <input type="submit" name="answer" value="Insert" class="btn btn-success" />
	  </form>';
	
	
	}
	function time_update(){
	
	echo '<form name="" action="" method="post">';
	echo '<label>Hour</label><input type="text" name="hr" placeholder="time in hour" required />';
	echo '<label>Minutes</label><input type="text" name="min" placeholder="time in minutes" required />';
	echo '<label>Seconds</label><input type="text" name="sec" placeholder="time in seconds" required />';
	echo select_subjects();
	echo '<br/><input type="submit" name="up_time" value="Insert" class="btn btn-success" />';
	echo '</form>';
	}
function form_bulk_answer(){
	echo '<br/>
	  <div id="studs">
	  <h3 align="center">Question and Answer Upload</h3>
	  <form name="student_register" action="'.$_SERVER['PHP_SELF'].'" method="post" onsubmit="return reg(this);" enctype="multipart/form-data">
	  <label>Subject</label><br/>';
	  select_subjects();
	  echo '
	   <br/><label>Upload should be in csv format maxsize 2MB</label><br/>
	   <input type="file" name="question_upload" required="required" />
	  <input type="submit" name="question_bulk" value="Upload" class="btn btn-success"/>
	    </form></div>';
	}
function form_reg_multiple(){
	echo '<br/>
	  <div id="stud">
	  <h3 align="center">Student Registration (Bulk)</h3>
	  <form name="student_register" action="'.$_SERVER['PHP_SELF'].'" method="post" onsubmit="return reg(this);" enctype="multipart/form-data">
	   <label>Upload should be in csv format maxsize 2MB</label><br/>
	   <input type="file" name="student_reg" required="required" />
	  <input type="submit" name="student_bulk_reg" value="Register" class="btn btn-success"/>
	    </form></div>';
	}
	
function all_subjects(){
	$sql = "SELECT * FROM `subject`";
	$result  = query($sql);
	$mysql_rows = $result->num_rows;
	$subjects = array();
	for($i=0;$i<$mysql_rows;$i++){
		$row = $result->fetch_array();
		$subject_name  = stripslashes($row['subject_name']);
		array_push($subjects,$subject_name);
		}
	return $subjects;
	}
	function in_user($surname,$firstname,$othername){
	  echo '<br/>
	  <div id="stud">
	  <h3 align="center">Student Registration</h3>
	  <form name="student_register" action="'.$_SERVER['PHP_SELF'].'" method="post" onsubmit="return reg(this);">
	   <label>Surname</label> <input type="text" name="surname" placeholder="Surname" required value="'.(isset($_POST['student_reg'])?$surname:'').'"/><br/>
	   <label>First Name</label><input type="text" name="firstname"  placeholder="Firstname" required value="'.(isset($_POST['student_reg'])?$firstname:'').'"/><br/>
	   <label>Other Name</label><input type="text" name="othername"  placeholder="Othername" required  value="'.(isset($_POST['student_reg'])?$othername:'').'"/>
	  <input type="hidden" name="exam_code" id="exam_code" required >
	  <label>Parents Phone Number</label><input type="text" name="parent" placeholder="Parent Phone  Number"required />
	  <input type="submit" name="student_reg" value="Register" class="btn btn-success"/>
	    </form></div>';
	  }
	  function ucword($surname){
    $surname = strtolower($surname);
	$surname = ucfirst($surname);
	return $surname;
}
function all_for_new_subject(){
echo '
<div class="populate_subject">
<form name="populate_subject" action="'.$_SERVER['PHP_SELF'].'" method="post" onsubmit="return fform(this);">
	  Enter the name of the Subject:<input type="text" name="subject_name"/><br/>
	  Time Limit Hour(s):<input type="text" name="hr" /><br/>
	  Min(s):<input type="text" name="min">&nbsp;&nbsp;&nbsp;&nbsp;
	  Sec:<input type="text" name="sec" /><br/>
	  <label>Number of Questions</label><br/>
	<input type="number" name="question_number" required="required" placeholder="50" />
	  <input type="submit" name="put_inside" value="Insert" class="btn btn-primary">
	  
	  </form>
	  </div>
';


}
function get_question_numbers($subject){
$sql  = "SELECT * FROM `subject` WHERE `subject_name`='{$subject}' LIMIT 1";
$result = query($sql);
$mysql_rows = $result->num_rows;
for($i=0;$i<$mysql_rows;$i++){
$row = $result->fetch_array();
$question_number = stripslashes($row['quest_num']);

}
return $question_number;
}
function form_question_number(){
	echo '<h4 align="center">Specify Question Number</h4>
	<p align="center"><em>Here, you specify the number of questions to be displayed to your users for each subject.</em></p>
	<div class="populate_subject">
	
	
	
	<form name="question_number" action="'.$_SERVER['PHP_SELF'].'" method="post">
	<label>Select Subject</label>';
	select_subjects();
	echo'
	<label>Number of Questions</label>
	<input type="number" name="question_number" required="required" placeholder="50" />
	<input type="submit" name="form_question_number" value="Update" class="btn btn-primary" />
	
	
	
	</form>
	</div>
	';
	}

function select_subjects(){
$query = "SELECT `subject_name` FROM `subject`";
	  $result = query($query);
	  $mysql_rows = $result->num_rows;
echo '	<select name="subject" required><option value="">--Select--</option>';
	  
	  for($i=0;$i<$mysql_rows;$i++){
	  $answer = $result->fetch_array();
	  $subject_name = stripslashes($answer['subject_name']);
	  //echo $subject_name;
	  echo ' <option value="'.$subject_name.'">'.$subject_name.'</option>';
	  	  }
	  
	  
	  echo '</select>';

}
function delete(){
       $query = "SELECT `subject_name` FROM `subject`";
	  $result = query($query);
	  $mysql_rows = $result->num_rows;
	  
	  
	  echo '<br/>
	  <form name="dels" action="'.$_SERVER['PHP_SELF'].'" method="post">
	  Select Subject:
	  <select name="subject">';
	  
	  for($i=0;$i<$mysql_rows;$i++){
	  $answer = $result->fetch_array();
	  $subject_name = stripslashes($answer['subject_name']);
	  //echo $subject_name;
	  echo ' <option value="'.$subject_name.'">'.$subject_name.'</option>';
	  	  }
	  
	  
	  echo '</select>
	  <input type="submit" name="delete" value="Delete" class="btn btn-danger"/>
	  </form>';
		  
	  }
	
	
	function reload_student_account(){
		
		
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
			
		}
?>