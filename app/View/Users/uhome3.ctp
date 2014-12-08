<!DOCTYPE html>
<?php
// Start the session
session_start();
?>
<html>
<head>
<meta name="viewport" content="width=device-width">
<title>CSS Image Zooming Grid</title>
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,400,900" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet" type="text/css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <meta charset="utf-8">
        <meta name="viewport" content="width=620" />
        <title>Global Mall</title>
        <link rel="stylesheet" href="<?php echo $this->webroot;?>/css/style.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo $this->webroot;?>/css/search-result.css" type="text/css"/>
        <script type="text/javascript" src="<?php echo $this->webroot;?>/js/script.js"></script>
        <script type="text/javascript" src="<?php echo $this->webroot;?>/js/register.js"></script>
        <script type="text/javascript" src="<?php echo $this->webroot;?>/js/google-map.js"></script>
        <script src="<?php echo $this->webroot;?>/js/jquery.js" type="text/javascript"></script>
        <link href="<?php echo $this->webroot;?>/css/bootstrap.icon.css" rel="stylesheet">
        <script type="text/javascript" src="<?php echo $this->webroot;?>/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->webroot;?>/js/carousel.js"></script>

        <link href="<?php echo $this->webroot;?>/css/carousel.css" rel="stylesheet">
<link href="<?php echo $this->webroot;?>/css/generic.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $this->webroot;?>/css/slider.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo $this->webroot;?>/js/thumbnail-slider.js" type="text/javascript"></script>
	
	<script type="text/javascript" src="<?php echo $this->webroot;?>/js/jquery-1.7.1.js"></script>
	<script type="text/javascript" src="<?php echo $this->webroot;?>/js/jquery-1.9.1.min.js"></script>al

        <!-- bin/jquery.slider.min.js -->
        <script type="text/javascript" src="<?php echo $this->webroot;?>/js/jshashtable-2.1_src.js"></script>
        <script type="text/javascript" src="<?php echo $this->webroot;?>/js/jquery.numberformatter-1.2.3.js"></script>
        <script type="text/javascript" src="<?php echo $this->webroot;?>/js/tmpl.js"></script>
        <script type="text/javascript" src="<?php echo $this->webroot;?>/js/jquery.dependClass-0.1.js"></script>
        <script type="text/javascript" src="<?php echo $this->webroot;?>/js/draggable-0.1.js"></script>
        <script type="text/javascript" src="<?php echo $this->webroot;?>/js/jquery.slider.js"></script>
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



.search-result
{
	width:220px;
	height:320px;
	background:#FFF;
	padding:10px;
	border-radius:5px;
	box-shadow: 0 0 2px 2px #CCC;
	float:left;
	margin:15px 10px;
}
.seacrh-info
{
	width:100%;
	height:300px;
	background:url(images/search-result.png) no-repeat;
	float:left;
	font-family:sans-serif;
}
.seacrh-info div.product-img
{
	width:70%;
	margin:10px 15%;
	height:45%;
	box-shadow: 0 0 1px 1px #999;
}
.seacrh-info div.product-img img
{
	width:100%;
	height:100%;
}
.seacrh-info div.product-name,.seacrh-info div.product-price,.seacrh-info div.product-rating
{
	margin:2.5px 10%;
}
.seacrh-info div.product-name 
{
	width: 80%;
	font-family: sans-serif;
	color: #062039;
	font-size: 15px;
}
.seacrh-info div.product-price
{
	width:auto;
	color:#F66;
	font-size:16px;
	border-bottom:1px dashed #AAA;
	border-top:1px dashed #AAA;
	display:inline-block;
	padding:2.5px 5px;
}
.seacrh-info div.product-rating
{
	width:auto;
}
.seacrh-info div.shop-name
{
	width:100%;
	margin-top:20px;
	font-size:15px;
}
.seacrh-info div.distance-time
{
	width:100%;
	margin-top:5px;
	font-size:13px;
	color:#AAA;
}
.seacrh-info div.distance-time span.dist
{
	float:left;
}
.seacrh-info div.distance-time span.time
{
	float:right;
}

