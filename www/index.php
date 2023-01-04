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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_yazigetir = 6;
$pageNum_yazigetir = 0;
if (isset($_GET['pageNum_yazigetir'])) {
  $pageNum_yazigetir = $_GET['pageNum_yazigetir'];
}
$startRow_yazigetir = $pageNum_yazigetir * $maxRows_yazigetir;

mysql_select_db($database_blog, $blog);
$query_yazigetir = "SELECT * FROM yazilar ORDER BY id DESC";
$query_limit_yazigetir = sprintf("%s LIMIT %d, %d", $query_yazigetir, $startRow_yazigetir, $maxRows_yazigetir);
$yazigetir = mysql_query($query_limit_yazigetir, $blog) or die(mysql_error());
$row_yazigetir = mysql_fetch_assoc($yazigetir);

if (isset($_GET['totalRows_yazigetir'])) {
  $totalRows_yazigetir = $_GET['totalRows_yazigetir'];
} else {
  $all_yazigetir = mysql_query($query_yazigetir);
  $totalRows_yazigetir = mysql_num_rows($all_yazigetir);
}
$totalPages_yazigetir = ceil($totalRows_yazigetir/$maxRows_yazigetir)-1;

mysql_select_db($database_blog, $blog);
$query_baslik = "SELECT * FROM ayarlar";
$baslik = mysql_query($query_baslik, $blog) or die(mysql_error());
$row_baslik = mysql_fetch_assoc($baslik);
$totalRows_baslik = mysql_num_rows($baslik);

$queryString_yazigetir = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_yazigetir") == false && 
        stristr($param, "totalRows_yazigetir") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_yazigetir = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_yazigetir = sprintf("&totalRows_yazigetir=%d%s", $totalRows_yazigetir, $queryString_yazigetir);


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
<title>Anasayfa - <?php echo $row_baslik['site_adi']; ?></title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="dis">
<div class="genel">
<?php include('sidebar.php'); ?>
<div class="icerik">
<?php include('slider/slider.php'); ?>
<?php do { ?><div class="makaleler"><a href="<?=url($row_yazigetir['baslik']).'/'.$row_yazigetir['id']?>"><img src="timthumb.php?src=http://demo.pelikanweb.com/blog/<?php echo $row_yazigetir['img']; ?>&h=233&w=715" ><div class="m-baslik"><?php echo strtoupper($row_yazigetir['baslik']); ?></div></a><div class="tarih"><?php echo $row_yazigetir['tarih']; ?></div><div class="aciklama"><p><?php echo strip_tags(substr($row_yazigetir['icerik'], 0, 400)); ?><a href="<?=url($row_yazigetir['baslik']).'/'.$row_yazigetir['id']?>"><span>DEVAMINI OKU..</span></a></p></div>

</div><?php } while ($row_yazigetir = mysql_fetch_assoc($yazigetir)); ?>
<div class="navi"><table border="0">
  <tr>
    <td><?php if ($pageNum_yazigetir > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_yazigetir=%d%s", $currentPage, 0, $queryString_yazigetir); ?>"><img src="resimler/First.png"></a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_yazigetir > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_yazigetir=%d%s", $currentPage, max(0, $pageNum_yazigetir - 1), $queryString_yazigetir); ?>"><img src="resimler/Previous.png"></a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_yazigetir < $totalPages_yazigetir) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_yazigetir=%d%s", $currentPage, min($totalPages_yazigetir, $pageNum_yazigetir + 1), $queryString_yazigetir); ?>"><img src="resimler/Next.png"></a>
        <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_yazigetir < $totalPages_yazigetir) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_yazigetir=%d%s", $currentPage, $totalPages_yazigetir, $queryString_yazigetir); ?>"><img src="resimler/Last.png"></a>
        <?php } // Show if not last page ?></td>
  </tr>
</table></div>
</div>  
</div>
</div>

</body>
</html>
<?php
mysql_free_result($yazigetir);

mysql_free_result($baslik);
?>