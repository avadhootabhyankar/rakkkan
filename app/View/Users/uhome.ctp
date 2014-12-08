<!DOCTYPE html>
<html lang="en" style="margin-top:-20px;">
<?php
// Start the session
session_start();
?>
<?php

?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Heroic Features - Start Bootstrap Template</title>

	<!-- for slider only-->
	<link href="<?php echo $this->webroot;?>/css/bootstrap.icon.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $this->webroot;?>/css/slider.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo $this->webroot;?>/js/thumbnail-slider.js" type="text/javascript"></script>
	<!-- end of slider -->
	
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $this->webroot;?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo $this->webroot;?>/css/heroic-features.css" rel="stylesheet">

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- DEV MODE - including each .css file -->

        <link rel="stylesheet" href="<?php echo $this->webroot;?>/bower_components/normalize-css/normalize.css" />

        <link rel="stylesheet" href="<?php echo $this->webroot;?>/css/base.css" />

        <link rel="stylesheet" href="<?php echo $this->webroot;?>/css/code.css" />

        <link rel="stylesheet" href="<?php echo $this->webroot;?>/css/demos.css" />

        <link rel="stylesheet" href="<?php echo $this->webroot;?>/css/footer.css" />

        <link rel="stylesheet" href="<?php echo $this->webroot;?>/css/hero.css" />

        <link rel="stylesheet" href="<?php echo $this->webroot;?>/css/icons.css" />

        <link rel="stylesheet" href="<?php echo $this->webroot;?>/css/index.css" />

        <link rel="stylesheet" href="<?php echo $this->webroot;?>/css/layout.css" />

        <link rel="stylesheet" href="<?php echo $this->webroot;?>/css/modules.css" />

        <link rel="stylesheet" href="css/site-nav.css" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="bower_components/jquery/jquery.min.js"><\/script>')</script>


        <!-- DEV MODE - including each .js file -->

        <script src="<?php echo $this->webroot;?>/bower_components/classie/classie.js"></script>

        <script src="<?php echo $this->webroot;?>/bower_components/eventie/eventie.js"></script>

        <script src="<?php echo $this->webroot;?>/bower_components/doc-ready/doc-ready.js"></script>

        <script src="<?php echo $this->webroot;?>/bower_components/get-style-property/get-style-property.js"></script>

        <script src="<?php echo $this->webroot;?>/bower_components/eventEmitter/EventEmitter.js"></script>

        <script src="<?php echo $this->webroot;?>/bower_components/imagesloaded/imagesloaded.js"></script>

        <script src="<?php echo $this->webroot;?>/bower_components/get-size/get-size.js"></script>

        <script src="<?php echo $this->webroot;?>/bower_components/jquery-bridget/jquery.bridget.js"></script>

        <script src="<?php echo $this->webroot;?>/bower_components/matches-selector/matches-selector.js"></script>

        <script src="<?php echo $this->webroot;?>/bower_components/outlayer/item.js"></script>

        <script src="<?php echo $this->webroot;?>/bower_components/outlayer/outlayer.js"></script>

        <script src="<?php echo $this->webroot;?>/bower_components/masonry/masonry.js"></script>

        <script src="<?php echo $this->webroot;?>/js/controller.js"></script>

        <script src="<?php echo $this->webroot;?>/js/pages/events.js"></script>

        <script src="<?php echo $this->webroot;?>/js/pages/faq.js"></script>

        <script src="<?php echo $this->webroot;?>/js/pages/index.js"></script>

        <script src="<?php echo $this->webroot;?>/js/pages/methods.js"></script>


        <?php
        $count=0;
        if($flag==0)
            $count=count($resp);
        else
            $count=count($resp1)

            //print_r($count);
            //print_r($response[0]->Item->mediumImageUrls[0]->imageUrl);
        ?>
        <script>
            ( function( window ) {

'use strict';

var MD = window.MD;
// var $ = window.jQuery;

var heroContainer;
var heroMasonry;
var loadMoreButton;

// --------------------------  -------------------------- //


MD.index = function() {

  // ----- hero ----- //

  ( function() {
    var hero = document.querySelector('#hero');
    heroContainer = hero.querySelector('.hero-masonry');
    heroMasonry = new Masonry( heroContainer, {
      itemSelector: '.hero-item',
      columnWidth: '.grid-sizer'
    });

    getExamples();

  })();

  loadMoreButton = document.querySelector('#load-more-examples');

};


function getExamples() {

              var items = [];
              var fragment = document.createDocumentFragment();
              var data = examplesData;
              for ( var i=0, len = data.length; i < len; i++ ) {
                var item = makeExampleItem( data[i] );
                items.push( item );
                fragment.appendChild( item );
              }

              imagesLoaded( fragment )
                .on( 'progress', function( imgLoad, image ) {
                  var item = image.img.parentNode.parentNode;
                  // debugger
                  // console.dir( image.img.parentNode );
                  heroContainer.appendChild( item );
                  heroMasonry.appended( item );
                });
            }

            var examplesData = <?php 
            //$friend_arr= array(array());
            $array=array(array());
            if($flag==0){
                
                for($i=1;$i<$count;$i++){
                    $array[$i] = array(
                    "title" => $resp[$i]->Item->itemName,
                    "url" => $resp[$i]->Item->itemUrl,
                    "price" => "¥ ".$resp[$i]->Item->itemPrice,
                    "image" => $resp[$i]->Item->mediumImageUrls[0]->imageUrl,
                    "hid" =>  $resp[$i]->Item->itemCode
                );
                    
            }}
            else{
                
                for($i=1;$i<$count;$i++){
                    $array[$i] = array(
                    "title" => $resp1[$i]->Item->itemName,
                    "url" => $resp1[$i]->Item->itemUrl,
                    "price" => "¥ ".$resp1[$i]->Item->itemPrice,
                    "image" => $resp1[$i]->Item->mediumImageUrls[0]->imageUrl,
                    "hid" =>  $resp1[$i]->Item->itemCode  
                );
                    
            }
            }
            echo json_encode($array);
?>;
  
function makeExampleItem( dataObj ) {
    //echo "<input type='hidden' name='idusers' value='".$_SESSION["selfId"]."'>";
            //         echo "<input type='hidden' name='iditem' value='".$resp[$i]->Item->itemCode."' >";
    var hidden1=document.createElement('input');
    hidden1.type="hidden";
    var selfid1=<?php echo "\"".$_SESSION["selfId"]."\"";?>;
    hidden1.value=selfid1;//""+<?php echo $_SESSION["selfId"];?>+"\"";
    hidden1.name="idusers";

    var hidden2=document.createElement('input');
    hidden2.type="hidden";
    hidden2.name="iditem";
    hidden2.value=dataObj.hid;

  var item = document.createElement('div');
  item.className = 'hero-item has-example is-hidden';
  var formm= document.createElement('form');
  //formm.className = 'hero-item has-example is-hidden';
  formm.action="addWishlist";
  formm.method="POST";
  var h3 = document.createElement('h3');
  h3.textContent=dataObj.price;
  var btn = document.createElement('button');
  btn.textContent ="Add to Wishlist";
  btn.href= dataObj.url;
  var link = document.createElement('a');
  link.href = dataObj.url;
  var img = document.createElement('img');
  img.src = dataObj.image;
  var title = document.createElement('p');
  title.className = 'example-title';
  title.textContent = dataObj.title;
  formm.appendChild( img );
  formm.appendChild( title );
  formm.appendChild( h3 );
  formm.appendChild( btn );
  formm.appendChild( hidden1 );
  formm.appendChild( hidden2 );
  item.appendChild( formm );
  //formm.appendChild(item);
  return item;
}

})( window );

        </script>
        <!-- Custom CSS -->
        <link href="css/heroic-features.css" rel="stylesheet">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>





    <meta charset="utf-8">
  
      <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
      <script src="//code.jquery.com/jquery-1.10.2.js"></script>
      <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
      <link rel="stylesheet" href="/resources/demos/style.css">
