
<?php  
include_once("inc/image.php");
$image1 = new SimpleImage();
$path  = "assets/img/slide1.jpg";
 /*$image1->load($path); 
 $image1->scale(100); 
 $image1->save($path); 
 
 $image2 =  new SimpleImage();
 $path  = "assets/img/slide2.jpg";
 $image2->load($path); 
 $image2->scale(100); 
 $image2->save($path); 
 
 
 
 $image3 =  new SimpleImage();
 $path  = "assets/img/slide3.jpg";
 $image3->load($path); 
 $image3->scale(100); 
 $image3->save($path); */
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>CBT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="assets/css/bootswatch.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap-responsive.css">
	
	 <style type="text/css">
	 .carousel-control {
      height: 80px;
      margin-top: 0;
      font-size: 120px;
      text-shadow: 0 1px 1px rgba(0,0,0,.4);
      background-color: transparent;
      border: 0;
    }
	 </style>
    
      <script src="bower_components/bootstrap/assets/js/html5shiv.js"></script>
      <script src="bower_components/bootstrap/assets/js/respond.min.js"></script>
    
    
  </head>
  <body>
    

    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?php $_SERVER['PHP_SELF']; ?>" class="navbar-brand" class="active">Computer Based Test (CBT)</a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
		  <li>
              <a href="write">Write Exam</a>
            </li>
		  <li>
		  <a href="contact.php">Contact Us</a>
		  </li>
            <li>
              <a href="about_us.php">About Us</a>
            </li>
			<li>
			<a href="kitchen">Admin</a>
			</li>
            
          </ul>

          

        </div>
      </div>
    </div>


    <div class="container" style="margin-bottom:30px;">

    <div id="myCarousel" class="carousel slide" style="margin-top:30px;">
      <div class="carousel-inner">
        <div class="item active">
          <img src="assets/img/slide1.jpg" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>Examination</h1>
              <p class="lead">Examination is the distinction between a diligent and an hardworking students and lazy students</p>
              <a class="btn btn-large btn-primary" href="#">Sign up today</a>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="assets/img/slide2.jpg" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>Are you prepared?</h1>
              <p class="lead">Proper preparation prevents poor performance. If you adequately prepare for your examination(s), you will surely succeed</p>
              <a class="btn btn-large btn-primary" href="#">Learn more</a>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="assets/img/slide3.jpg" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>God on the scene</h1>
              <p class="lead">If you put God first before bragging about your own effort(s), you will surely come out in flying colours</p>
              <a class="btn btn-large btn-primary" href="#">Browse gallery</a>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div>


      <footer>
        <div class="row">
          <div class="col-lg-12">
            
            <ul class="list-unstyled">
              <li class="pull-right"><a href="#top">Back to top</a></li>
             
              <li><a href="http://feeds.feedburner.com/bootswatch">RSS</a></li>
              <li><a href="https://twitter.com/thomashpark">Twitter</a></li>
              <li><a href="https://github.com/thomaspark/bootswatch/">GitHub</a></li>
			</ul>
            <p>Made by <a href="http://thomaspark.me">John Ojetunde</a>. Contact him at <a href="mailto:bjaypjay2012@gmail.com">hello@john</a>.</p>
            <p>Code licensed under the <a href="http://www.apache.org/licenses/LICENSE-2.0">Apache License v2.0</a>.</p>
            
          </div>
        </div>
        
      </footer>
    

    </div>


    <script src="bower_components/jquery/jquery.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/bootswatch.js"></script>
	<script src="assets/js/bsa.js"></script>
	<script src="assets/js/bootstrap-carousel.js"></script>
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