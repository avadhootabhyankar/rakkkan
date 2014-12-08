<?php
// $printfriend="";
// echo $profileId."<br>";
// for($index=0;$index<$friends->length();$index++)
// {
//     $friend=$friends->get_friend($index);
//     $friend_id=$friend->get_id();
//     //if($_COOKIE['profileId']==$friend_id){
//         $printfriend=$friend->get_name();       
//         echo $friend->get_id().$friend->get_name()."  ";
//       //  break;
//     //}

// }
//echo count($resp[0]);
//echo $resp[0]->Item->shopName;
?>
<!DOCTYPE html>
<html lang="en" style="margin-top:-20px;">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Heroic Features - Start Bootstrap Template</title>

	<!-- for slider only-->
	<link href="<?php echo $this->webroot;?>/css/generic.css?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo $this->webroot;?>/css/slider.css?>" rel="stylesheet" type="text/css" />
    <script src="<?php echo $this->webroot;?>/js/thumbnail-slider.js?>" type="text/javascript"></script>
	<!-- end of slider -->
	
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $this->webroot;?>/css/bootstrap.min.css?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo $this->webroot;?>/css/heroic-features.css?>" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Montserrat:400,700" />


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


        <!-- DEV MODE - including each .js file -->
<?php
            $count=count($response);
            print_r($count);
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
                for($i=0;$i<$count;$i++){
                    $array[$i] = array(
                    "title" => $response[$i]->Item->itemName,
                    "url" => $response[$i]->Item->itemUrl,
                    "price" => "¥ ".$response[$i]->Item->itemPrice,
                    "image" => $response[$i]->Item->mediumImageUrls[0]->imageUrl  
                );
                    
            }
            echo json_encode($array);
?>;
  
function makeExampleItem( dataObj ) {
  var item = document.createElement('div');
  item.className = 'hero-item has-example is-hidden';
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
  link.appendChild( img );
  link.appendChild( title );
  link.appendChild( h3 );
  link.appendChild( btn );
  item.appendChild( link );
  return item;
}

})( window );

        </script>
        <!-- Custom CSS -->
        <link href="css/heroic-features.css" rel="stylesheet">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>







<script type="text/javascript" language="javascript">
	function showHide()
	{
    var ele2 = document.getElementById("2");
	var ele1 = document.getElementById("1");
    if(ele1.style.display == "block")
	{
            ele1.style.display = "none";
			ele2.style.display = "block";
     }
    else  
	{
        ele1.style.display = "block";
		ele2.style.display = "none";
    }
}
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

</style>

<body style="padding-bottom:0px;background:white;">

    <!-- Page Content -->
    <div class="container" style="box-shadow: 1px 4px 4px 4px #A1A1A1;">

        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer" style="padding-right:0px; padding-left:0px; padding-top:0px; padding-bottom:0px ">
            <table >
                <tr>
                    <td style= "padding-right:20px">
                        <img src="<?php echo $this->webroot; ?>/img/gift.png" height='150px' width='150px'>
                        
                    </td>
                    <td>
                        <h1>RAKKAN</h1>
                    </td>
                </tr>
            </table>
        </header>
        <a href="uhome" class='btn btn-primary'>Home</a>
     <?php
                        echo $logout_ret;
                        ?>
                        <br>
        <hr>

        <!-- Title -->
        
        <!-- /.row -->

        <!-- Page Features -->
        <?php
        
        ?>
        <div class="row text-center">
			
            <div class="col-md-3 col-sm-6 hero-feature">
				<br><br><br>
                <div class="thumbnail" style="margin-bottom:-10px; width:200px;">	
                    <?php
                        // $tempname=$_COOKIE['profileName'];
                        // $friend_pic="";
                        // for($index=0;$index<$friends->length();$index++)
                        // {
                        //     $friend=$friends->get_friend($index); //fetch 1 friend
                        //     $friend_name=$friend->get_name();
                        //     echo $friend_name;
                        //     if($friend_name==$tempname){
                        //         $friend_pic=$friend->get_pic();
                        //         break;
                        //     }                
                        //     echo "<img height='200' width='200' src='".$friend_pic."'>";
                        // }                          
                    echo "<img height='200' width='200' src='".$friendImg."'>";
                    ?>
                    
                </div>
            </div>
			
			<div class="col-md-9 col-sm-6 hero-features">
			
				<div class="row" align="left" style="margin-left:100px">
					<!--<form name="input"></form-->
					<b><font style="font-size: 20px;font-family:"Roboto";">You are gifting <?php echo $_COOKIE['profileName'];?></font></b>
				
				</div>

			</div>
			
        </div>
        <!-- /.row -->
		
<div id="hero">
                    hero
                            <div class="primary-content">
                                primary content
                                <div class="hero-masonry">
                                    hero masonry
                                    <div class="grid-sizer">
                                       grid sizer
                                    </div>
                                    
                                </div> 
                            </div> 

                        </div>
        
		<hr>
		



		<div class="row text-center">

			<!-- <div class="col-md-9 col-sm-6 hero-feature"> -->
			
			
			<!-- <div class="row text-center mystyle"> -->

                 
                <?php
                // for($i=0;$i<count($resp);$i++){
                //     echo "<div class='col-md-3 col-sm-6 hero-feature'>";
                //         echo "<div class='thumbnail mystyle2'>";
                //             if($resp[$i]->Item->mediumImageUrls[0]->imageUrl)
                //                 echo "<img src='".$resp[$i]->Item->mediumImageUrls[0]->imageUrl."'>";
                //             else
                //                 echo "<img height='128' width='128' src='".$this->webroot."/img/not_available.jpg'>";
                //             echo "<div class='caption'>";
                //                     echo "<h6>".$resp[$i]->Item->itemName."</h6>";
                //                     echo "<h3>¥ ".$resp[$i]->Item->itemPrice."</h3>";
                //                     echo "<p>";
                //                         echo "<a href='".$resp[$i]->Item->itemUrl."' target='_blank' class='btn btn-primary'>Buy Now!</a>";
                //                     echo "</p>";
                //             echo "</div>";
                //         echo "</div>";
                //     echo "</div>";
                // }
                ?>
			<!-- </div> -->
			

			<!-- </div> -->
			
        </div>
		
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
