<?
/*
+-------------------------------------+
|  PHPShop Order Agent                |
|  ������ XML                         |
+-------------------------------------+
*/

$_classPath="../phpshop/";
include($_classPath."class/obj.class.php");
PHPShopObj::loadClass("base");
PHPShopObj::loadClass("date");
PHPShopObj::loadClass("array");
PHPShopObj::loadClass("product");
PHPShopObj::loadClass("valuta");
PHPShopObj::loadClass("system");


$PHPShopBase = new PHPShopBase("../phpshop/inc/config.ini");


// �������� ������������
require("lib/user.lib.php");


// ������
function OrdersArray($p1,$p2,$words,$list)
{

$words = MyStripSlashes(base64_decode($words));

if(empty($p1)) $p1=date("U")-86400;
 else $p1=PHPShopDate::GetUnicTime($p1)-86400;
if(empty($p2)) $p2=date("U");
 else $p2=PHPShopDate::GetUnicTime($p2)+86400;

 
if($list == "all" or !$list) $sort="";
  elseif($list == "new") $sort="and statusi=0";
       else $sort="and statusi=".$list;
	   
	   
if(!empty($words)){
if(is_int($words)) $sql="select * from ".$GLOBALS['SysValue']['base']['table_name1']." where uid=".$words;
else $sql="select * from ".$GLOBALS['SysValue']['base']['table_name1']." where orders REGEXP '".$words."'";
}
  else {
$sql="select * from ".$GLOBALS['SysValue']['base']['table_name1']." where datas<'$p2' and datas>'$p1' $sort order by id desc";
}
$result=mysql_query($sql) or die("ERROR:".mysql_error()."");
$i=mysql_num_rows($result);
while($row = mysql_fetch_array($result)){
$id=$row['id'];
$datas=$row['datas'];
$uid=$row['uid'];
$order=unserialize($row['orders']);
$status=unserialize($row['status']);

if(empty($row['statusi'])) $statusi=0;
  else $statusi=$row['statusi'];
  
if(empty($status['time'])) $time="-";
  else $time=$status['time'];
  
$array=array(
    "id"=>$id,
    "cart"=>$order['Cart'],
	"order"=>$order['Person'],
	"time"=>$time,
	"statusi"=>$statusi
	);
$i--;
$OrdersArray[$id]=$array;
}
return $OrdersArray;
}


// ������������� unicode UTF-8 -> win1251 
function MyStripSlashes($s){ 
$out=""; 
$c1=""; 
$byte2=false; 
for ($c=0;$c<strlen($s);$c++){ 
$i=ord($s[$c]); 
if ($i<=127) $out.=$s[$c]; 
if ($byte2){ 
$new_c2=($c1&3)*64+($i&63); 
$new_c1=($c1>>2)&5; 
$new_i=$new_c1*256+$new_c2; 
if ($new_i==1025){ 
$out_i=168; 
}else{ 
if ($new_i==1105){ 
$out_i=184; 
}else { 
$out_i=$new_i-848; 
} 
} 
$out.=chr($out_i); 
$byte2=false; 
} 
if (($i>>5)==6) { 
$c1=$i; 
$byte2=true; 
} 
} 
return str_replace("\"","*",$out); 
} 



function OrderUpdateXml(){
$sql="select * from ".$GLOBALS['SysValue']['base']['table_name1']." where id='".$_POST['id']."'";
$result=mysql_query($sql);
$row = mysql_fetch_array($result);
$status=unserialize($row['status']);
$order=unserialize($row['orders']);

// ����� ���������
$Status=array(
"maneger"=>MyStripSlashes($_POST['manager']),
"time"=>date("d-m-y H:i a")
);


$order['Person']['name_person']=MyStripSlashes($_POST['name_person']);
$order['Person']['adr_name']=MyStripSlashes($_POST['adr_name']);
$order['Person']['dos_ot']=MyStripSlashes($_POST['dos_ot']);
$order['Person']['dos_do']=MyStripSlashes($_POST['dos_do']);
$order['Person']['tel_code']=MyStripSlashes($_POST['tel_code']);
$order['Person']['tel_name']=MyStripSlashes($_POST['tel_name']);
$order['Person']['org_name']=MyStripSlashes($_POST['org_name']);
$order['Person']['order_metod']=MyStripSlashes($_POST['metod_id']);

$sql="UPDATE ".$GLOBALS['SysValue']['base']['table_name1']."
SET 
orders='".serialize($order)."',
status='".serialize($Status)."',
statusi='".$_POST['statusi']."'
where id='".$_POST['id']."'";
$result=mysql_query($sql);
}


// ����� ��������
function GetDelivery($deliveryID,$name){
$sql="select * from ".$GLOBALS['SysValue']['base']['table_name30']." where id='$deliveryID'";
$result=mysql_query($sql);
$row = mysql_fetch_array($result);
return $row[$name];
}