.search-shop-logo
{
	width:50px;
	height:50px;
	border-radius:100%;
	background:url(images/shop.png);
	margin-left:150px;
	margin-top:200px;
	box-shadow: 0 0 3px 3px #CCC;
}
/*-------------Rating-------------*/
.rating {
  unicode-bidi: bidi-override;
  direction: rtl;
  width:5.5em;
}
.rating > span {
  display: inline-block;
  position: relative;
  width: 0.5em;
  font-size:24px;
  color:#CCC;
  cursor:pointer;
}
.rating > span:hover:before,
.rating > span:hover ~ span:before {
   content: "\2605";
   position: absolute;
   color:#E68A00;
}


.photocontainer 
{
  width: 250px; /* Or whatever width you want */
  height: 140px;
}

.photocontainer img
 {
   width: 100%;
   height:100%;
}

#container1{
    width: 1000px;
    overflow: hidden;
    margin: 50px auto;
    background: white;
}

.photobanner {
    height: 233px;
    width: 3550px;
    margin-bottom: 80px;
}

/*keyframe animations*/
.first {
    -webkit-animation: bannermove 30s linear infinite;
       -moz-animation: bannermove 30s linear infinite;
        -ms-animation: bannermove 30s linear infinite;
         -o-animation: bannermove 30s linear infinite;
            animation: bannermove 30s linear infinite;
}
 
@keyframes "bannermove" {
 0% {
    margin-left: 0px;
 }
 100% {
    margin-left: -2125px;
 }
 
}
 
@-moz-keyframes bannermove {
 0% {
   margin-left: 0px;
 }
 100% {
   margin-left: -2125px;
 }
 
}
 
@-webkit-keyframes "bannermove" {
 0% {
   margin-left: 0px;
 }
 100% {
   margin-left: -2125px;
 }
 
}
 
@-ms-keyframes "bannermove" {
 0% {
   margin-left: 0px;
 }
 100% {
   margin-left: -2125px;
 }
 
}
 
