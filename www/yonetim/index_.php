<?php require_once('../Connections/blog.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "giris.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
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

mysql_select_db($database_blog, $blog);
$query_kullanici = "SELECT * FROM `admin`";
$kullanici = mysql_query($query_kullanici, $blog) or die(mysql_error());
$row_kullanici = mysql_fetch_assoc($kullanici);
$totalRows_kullanici = mysql_num_rows($kullanici);



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Yönetim Paneli</title>
<link href="css/admin-style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="genel">
	<div class="left-nav">
    	&nbsp;&nbsp;<img src="image/admin-logo.png" width="100" />
	  <ul>
	    <li><a href="index.php">Anasayfa</a></li>
	    <li><a href="index.php?s=settings&id=0">Genel Ayarlar</a></li>
	    <li><a href="index.php?s=yazilar">Sayfaları Düzenle</a></li>
	    <li><a href="index.php?s=urunler">Ürün Yönetimi</a></li>
	    <li><a href="index.php?s=slider">Slider Yönetimi</a></li>
	    <li><a href="index.php?s=galeri">Galeri Yönetimi</a></li>
	    <li><a href="index.php?s=iletisim&amp;id=1">İletişim Ayarları</a></li>
	    <li><a href="index.php?s=profil&amp;id=1">Profil Ayarları</a></li>
	    <li></li>
	    <li></li>
      </ul>
</div>
   <div class="search">
     <h5><a href="index.php?s=mesajlar">Toplam <span>"<?php $sorgu=mysql_query("Select * from mesajlar");
$kayitlari_say=mysql_num_rows($sorgu); echo ("$kayitlari_say"); ?>"</span> Tane Mesaj Var !</a></h5>
   </div>
  <div class="welcome">
    <div class="welcome-img"><img src="image/tie-icon.png" width="45" height="45" /></div><h5> Hoşgeldin, <span><?php echo $row_kullanici['kullanici']; ?></span><a href="index.php?s=profil&amp;id=1"><img src="image/setting-icon.png" width="22" height="22" /></a></h5>
  </div>
  <div class="logout"><a href="cikis.php">ÇIKIŞ</a></div>
  <div class="content"><?php
 error_reporting(E_ALL ^ E_NOTICE); 
if(file_exists($_GET['s'].".php"))

	{
		include($_GET['s'].".php");
	}

else

	{
		include("admin.php");
	}

?></div>
</div>

</body>
</html>
<?php
mysql_free_result($kullanici);
?>