// ������ ������
function GetOrderStatusArray(){
$sql="select * from ".$GLOBALS['SysValue']['base']['table_name32'];
$result=mysql_query($sql);
while(@$row = mysql_fetch_array(@$result))
    {
	$array=array(
	"id"=>$row['id'],
	"name"=>$row['name'],
	"color"=>$row['color'],
	"sklad"=>$row['sklad_action']
	);
	$Status[$row['id']]=$array;
	}
return @$Status;
}

// ��� ������
function GetOplataMetodArray(){
$sql="select * from ".$GLOBALS['SysValue']['base']['table_name48']." where enabled='1' order by num";
$result=mysql_query($sql);
while($row = mysql_fetch_array($result)){
     $array=array(
	 "id"=>$row['id'],
	 "name"=>$row['name']
	 );
	 $Status[$row['id']]=$array;
	 }
return @$Status;
}

$GetOrderStatusArray=GetOrderStatusArray();
$GetOrderStatusArray[0]['name']="����� �����";
$GetOrderStatusArray[0]['color']="C0D2EC";
$GetOrderStatusArray[0]['id']=0;
$GetOplataMetodArray=GetOplataMetodArray();

function Clean($s){
$a = htmlspecialchars($s,ENT_QUOTES);
return $a;
}



// ������ �� ������
function OrdersReturn($id){
$sql="select * from ".$GLOBALS['SysValue']['base']['table_name1']." where id=$id";
$result=mysql_query($sql) or die("ERROR:".mysql_error()."");
$row = mysql_fetch_array($result);
$id=$row['id'];
$datas=$row['datas'];
$uid=$row['uid'];
$order=unserialize($row['orders']);
$status=unserialize($row['status']);

if(empty($row['statusi'])) $statusi=0;
  else $statusi=$row['statusi'];
  
if(empty($status['time'])) $time="-";
  else $time=$status['time'];
  
$array=array(
    "id"=>$id,
    "cart"=>$order['Cart'],
	"order"=>$order['Person'],
	"time"=>$time,
	"datas"=>$datas,
	"dos_ot"=>Clean($status['dos_ot']),
	"dos_do"=>Clean($status['dos_do']),
	"manager"=>Clean($status['maneger']),
	"statusi"=>$statusi
	);
	
return $array;
}


// ��������� ��� ������
function OplataMetod($id){
$order_metod = Clean($id);
$sql="select name from ".$GLOBALS['SysValue']['base']['table_name48']." where id=".$order_metod;
$result=mysql_query($sql);
$row = mysql_fetch_array($result);
return $row['name'];
}


// ����������� ������
function ReturnPic($id){
$sql="select pic_big from ".$GLOBALS['SysValue']['base']['table_name2']." where id=$id";
$result=mysql_query($sql);
$row = mysql_fetch_array($result);
$pic_big=$row['pic_big'];
if(empty($pic_big)) $pic_big="none";
return $pic_big;
}

function ReturnSumma($sum,$id,$disc){
$PHPShopProduct = new PHPShopProduct($id);
$getValutaID = $PHPShopProduct->getValutaID();

if(empty($getValutaID )){
		$System = new PHPShopSystem();
	    $getValutaID=$System->getDefaultValutaId();
	 }

$PHPShopValuta= new PHPShopValuta($getValutaID);
$kurs=$PHPShopValuta->getKurs();
$sum*=$kurs;
$sum=$sum-($sum*$disc/100);
return number_format($sum,"2",".","");
}