@-o-keyframes "bannermove" {
 0% {
   margin-left: 0px;
 }
 100% {
   margin-left: -2125px;
 }
 
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

#panel,#flip
{
padding:5px;
text-align:center;
background-color:#e5eecc;
border:solid 1px #c3c3c3;
}
#panel
{
padding:50px;
}

#panel1,#flip1
{
padding:5px;
text-align:center;
background-color:#e5eecc;
border:solid 1px #c3c3c3;
}
#panel1
{
padding:20px;
display:none;
height:400px;
}
#flip1
{
display:none;
}



.search-result
{
	width:220px;
	height:320px;
	background:#FFF;
	padding:10px;
	border-radius:5px;
	box-shadow: 0 0 2px 2px #CCC;
	float:left;
	margin:15px 10px;
}
.seacrh-info
{
	width:100%;
	height:300px;
	background:url(images/search-result.png) no-repeat;
	float:left;
	font-family:sans-serif;
}
.seacrh-info div.product-img
{
	width:70%;
	margin:10px 15%;
	height:45%;
	box-shadow: 0 0 1px 1px #999;
}
.seacrh-info div.product-img img
{
	width:100%;
	height:100%;
}
.seacrh-info div.product-name,.seacrh-info div.product-price,.seacrh-info div.product-rating
{
	margin:2.5px 10%;
}
.seacrh-info div.product-name 
{
	width: 80%;
	font-family: sans-serif;
	color: #062039;
	font-size: 15px;
}
.seacrh-info div.product-price
{
	width:auto;
	color:#F66;
	font-size:16px;
	border-bottom:1px dashed #AAA;
	border-top:1px dashed #AAA;
	display:inline-block;
	padding:2.5px 5px;
}
.seacrh-info div.product-rating
{
	width:auto;
}
.seacrh-info div.shop-name
{
	width:100%;
	margin-top:20px;
	font-size:15px;
}
.seacrh-info div.distance-time
{
	width:100%;
	margin-top:5px;
	font-size:13px;
	color:#AAA;
}
.seacrh-info div.distance-time span.dist
{
	float:left;
}
.seacrh-info div.distance-time span.time
{
	float:right;
}

.search-shop-logo
{
	width:50px;
	height:50px;
	border-radius:100%;
	background:url(images/shop.png);
	margin-left:150px;
	margin-top:200px;
	box-shadow: 0 0 3px 3px #CCC;
}
/*-------------Rating-------------*/
.rating {
  unicode-bidi: bidi-override;
  direction: rtl;
  width:5.5em;
}
.rating > span {
  display: inline-block;
  position: relative;
  width: 0.5em;
  font-size:24px;
  color:#CCC;
  cursor:pointer;
}
.rating > span:hover:before,
.rating > span:hover ~ span:before {
   content: "\2605";
   position: absolute;
   color:#E68A00;
}

.popupbox
{   
    position: fixed;
	top:208px;
	width:350px;
	height:161px;
	left: 927px;
	box-shadow: 0 0 5px 3px rgba(37, 77, 104, 0.12);
    background-color: white;
}
.sug
{
    width:350px;
	height:23px;
    padding-top: 14px;
    padding-left: 10px;
    
}
.sug:hover
{
    background-color: #3333ff;
}

.menu
{
	width:23%;
	height:60px;
	margin:15px 0px;
}
.menu input.textbox
{
	border-top-left-radius:5px;
	border-bottom-left-radius:5px;
	border-top-right-radius:0px;
	border-bottom-right-radius:0px;
	width:500px;
	border-right:none;
	height:45px;
	margin-left:-50%;
	margin-top:15%;
}
.menu div.search-btn
{
	height:auto;
	width:80px;
	
}
.menu div.search-btn button
{
	border:2px solid;
	border-color:#00c6b2;
	background:#00c6b2;
	border-top-left-radius:0px;
	border-bottom-left-radius:0px;
	border-top-right-radius:5px;
	border-bottom-right-radius:5px;
	margin-left: 495px;
	cursor:pointer;
}
/*-----------Art-Button---------*/
button
{
	text-decoration:none;	
	text-align:center;
	height:45px;
}
.btn-block 
{
	white-space: normal;
	display:block;
	width:100%;
	border:1px solid;
}
.btn-lg
{
	padding: 10px 20px;
	font-size: 17px;
	line-height: 1.471;
	border-radius: 6px;
}
.btn-primary 
{
	color: #ffffff;
	background-color: #1abc9c;
}
.btn 
{
	border: none;
	font-size: 15px;
	font-weight: normal;
	line-height: 1.4;
	border-radius: 4px;
	padding: 10px 15px;
	-webkit-font-smoothing: subpixel-antialiased;
	-webkit-transition: 0.25s linear;
	transition: 0.25s linear;
}

</style>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script> 
//alert("helloo");
var friend_js= 
<?php 
	$friend_arr= array(array());
	

	for($index=0;$index<$friends->length();$index++)
            {
                $friend=$friends->get_friend($index); //fetch 1 friends from friends
                $friend_name=$friend->get_name();
                $friend_id=$friend->get_id();
                $friend_arr[$index][0]=$friend_name;
                $friend_arr[$index][1]=$friend_id;
               
            }
            echo json_encode($friend_arr);
?>;
//alert(friend_js[0][0]+" "+friend_js[0][1]);//+friend_id_js[0]);


$(document).ready(function(){
  $("#flip").click(function(){
    $("#panel").slideUp("slow");
  });
});

$(document).ready(function(){
  $("#flip").click(function(){
    $("#panel1").slideDown("slow");
  });
});

$(document).ready(function(){
  $("#flip1").click(function(){
    $("#panel1").slideUp("slow");
  });
});

$(document).ready(function(){
  $("#flip1").click(function(){
    $("#panel").slideDown("slow");
  });
});

function myFunction() {
    $("#flip").hide();
$("#flip1").show();
}

function myfunction1() {
    $("#flip1").hide();
$("#flip").show();
}

</script>
 <script>
			    jQuery(document).ready(function ($) {
                var _CaptionTransitions = [];
                _CaptionTransitions["L"] = { $Duration: 800, $FlyDirection: 1, $Easing: $JssorEasing$.$EaseInCubic };
                _CaptionTransitions["R"] = { $Duration: 800, $FlyDirection: 2, $Easing: $JssorEasing$.$EaseInCubic };
                _CaptionTransitions["T"] = { $Duration: 800, $FlyDirection: 4, $Easing: $JssorEasing$.$EaseInCubic };
                _CaptionTransitions["B"] = { $Duration: 800, $FlyDirection: 8, $Easing: $JssorEasing$.$EaseInCubic };
                _CaptionTransitions["TL"] = { $Duration: 800, $FlyDirection: 5, $Easing: $JssorEasing$.$EaseInCubic };
                _CaptionTransitions["TR"] = { $Duration: 800, $FlyDirection: 6, $Easing: $JssorEasing$.$EaseInCubic };
                _CaptionTransitions["BL"] = { $Duration: 800, $FlyDirection: 9, $Easing: $JssorEasing$.$EaseInCubic };
                _CaptionTransitions["BR"] = { $Duration: 800, $FlyDirection: 10, $Easing: $JssorEasing$.$EaseInCubic };

                _CaptionTransitions["WAVE|L"] = { $Duration: 1500, $FlyDirection: 5, $Easing: { $Left: $JssorEasing$.$EaseLinear, $Top: $JssorEasing$.$EaseOutWave }, $ScaleVertical: 0.4, $Round: { $Top: 2.5} };
                _CaptionTransitions["MCLIP|B"] = { $Duration: 600, $Clip: 8, $Move: true, $Easing: $JssorEasing$.$EaseOutExpo };

                var options = {
                    $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                    $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)
                    $CaptionSliderOptions: {                            //[Optional] Options which specifies how to animate caption
                        $Class: $JssorCaptionSlider$,                   //[Required] Class to create instance to animate caption
                        $CaptionTransitions: _CaptionTransitions,       //[Required] An array of caption transitions to play caption, see caption transition section at jssor slideshow transition builder
                        $PlayInMode: 1,                                 //[Optional] 0 None (no play), 1 Chain (goes after main slide), 3 Chain Flatten (goes after main slide and flatten all caption animations), default value is 1
                        $PlayOutMode: 3                                 //[Optional] 0 None (no play), 1 Chain (goes before main slide), 3 Chain Flatten (goes before main slide and flatten all caption animations), default value is 1
                    }
                };

                var jssor_slider1 = new $JssorSlider$("slider1_container", options);
            });
        </script>
        <script>
        	



            function setvalue(sugdiv)
            {
            	//alert(friend_arr[0][1]);
            	var str=document.getElementById(sugdiv).innerHTML;
            	document.getElementById('input').value=document.getElementById(sugdiv).innerHTML;
                document.getElementById("popup-box").className="popupbox display-none";
                var sugbox=['sug1','sug2','sug3','sug4','sug5','sug6','sug7'];
                var ind=0;
                for(ind=0;ind<friend_js.length;ind++)
                {
                	if(friend_js[ind][0]==str)
                	{

                		document.getElementById('userid').value=friend_js[ind][1];
                		document.cookie = "profileId="+friend_js[ind][1];
                	}
                }
//                document.getElementById('userid').value=friend_js[0][1]; 
                var i=0;
                for(;i<7;i++)
                {
                    document.getElementById(sugbox[i]).innerHTML="";     
                        
                }
                      
            }
            function getvalue()
            {
            	//alert("hi");
                array="";
                document.getElementById("popup-box").className="popupbox";
                var text=document.getElementById('input').value;
                if(text=="")
                {
                    document.getElementById("popup-box").className="popupbox display-none";
                }
                var sugbox=['sug1','sug2','sug3','sug4','sug5','sug6','sug7'];
               	var i=0,k=0;
				var text2=text.toLowerCase();
				for(i=0;i<friend_js.length;i++)
				{
					var temp3=friend_js[i][0].toLowerCase();
					if(temp3.indexOf(text2)>-1)
					{
						document.getElementById(sugbox[k]).innerHTML=friend_js[i][0]; 
						
					}
					else
					{
						document.getElementById(sugbox[k]).innerHTML=""; 
						
					}
					k++;
				}
				
            }
        </script> 
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
								<img src="<?php echo $this->webroot;    ?>/img/headbg3.png" style="height:100%;width:90%;">
						</div>
			</div>
			
		</div>

		<?php
		echo '<br>'.$logout_ret;
		?>
		<?php 
		$_SESSION["selfId"] = $graph_user->getId();
		//echo $_SESSION["selfId"];
		?>
		<div id="panel">
		
		<div class="row">
			<div class="col-sm-4">
				<img src="<?php echo $graph_user_pic->getProperty('url'); ?>" class="img-circle" style="width:200px;height:200px;float:left;margin-top:-1%;">
			</div>
			
			<div class="col-sm-8">
			<div class="row">
				<div class="col-sm-6">
					<h3 style="margin-left:-100%;"><?php echo $graph_user->getFirstName().' '.$graph_user->getLastName()?></h3>
				</div>
				
				<div class="col-sm-2">
					
				</div>
			</div>
			
			<div class="row">
				<div class="col-sm-3">
					<div class="menu">
						<div class="menu">
			                <form action="profile" method="post">
			                	<input type="hidden" name="userid" id="userid"/>
			                	<!--input type="hidden" name="Fsession"/-->
			                	<table><tr>
			                    <input name="inputtext" type="text" onKeyUp="getvalue();" autocomplete="off" id="input" class="textbox search_text" placeholder="Find your friends"></input>
			                    <div class="search-btn">
			                        <button class="btn btn-block btn-lg btn-primary" onClick="display_searchoption();">Search</button>
			                    </div></tr></table>
			                    <div class="popupbox display-none" id="popup-box">
			                        <div onClick="setvalue('sug1')"  class="sug">
			                            <span id="sug1"></span>
			                        </div>
			                        <div onClick="setvalue('sug2')" class="sug">
			                            <span id="sug2"></span>
			                        </div>
			                        <div onClick="setvalue('sug3')" class="sug">
			                            <span id="sug3"></span>
			                            
			                        </div>
			                        <div onClick="setvalue('sug4')" class="sug">
			                            <span id="sug4"></span>
			                            
			                        </div>
			                        <div onClick="setvalue('sug5')" class="sug">
			                            <span id="sug5"></span>
			                            
			                        </div>
			                        <div onClick="setvalue('sug6')" class="sug">
			                            <span id="sug6"></span>
			                            

			                        </div>
			                        <div onClick="setvalue('sug7')" class="sug">
			                            <span id="sug7"></span>
			                            
			                        </div>
			                        
			                    </div>
			                    
			                    
			                </form>
            			</div> 	
		                
		            </div>
					
				</div>
			</div>
			<div class="col-sm-5">
				
        		<div class="menu">
				
				</div>
	           
	        </div>
				
			</div>
			</div>	
					
		</div>
					
		
		
		<div class="div2">
        <div id="mcts1">
        	

				<?php 
                            for($index=0;$index<$friends->length();$index++)
				            {
				               
				                $friend=$friends->get_friend($index); //fetch 1 friend
				                $friend_name=$friend->get_name();
                				$friend_pic=$friend->get_pic();
            					
				      		
				                 echo "<img height='100' width='100' src='".$friend_pic."'>";
				            }
                ?>
		</div>
    </div>
		
		</div>
