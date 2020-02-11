<html>
<head>
<script src="../assets/js/index.js" language="Javascript"></script>
<link rel="stylesheet" type="text/css" href="../css/stylesheet.css">
 <link href="../assets/css/bootstrap.css" rel="stylesheet">
	<link href="../assets/css/admlog.css" rel="stylesheet">
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">
	<link rel="stylesheet" href="../assets/css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="../assets/css/bootswatch.min.css">
   
      <script src="../bower_components/bootstrap/assets/js/html5shiv.js"></script>
      <script src="../bower_components/bootstrap/assets/js/respond.min.js"></script>
     <script src="../js/index.js" language="Javascript"></script>
    <link rel="stylesheet" type="text/css" href="../assets/css/stylesheet.css">
<?php include_once("../inc/system.php");  ?>
<title>Exam Proper</title>
</head>
<body onLoad="start_timer()">
<?php
if(!isset($_POST['mark'])){
?>
<div id="timer">
<span id="r_hr"></span>
<span id="r_mn"></span>
<span id="r_ss"></span>
</div>
<?php } ?>
<?php
session_start();
if(isset($_SESSION['user'])&&isset($_SESSION['parent']) && isset($_SESSION['user_name']) && isset($_SESSION['user_id'])){
$ids = $_SESSION['user'];
$parent = $_SESSION['parent'];
$name = $_SESSION['user_name'];
$subject = $_SESSION['user_id'];
}
else{
header("Location: index.php");
}



$check = is_donesub($subject,$ids);
if(isset($_POST['mark'])){
	$_SESSION['complete']="yes";
	   $score = '0';
		//$length = sizeof($arrays);
if(isset($_POST['mark']))
{

$limit  = $_POST['rows'];
$score = 0;
for($k=0;$k<$limit;$k++){
$question_num= $k+1;
$value = 'answer'.$question_num;
$answer = $_POST[''.$value.''];
$picked = $_POST[''.$question_num.''];
//echo $picked.'========>';
//echo $answer.'<br/>';
$picked = trim($picked);
$answer = trim($answer);
if($picked==$answer){
$score = $score + 1;
}

}
$final = ($score/$limit) * 100;
//echo 'Your score is'.$score.'/'.$limit.' In percentage '.$final;
}
$ids = $_SESSION['user'];
	//echo $score;
	$query = "UPDATE `student` SET `$subject`='$score' WHERE `id`='$ids'";
	//echo $score;
	$result = query($query);
	if($result){
	echo '<div class="row">
          <div class="col-lg-12" width="400px">
            <div class="bs-example">
              <div class="alert alert-dismissable alert-info">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Exam Finish</h4>
                <p>You have Sucessfully finished and submitted '.$subject.' Questions <a href="index.php">Go Back Home</a></p>
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
                <h4>Error</h4>
                <p>Probably, A Problem Was Encountered when Submitting your  '.$subject.' Questions <a href="index.php">Go Back Home</a></p>
              </div>
            </div>
          </div>
        </div>';
	
	}
	
	///do the messaging to the parent telling them the score of there kids $parent
	//echo '<br/> Thi is the parent phone number '.$parent.'<br/>';
	}

else if(!$check){
$query = "SELECT * FROM `subject` WHERE `subject_name`='$subject'";
 	  $result = query($query);
	  $mysql_rows = $result->num_rows;


 for($i=0;$i<$mysql_rows;$i++){
	  $answer = $result->fetch_array();
	  $subject_name = stripslashes($answer['subject_name']);
	  $hr = stripslashes($answer['hr']);
	  $min = stripslashes($answer['min']);
	  $sec = stripslashes($answer['sec']);
	   echo '<input type="hidden" id="hr" value="'.$hr.'"/>';
	   echo '<input type="hidden" id="min" value="'.$min.'"/>';
	   echo '<input type="hidden" id="sec" value="'.$sec.'"/>';
	  //echo $subject_name;
	  	  	  }

$sql = "SELECT * FROM `questions` WHERE `subject`='{$subject}'";
if(query($sql)){
$result = query($sql);
$num_rows = $result->num_rows;


$quest_id = array();
$answer_id = array();

for($i=0;$i<$num_rows;$i++){

$row = $result->fetch_array();

$id = stripslashes($row['id']);
$answer = stripslashes($row['answer']);
array_push($quest_id,$id);
array_push($answer_id,$answer);
//echo $id.'======>'.$answer.'<br/>';

}
$first_num_rows = get_question_numbers($subject);
echo '<form name="questions" method="post" action="'.$_SERVER['PHP_SELF'].'">';
echo '<input type="hidden" value="'.$first_num_rows.'" name="rows" />';

for($i=0;$i<$first_num_rows;$i++){
$upper_limit = $first_num_rows - 1;

//echo $upper_limit;
$index  = mt_rand(0,$upper_limit);

$current_id = $quest_id[$index];

$current_answer = $answer_id[$index];

$db = "SELECT * FROM `questions` WHERE `id`='".$current_id."'";

$each_data = query($db);
if($each_data){
$num_rows = $each_data->num_rows;
for($r=0;$r<$num_rows;$r++){
$row_id = $each_data->fetch_array();
$question = $row_id['question'];
$a = $row_id['option_a'];
$b = $row_id['option_b'];
$c = $row_id['option_c'];
$d = $row_id['option_d'];
$e = $row_id['option_e'];
$answer = $row_id['answer'];
$question_number = $i+1;
$hidden_answer = 'answer'.$question_number;
echo '&nbsp;&nbsp;'.$question_number.'   '.$question.'<br/><br/>';
echo '&nbsp;&nbsp;<input type="hidden" name="'.$hidden_answer.'" value="'.$answer.'" /><br/>';
echo ' &nbsp;&nbsp;A. <input type="radio" name="'.$question_number.'" value="a" required/>'.$a.'<br/>';
echo '&nbsp;&nbsp;B. <input type="radio" name="'.$question_number.'" value="b" required/>'.$b.'<br/>';
echo '&nbsp;&nbsp;C. <input type="radio" name="'.$question_number.'" value="c" required/>'.$c.'<br/>';
echo '&nbsp;&nbsp;D. <input type="radio" name="'.$question_number.'" value="d" required/>'.$d.'
<br/>';
if($e!=""){
echo '&nbsp;&nbsp;E. <input type="radio" name="'.$question_number.'" value="e" required />'.$e.'<br/>';
}

echo '<br/><br/>';

//$a = $row_id[''];

}

}



}

echo '<input type="submit" name="mark" id="submit" value="Submit"  class="btn btn-primary"/>';
	echo '</form>';

	 }	  
		  
	} 	
	else{
	echo '<div class="row">
          <div class="col-lg-12" width="400px">
            <div class="bs-example">
              <div class="alert alert-dismissable alert-warning">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Wrong Input!</h4>
                <p>You have done this exam paper before.<a href="index.php">Go Home</a></p>
              </div>
            </div>
          </div>
        </div>';
	}		  

?>

</div>
<script src="../bower_components/jquery/jquery.min.js"></script>
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/bootswatch.js"></script>
	<script src="../assets/js/bsa.js"></script>
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