switch ($command){
case ("loadListOrder"):
//error_reporting(0);
$OrdersArray=OrdersArray($p1,$p2,$words,$list);
$XML='<?xml version="1.0" encoding="windows-1251"?>
<orderdb>';

if(is_array($OrdersArray))
foreach ($OrdersArray as $val){
$XML.='<order>
	      <data>'.PHPShopDate::dataV($val['order']['data']).'</data>
		  <datas>'.$val['order']['data'].'</datas>
		  <uid>'.$val['order']['ouid'].'</uid>
		  <id>'.$val['id'].'</id>
		  <name>'.Clean($val['order']['name_person']).'</name>
		  <mail>'.Clean($val['order']['mail']).'</mail>
		  <tel>'.Clean($val['order']['tel_code']).' '.Clean($val['order']['tel_name']).'</tel>
		  <adres>'.Clean($val['order']['adr_name']).'</adres>
		  <place>'.GetDelivery($val['order']['dostavka_metod'],"city").'</place>
		  <metod>'.$val['order']['order_metod'].'</metod>
		  <status>'.$GetOrderStatusArray[$val['statusi']]['name'].'</status>
		  <color>'.$GetOrderStatusArray[$val['statusi']]['color'].'</color>
		  <time>'.$val['time'].'</time>
		  <summa>'.ReturnSumma($val['cart']['sum'],$val['id'],$val['order']['discount']).'</summa>
		  <num>'.$val['cart']['num'].'</num>
		  <kurs>'.$val['cart']['kurs'].'</kurs>';
$XML.='</order>
';
}
$XML.='</orderdb>';
echo $XML;
break;


case("loadNumNew"):
$sql="select id from ".$GLOBALS['SysValue']['base']['table_name1']." where statusi=0";
$result=mysql_query($sql);
$num=mysql_numrows($result);
if($num==0) echo "";
  else echo $num;
break;

// ������ �� ������
case ("loadIdOrder"):
//error_reporting(0);
if(!empty($id)){
$OrdersReturn=OrdersReturn($id);
$XML='<?xml version="1.0" encoding="windows-1251"?>
<orderdb>';


if(is_array($GetOrderStatusArray))
foreach ($GetOrderStatusArray as $status)
 $XMLS.='
  <status>
    <sid>'.$status['id'].'</sid>
	<sname>'.$status['name'].'</sname>
 </status>
 ';

 
if(is_array($GetOplataMetodArray))
foreach ($GetOplataMetodArray as $metod)
 @$XMLM.='
  <pay>
    <pid>'.$metod['id'].'</pid>
	<pname>'.$metod['name'].'</pname>
 </pay>
 ';
 
 
$XML.='<order>
	      <data>'.PHPShopDate::dataV($OrdersReturn['order']['data']).'</data>
          <datas>'.$OrdersReturn['datas'].'</datas>
		  <uid>'.$OrdersReturn['order']['ouid'].'</uid>
		  <name>'.Clean($OrdersReturn['order']['name_person']).'</name>
		  <mail>'.Clean($OrdersReturn['order']['mail']).'</mail>
		  <tel_code>'.Clean($OrdersReturn['order']['tel_code']).'</tel_code>
		  <tel_name>'.Clean($OrdersReturn['order']['tel_name']).'</tel_name>
		  <adres>'.Clean($OrdersReturn['order']['adr_name']).'</adres>
		  <dos_ot>'.Clean($OrdersReturn['order']['dos_ot']).'</dos_ot>
		  <dos_do>'.Clean($OrdersReturn['order']['dos_do']).'</dos_do>
		  <discount>'.Clean($OrdersReturn['order']['discount']).'</discount>
		  <manager>'.$OrdersReturn['manager'].'</manager>
		  <place>'.GetDelivery($OrdersReturn['order']['dostavka_metod'],"city").'</place>
		  <place_price>'.GetDelivery($OrdersReturn['order']['dostavka_metod'],"price").'</place_price>
		  <metod>'.OplataMetod($OrdersReturn['order']['order_metod']).'</metod>
		  <metod_id>'.$OrdersReturn['order']['order_metod'].'</metod_id>
		  <org_name>'.Clean($OrdersReturn['order']['org_name']).'</org_name>
		  <statusi>'.$OrdersReturn['statusi'].'</statusi>
		  <status>'.$GetOrderStatusArray[$OrdersReturn['statusi']]['name'].'</status>
		  <time>'.$OrdersReturn['time'].'</time>
		  <statuslist2>
		  '.$XMLS.'
		  </statuslist2>
		  <paylist>
		  '.$XMLM.'
		  </paylist>
		  </order>
		  <productlist>
		  ';



if(is_array($OrdersReturn['cart']['cart']))
foreach ($OrdersReturn['cart']['cart'] as $vals)
  $XML.='
  <product>
    <id>'.$vals['id'].'</id>
	<art>#'.$vals['uid'].'</art>
	<p_name>'.$vals['name'].'</p_name>
	<pic>'.ReturnPic($vals['id']).'</pic>
	<price>'.ReturnSumma($vals['price'],$vals['id'],$OrdersReturn['order']['discount']).'</price>
	<num>'.$vals['num'].'</num>
 </product>
 ';
$XML.='
</productlist>
</orderdb>';
echo $XML;
}
break;


case("loadIdOrderProduct"):
if(!empty($id)){
$OrdersReturn=OrdersReturn($id);
$XML='<?xml version="1.0" encoding="windows-1251"?>
<orderdb>';
if(is_array($OrdersReturn['cart']['cart']))
foreach ($OrdersReturn['cart']['cart'] as $vals)
$XML.='
<product>
    <id>'.$vals['id'].'</id>
	<art>'.$vals['uid'].'</art>
	<p_name>'.$vals['name'].'</p_name>
	<pic>'.ReturnPic($vals['id']).'</pic>
	<price>'.ReturnSumma($vals['price'],$vals['id'],$OrdersReturn['order']['discount']).'</price>
	<num>'.$vals['num'].'</num>
</product>';
echo $XML.'</orderdb>';
}
break;


case("orderUpdate"):
OrderUpdateXml();
break;



}
?>