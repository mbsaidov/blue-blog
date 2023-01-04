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

mysql_select_db($database_blog, $blog);
$query_mesajlar = "SELECT * FROM `mesajlar` ORDER BY id DESC";
$mesajlar = mysql_query($query_mesajlar, $blog) or die(mysql_error());
$row_mesajlar = mysql_fetch_assoc($mesajlar);
$totalRows_mesajlar = mysql_num_rows($mesajlar);



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/tema.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>

<!-- InstanceBeginEditable name="doctitle" -->
<title>Yönetim Paneli</title>
<!-- InstanceEndEditable -->
<link href="css/admin-style.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>

<body>
<div class="genel">
	<div class="left-nav">
    	<div class="left-top"><img src="image/admin-logo.png" width="200" /></div>
	  <ul>
	    <li><a href="index.php?id=1">»</a> <a href="index.php">Anasayfa</a></li>
	    <li><a href="ayarlar.php">» Genel Ayarlar</a></li>
	    <li><a href="yazilar.php">» Yazılar (Sil &amp; Düzenle)</a></li>
	    <li><a href="yazi-ekle.php">» Yazı Ekle</a></li>
	    <li><a href="kategori.php">» Kategoriler (Ekle & Sil)</a></li>
	    <li><a href="sayfa-ekle.php">» Sayfa Ekle</a></li>
	    <li><a href="sayfalar.php">» Sayfa Yönetimi</a></li>
	    <li><a href="slider.php">» Slider Yönetimi</a></li>
	    <li><a href="iletisim.php">» İletişim Ayarları</a></li>
	    <li><a href="profil.php">» Profil Ayarları</a></li>
	    <li></li>
	    
      </ul>
</div>
  <div class="content"><!-- InstanceBeginEditable name="icerik" -->
  <div class="hosg">//Yönetim Paneline Hoşgeldiniz</div>
    <div class="mesajlar">
   	<div class="mesajb">
   	  //Sitede Neler Var ?
   	</div>
    <ul>
      <li>
        <h5><span><?php $sorgu=mysql_query("Select * from yazilar"); $kayitlari_say=mysql_num_rows($sorgu); echo ("$kayitlari_say"); ?></span> Makale </h5>
      </li>
      <li>
        <h5><span><?php $sorgu2=mysql_query("Select * from sayfa"); $kayitlari_say2=mysql_num_rows($sorgu2); echo ("$kayitlari_say2"); ?></span> Sayfa </h5>
      </li>
      <li>
        <h5><span><?php $sorgu3=mysql_query("Select * from mesajlar"); $kayitlari_say3=mysql_num_rows($sorgu3); echo ("$kayitlari_say3"); ?></span> Mesaj </h5>
      </li>
      <li>
        <h5><span><?php $sorgu4=mysql_query("Select * from kategori"); $kayitlari_say4=mysql_num_rows($sorgu4); echo ("$kayitlari_say4"); ?></span> Kategori </h5>
      </li>
      <li>
        <h5><span><?php $sorgu5=mysql_query("Select * from slider"); $kayitlari_say5=mysql_num_rows($sorgu5); echo ("$kayitlari_say5"); ?></span> Slider </h5>
      </li>
    </ul><div style="clear:both"></div>
     </div>
   <div class="mesajlar">
   	<div class="mesajb">
   	  //Mesajlar
   	</div>
  <table width="100%">
  <tr>
    <td id="ust" height="27" align="center" valign="middle" bgcolor="#E4E4E4">Başlık</td>
    <td id="ust" align="center" valign="middle" bgcolor="#E4E4E4">İsim</td>
    <td id="ust" align="center" valign="middle" bgcolor="#E4E4E4">Mail</td>
    <td id="ust" align="center" valign="middle" bgcolor="#E4E4E4">Mesaj</td>
    <td id="ust" align="center" valign="middle" bgcolor="#E4E4E4">Sil</td>
  </tr>
  <?php do { ?>
    <tr>
      <td height="26" align="center" id="alt"><?php echo $row_mesajlar['baslik']; ?></td>
      <td align="center" id="alt"><?php echo $row_mesajlar['isim']; ?></td>
      <td align="center" id="alt"><?php echo $row_mesajlar['mail']; ?></td>
      <td align="center" id="alt"><?php echo $row_mesajlar['mesaj']; ?></td>
      <td align="center" id="alt"><a href="mesaj-sil.php?id=<?php echo $row_mesajlar['id']; ?>">Sil</a></td>
    </tr>
    <?php } while ($row_mesajlar = mysql_fetch_assoc($mesajlar)); ?>
  </table>
</div>
<!-- InstanceEndEditable --></div>
</div>

</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($kullanici);

mysql_free_result($mesajlar);
?>
