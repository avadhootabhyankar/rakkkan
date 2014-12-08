<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Rakuten Web Service SDK - Sample</title>
<link rel="stylesheet" href="C:/xampp/htdocs/rakkan/app/View/Layouts/css/homepage.css" type="text/css">
</head>
<body>
<header>
<h1><a href="index.php">Rakuten Web Service SDK - Sample</a></h1>
</header>
<?php
require_once dirname(__FILE__).'\..\..\Lib\autoload.php';
require_once dirname(__FILE__).'\..\..\Lib\config.php';
require_once dirname(__FILE__).'\..\..\Lib\helper.php';
$response = null;
$keyword  = "";
$page     = 1;
if (isset($_GET['keyword'])) {
    $keyword   = $items[$index]['items']['iditem'];
    $page      = isset($_GET['page']) ? $_GET['page'] : 1;
    $rwsclient = new RakutenRws_Client();
    $rwsclient->setApplicationId(RAKUTEN_APP_ID);
    $rwsclient->setAffiliateId(RAKUTEN_APP_AFFILITE_ID);
    $response = $rwsclient->execute('IchibaItemSearch', array(
        'keyword' => $keyword,
        'page'    => $page,
        'hits'    => 9
    ));
}
?>
<?PHP $index = 0;?>
<?php 
    for ($index=0 ; $index < count($items) ; $index++ ) { 
        App::uses('HttpSocket', 'Network/Http');
        $HttpSocket = new HttpSocket();
        $response1 = $HttpSocket->post('https://app.rakuten.co.jp/services/api/IchibaItem/Search/20140222',    'format=json&itemCode='.$items[$index]['items']['iditem'].'&applicationId=1066920239571509113');
        $response=json_decode($response1);
        $c=0;
        //print_r($response);
        //$x=array($response);
        //print_r(count($x));
         for($c=0;$c<count($response);$c++){
            if($c%3==0)
                usleep(250000);
             printf("Item Name: ".$response->Items[$c]->Item->itemName."<br>");
             //printf($response->Items[$c]->Item->itemCode);
            printf("Item Price: ¥".$response->Items[$c]->Item->itemPrice."<br>");
            printf("Item Url: <a href='".$response->Items[$c]->Item->itemUrl."'><img src='".$response->Items[$c]->Item->mediumImageUrls[0]->imageUrl."'></a><br>");
            //printf("Medium Image: <img src='".$response->Items[$c]->Item->mediumImageUrls[0]->imageUrl."'><br>");
            //printf("Small Image: <img src='".$response->Items[$c]->Item->smallImageUrls[0]->imageUrl."'><br>");
            printf("Shop Name: ".$response->Items[$c]->Item->shopName."<br>");

            //printf($response->Items[$c]->Item->catchcopy);
            //printf($response->Items[$c]->Item->itemCaption);
            echo '<br><br><br><br>';
        }
       // print_r($response->Items[0]->Item);
    }
?>
