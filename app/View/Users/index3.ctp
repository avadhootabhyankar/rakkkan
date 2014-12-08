<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width">
<title>CSS Image Zooming Grid</title>
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,400,900" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet" type="text/css">
<style type="text/css">
* {
	margin: 0;
	padding: 0;
}
body {
	background: url(../images/texture_subtle_grunge.jpg);
	font-family: 'Helvetica Neue', arial, sans-serif;
	font-weight: 200;
}

h1 {
	font-family: Brush Script MT;
	font-size: 7em;
	letter-spacing: 3px;
	color: red;
	text-shadow: 1px 1px 0 #fff, 2px 2px 0 #bbb;
	<!--margin : 0 0 20px;
		font-weight: 900;-->
	
}
hr {
	border-top: 1px solid #ccc;
	border-bottom: 1px solid #fff;
	margin: 25px 0;
	clear: both;
}

<!--h4 {
-webkit-margin-before: 1.33em;
-webkit-margin-after: 1.33em;
-webkit-margin-start: 0px;
-webkit-margin-end: 0px;
}-->
.centered {
	text-align: center;
}
.wrapper {
	width: 100%;
}
.container {
	width: 1200px;
	margin: 0 auto;
}

.img-circle {
  border-radius: 50%;
}

/* ---------- Zoom container ---------- */
.image-zoom-container {
	list-style: none;
	font-size: 0px;
}
.zoom-container {
	position: relative;
	overflow: hidden;
	display: inline-block;
	width: 33.33%; /* this value + 2 should = 33% */
	font-size: 16px;
	font-size: 1rem;
	border: 1px solid #fff;
	vertical-align: top;
	box-sizing: border-box;
	-moz-box-sizing: border-box;
	-webkit-box-sizing: border-box;
}
.zoom-container img {
	display: block;
	width: 100%;
	height: auto;
	-webkit-transition: all .5s ease; /* Safari and Chrome */
    -moz-transition: all .5s ease; /* Firefox */
    -ms-transition: all .5s ease; /* IE 9 */
    -o-transition: all .5s ease; /* Opera */
    transition: all .5s ease;
}
.zoom-container .zoom-caption {
	position: absolute;
	top: 0;
	right: 0;
	bottom: 0;
	left: 0;
	z-index: 10;
	background: rgba(0, 0, 0, .5);
	-webkit-transition: all .5s ease; /* Safari and Chrome */
    -moz-transition: all .5s ease; /* Firefox */
    -ms-transition: all .5s ease; /* IE 9 */
    -o-transition: all .5s ease; /* Opera */
    transition: all .5s ease;
}
.zoom-container .zoom-caption h3 {
	display: block;
	text-align: center;
	font-family: 'Source Sans Pro', sans-serif;
	font-size: 1.5em;
	font-weight: 900;
	letter-spacing: -1px;
	text-transform: uppercase;
	color: #fff;
	margin: 23% 0 0;
	padding: 10px 0;
	border-top: 5px solid rgba(255, 255, 255, .15);
	border-bottom: 5px solid rgba(255, 255, 255, .15);
}
.zoom-container:hover img {
	-webkit-transform:scale(1.25); /* Safari and Chrome */
    -moz-transform:scale(1.25); /* Firefox */
    -ms-transform:scale(1.25); /* IE 9 */
    -o-transform:scale(1.25); /* Opera */
     transform:scale(1.25);
}
.zoom-container:hover .zoom-caption {
	background: none;
}

.header 
{
    background: #222222;
}

.menu {
    width: 100%;
    height: 35px;
    font-size: 16px;
    font-family: Tahoma, Geneva, sans-serif;
    font-weight: bold;
    text-align: center;
    text-shadow: 3px 2px 3px #333333;
    background-color: #222222;
        border-radius: 8px;
}
ul 
{
    height: auto;
    padding: 8px 0px;
    margin: 0px;
}

li 
{ 
display: inline; 
padding: 20px; 
}

.menu a 
{
    text-decoration: none;
    color: #ffffff;
    padding: 8px 8px 8px 8px;
}

.menu a:hover {
    color: #F90;
    background-color: #FFF;
}

