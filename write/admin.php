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
<body onload="start_timer()">
<?php
if(!isset($_POST['submit_ans'])){
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


if(!$check){
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
$query = "SELECT * FROM `questions` WHERE `subject`='$subject' ORDER BY `quest_no` ASC";
 	  $result = query($query);
	  $mysql_rows = $result->num_rows;
	  global $array;
	  $array = array();
	   global $arrays; 
	   $arrays = array();
echo '<form name="real_life" method="post" action="admin.php">';
echo '<h2 align="center"><u>'.$subject.'</u></h2>';
echo '<h3 align="center" style="color:red;"><u>Answer All Questions</u></h3>';	  
		for($i=0;$i<$mysql_rows;$i++){
	  $answer = $result->fetch_array();
	  $option_a = stripslashes($answer['option_a']);
	  //echo $option_a.'<br/>';
	  $option_b = stripslashes($answer['option_b']);
	  //echo $option_b.'<br/>';
	  $option_c = stripslashes($answer['option_c']);
	  //echo $option_c.'<br/>';
	  $option_d = stripslashes($answer['option_d']);
	  //echo $option_d.'<br/>';
	  $option_e = stripslashes($answer['option_e']);
	  //echo $option_e.'<br/>';
	  $quest_no = stripslashes($answer['quest_no']);
	  $question = stripslashes($answer['question']);
	  $answers = stripslashes($answer['answer']);
	  array_push($arrays,$quest_no);
	  array_push($array,$answers);
	  if(!isset($_POST['submit_ans'])){
	  echo '<div id="question_answer">';
	  echo '<fieldset>
	        <legend>'.$quest_no.'&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:black;">'. $question.'</span></legend>
			
			A.<input type="radio" name="answer['.$quest_no.']" value="a" id="radio">'.$option_a.'<br/>
			B.<input type="radio" name="answer['.$quest_no.']" value="b" id="radio">'.$option_b.'<br/>
			C.<input type="radio" name="answer['.$quest_no.']" value="c" id="radio">'.$option_c.'<br/>
			D.<input type="radio" name="answer['.$quest_no.']" value="d" id="radio">'.$option_d.'<br/>';
		if($option_e!=''){
		echo 'E.<input type="radio" name="answer['.$quest_no.']" value="e" id="radio">'.$option_e.'';
		}
	  echo '</fieldset></div><br/>';
	  }
	 }	  
	 if(!isset($_POST['submit_ans'])){
	echo '<input type="submit" name="submit_ans" id="submit" value="Submit"  class="btn btn-primary"/>';
	}
	echo '</form>';		  
	
	if(isset($_POST['submit_ans'])){
	$_SESSION['complete']="yes";
	   $score = '0';
		$length = sizeof($arrays);
	if(isset($_POST['answer'])){
	$john = $_POST['answer'];
$count = 0;
	for($i=0;$i<$length;$i++){
	$id = $arrays[$i];
	if(isset($john[$id])){
	//echo $john[$id].' '.$array[$i].'<br/>';
	if(trim($john[$id])==trim($array[$i])){
	$count++;
	}
	
	}
	
   
	}
	$score = ($count/$length) * 100;
	}
	//echo $score;
	$query = "UPDATE `student` SET `$subject`='$score' WHERE id='$ids'";
	//echo $score;
	$result = query($query);
	if($result){
	echo '<div class="row">
          <div class="col-lg-12" width="400px">
            <div class="bs-example">
              <div class="alert alert-dismissable alert-success">
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
	}else{
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