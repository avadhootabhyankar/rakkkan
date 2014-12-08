<?php
error_reporting(E_ERROR | E_PARSE);
?>
<html>
    <head> 
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/> 
        <title>Google Maps JavaScript API v3 Example: Directions Complex</title> 
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <meta charset="utf-8">
        <meta name="viewport" content="width=620" />
        <title>Global Mall</title>
        <link rel="stylesheet" href="CSS/style.css" type="text/css"/>
        <link rel="stylesheet" href="CSS/search-result.css" type="text/css"/>
        <script type="text/javascript" src="./Script/script.js"></script>
        <script type="text/javascript" src="./Script/register.js"></script>
        <script type="text/javascript" src="Script/google-map.js"></script>
        <script src="jquery.js" type="text/javascript"></script>
        <link rel="stylesheet" href="CSS/search-result.css" type="text/css"/>
        <link rel="stylesheet" href="CSS/style.css" type="text/css"/>
        <link rel="stylesheet" href="CSS/jslider.css" type="text/css"/>
        <link rel="stylesheet" href="CSS/jslider.round.css" type="text/css">
        <link rel="stylesheet" href="CSS/jslider.round.plastic.css" type="text/css"/>


        <script type="text/javascript" src="Script/jquery-1.7.1.js"></script>

        <!-- bin/jquery.slider.min.js -->
        <script type="text/javascript" src="Script/jshashtable-2.1_src.js"></script>
        <script type="text/javascript" src="Script/jquery.numberformatter-1.2.3.js"></script>
        <script type="text/javascript" src="Script/tmpl.js"></script>
        <script type="text/javascript" src="Script/jquery.dependClass-0.1.js"></script>
        <script type="text/javascript" src="Script/draggable-0.1.js"></script>
        <script type="text/javascript" src="Script/jquery.slider.js"></script>

        <script type="text/javascript">
            var pricemin = 0;
            var pricemax = 500000;
            var distancemax = 100;
            var sortby = 'lth';
            var searchfrm = 'both';


            function calculate_filter_result()
            {
                if (document.getElementById("price-frm").value == "" && document.getElementById("price-to").value == "")
                {
                    pricemin = document.getElementById("min-value").innerHTML;
                    pricemax = document.getElementById("max-value").innerHTML;
                }
                else
                {
                    pricemin = document.getElementById("price-frm").value;
                    pricemax = document.getElementById("price-to").value;
                }

                pricemin = pricemin.replace(",", "");
                pricemax = pricemax.replace(",", "");

                var myNode = document.getElementById("search-result-container");
                while (myNode.firstChild)
                {
                    myNode.removeChild(myNode.firstChild);
                }
                $.ajax({
                    type: "GET",
                    url: "ajaxresult.php?distancemax=" + distancemax + "&pricemin=" + pricemin + "&pricemax=" + pricemax + "&type=" + searchfrm + "&sortby=" + sortby + "",
                    success: function(data)
                    {
                        alert(data);
                        var data_array = data.split(":");

                        var divID = data_array.length;

                        var i;
                        for (i = 0; i < divID - 1; i++)
                        {
                            var data_ind = data_array[i].split("#");

                            var searchresult = document.createElement("div");
                            searchresult.className = "search-result";

                            var searchinfo = document.createElement("div");
                            searchinfo.setAttribute("id", "result" + divID);
                            searchinfo.className = "seacrh-info";

                            var searchshoplogo = document.createElement("div");
                            searchshoplogo.className = "search-shop-logo";

                            var productimg = document.createElement("div");
                            productimg.className = "product-img";
                            var img = document.createElement("img");
                            img.src = data_ind[3];
                            img.class = "";
                            productimg.appendChild(img);

                            var productname = document.createElement("div");
                            productname.className = "product-name";
                            var name = document.createElement("span");
                            name.innerHTML = data_ind[1];
                            productname.appendChild(name);

                            var productprice = document.createElement("div");
                            productprice.className = "product-price";
                            var price = document.createElement("span");
                            price.innerHTML = data_ind[2];
                            productprice.appendChild(price);

                            var productrating = document.createElement("div");
                            productrating.className = "product-rating";
                            var rating = document.createElement("div");
                            rating.className = "rating";
                            var star1 = document.createElement("span");
                            star1.id = "star-5";
                            star1.innerHTML = "☆";
                            var star2 = document.createElement("span");
                            star2.id = "star-4";
                            star2.innerHTML = "☆";
                            var star3 = document.createElement("span");
                            star3.id = "star-3";
                            star3.innerHTML = "☆";
                            var star4 = document.createElement("span");
                            star4.id = "star-2";
                            star4.innerHTML = "☆";
                            var star5 = document.createElement("span");
                            star5.id = "star-1";
                            star5.className = "rating-active";
                            star5.innerHTML = "☆";
                            rating.appendChild(star1);
                            rating.appendChild(star2);
                            rating.appendChild(star3);
                            rating.appendChild(star4);
                            rating.appendChild(star5);
                            productrating.appendChild(rating);

                            var shopname = document.createElement("div");
                            shopname.className = "shop-name";
                            var sname = document.createElement("span");
                            sname.innerHTML = data_ind[0];
                            shopname.appendChild(sname);

                            var distance = document.createElement("div");
                            distance.className = "distance-time";
                            var dist = document.createElement("span");
                            dist.className = "dist";
                            dist.innerHTML = "Dist:" + data_ind[5];
                            distance.appendChild(dist);
                            var time = document.createElement("span");
                            time.className = "time";
                            time.innerHTML = "Time:" + data_ind[6];
                            distance.appendChild(time);

                            searchinfo.appendChild(productimg);
                            searchinfo.appendChild(productname);
                            searchinfo.appendChild(productprice);
                            searchinfo.appendChild(productrating);
                            searchinfo.appendChild(shopname);
                            searchinfo.appendChild(distance);

                            searchresult.appendChild(searchinfo);
                            searchresult.appendChild(searchshoplogo);
                            document.getElementById("search-result-container").appendChild(searchresult);
                        }
                    }
                });
            }
            function calculate_filter_result_sortby(input)
            {
                sortby = input.id;
            }
            function calculate_filter_result_searchfrm(input)
            {
                searchfrm = input.id;
            }
        </script>

    </head>
    <body>
        <div class="art-header">
            <div class="logo"></div>
            <div class="menu">
                <form action="findmyshopplz.php">
                    <input name="inputtext" type="text" onKeyUp="getvalue();" id="input" class="textbox search_text" placeholder="Enter Product name, Company name or Brand"></input>
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

                    <div class="search-btn">
                        <button class="btn btn-block btn-lg btn-primary" onClick="display_searchoption();">Search</button>
                    </div>
                </form>
            </div>
            <div class="top-menu">
                <button class="btn btn-block btn-lg btn-primary" onClick="display_login();">Login</button>
            </div>
            <div class="top-menu">
                <button class="btn btn-block btn-lg btn-primary" onClick="display_signup();">Sign Up</button>
            </div>
        </div>
        <div class="art-body" style="padding: 100px 30px">
            <div class="left-block">
                <div class="filter-container">
                    <div class="filter-block">
                        Search Filters
                        <div class="arrow-left">
                        </div>
                        <div class="arrow-right">
                        </div>
                    </div>
                    <div class="filters">
                        <span class="title">
                            Price
                        </span>
                        <div class="filters-option">
                            <input id="Slider3" type="slider" name="price" value="0;500000"/>

                            <script type="text/javascript" charset="utf-8">
            jQuery("#Slider3").slider({from: 0, to: 500000, scale: [0, 500000], limits: false, step: 1, dimension: '', skin: "round_plastic"});
                            </script>

                            <div class="price-frm-to">
                                From:<br /><input type="text" class="input-max" style="float:none" id="price-frm"/>
                            </div>
                            <div class="price-frm-to">
                                To:<br /><input type="text" class="input-max" style="float:none"  id="price-to"/>
                            </div>
                            <button style="height:30px;margin-top:17.5px;" onclick="calculate_filter_result();">GO</button>
                        </div>
                    </div>
                    <div class="filters">
                        <span class="title">
                            Distance
                        </span>

                        <input id="SliderSingle" type="slider" name="area" value="1" />
                        <script type="text/javascript" charset="utf-8">
            jQuery("#SliderSingle").slider({from: 1, to: 50, step: 2.5, round: 1, format: {format: '##.0', locale: 'de'}, dimension: '&nbsp;KM', skin: "round"});
                        </script>

                        <div class="filters-option">
                            <input type="text" class="input-max" placeholder="Distance (in km)" id="distance-value"/>
                            <button style="height:30px; margin-top:2px;margin-left:5px;" onclick="calculate_filter_result();">GO</button>
                        </div>

                    </div>
                    <div class="filters" style="display:none;">
                        <span class="title">
                            Rating
                        </span>
                        <div class="rating">
                            <span id="star-1" onClick="starSetting('1');">☆</span>
                            <span id="star-2" onclick="starSetting();">☆</span>
                            <span id="star-3" onclick="starSetting();">☆</span>
                            <span id="star-4" onclick="starSetting();">☆</span>
                            <span id="star-5" onclick="starSetting();">☆</span>

                            <script type="text/javascript">
            function starSetting(input)
            {
                alert(input);
            }
                            </script>
                        </div>
                    </div>

                    <div class="filters">
                        <span class="title">
                            Sort By
                        </span>
                        <div class="filters-option">
                            <div class="radio-btn" id="adreess-find-que-radio">
                                <input type="radio" id="htl" name="sorting" onClick="calculate_filter_result_sortby(this);"/>
                                <label for="htl" ><span></span>High To Low (Price)</label><br />
                                <input type="radio" id="lth" name="sorting"  onClick="calculate_filter_result_sortby(this);"/>
                                <label for="lth"><span></span>Low To High (Price)</label><br />
                                <input type="radio" id="rating" name="sorting"  onClick="calculate_filter_result_sortby(this);"/>
                                <label for="rating"><span></span>Popularity (Rating)</label><br />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right-block">
                <div class="search-block-header">
                    <div class="search-filter-option">
                        Search Result From:
                        <div class="radio-btn" id="adreess-find-que-radio">
                            <input type="radio" id="shops" name="sorting-filter" onClick="calculate_filter_result_searchfrm(this);"/>
                            <label for="shops"><span></span>Shops</label>
                            <input type="radio" id="mashup" name="sorting-filter" onClick="calculate_filter_result_searchfrm(this);"/>
                            <label for="mashup"><span></span>Web Mashup</label>
                            <input type="radio" id="both" name="sorting-filter" checked="checked" onClick="calculate_filter_result_searchfrm(this);"/>
                            <label for="both"><span></span>Both</label>
                        </div>
                    </div>
                </div>
                <div class="search-block" id="search-result-container">

                    <?php
                    $addr = $_POST['address'];
                    $latitude = $_POST['lati'];
                    $longitude = $_POST['logi'];
                    if ($addr == "NULL") {
                        $geocode = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?latlng=' . $latitude . ',' . $longitude . '&sensor=false');
                        $output = json_decode($geocode);
                        $addr = $output->results[0]->formatted_address;
                    }
                    $arr = explode(',', $output->results[0]->formatted_address);
                    $length = sizeof($arr);
                    //echo $length;
                    if ($length == 0)
                        $country = "-";
                    else
                        $country = $arr[$length - 1];
                    if (!$length < 2 && $length != 0)
                        $state = $arr[$length - 2];
                    else
                        $state = "-";
                    mysql_connect("localhost", "root", "");
                    mysql_select_db("gmall") or die('Error connecting to database.');
                    //$query1="select shopid from product where prod='rice'";
                    //$result2=mysql_query($query);
                    $query = "SELECT * FROM product,item WHERE item.product_id=product.product_id and item.name like '%" . $_POST['inputtext'] . "%' ;";
                    /* if($state === "-")
                      $query = "SELECT * FROM product,item WHERE item.product_id=product.product_id and country=".$country." and item.name like '%" . $_POST['inputtext'] . "%' ;";
                      else if($state==="-" && country==="-")
                      $query = "SELECT * FROM product,item WHERE item.product_id=product.product_id and item.name like '%" . $_POST['inputtext'] . "%' ;";
                      else
                      $query = "SELECT * FROM product,item WHERE item.product_id=product.product_id and state=".$state." and country=".$country." and item.name like '%" . $_POST['inputtext'] . "%' ;"; */
                    $result = mysql_query($query);
                    //echo $_POST['inputtext']."_".$latitude."_".$longitude;
                    $lonlat = $_POST['inputtext'] . "_" . $longitude . $latitude;
                    $tablename = str_replace(".", "_", $lonlat);
                    session_start();
                    if(isset($_SESSION['tablename']))
                        unset($_SESSION['tablename']);
                    $query1 = "CREATE TABLE if not exists " . $tablename . "(shopid varchar(20),name varchar(30),price decimal(10,2),image varchar(300),straight_line_distance decimal(10,4),distance varchar(20),time varchar(20),type varchar(50),ratings int(10),mode varchar(20),shopname varchar(20),PRIMARY KEY (shopid))";
                    $_SESSION['tablename']=$tablename;
                    //create table ".$_POST['inputtext']."_".$latitude."_".$longitude."(shopid varchar(20),name varchar(30),price decimal(10,2),image varchar(300),straight_line_distance int(20),distance int(20),time int(20),type varchar(50),ratings int(10))
                    $xydsa = mysql_query($query1);
                    while ($row = mysql_fetch_array($result)) {
                        //$query3="insert into rice_".$tablename."('shopid','name','price','image','type','ratings') values (".$row[0].",".$row[8].",".$row[2].",".$row[9].",".$row[11].",".$row[6].")";
                        $query3 = "INSERT INTO `" . $tablename . "`(`shopid`, `name`, `price`, `image`, `type`, `ratings`,`shopname`) VALUES (" . $row[0] . ",'" . $row[8] . "'," . $row[2] . ",'" . $row[9] . "','" . $row[11] . "'," . $row[6] . ",'-')";
                        $xyds = mysql_query($query3); //INSERT INTO `rice_72_744162919_0277285`(`shopid`, `name`, `price`, `image`, `straight_line_distance`, `distance`, `time`, `type`, `ratings`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9])
                    }

                    $query4 = "select " . $tablename . ".shopid,longitude,latitude,shop.mode,shop.shopname from shop," . $tablename . " where shop.shopid=" . $tablename . ".shopid";
                    $result1 = mysql_query($query4);
                    while ($row = mysql_fetch_array($result1)) {

                        $earth_radius = 6371.00; # in kms
                        $lat1 = $latitude;
                        $lon1 = $longitude;
                        $lat2 = $row[2];
                        $lon2 = $row[1];
                        $delta_lat = $lat2 - $lat1;
                        $delta_lon = $lon2 - $lon1;
                        /* $findist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($delta_lon));
                          $findist = acos($findist);
                          $findist = rad2deg($findist);
                          $findist = $findist * 60 * 1.1515;
                          $findist = round($findist, 4); */
                        $alpha = $delta_lat / 2;
                        $beta = $delta_lon / 2;
                        $a = sin(deg2rad($alpha)) * sin(deg2rad($alpha)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin(deg2rad($beta)) * sin(deg2rad($beta));
                        $c = asin(min(1, sqrt($a)));
                        $findist = 2 * $earth_radius * $c;
                        $findist = round($findist, 4);
                        $query6 = "UPDATE `" . $tablename . "` SET shopname='" . $row[4] . "',mode='" . $row[3] . "', `straight_line_distance`=" . $findist . " WHERE shopid=" . $row[0];
                        $res = mysql_query($query6);
                    }
                    $query9 = "select * from " . $tablename . ",shop where shop.shopid=" . $tablename . ".shopid order by straight_line_distance asc ";
                    $res5 = mysql_query($query9);
                    $count0 = 200;
                    $count = 1;
                    $count1 = 100;
                    $flag = 1;
                    $c = 0;
                    while ($row = mysql_fetch_array($res5)) {
                        //echo $row[16].$row[15];
                        ++$count;
                        ++$count1;
                        ++$count0;
                        $flag = 1;
                        //echo '----'.$row[0].$row[1].$row[2].'----<br>';
                        $geocode = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?latlng=' . $row[18] . ',' . $row[17] . '&sensor=false');
                        $output = json_decode($geocode);
                        //echo 'Shop id:'.$row[0].'<br/>';
                        //echo 'Shop Address:'.$output->results[0]->formatted_address.'<br/>';
                        $from = $addr;
                        $to = $output->results[0]->formatted_address;
                        //echo $to."+++";
                        //echo $from."---".$to."+++";
                        $from = urlencode($from);
                        $to = urlencode($to);
                        $routes = json_decode(file_get_contents('http://maps.googleapis.com/maps/api/directions/json?origin=' . $from . '&destination=' . $to . '&alternatives=true&mode=' . $row[19] . '&sensor=false'))->routes;
                        usort($routes, create_function('$a,$b', 'return intval($a->legs[0]->distance->value) - intval($b->legs[0]->distance->value);'));
                        $distance = $routes[0]->legs[0]->distance->text;
                        $time = $routes[0]->legs[0]->duration->text;
                        $query6 = "UPDATE `" . $tablename . "` SET `distance`='" . $distance . "' , `time`='" . $time . "' WHERE shopid=" . $row[0];
                        $res = mysql_query($query6);
                        if ($time != 0 && $distance != 0 && $distance <= 5000 && $time <= 1800) {
                            ?>
                            <div class="search-result">
                                <div class="seacrh-info">
                                    <div><img style="margin-left: 25px" src="./Images/productimages/rice.jpg" height="150" width="150"></div>
                                    <div id="<? echo $count ?>"><?= $row[1] . '<br/>' . $row[12] . '<br/>Rs. ' . $row[2] . '<br/>' ?></div> 
                                    <div id="<? echo $count1 ?>"><?= $distance . '  by ' . $row[19] . '<br/>Approx ' . $time ?></div>
                                </div>
                                <div class="search-shop-logo"></div>
                            </div>

                            <?php
                            $c++;
                        }
                    }
                    if ($c == 0) {
                        echo '<h3>No shops found in your area. You may extend your area of search.</h3>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>