<script> 
var friend_name_id_map= 
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
function setvalue()
{
    
    var str=document.getElementById('fsearch').value;
    
    var ind=0;
    //alert(friend_name_id_map[2][0]+friend_name_id_map[2][1]);
    for(ind=0;ind<friend_name_id_map.length;ind++)
    {
        if(friend_name_id_map[ind][0]==str)
        {
            //document.getElementById('friendid').value=friend_name_id_map[ind][1];
            document.cookie = "profileId="+friend_name_id_map[ind][1];
            document.cookie = "profileName="+friend_name_id_map[ind][0];
           
        }
    }   
}



$(document).ready(function(){

  $("#p2").click(function(){
  
    $("#c1").hide();
    /*$("#cc1").hide();
    $("#cc2").show();*/
    $("#c2").fadeIn("slow");
    
  });
$("#p1").click(function(){
    
    $("#c2").hide();
    /*$("#cc2").hide();
    $("#cc1").show();*/
   $("#c1").fadeIn("slow");
    
  });
});

$(function() {
    var friend_js= 
    <?php 
        $friend_arr= array();
        

        for($index=0;$index<$friends->length();$index++)
                {
                    $friend=$friends->get_friend($index); //fetch 1 friends from friends
                    $friend_name=$friend->get_name();
                    //$friend_id=$friend->get_id();
                    $friend_arr[$index]=$friend_name;
                    //$friend_arr[$index][1]=$friend_id;
                   
                }
                echo json_encode($friend_arr);
    ?>;
    $( "#fsearch" ).autocomplete({
      source: friend_js
    });
    // var str=document.getElementById('fsearch').innerHTML;
    
    // var ind=0;
    // for(ind=0;ind<friend_name_id_map.length;ind++)
    // {
    //     if(friend_name_id_map[ind][0]==str)
    //     {

    //         document.getElementById('friendid').value=friend_name_id_map[ind][1];
    //         document.cookie = "profileId="+friend_name_id_map[ind][1];
    //         alert(friend_name_id_map[ind][1]);
    //     }
    // }  

  });


