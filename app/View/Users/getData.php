<?php

$query= $_GET['q'];
if($query==null)
  $query="xxxxxxxxxxxxxxx";
//$query="Samkit U Sha";
/*mysql_connect("sql100.0fees.net", "fees0_14492840", "vishwasabhyankar");
mysql_select_db("fees0_14492840_gmall") or die('Error connecting to database.');

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed";
}
$result = mysql_query("SELECT * FROM item where name like '%" . $query . "%'");
//$row = mysql_fetch_array($result)
while ($row = mysql_fetch_array($result)) {
    echo $row['name'] . ":";
}
*/
$friendlist = array
  (
  array("Rucha Damle","<img src='https://scontent-a.xx.fbcdn.net/hphotos-xfa1/v/t1.0-9/1382983_338746719640258_9105451626366581576_n.jpg?oh=6b6526ee794be454c1ff7c132ded9305&oe=54D6E29F'/>",18),
  array("Samkit U Shah","<img src='https://scontent-a.xx.fbcdn.net/hphotos-xpa1/v/t1.0-9/10440742_10204271590783743_3989578194368453345_n.jpg?oh=ebc5b9b29c51cc016df1ffc59e0e913f&oe=54DD9070'/>",13),
  array("Mitali Kulkarni","<img src='https://lh4.googleusercontent.com/-4mZX_0ykbKM/AAAAAAAAAAI/AAAAAAAAAC0/jx49W_tIA-0/s120-c/photo.jpg'/>",2),
  array("Amogh Palnitkar","<img src='https://fbcdn-sphotos-c-a.akamaihd.net/hphotos-ak-xaf1/v/t1.0-9/319495_10150945103352730_1609708892_n.jpg?oh=c2793c3e85bb945dff9b2b5f5c453323&oe=54D6C3AB&__gda__=1425200928_e30d023c0b91d0044df80789a1681217'/>",15)
  );
$i=0;
$temp2=strtolower($query);
/*$prio=array(
    0 => 0,
    1 => 0,
    2 => 0,
    3 => 0
);*/
for($i=0;$i<count($friendlist);$i++)
{
    $temp=strtolower($friendlist[$i][0]);
    if ($pos=strpos($temp,$temp2) !== false) {
       echo $friendlist[$i][0].":";
    //   $prio[$i]=$pos;
    }
}
/*asort($prio);
for($i=0;$i<count($prio);$i++)
{
    $j=0;
    echo $friendlist[$prio[$j]][0].":";
    $j++;
}*/
?>