<?php require_once('Connections/blog.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$maxRows_kat_yazi = 7;
$pageNum_kat_yazi = 0;
if (isset($_GET['pageNum_kat_yazi'])) {
  $pageNum_kat_yazi = $_GET['pageNum_kat_yazi'];
}
$startRow_kat_yazi = $pageNum_kat_yazi * $maxRows_kat_yazi;

$colname_kat_yazi = "-1";
if (isset($_GET['kat'])) {
  $colname_kat_yazi = $_GET['kat'];
}
mysql_select_db($database_blog, $blog);
$query_kat_yazi = sprintf("SELECT * FROM yazilar WHERE kat = %s ORDER BY id DESC", GetSQLValueString($colname_kat_yazi, "text"));
$query_limit_kat_yazi = sprintf("%s LIMIT %d, %d", $query_kat_yazi, $startRow_kat_yazi, $maxRows_kat_yazi);
$kat_yazi = mysql_query($query_limit_kat_yazi, $blog) or die(mysql_error());
$row_kat_yazi = mysql_fetch_assoc($kat_yazi);

if (isset($_GET['totalRows_kat_yazi'])) {
  $totalRows_kat_yazi = $_GET['totalRows_kat_yazi'];
} else {
  $all_kat_yazi = mysql_query($query_kat_yazi);
  $totalRows_kat_yazi = mysql_num_rows($all_kat_yazi);
}
$totalPages_kat_yazi = ceil($totalRows_kat_yazi/$maxRows_kat_yazi)-1;

$colname_kat_baslik = "-1";
if (isset($_GET['kat'])) {
  $colname_kat_baslik = $_GET['kat'];
}
mysql_select_db($database_blog, $blog);
$query_kat_baslik = sprintf("SELECT * FROM kategori WHERE id = %s", GetSQLValueString($colname_kat_baslik, "int"));
$kat_baslik = mysql_query($query_kat_baslik, $blog) or die(mysql_error());
$row_kat_baslik = mysql_fetch_assoc($kat_baslik);
$totalRows_kat_baslik = mysql_num_rows($kat_baslik);

mysql_select_db($database_blog, $blog);
$query_baslik = "SELECT * FROM ayarlar";
$baslik = mysql_query($query_baslik, $blog) or die(mysql_error());
$row_baslik = mysql_fetch_assoc($baslik);
$totalRows_baslik = mysql_num_rows($baslik);

$colname_yazilar = "-1";
if (isset($_GET['kat'])) {
  $colname_yazilar = $_GET['kat'];
}
mysql_select_db($database_blog, $blog);
$query_yazilar = sprintf("SELECT * FROM yazilar WHERE kat = %s ORDER BY id DESC", GetSQLValueString($colname_yazilar, "text"));
$yazilar = mysql_query($query_yazilar, $blog) or die(mysql_error());
$row_yazilar = mysql_fetch_assoc($yazilar);

mysql_select_db($database_blog, $blog);
$query_yazilar = "SELECT * FROM yazilar ORDER BY id DESC";
$yazilar = mysql_query($query_yazilar, $blog) or die(mysql_error());
$row_yazilar = mysql_fetch_assoc($yazilar);

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_kat_yazi = 6;
$pageNum_kat_yazi = 0;
if (isset($_GET['pageNum_kat_yazi'])) {
  $pageNum_kat_yazi = $_GET['pageNum_kat_yazi'];
}
$startRow_kat_yazi = $pageNum_kat_yazi * $maxRows_kat_yazi;

if (isset($_GET['totalRows_kat_yazi'])) {
  $totalRows_kat_yazi = $_GET['totalRows_kat_yazi'];
} else {
  $all_kat_yazi = mysql_query($query_kat_yazi);
  $totalRows_kat_yazi = mysql_num_rows($all_kat_yazi);
}
$totalPages_kat_yazi = ceil($totalRows_kat_yazi/$maxRows_kat_yazi)-1;

mysql_select_db($database_blog, $blog);
$query_baslik = "SELECT * FROM ayarlar";
$baslik = mysql_query($query_baslik, $blog) or die(mysql_error());
$row_baslik = mysql_fetch_assoc($baslik);
$totalRows_baslik = mysql_num_rows($baslik);

$queryString_kat_yazi = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_kat_yazi") == false && 
        stristr($param, "totalRows_kat_yazi") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_kat_yazi = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_kat_yazi = sprintf("&totalRows_kat_yazi=%d%s", $totalRows_kat_yazi, $queryString_kat_yazi);

function url($s) {
 $tr = array('ş','Ş','ı','I','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç','(',')','/',':',',','!');
 $eng = array('s','s','i','i','i','g','g','u','u','o','o','c','c','','','-','-','','');
 $s = str_replace($tr,$eng,$s);
 $s = strtolower($s);
 $s = preg_replace('/&amp;amp;amp;amp;amp;amp;amp;amp;amp;.+?;/', '', $s);
 $s = preg_replace('/\s+/', '-', $s);
 $s = preg_replace('|-+|', '-', $s);
 $s = preg_replace('/#/', '', $s);
 $s = str_replace('.', '', $s);
 $s = trim($s, '-');
 return $s;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $row_kat_baslik['ad']; ?> Kategorisi - <?php echo $row_baslik['site_adi']; ?></title>
<link href="css/style.css" rel="stylesheet" type="text/css" />

</head>

<body>
<div class="dis">
<div class="genel">
<?php include('sidebar.php'); ?>
<div class="icerik">
<div class="kat-baslik"><h4>//<?php echo $row_kat_baslik['ad']; ?> Kategorisi</h4></div>
<?php do { ?><div class="makaleler"><a href="<?=url($row_kat_yazi['baslik']).'/'.$row_kat_yazi['id']?>"><img src="timthumb.php?src=<?php include('config.php'); ?>/<?php echo $row_kat_yazi['img']; ?>&h=233&w=715" ></a><a href="<?=url($row_kat_yazi['baslik']).'/'.$row_kat_yazi['id']?>"><div class="m-baslik"><?php echo strtoupper($row_kat_yazi['baslik']); ?></div></a><div class="tarih"><?php echo $row_kat_yazi['tarih']; ?></div><div class="aciklama"><p>
<?php echo strip_tags(substr($row_kat_yazi['icerik'], 0, 400)); ?>
 <a href="<?=url($row_kat_yazi['baslik']).'/'.$row_kat_yazi['id']?>"><span>DEVAMINI OKU..</span></a></p></div>
</div>    <?php } while ($row_kat_yazi = mysql_fetch_assoc($kat_yazi)); ?><div class="navi"><table border="0">
  <tr>
    <td><?php if ($pageNum_kat_yazi > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_kat_yazi=%d%s", $currentPage, 0, $queryString_kat_yazi); ?>"><img src="resimler/First.png"></a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_kat_yazi > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_kat_yazi=%d%s", $currentPage, max(0, $pageNum_kat_yazi - 1), $queryString_kat_yazi); ?>"><img src="resimler/Previous.png"></a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_kat_yazi < $totalPages_kat_yazi) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_kat_yazi=%d%s", $currentPage, min($totalPages_kat_yazi, $pageNum_kat_yazi + 1), $queryString_kat_yazi); ?>"><img src="resimler/Next.png"></a>
        <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_kat_yazi < $totalPages_kat_yazi) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_kat_yazi=%d%s", $currentPage, $totalPages_kat_yazi, $queryString_kat_yazi); ?>"><img src="resimler/Last.png"></a>
        <?php } // Show if not last page ?></td>
  </tr>
</table></div>
</div>  
</div>
</div>
</body>
</html>
<?php
mysql_free_result($kat_yazi);

mysql_free_result($kat_baslik);

mysql_free_result($baslik);
?>
