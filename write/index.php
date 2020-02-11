<html>
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
<title>CBT | Write Exam</title>
</head>
<body onLoad=""bgcolor="#b8c5ba">
<?php 
session_start(); 

 if(isset($_GET['log'])){
 unset ($_SESSION['user']);
 unset ($_SESSION['user_name']);
 unset ($_SESSION['complete']);
 unset ($_SESSION['parent']);
 session_destroy();
 session_unset();
 header("Location: index.php");
 }
 
if(isset($_SESSION['user'])){
echo '<div class="col-lg-4">
            <div class="alert alert-dismissable alert-success">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>Well done!</strong> You are now logged in. Make sure you are time Conscious for your exam
            </div>';
echo '<a href="index.php?log=out">Log Out</a><br/>';
$id = $_SESSION['user'];
echo '<h3 align="center">You are welcome '.$_SESSION['user_name'].'</h3>';
$present_subject =  array();
$s_subject =  "SELECT * FROM `subject`";
$s_result = query($s_subject);
$s_mysql_rows = $s_result->num_rows;
for($i=0;$i<$s_mysql_rows;$i++){
	$row = $s_result->fetch_array();
	$s_subject_name = stripslashes($row['subject_name']);
	array_push($present_subject,$s_subject_name);
	}

$total_present_subject = sizeof($present_subject);
$sql  = "SELECT  * FROM `student` WHERE `id`='$id'";
	$result = query($sql);
	$done  = 0;
	$row = $result->fetch_array();
	for($r=0;$r<$total_present_subject;$r++){
		$placeholder = $present_subject[$r];
		$sub = stripslashes($row[''.$placeholder.'']);
		if($sub!=""){
			$done =  $done + 1;
			}
		}
	
	
	if($done==0){
	$final_answer =0 * 100;
	}else{
	$final_answer = ($done/$total_present_subject) * 100;
	
	}
	$finished_students = ceil($final_answer);
	echo '<h3 id="progress-animated">Exam Progress |  '.$finished_students.'% of  your Exam Papers have been written</h3>
            <div class="bs-example">
              <div class="progress progress-striped active">
                <div class="progress-bar" style="width: '.$final_answer.'%"></div>
              </div>
            </div>';
    $query = "SELECT `subject_name` FROM `subject`";
	  $result = query($query);
	  $mysql_rows = $result->num_rows;

 echo '<br/>
	  <form name="exam_form" action="index.php" method="post">
	  Select Subject:
	  <select name="subject">';
	  for($i=0;$i<$mysql_rows;$i++){
	  $answer = $result->fetch_array();
	  $subject_name = stripslashes($answer['subject_name']);
	  //echo $subject_name;
	  echo ' <option value="'.$subject_name.'">'.$subject_name.'</option>';
	  	  }
	  
	    echo '</select>
	  	  <input type="submit" name="go_exam" value="Go Exam" class="btn btn-primary"/>
	  </form>';
 
 if(isset($_POST['go_exam'])){
 $subject_name = $_POST['subject'];
   $id = $_SESSION['user'];
 $query = "SELECT * FROM `student` WHERE `id`='$id' && $subject_name!=''";
  	 $result = query($query);
	  $mysql_rows = $result->num_rows;
     if($mysql_rows>0){
	 echo '<div class="row">
          <div class="col-lg-12" width="400px">
            <div class="bs-example">
              <div class="alert alert-dismissable alert-warning">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Exam Already Written</h4>
                <p>Your have written this exam paper before</p>
              </div>
            </div>
          </div>
        </div>';
	 }
	 else{
	  $_SESSION['user_id']=$subject_name;
	header("Location: test.php");
	 }
 }
 
 }
 else if(isset($_POST['adm_log'])){
 $username = $_POST['username'];
 $username = strtolower($username);
 $username = mysql_real_escape_string($username);
 $exam_code = $_POST['password'];
 $exam_code = mysql_real_escape_string($exam_code);
    $query = "SELECT * FROM `student` WHERE `username`='$username' && `exam_code`='$exam_code'";
	 $result = query($query);
	  $mysql_rows = $result->num_rows;

	 if($mysql_rows<=0){
	 echo '<div class="row">
          <div class="col-lg-12" width="400px">
            <div class="bs-example">
              <div class="alert alert-dismissable alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Wrong Input!</h4>
                <p>Your username or password must be wrong, input another one.</p>
              </div>
            </div>
          </div>
        </div>';
		?>
		<form class="form-signin" autocomplete="on" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <h2 class="form-signin-heading">User Log In</h2>
		<span style="float:right;"><a href="../index.php">HOME</a></span>
        <label>Username</label><input type="text" class="input-block-level" placeholder="Username" required name="username">
        <label>Exam-Code</label><input type="password" class="input-block-level" placeholder="Exam Code" required name="password">
        
        <button class="btn btn-large btn-primary" type="submit" name="adm_log">Sign in</button>
      </form>
		<?php 
	 }
	 else{
	 for($i=0;$i<$mysql_rows;$i++){
	 $answer = $result->fetch_array();
	 $id = stripslashes($answer['id']);
	 $surname = stripslashes($answer['surname']);
	 $firstname = stripslashes($answer['firstname']);
	 $parent = stripslashes($answer['parent']);
	 $fullname = $surname.' '.$firstname;
	 $_SESSION['user'] = $id;
	 $_SESSION['user_name'] = $fullname;
	 $_SESSION['parent'] = $parent;
	 header("Location: index.php");
	 }
	 
	 }
	 
	 
	 
 }

 else{
 ?>
 <form class="form-signin" autocomplete="on" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <h2 class="form-signin-heading">User Log In</h2>
		<span style="float:right;"><a href="../index.php">HOME</a></span>
        <label>Username</label><input type="text" class="input-block-level" placeholder="Username" required name="username">
        <label>E-xam Code</label><input type="password" class="input-block-level" placeholder="Exam Code" required name="password">
        
        <button class="btn btn-large btn-primary" type="submit" name="adm_log">Sign in</button>
      </form>

<?php
}
?>
</body>
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
</html>