</script>

</head>

<style>

.mystyle
{
	margin-top: 20px;

}

.mystyle2
{
	height: 10%;
}
ul#nav{ 
  margin: 0;
}

ul#nav, ul#nav ul {
  list-style: none;
  margin: 10px 0px 0px 0px;
}

ul#nav li:hover>* {
  display: block;
}
ul#nav li:hover {
  position: relative;
}

ul#nav ul {
  padding: 0 5px 5px;
}

ul#nav li {
  margin: 0;
  display: block;
  background-color: #e74c3c;
  width: 100%;
  margin-right:0px;
  margin-left:0px;
  text-decoration: none;
  border-bottom: 1px solid #fff;
  font-weight: normal;
  white-space: nowrap;
}
ul#nav>li, ul#nav li {
  margin: 0 0 0 5px;
}
ul#nav ul>li {
  margin: 5px 0 0;
}
ul#nav a:active, ul#nav a:focus {
  outline-style: none;
}
ul#nav a {
  display: block;
  color: #FFF;
  background-color: #e74c3c;
  width: 100%;
  margin-right:0px;
  margin-left:0px;
  text-decoration: none;
  border-bottom: 1px solid #fff;
  font-weight: bold;
}


ul#nav ul a {
  display: block;
  color: #FFF;
  background-color: #e74c3c;
  width: 100%;
  margin-right:0px;
  margin-left:0px;
  text-decoration: none;
  border-bottom: 1px solid #fff;
  font-weight: bold;
  text-shadow: #fff 0 0 0;
}
ul#nav li:hover>a {
  border-style: none;
  color: #fff;
  font-size: 13px;
  font-weight: bold;
  text-decoration: none;
}

ul#nav ul li:hover>a {
  border-color: #444;
  border-style: solid;
  color: #444;
  font-size: 11px;
  text-decoration: none;
  text-shadow: #fff 0 0 0;
}
ul#nav > li >a {
  background-color: transpa;
}
ul#nav > li:hover > a {
  background-color: #bdc3c7;
  color:#000;
}

ul#nav > li.active > a,
ul#nav > li > a:active,
ul#nav > li > a:focus
{
    color:white;
    text-transform:uppercase;
    background-color:#ecf0f1;
    color:#000;
}

/*ends*/

</style>

<body style="padding-bottom:0px;" class="index-page" data-page="index">
    <script>

    function setcookie(){


        document.cookie="psearch="+document.getElementById('psearch').value;
        //alert(document.cookie);
    }
    </script>
    
        <?php 
        print_r($items);
//        $_SESSION["selfId"] = $graph_user->getId();
        //echo $_SESSION["selfId"];
        //$this->requestAction('/Users/uhome');
        //$items=array();
        //$items=$this->requestAction(array('controller' => 'users', 'action' => 'retrieve'));
