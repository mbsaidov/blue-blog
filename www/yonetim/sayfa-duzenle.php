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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "formsayfa")) {
  $updateSQL = sprintf("UPDATE sayfa SET icerik=%s, baslik=%s WHERE id=%s",
                       GetSQLValueString($_POST['u_desc'], "text"),
                       GetSQLValueString($_POST['u_ad'], "text"),
                       GetSQLValueString($_POST['hiddenField'], "int"));

  mysql_select_db($database_blog, $blog);
  $Result1 = mysql_query($updateSQL, $blog) or die(mysql_error());

  $updateGoTo = "sayfalar.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

mysql_select_db($database_blog, $blog);
$query_kullanici = "SELECT * FROM `admin`";
$kullanici = mysql_query($query_kullanici, $blog) or die(mysql_error());
$row_kullanici = mysql_fetch_assoc($kullanici);
$totalRows_kullanici = mysql_num_rows($kullanici);

$colname_sayfa_duzenle = "-1";
if (isset($_GET['id'])) {
  $colname_sayfa_duzenle = $_GET['id'];
}
mysql_select_db($database_blog, $blog);
$query_sayfa_duzenle = sprintf("SELECT * FROM sayfa WHERE id = %s", GetSQLValueString($colname_sayfa_duzenle, "int"));
$sayfa_duzenle = mysql_query($query_sayfa_duzenle, $blog) or die(mysql_error());
$row_sayfa_duzenle = mysql_fetch_assoc($sayfa_duzenle);
$totalRows_sayfa_duzenle = mysql_num_rows($sayfa_duzenle);



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/tema.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>

<!-- InstanceBeginEditable name="doctitle" -->
<title>Y??netim Paneli</title>
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
	    <li><a href="index.php?id=1">??</a> <a href="index.php">Anasayfa</a></li>
	    <li><a href="ayarlar.php">?? Genel Ayarlar</a></li>
	    <li><a href="yazilar.php">?? Yaz??lar (Sil &amp; D??zenle)</a></li>
	    <li><a href="yazi-ekle.php">?? Yaz?? Ekle</a></li>
	    <li><a href="kategori.php">?? Kategoriler (Ekle & Sil)</a></li>
	    <li><a href="sayfa-ekle.php">?? Sayfa Ekle</a></li>
	    <li><a href="sayfalar.php">?? Sayfa Y??netimi</a></li>
	    <li><a href="slider.php">?? Slider Y??netimi</a></li>
	    <li><a href="iletisim.php">?? ??leti??im Ayarlar??</a></li>
	    <li><a href="profil.php">?? Profil Ayarlar??</a></li>
	    <li></li>
	    
      </ul>
</div>
  <div class="content"><!-- InstanceBeginEditable name="icerik" -->
    <h2>//Sayfa<span> D??zenle</span></h2>
    <p>&nbsp;</p>
  <form name="formsayfa" method="POST" action="<?php echo $editFormAction; ?>" enctype="multipart/form-data">
    	
    	<table width="100%" border="0">
    	  <tr>
    	    <td height="83" colspan="2" bgcolor="#EFEFEF">&nbsp;    	      <input name="u_ad" type="text" id="baslik1" value="<?php echo $row_sayfa_duzenle['baslik']; ?>" size="110" placeholder="Ba??l?????? Girin" /></td>
   	      </tr>
    	  <tr>
    	    <td height="91" colspan="2"> <textarea   name="u_desc" class="ckeditor" id="u_desc"><?php echo $row_sayfa_duzenle['icerik']; ?></textarea></td>
   	      </tr>
    	  <tr>
    	    <td width="35%" height="29">&nbsp;</td>
    	    <td width="65%">&nbsp;</td>
  	    </tr>
    	  <tr>
    	    <td bgcolor="#EFEFEF">&nbsp;</td>
    	    <td bgcolor="#EFEFEF"><input id="gonder" type="submit" value="G&ouml;nder" />
   	        <input name="hiddenField" type="hidden" id="hiddenField" value="<?php echo $row_sayfa_duzenle['id']; ?>" /></td>
  	    </tr>
  	  </table>
    	<input type="hidden" name="MM_update" value="form" />
    	<input type="hidden" name="MM_update" value="formsayfa" />
      </form>

  <!-- InstanceEndEditable --></div>
</div>

</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($kullanici);

mysql_free_result($sayfa_duzenle);
?>