<button id="flip" onclick="myFunction()">Click me</button>
<button id="flip1" onclick="myfunction1()">hello</button>
<div id="panel1">

<div class="search-result">
								<div class="seacrh-info">
									<div class="product-img">
										<img src="<?=$row[3] ?>" height="150" width="150">
									</div>
									<div class="product-name">
										<span>
											<?= $row[1] ?>
										</span>
									</div>
									<div class="product-price">
										<span>
											<?= $row[2] ?>
										</span>
									</div>
									<div class="product-rating">
										<div class="rating">
											<span id="star-5">?</span>
											<span id="star-4">?</span>
											<span id="star-3">?</span>
											<span id="star-2">?</span>
											<span id="star-1" class="rating-active">?</span>
										</div>
									</div>
									<div class="shop-name">
										<span>
											<?= $row[12] ?>
										</span>
									</div>
									<div class="distance-time">
										<span class="dist">
											<?= 'Dist:'.$distance?>
										</span>
										<span class="time">
											<?= 'Time:' . $time ?>
										</span>
									</div>
								</div>
								<div class="search-shop-logo"></div>
							</div>

</div>
		
		<hr />
		<p class="centered">Copyright by <a href="http://alijafarian.com">Rakuten. Inc</a></p>
	</div>
	<!--/.container-->
</div>
<!--/.wrapper-->



</body>
</html>