//print_r($items."juiuihuh");
        ?>
    <!-- Page Content -->
    <div class="container" style="box-shadow: 1px 4px 4px 4px #A1A1A1;">

        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer" style="padding-right:0px; padding-left:0px; padding-top:0px; padding-bottom:0px; ">
            <table style="padding-bottom:0px;">
                <tr>
                    <td style="padding-right:20px">
                        <img src="<?php echo $this->webroot;?>/img/banner1.png" height="150px" width="100%">
                    </td>
                </tr>
            </table>
        </header>
      
         <?php
                        echo $logout_ret;
                        ?>
                        <br>
                        <br>
        <hr>

        <!-- Title -->
        
        <!-- /.row -->

        <!-- Page Features -->
         <div class="row text-center">

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail" style="margin-bottom:-10px;">
                    <img src="<?php echo $graph_user_pic->getProperty('url'); ?>" height="275px" width="250px">
                </div>
            </div>
			
			<div class="col-md-9 col-sm-6 hero-features">
			     
                 <div id="login_name" style="text-align:left">
			          <font style="font-size: 40px;padding-left:0px"><?php echo $graph_user->getFirstName().' '.$graph_user->getLastName()?></font>
                      
				  </div>
			
				<div class="row" style="margin-top: 38px; padding-top: 0px;margin-left:-80px;">
					<div class="div2">
						<div id="mcts1" style="width:600px;">
                            <?php 
                                for($index=0;$index<$friends->length();$index++)
                                {
                                   
                                    $friend=$friends->get_friend($index); //fetch 1 friend
                                    $friend_name=$friend->get_name();
                                    $friend_pic=$friend->get_pic();
                            
                                     echo "<img height='100' width='100' src='".$friend_pic."'>";
                                }
                            ?>
                            <?php 
                                for($index=0;$index<$friends->length();$index++)
                                {
                                   
                                    $friend=$friends->get_friend($index); //fetch 1 friend
                                    $friend_name=$friend->get_name();
                                    $friend_pic=$friend->get_pic();
                                    
                                
                                     echo "<img height='100' width='100' src='".$friend_pic."'>";
                                }
                            ?>
							<!-- /*<img src="<?php echo $this->webroot; ?>img/books.png" height=100px;width=100px />
							<img src="img/coupons.png"height=100px;width=100px />
							<img src="img/movies.png" height=100px;width=100px />
							
							<img src="img/books.png" height=100px;width=100px/>
                            <img src="img/coupons.png" height=100px;width=100px/>
                            <img src="img/movies.png" height=100px;width=100px /> -->
					
                            
						</div>
					</div>
				</div>
				
				<div class="row" style="padding-top:50px;padding-left:-10px;float:left;">
				    <form method="post" action="profile" id="search" style="margin-left:80px;">
                        <label for="fsearch"></label>                        
                        <input id="fsearch" name="fsearch1" onKeyUp="setvalue()" type="text" size="40" autocomplete="off" placeholder="Search friends..."/>
                    </form>
				</div>
			
			</div>
			
        </div>
        <!-- /.row -->
		<hr>
		<div class="row text-center" id="1">

			<!--chotu 1-->
            <!--div class="col-md-3 col-sm-6 hero-feature" id="cc1" style=" margin-bottom:-10px;background:#e74c3c;padding-left:0px;padding-right:0px; ">
				<div class="row">
					<br>
                    <p class="1" style="cursor: pointer;background: #ffffff; width: 100%;height:40px; line-height: 40px;" > 
                  <b>RECOMMENDATION</b></p>
					<p class="2" id="p2" style="cursor: pointer;line-height: 40px;"> WISHLIST </p>
					<br>
				</div>
				<div class="row" style="background: #ffffff;">
				</div>
            </div-->
            <div class="col-md-3 col-sm-6 hero-feature"  style="margin-bottom:-10px;padding-left:0px;padding-right:0px; ">
            
                <div class="row" style="margin-left:0px;margin-right:0px;">
                    <br>
                    <!--the newly added tabs-->
                      <ul class="nav nav-tabs nav-stacked" id="nav">
                        <li><a href="#" id="p1" style="cursor:pointer;">Recommendation</a></li>
                        <li><a href="#" id="p2" style="cursor:pointer;">Wishlist</a></li>
                      </ul>
                    <!--new tabs ends-->
                    <br>
                </div>
                <div class="row" style="background: #ffffff;">
                </div>
            </div>
			<!--chotu 1 ends-->
			
			<!--chotu 2>
			<div class="col-md-3 col-sm-6 hero-feature" id="cc2" style="padding-left:0px;padding-right:0px; display:none;background:#e74c3c;">
				<div class="row">	
					<br>
                   <p class="1" id="p1" style="cursor: pointer;line-height: 40px;" onclick="return showHide();" > RECOMMENDATION </p> 
				   <p class="2"  style="cursor: pointer;background: #ffffff;height:40px;line-height: 40px;"><b> WISHLIST </b></p>	
					<br>
				</div>
				<div class="row" style="background: #ffffff;">
				</div>
            </div>
			
			<chotu 2 ends-->
			
			<div class="col-md-9 col-sm-6 hero-feature" id="c1"  style="background: #ffffff; margin-bottom: 0px;margin-top:20px;">
				
                <form method="post" action="uhome" id="search" style="margin-left:0px;">
                        <input name="psearch" id="psearch" onKeyUp="setcookie();" type="text" size="40" placeholder="Search products..."/>
                </form>
				
			
			<div class="row text-center mystyle">
			   <?php
            if($flag==0){ 
            echo "<div id='hero'><div class='primary-content' style='border-top: none;'><div class='hero-masonry'> <div class='grid-sizer'></div></div> </div> </div>   ";
            // for($i=1;$i<count($resp);$i++){
            //         echo "<form action='addWishlist' id='product' method='post'>";
            //         echo "<input type='hidden' name='idusers' value='".$_SESSION["selfId"]."'>";
            //         echo "<input type='hidden' name='iditem' value='".$resp[$i]->Item->itemCode."' >";
            //         echo "<div class='col-md-3 col-sm-6 hero-feature'>";
            //             echo "<div class='thumbnail mystyle2'>";
            //                 if($resp[$i]->Item->mediumImageUrls[0]->imageUrl)
            //                     echo "<img src='".$resp[$i]->Item->mediumImageUrls[0]->imageUrl."'>";
            //                 else
            //                     echo "<img height='128' width='128' src='".$this->webroot."/img/not_available.jpg'>";
            //                 echo "<div class='caption'>";
            //                         echo "<h6>".$resp[$i]->Item->itemName."</h6>";
            //                         echo "<h3>¥ ".$resp[$i]->Item->itemPrice."</h3>";
            //                         echo "<p>";
            //                             echo "<input type='submit' class='btn btn-primary' value='Add to Wishlist!'></input>";
            //                         echo "</p>";
            //                 echo "</div>";
            //             echo "</div>";
            //         echo "</div>";
            //         echo "</form>";
            //     }
            }
            if($flag==1){
                echo "<div id='hero'><div class='primary-content' style='border-top: none;'><div class='hero-masonry'> <div class='grid-sizer'></div></div> </div> </div>   ";
                // for($i=1;$i<count($resp1);$i++){
                //     echo "<form action='addWishlist' id='product' method='post'>";
                //      echo "<input type='hidden' name='idusers' value='".$_SESSION["selfId"]."'>";
                //     echo "<input type='hidden' name='iditem' value='".$resp1[$i]->Item->itemCode."' >";
                //     echo "<div class='col-md-3 col-sm-6 hero-feature'>";
                //         echo "<div class='thumbnail mystyle2'>";
                //             if($resp1[$i]->Item->mediumImageUrls[0]->imageUrl)
                //                 echo "<img src='".$resp1[$i]->Item->mediumImageUrls[0]->imageUrl."'>";
                //             else
                //                 echo "<img height='128' width='128' src='".$this->webroot."/img/not_available.jpg'>";
                //             echo "<div class='caption'>";
                //                     echo "<h6>".$resp1[$i]->Item->itemName."</h6>";
                //                     echo "<h3>¥ ".$resp1[$i]->Item->itemPrice."</h3>";
                //                     echo "<p>";
                //                         //echo "<a href='#' class='btn btn-primary'>Add to Wishlist!</a>";
                //                        echo "<input type='submit' class='btn btn-primary' value='Add to Wishlist!'></input>";
                //                     echo "</p>";
                //             echo "</div>";
                //         echo "</div>";
                //     echo "</div>";
                //     echo "</form>";
                // }
            }
                ?>
				
				
				</div>
				
			</div>
				
				
				<!--c2-->
					<div class="col-md-9 col-sm-6 hero-feature" id="c2" style="background: #ffffff; display:none; margin-bottom: 0px;width:700px;">
			
			
			<div class="row text-center mystyle">

                <?php
                for($i=0;$i<count($response);$i++){
                    $itemname=$response[$i]->Item->itemName;
                    $itemname=substr($itemname,0,20);
			   echo "<div class='col-md-3 col-sm-6 hero-feature' margin-bottom:20px;>";
                        echo "<div class='thumbnail mystyle2' style='border: 1px solid red; border-radius: 5px; width: 150px;'>";
                            if($response[$i]->Item->mediumImageUrls[0]->imageUrl)
                                echo "<img src='".$response[$i]->Item->mediumImageUrls[0]->imageUrl."'>";
                            else
                                echo "<img height='128' width='128' src='".$this->webroot."/img/not_available.jpg'>";
                            echo "<div class='caption'>";
                                    echo "<h6>".$itemname."</h6>";
                                    echo "<h3>¥ ".$response[$i]->Item->itemPrice."</h3>";
                                    echo "<p>";
                                        echo "<a href='".$response[$i]->Item->itemUrl."' target='_blank' ><button style='margin-bottom: 5px;border-radius: 5px;height: 20%;width: 70%;font-size: 12px;font-weight: bold;''>Buy Now!</button></a>";
                                    echo "</p>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                }
                ?>				
				 <!-- <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail mystyle2">
                    <img src="http://placehold.it/800x500" alt="">
                    <div class="caption">
                        <h3>Feature Label</h3>
                        
                        <p>
                            <a href="#" class="btn btn-primary">Buy Now!</a>
                        </p>
						</div>
				</div>	
				</div>
				 -->
				 
			</div>
			
			</div>
				
			<!--c2 ends-->	
				
				
        </div>
		
		
		
		
		<!--div class="row text-center" id="2" style="display:none; background: #ecf0f1;">

            <div class="col-md-3 col-sm-6 hero-feature" style="padding-left:0px;padding-right:0px;">
				<br><br>
               
                   <p class="1" id="p1" style="cursor: pointer;line-height: 40px;" onclick="return showHide();" > RECOMMENDATION </p> 
				   <p class="2" style="cursor: pointer;background: #ffffff;height:40px;line-height: 40px;"><b> WISHLIST </b></p>
              
            </div>
			
			<div class="col-md-9 col-sm-6 hero-feature" id="c2" style="background: #ffffff">
			
			
			<div class="row text-center mystyle">
			   <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail mystyle2">
                    <img src="http://placehold.it/800x500" alt="">
                    <div class="caption">
                        <h3>Feature Label</h3>
                      
                        <p>
                            <a href="#" class="btn btn-primary">Buy Now!</a> 
                        </p>
						</div>
				</div>	
				</div>
				
				 <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail mystyle2">
                    <img src="http://placehold.it/800x500" alt="">
                    <div class="caption">
                        <h3>Feature Label</h3>
                        
                        <p>
                            <a href="#" class="btn btn-primary">Buy Now!</a> 
                        </p>
						</div>
				</div>	
				</div>
				
				 <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail mystyle2">
                    <img src="http://placehold.it/800x500" alt="">
                    <div class="caption">
                        <h3>Feature Label</h3>
                       
                        <p>
                            <a href="#" class="btn btn-primary">Buy Now!</a> 
                        </p>
						</div>
				</div>	
				</div>
				
				 <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail mystyle2">
                    <img src="http://placehold.it/800x500" alt="">
                    <div class="caption">
                        <h3>Feature Label</h3>
                        
                        <p>
                            <a href="#" class="btn btn-primary">Buy Now!</a> 
                        </p>
						</div>
				</div>	
				</div>
			</div>
			
			</div>
			
        </div-->
		
        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p style="text-align:center;">Copyright &copy; Rakuten.Inc</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
        <script src="<?php echo $this->webroot;?>/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo $this->webroot;?>/js/bootstrap.min.js"></script>


</body>

</html>
