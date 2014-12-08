




<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Heroic Features - Start Bootstrap Template</title>

        <!-- for slider only-->
        <link href="<?php echo $this->webroot;?>/css/generic.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $this->webroot;?>/css/1/slider.css" rel="stylesheet" type="text/css" />
        <script src="<?php echo $this->webroot;?>/js/1/thumbnail-slider.js" type="text/javascript"></script>
        <!-- end of slider -->

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo $this->webroot;?>/css/bootstrap.min.css" rel="stylesheet">
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
        <script type="text/javascript" language="javascript">// <![CDATA[

            $(document).ready(function () {
                $("#p2").click(function () {
                    $("#c1").hide();
                    $("#cc1").hide();
                    $("#cc2").show();
                    $("#c2").fadeIn("slow");

                });
                $("#p1").click(function () {
                    $("#c2").hide();
                    $("#cc2").hide();
                    $("#cc1").show();
                    $("#c1").fadeIn("slow");

                });
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


    </style>

    <body  class="index-page" data-page="index">

        <!-- Page Content -->
        <div class="container">

            <!-- Jumbotron Header -->
            <header class="jumbotron hero-spacer" style="padding-right:0px; padding-left:0px; padding-top:0px; padding-bottom:0px ">
                <table >
                    <tr>
                        <td style= "padding-right:20px">
                            <img src="<?php echo $this->webroot;?>/img/gift.png" height=150px width=150px>
                        </td>
                        <td>
                            <h1>RAKKAN</h1>
                        </td>
                    </tr>
                </table>
            </header>

            <hr>

            <!-- Title -->

            <!-- /.row -->

            <!-- Page Features -->
            <div class="row text-center">

                <div class="col-md-3 col-sm-6 hero-feature">
                    <div class="thumbnail" style="margin-bottom:-10px;">
                        <img src="http://placehold.it/250x275" alt="">
                    </div>
                </div>

                <div class="col-md-9 col-sm-6 hero-features">

                    <div id="login_name" style="text-align:left">
                        <font style="font-size: 40px;padding-left:0px">Samkit</font>
                    </div>

                    <div class="row" style="margin-top: 38px; padding-top: 0px;margin-left:-80px;">
                        <div class="div2">
                            <div id="mcts1" style="width:600px;">
                                <img src="<?php echo $this->webroot;?>/img/books.png" height=100px;width=100px />
                                <img src="<?php echo $this->webroot;?>/img/coupons.png"height=100px;width=100px />
                                <img src="<?php echo $this->webroot;?>/img/movies.png" height=100px;width=100px />

                                <img src="<?php echo $this->webroot;?>/img/books.png" height=100px;width=100px/>
                                <img src="<?php echo $this->webroot;?>/img/coupons.png" height=100px;width=100px/>
                                <img src="<?php echo $this->webroot;?>/img/movies.png" height=100px;width=100px />


                            </div>
                        </div>
                    </div>

                    <div class="row" style="padding-top:50px;padding-left:-10px;float:left;">
                        <form method="get" action="/search" id="search" style="margin-left:80px;">
                            <input name="fsearch" type="text" size="40" placeholder="Search friends..." autocorrect="off" />
                        </form>
                    </div>

                </div>

            </div>
            <!-- /.row -->
            <hr>
            <div class="row text-center" id="1">

                <!--chotu 1-->
                <div class="col-md-3 col-sm-6 hero-feature" id="cc1" style=" margin-bottom:-10px;background:#e74c3c;padding-left:0px;padding-right:0px; ">
                    <div class="row">
                        <br>
                        <p class="1" style="cursor: pointer;background: #ffffff; width: 100%;height:40px; line-height: 40px;" > 
                            <b>RECOMMENDATION</b></p>
                        <p class="2" id="p2" style="cursor: pointer;line-height: 40px;"> WISHLIST </p>
                        <br>
                    </div>
                    <div class="row" style="background: #ffffff;">
                    </div>
                </div>
                <!--chotu 1 ends-->

                <!--chotu 2-->
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

                <!--chotu 2 ends-->

                <div class="col-md-9 col-sm-6 hero-feature" id="c1" style="background: #ffffff; margin-bottom: 0px;">
                    <form method="get" action="/search" id="search" style="margin-left:0px;">
                        <input name="psearch" type="text" size="40" placeholder="Search products..." autocorrect="off"/>
                    </form>


                    <div class="row text-center mystyle">
                        <div id="hero">
                            <div class="primary-content">
                                <div class="hero-masonry">
                                    <div class="grid-sizer">
                                       
                                    </div>
                                </div> 
                            </div> 

                        </div> 
                    </div>

                </div>


                <!--c2-->
                <div class="col-md-9 col-sm-6 hero-feature" id="c2" style="background: #ffffff; display:none; margin-bottom: 0px;">


                    <div class="row text-center mystyle">
                        <div class="col-md-3 col-sm-6 hero-feature">
                            <div class="thumbnail mystyle2">
                                <img src="http://placehold.it/800x500" alt="">
                                <div class="caption">
                                    <h3>Feature Label</h3>
                                    <!--p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p-->
                                    <p>
                                        <a href="#" class="btn btn-primary">Buy Now!</a> <!--a href="#" class="btn btn-default">More Info</a-->
                                    </p>
                                </div>
                            </div>	
                        </div>

                        <div class="col-md-3 col-sm-6 hero-feature">
                            <div class="thumbnail mystyle2">
                                <img src="http://placehold.it/800x500" alt="">
                                <div class="caption">
                                    <h3>Feature Label</h3>
                                    <!--p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p-->
                                    <p>
                                        <a href="#" class="btn btn-primary">Buy Now!</a> <!--a href="#" class="btn btn-default">More Info</a-->
                                    </p>
                                </div>
                            </div>	
                        </div>

                        <div class="col-md-3 col-sm-6 hero-feature">
                            <div class="thumbnail mystyle2">
                                <img src="http://placehold.it/800x500" alt="">
                                <div class="caption">
                                    <h3>Feature Label</h3>
                                    <!--p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p-->
                                    <p>
                                        <a href="#" class="btn btn-primary">Buy Now!</a> <!--a href="#" class="btn btn-default">More Info</a-->
                                    </p>
                                </div>
                            </div>	
                        </div>

                        <div class="col-md-3 col-sm-6 hero-feature">
                            <div class="thumbnail mystyle2">
                                <img src="http://placehold.it/800x500" alt="">
                                <div class="caption">
                                    <h3>Feature Label</h3>
                                    <!--p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p-->
                                    <p>
                                        <a href="#" class="btn btn-primary">Buy Now!</a> <!--a href="#" class="btn btn-default">More Info</a-->
                                    </p>
                                </div>
                            </div>	
                        </div>
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
                        <p>Copyright &copy; Rakuten.Inc</p>
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
