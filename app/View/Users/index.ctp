<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<title>skrollr - parallax scrolling for the masses</title>

	<link href="<?php echo $this->webroot; ?>css/fixed-positioning.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $this->webroot; ?>css/main.css" rel="stylesheet" type="text/css" />
		
</head>

<body >
	<!--div id="bg1" data-0="background-position:0px 0px;" data-end="background-position:-500px -10000px;"></div>
	<div id="bg2" data-0="background-position:0px 0px;" data-end="background-position:-500px -8000px;"></div>
	<div id="bg3" data-0="background-position:0px 0px;" data-end="background-position:-500px -6000px;"></div>

	<div id="progress" data-0="width:0%;background:hsl(200, 100%, 50%);" data-end="width:100%;background:hsl(920, 100%, 50%);"></div>

	<div id="intro" data-0="opacity:1;top:3%;transform:rotate(0deg);transform-origin:0 0;" data-500="opacity:0;top:-10%;transform:rotate(-90deg);">
		<h1><a href="https://github.com/Prinzhorn/skrollr">skrollr</a></h1>
		<h2>parallax scrolling for the masses</h2>
		<p>let's get scrollin' ;-)</p>
		<p class="arrows">▼&nbsp;▼&nbsp;▼</p>
	</div>

	<div id="transform" data-500="transform:scale(0) rotate(0deg);" data-1000="transform:scale(1) rotate(1440deg);opacity:1;" data-1600="" data-1700="transform:scale(5) rotate(3240deg);opacity:0;">
		<h2>transform</h2>
		<p>scale, skew and rotate the sh** out of any element</p>
	</div>

	<div id="properties" data-1700="top:100%;" data-2200="top:0%;" data-3000="display:block;" data-3700="top:-100%;display:none;">
		<h2>all numeric properties</h2>
		<p>width, height, padding, font-size, z-index, blah blah blah</p>
	</div-->

	<!--div id="easing_wrapper" data-0="display:none;" data-3900="display:block;" data-4900="background:rgba(0, 0, 0, 0);color[swing]:rgb(0,0,0);" data-5900="background:rgba(0,0,0,1);color:rgb(255,255,255);" data-10000="top:0%;" data-12000=" " data-13000=" ">
		<div id="easing" data-3900="left:100%" data-4600="left:25%;">
			<h2>easing?</h2>
			<p>sure.</p>
			<p>let me dim the <span data-3900="" data-4900="color[swing]:rgb(0,0,0);" data-5900="color:rgb(255,255,0);">lights</span> for this one...</p>
			<p data-5900="opacity:0;font-size:100%;" data-6500="opacity:1;font-size:150%;">you can set easings for each property and define own easing functions</p>
		</div>

		<div class="drop" data-6500="left:15%;bottom:100%;" data-9500="bottom:0%;">linear</div>
		<div class="drop" data-6500="left:25%;bottom[quadratic]:100%;" data-9500="bottom:0%;">quadratic</div>
		<div class="drop" data-6500="left:35%;bottom[cubic]:100%;" data-9500="bottom:0%;">cubic</div>
		<div class="drop" data-6500="left:45%;bottom[swing]:100%;" data-9500="bottom:0%;">swing</div>
		<div class="drop" data-6500="left:55%;bottom[WTF]:100%;" data-9500="bottom:0%;">WTF</div>
		<div class="drop" data-6500="left:65%;bottom[inverted]:100%;" data-9500="bottom:0%;">inverted</div>
		<div class="drop" data-6500="left:75%;bottom[bounce]:100%;" data-9500="bottom:0%;">bounce</div>
	</div-->
		<div id="easing" data-1="top:2%;left:76%" data-200="top:-19%;left:76%" >
			<a href=<?php echo $login_ret ?>> <img src="<?php echo $this->webroot; ?>img/picture-frame2.png"> </a>
		</div>
		<div id="easing" data-1="top:22%;left:82%;opacity:0.2" data-200="left:100%" >
			<img src="<?php echo $this->webroot; ?>img/know.png" onclick="pageScroll()">
		</div>
	<div id="easing_wrapper"  data-0="display:block;" data-8100="top:0% " data-9100="top:-100% " >
	
		<div class="wardrobe-rug" data-1="display:block;top:75%;left:20%" data-6000="top:75%;left:20%" data-7000="top:75%;left:100%">
			<img src="<?php echo $this->webroot; ?>img/wardrobe-rug.png">
		</div>
		<div class="wardrobe" data-1="display:block;top:5%;left:15%;opacity:1"  data-6000="display:block;top:5%;left:15%" data-7000="display:none;top:100%;left:15%">
			<img src="<?php echo $this->webroot; ?>img/wardrobe.png">
		</div>
		<div class="desk" data-1="display:block;top:13%;left:54%"  data-6000="top:13%;left:54%" data-7000="top:13%;left:-31%"	 >
			<img src="<?php echo $this->webroot; ?>img/desk2.png">
		</div>
		<div class="juan" data-1="display:block;top:48%;left:64%" data-6000="top:48%;left:64%" data-7000="top:-42%;left:64%"	 >
			<img src="<?php echo $this->webroot; ?>img/clothes.png">
		</div>
		<div class="desk" data-1="display:block;top:13%;left:54%;opacity:0" data-900="opacity:1" data-6000="display:block;top:13%;left:54%" data-7000="top:13%;left:-31%;"	 >
			<img src="<?php echo $this->webroot; ?>img/desk3.png">
		</div>
		<div class="desk" data-1="display:block;top:13%;left:54%;opacity:0" data-2000="opacity:0" data-2200="opacity:1" data-2400="opacity:1" data-2600="opacity:0"	data-2800="opacity:0" data-3000="opacity:1" data-3200="opacity:1" data-3400="opacity:0" data-3600="opacity:1" data-3800="opacity:1" data-4000="opacity:0" data-6000="display:block;top:13%;left:54%" data-7000="top:13%;left:-31%;"	 >
			<img src="<?php echo $this->webroot; ?>img/desk4.png">
		</div>

		
		<!--div class="facebook-screen"  data-1="display:block;top:20.8%;left:67.6%; opacity:0" data-900="top:20.8%;left:67.6%; opacity:1" data-4500="top:20.8%;left:67.6%; opacity:1"	 data-5000="opacity:0">
			<img src="<?php echo $this->webroot; ?>img/facebook-logo.png" height=90%; width=95%;>
		</div-->
		<!--div class="notification-bar"  data-1="display:block;top:15%;left:74.4%; opacity:0" data-2000="opacity:0" data-2200="opacity:1" data-2400="opacity:1" data-2600="opacity:0"	data-2800="opacity:0" data-3000="opacity:1" data-3200="opacity:1" data-3400="opacity:0" data-3600="opacity:1" data-3800="opacity:1" data-4000="opacity:0">
			<img src="<?php echo $this->webroot; ?>img/ring.png" height=25%; width=25%;>
		</div-->
	</div>

	<div id="easing_wrapper"  data-9100="display:block;opacity:0" data-10100="opacity:0 " data-10600="opacity:1;top:0% " data-20000="top:0%"  data-21000="top:-100%">
		<div class="desk"  data-10700="top:5%;left:-36%;" 	data-11700="top:5%;left:33%;" > <!-- -36% -->
			<img src="<?php echo $this->webroot; ?>img/desk2.png" height=130%; width=130%>
		</div>
		<div class="desk"  data-10700="top:5%;left:-36%;opacity;0;"  data-11700="top:5%;left:33%;" data-12700="opacity:0" data-13700="opacity:1"> <!-- -36% -->
			<img src="<?php echo $this->webroot; ?>img/desk5.png" height=130%; width=130%>
		</div>
		<div class="working"  data-10700="height:160%; width:150; top:13%;left:100%;" 	data-11700="top:13%;left:42%;" > <!-- -36% -->
			<img src="<?php echo $this->webroot; ?>img/working.png" height=35%; width=140%>
		</div>
		<!--div class="birthday"  data-10700="top:12%;left:46.5%;opacity:0" 	data-12700="opacity:0" data-13700="opacity:1" > 
			<img src="<?php echo $this->webroot; ?>img/birthday1.png" width=120%>
		</div-->
		<div class="thinking"  data-10700="display:none"  data-14200="display:block;top:20%;left:51%;opacity:1;height:1%;width:1%" data-15200="top:4%;left:52%; height:100%;width:100%" data-16000="opacity:1" data-17000="opacity:1" data-17500="opacity:0"> <!-- -36% -->
			<img src="<?php echo $this->webroot; ?>img/thinking1.png" height=15%; width=15%;>
		</div>
		<div class="thinking"  data-10700="display:none"  data-14200="display:block;top:20%;left:51%;opacity:1;height:1%;width:1%; opacity:0" data-15200="top:4%;left:52%; height:100%;width:100%; opacity:0;" data-16000="opacity:1" data-17000="opacity:1" data-17500="opacity:0"> <!-- -36% -->
			<img src="<?php echo $this->webroot; ?>img/thinking3.png" height=15%; width=15%;>
		</div>
		<div class="thinking-bulb"  data-10700="display:none"  data-16500="display:block;top:15%;left:48%;opacity:0" data-17500="top:9%;left:48%;  opacity:1;"> <!-- -36% -->
			<img src="<?php echo $this->webroot; ?>img/bulb.png" height=15% width=15%>
		</div>		
		<!--div class="working"  data-10700="top:12%;left:100%;" data-11700="top:12%; left:41.5%;" 	 >
			<img src="<?php echo $this->webroot; ?>img/working.png" height=160%; width = 150%; >
		</div-->
		
	</div>
	<div   id="easing_wrapper" data-21000="opacity:0; " data-22000="opacity:1;background:url('<?php echo $this->webroot; ?>img/back-room2.png');"  data-31000="opacity:1 " >
		
		<div class="logo"  data-22000= "height:100%;width:100%;top:15%; left:100%; " data-24000= "left:10%" > <!-- -36% -->
			<img src="<?php echo $this->webroot; ?>img/logo.gif" height=50% width=50% />
		</div>
		<div class="neko"  data-22000= "height:100%;width:100%;top:06%; left:-38%; " data-24000= "left:50%" > <!-- -36% -->
			<img src="<?php echo $this->webroot; ?>img/neko.gif" height=65% width=50% />
		</div>
		<div class="mite"  data-25000= "top:63%; left:15%; opacity:0" data-26000="opacity:1"> <!-- -36% -->
			<img src="<?php echo $this->webroot; ?>img/mite.png"  />
		</div>
		<div class="dot"  data-26500= "top:68%; left:32%;opacity:0 " data-27000="opacity:1"> <!-- -36% -->
			<img src="<?php echo $this->webroot; ?>img/dot.png"  />
		</div>
		<div class="khatte"  data-27000= "top:63%; left:35%; opacity:0" data-28000="opacity:1"> <!-- -36% -->
			<img src="<?php echo $this->webroot; ?>img/khatte.png"  />
		</div>
		<div class="dot"  data-28000= "top:68%; left:58%; opacity:0" data-28500="opacity:1"> <!-- -36% -->
			<img src="<?php echo $this->webroot; ?>img/dot.png"  />

		</div>
		<div class="ageru"  data-29000= "top:63%; left:61%; opacity:0" data-30000="opacity:1"> <!-- -36% -->
			<img src="<?php echo $this->webroot; ?>img/ageru.png"  />
		</div>
		
		
	</div>

	

		<!--div id="easing" data-0="left:100%" data-700="left:25%;">
			<h2>easing?</h2>
			<p>sure.</p>
			<p>let me dim the <span data-0="" data-1000="color[swing]:rgb(0,0,0);" data-2000="color:rgb(255,255,0);">lights</span> for this one...</p>
			<p data-2000="opacity:0;font-size:100%;" data-2600="opacity:1;font-size:150%;">you can set easings for each property and define own easing functions</p>
		</div>

		<div class="drop" data-2600="left:15%;bottom:100%;" data-5600="bottom:0%;">linear</div>
		<div class="drop" data-2600="left:25%;bottom[quadratic]:100%;" data-5600="bottom:0%;">quadratic</div>
		<div class="drop" data-2600="left:35%;bottom[cubic]:100%;" data-5600="bottom:0%;">cubic</div>
		<div class="drop" data-2600="left:45%;bottom[swing]:100%;" data-5600="bottom:0%;">swing</div>
		<div class="drop" data-2600="left:55%;bottom[WTF]:100%;" data-5600="bottom:0%;">WTF</div>
		<div class="drop" data-2600="left:65%;bottom[inverted]:100%;" data-5600="bottom:0%;">inverted</div>
		<div class="drop" data-2600="left:75%;bottom[bounce]:100%;" data-5600="bottom:0%;">bounce</div>
	</div-->

	<!--div id="download" data-8100="top[cubic]:100%;border-radius[cubic]:0em;background:rgb(0,50,100);border-width:0px;" data-12000="top:10%;border-radius:2em;background:rgb(190,230,255);border-width:10px;">
		<h2>the end</h2>
		<p>by the way, you can also animate colors (you did notice this, didn't you?)</p>
		<p><strong>Now get this thing on <a href="https://github.com/Prinzhorn/skrollr">GitHub</a> and spread the word, it's open source!</strong> <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://prinzhorn.github.com/skrollr/" data-via="Prinzhorn">Tweet</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></p>
		<p>Check out more <a href="https://github.com/Prinzhorn/skrollr/tree/master/examples#examples">examples</a>.</p>
		<p>Handcrafted by <a href="https://twitter.com/Prinzhorn" class="twitter-follow-button" data-show-count="false">Follow @Prinzhorn</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></p>
	</div-->

	<div id="scrollbar" data-0="top:0%;margin-top:2px;" data-end="top:100%;margin-top:-52px;"></div>
	<script src="<?php echo $this->webroot; ?>js/skrollr.min.js"></script>
	<script data-main="<?php echo $this->webroot; ?>js/main" src="<?php echo $this->webroot; ?>js/require.js"></script>
	
	
	<script type="text/javascript">
		function pageScroll() {
	    	window.scrollBy(0,200); // horizontal and vertical scroll increments
	    	scrolldelay = setTimeout('pageScroll()',100); // scrolls every 100 milliseconds
		}
	</script>
	<!--[if lt IE 9]>
	<script type="text/javascript" src="dist/skrollr.ie.min.js"></script>
	<![endif]-->
</body>

</html>
