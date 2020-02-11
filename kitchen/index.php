<?php include_once("../inc/system.php");  ?>
<html>
<script src="../js/index.js" language="Javascript"></script>
<link rel="stylesheet" type="text/css" href="../css/stylesheet.css">
 <link href="../assets/css/bootstrap.css" rel="stylesheet">
	<link href="../assets/css/admlog.css" rel="stylesheet">
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">
	<link rel="stylesheet" href="../assets/css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="../assets/css/bootswatch.min.css">
   
      <script src="../bower_components/bootstrap/assets/js/html5shiv.js"></script>
      <script src="../bower_components/bootstrap/assets/js/respond.min.js"></script>
     <script src="../js/index.js" language="Javascript"></script>
    <link rel="stylesheet" type="text/css" href="../css/stylesheet.css">

<head>
<title>CBT | Admin Section</title>
<style type="text/css">

</style>
</head>

<body>
<?php
session_start();
if(isset($_POST['adm_log'])){
$uname = $_POST['username'];
$pass = $_POST['password'];
$pass = md5($pass);
$userp = "0fd8c26c13833ef05bf899958f0b41c2";
$usern = "John";

if($usern==$uname && $pass==$userp){
setcookie("status","go");
setcookie("admin","John");
$_SESSION['user_id']=$_COOKIE['status'];
?>

<div class="col-lg-4">
            <div class="alert alert-dismissable alert-success">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>Well done!</strong> You are now logged in.You can now <a href="admin.php" class="alert-link">go In</a>.
            </div>
<?php
}else{
?>
<div class="row">
          <div class="col-lg-12" width="400px">
            <div class="bs-example">
              <div class="alert alert-dismissable alert-warning">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Wrong Input!</h4>
                <p>Your username or password must be wrong, input another one</p>
              </div>
            </div>
          </div>
        </div>
<?php
}
}

?>
<form class="form-signin" autocomplete="on" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <h2 class="form-signin-heading">Admin Log In</h2>
		<span style="float:right;"><a href="../index.php">HOME</a></span>
        <input type="text" class="input-block-level" placeholder="Username" required name="username">
        <input type="password" class="input-block-level" placeholder="Password" required name="password">
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button class="btn btn-large btn-primary" type="submit" name="adm_log">Sign in</button>
      </form>
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