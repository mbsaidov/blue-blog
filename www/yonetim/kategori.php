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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO kategori (id, ad, icon) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['id'], "int"),
                       GetSQLValueString($_POST['ad'], "text"),
                       GetSQLValueString($_POST['icon'], "text"));

  mysql_select_db($database_blog, $blog);
  $Result1 = mysql_query($insertSQL, $blog) or die(mysql_error());

  $insertGoTo = "kategori.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_blog, $blog);
$query_kullanici = "SELECT * FROM `admin`";
$kullanici = mysql_query($query_kullanici, $blog) or die(mysql_error());
$row_kullanici = mysql_fetch_assoc($kullanici);
$totalRows_kullanici = mysql_num_rows($kullanici);

mysql_select_db($database_blog, $blog);
$query_kategoriler = "SELECT * FROM kategori ORDER BY id DESC";
$kategoriler = mysql_query($query_kategoriler, $blog) or die(mysql_error());
$row_kategoriler = mysql_fetch_assoc($kategoriler);
$totalRows_kategoriler = mysql_num_rows($kategoriler);



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
  <div class="content"><!-- InstanceBeginEditable name="icerik" -->  <h2>//Kategori<span> Ekle</span></h2>
      <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
        <table width="100%" align="center">
          <tr valign="baseline">
            <td height="42" align="right" valign="middle" nowrap="nowrap" bgcolor="#E8E8E8"><h4>Kategori ??smi:</h4></td>
            <td valign="middle" bgcolor="#E8E8E8"><input type="text" name="ad" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
        <td height="37" align="right" nowrap="nowrap" bgcolor="#E8E8E8"><h5>Kategori ??con URL(Varsay??lan ????in: resimler/icog.png):</h5></td>
        <td height="37" bgcolor="#E8E8E8"><input type="text" name="icon" value="resimler/icog.png" size="32" /></td>
      </tr>
          <tr valign="baseline">
            <td height="41" align="right" valign="middle" nowrap="nowrap">&nbsp;</td>
            <td valign="middle"><input type="submit" value="Ekle" /></td>
          </tr>
        </table>
        <input type="hidden" name="id" value="" />
        <input type="hidden" name="MM_insert" value="form1" />
    </form>
      <p>&nbsp;</p>
<br />
   <table width="100%">
     <tr>
       <td width="68%" height="39" align="center"><h4>Kategori ??smi</h4></td>
       <td width="32%"><h4>Sil</h4></td>
     </tr>
     <?php do { ?>
       <tr>
         <td height="20" align="center" bgcolor="#E8E8E8"><h5><?php echo $row_kategoriler['ad']; ?></h5></td>
         <td bgcolor="#E8E8E8"><a href="sil.php?idk=<?php echo $row_kategoriler['id']; ?>">Sil</a></td>
       </tr>
       <?php } while ($row_kategoriler = mysql_fetch_assoc($kategoriler)); ?>
   </table>
  <!-- InstanceEndEditable --></div>
</div>

</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($kullanici);

mysql_free_result($kategoriler);
?>
