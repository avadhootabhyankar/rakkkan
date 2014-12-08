<?php
session_start();
?>
<?php
require_once dirname(__FILE__).'\..\..\Lib\autoload.php';
require_once dirname(__FILE__).'\..\..\Lib\config.php';
require_once dirname(__FILE__).'\..\..\Lib\helper.php';
$response = null;
$keyword  = "";
$page     = 1;
if (isset($_GET['keyword'])) {
    $keyword   = $_GET['keyword'];
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
?><!DOCTYPE html>
<html>
<script type="text/javascript">
function getCookie(){
    //alert(<?php echo $_SESSION["selfId"] ?>);
}
</script>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Rakuten Web Service SDK - Sample</title>
<link rel="stylesheet" href="C:/xampp/htdocs/rakkan/app/View/Layouts/css/homepage.css" type="text/css">
</head>
<body onload="getCookie()">
<header>
<h1><a href="index.php">Rakuten Web Service SDK - Sample</a></h1>
</header>

<nav class="search-form">
<div>
<a href="http://webservice.rakuten.co.jp/" target="_blank"><img src="http://webservice.rakuten.co.jp/img/credit/200709/credit_31130.gif" border="0" alt="æ¥½å¤©ã‚¦ã‚§ãƒ–ã‚µãƒ¼ãƒ“ã‚¹ã‚»ãƒ³ã‚¿ãƒ¼" title="æ¥½å¤©ã‚¦ã‚§ãƒ–ã‚µãƒ¼ãƒ“ã‚¹ã‚»ãƒ³ã‚¿ãƒ¼" width="311" height="30"/></a>
</div>
<form action="" method="GET">
<input id="keyword" class="keyword" name="keyword" type="text" value="<?php echo h($keyword) ?>">
<input type="submit" class="search-button" value="Search">
</form>
</nav>
<?php if (isset($_GET['m']) && $_GET['m'] == '1'): ?>
<div class="notice">
ãƒ–ãƒƒã‚¯ãƒžã?¼ã‚¯ã¸è¿½åŠ?ã—ã¾ã—ãŸ
</div>
<?php endif; ?>

<?php if ($response && $response->isOk()): ?>

<div class="pager"><?php echo $pager = pager(
    (int)$page,
    (int)$response['pageCount'],
    '?keyword=%s&amp;page=%d',
    $keyword
) ?></div>

<div id="itemarea">

<ul id="itemlist">
<?php foreach ($response as $item): ?>
<li class="item">
    <form action="add" method="post">
    <input type="hidden" name="idusers" value="<?php echo $_SESSION["selfId"] ?>">
    <input type="hidden" name="iditem" value="<?php echo h($item['itemCode']) ?>">
    <!--<input type =submit name="Add" value="Add"/> -->
    <?php echo $this->Form->end('Add'); ?>
</form>>
<a href="<?php echo h($item['affiliateUrl']) ?>" class="itemname" title="<?php echo h($item['itemName']) ?>">
<?php echo h(mb_strimwidth($item['itemName'], 0, 80, '...', 'UTF-8')) ?></a>

<ul>
<?php if (!empty($item['smallImageUrls'][0]['imageUrl'])): ?>
<li class="image"><img src="<?php echo h($item['smallImageUrls'][0]['imageUrl']) ?>"></li>
<?php endif; ?>
<li class="addbookmark"><a href="bookmark.php?itemCode=<?php echo h($item['itemCode']) ?>&amp;keyword=<?php echo h($keyword) ?>&amp;page=<?php echo h($page) ?>">ãƒ–ãƒƒã‚¯ãƒžã?¼ã‚¯ã¸è¿½åŠ?</a></li>
<li class="price"><?php echo h(number_format($item['itemPrice'])) ?>å†?</li>
<li class="description"><?php echo h($item['itemCaption']) ?></li>
</ul>

</li>
<?php endforeach; ?>
</ul>
</div>
    <div class="pager"><?php echo $pager ?></div>
<?php endif; ?>
<?php 
         echo $this->form->create('Item',array('action'=>'retrieve'));
         //echo $this->form->create('Item',array('action'=>'add'));
         //echo $this->form->input('users_idusers');
         //echo $this->form->input('iditem');
         echo $this->Form->end('Show Wishlist');
    ?>
</body>
</html>