<!--.transbox {
    
    color: #001200;
	position: fixed;
    top: 10px;
    right: 1150px;
  }-->

@media (max-width: 1199px) {
	.container {
		width: auto;
		padding: 0 10px;
	}
}

@media (max-width: 767px) 
{
	.zoom-container 
	{
		width: 50%;
	}

}

@media (max-width: 480px) 
{
	.zoom-container 
	{
		width: 100%;
	}
	
}
</style>
</head>

<body>

<div class="wrapper">
	<div class="container">
		<div class="header">
			<div class="row">
						<div class="col-sm-3 hidden-sm">
							<img src="<?php echo $this->webroot; ?>/img/rakuten.png" class="img-circle" style="margin-top:4%;margin-bottom:4%;margin-left:4%;">
						</div>
						<div class="col-sm-5">
							<h1 style="margin-left:11%;">Rakkan</h1>
						</div>
						<div class="col-sm-4 hidden-sm">
								<img src="<?php echo $this->webroot; ?>img/headbg3.png" style="height:100%;width:90%;">
						</div>
			</div>
			
		</div>
		<div class="image-zoom-container">
			<div class="zoom-container">
				<a href="http://yahoo.com">
					<span class="zoom-caption">
						<h3></h3>
					</span>
					<img height=480px width=300px src="<?php echo $this->webroot; ?>/img/books1.jpg" ><!--class="img-circle"-->
				</a>
			</div>
			<div class="zoom-container">
				<a href="#">
					<span class="zoom-caption">
						<h3></h3>
					</span>
					<img height=480px width=300px src="<?php echo $this->webroot; ?>/img/smartphone.jpg" />
				</a>
			</div>
			<div class="zoom-container">
				<a href="#">
					<span class="zoom-caption">
						<h3></h3>
					</span>
					<img height=480px width=300px src="<?php echo $this->webroot; ?>/img/sports.png" />
				</a>
			</div>
			<div class="zoom-container">
				<a href="#">
					<span class="zoom-caption">
						<h3></h3>
					</span>
					<img height=480px width=300px src="<?php echo $this->webroot; ?>/img/beauty.png" />
				</a>
			</div>
			<div class="zoom-container">

				
				<a href=<?php echo $login_ret ?> >
				<span class="zoom-caption">
						<h3>Login with Facebook</h3>
					</span>
					<img height=480px width=300px src="<?php echo $this->webroot; ?>img/face.png" >
                  	
				</a>
			</div>
			<div class="zoom-container">
				<a href="#">
					<span class="zoom-caption">
						<h3></h3>
					</span>
					<img height=480px width=300px src="<?php echo $this->webroot; ?>/img/foods.jpg" />
				</a>
			</div>
			<div class="zoom-container">
				<a href="#">
					<span class="zoom-caption">
						<h3></h3>
					</span>
					<img src="<?php echo $this->webroot; ?>/img/clothes.jpg" />
				</a>
			</div>
			<div class="zoom-container">
				<a href="#">
					<span class="zoom-caption">
						<h3></h3>
					</span>
					<img src="<?php echo $this->webroot; ?>/img/kitchenware.jpg" />
				</a>
			</div>
			<div class="zoom-container">
				<a href="#">
					<span class="zoom-caption">
						<h3></h3>
					</span>
					<img src="<?php echo $this->webroot; ?>/img/entertainment.jpg" />
				</a>
			</div>
		</div>
		<!--/.image-zoom-container-->
		
		<hr />
		
		<div class="menu">
		<ul>
			<li><a href="index.html">Home</a></li>
			<li><a href="aboutus.html">About Us</a></li>
			<li><a href="services.html">Services</a></li>
			<li><a href="contactus.html">Contact Us</a></li>
		</ul>
		</div>
		
		<hr />
		<p class="centered">Copyright by <a href="http://alijafarian.com">Rakuten. Inc</a></p>
	</div>
	<!--/.container-->
</div>
<!--/.wrapper-->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>

</body>
</html>




<?php ////////////////////////////////////////////////////////////// ?>
<!--<html>
	<body>
		<?php
		//	     print_r($login_ret);
		?>
	</body>
</html>-->