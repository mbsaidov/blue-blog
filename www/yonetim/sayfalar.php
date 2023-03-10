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

$currentPage = $_SERVER["PHP_SELF"];

mysql_select_db($database_blog, $blog);
$query_kullanici = "SELECT * FROM `admin`";
$kullanici = mysql_query($query_kullanici, $blog) or die(mysql_error());
$row_kullanici = mysql_fetch_assoc($kullanici);
$totalRows_kullanici = mysql_num_rows($kullanici);

$maxRows_sayfalar = 10;
$pageNum_sayfalar = 0;
if (isset($_GET['pageNum_sayfalar'])) {
  $pageNum_sayfalar = $_GET['pageNum_sayfalar'];
}
$startRow_sayfalar = $pageNum_sayfalar * $maxRows_sayfalar;

mysql_select_db($database_blog, $blog);
$query_sayfalar = "SELECT * FROM sayfa ORDER BY id DESC";
$query_limit_sayfalar = sprintf("%s LIMIT %d, %d", $query_sayfalar, $startRow_sayfalar, $maxRows_sayfalar);
$sayfalar = mysql_query($query_limit_sayfalar, $blog) or die(mysql_error());
$row_sayfalar = mysql_fetch_assoc($sayfalar);

if (isset($_GET['totalRows_sayfalar'])) {
  $totalRows_sayfalar = $_GET['totalRows_sayfalar'];
} else {
  $all_sayfalar = mysql_query($query_sayfalar);
  $totalRows_sayfalar = mysql_num_rows($all_sayfalar);
}
$totalPages_sayfalar = ceil($totalRows_sayfalar/$maxRows_sayfalar)-1;

$queryString_sayfalar = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_sayfalar") == false && 
        stristr($param, "totalRows_sayfalar") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_sayfalar = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_sayfalar = sprintf("&totalRows_sayfalar=%d%s", $totalRows_sayfalar, $queryString_sayfalar);



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
    <h2>//Sayfa<span> Y??netimi</span></h2><h3><a href="sayfa-ekle.php">+Yeni Sayfa Ekle</a></h3>
    <p>&nbsp;</p>
         <div class="listele-baslik">
      <ul>
      	<li id="first-li">
      	  <h5>
      	    Resim</h5>
      	</li>
        <li>
          <h5>Ba??l??k </h5>
        </li>
        <li>
          <h5>??zet </h5>
        </li>
        <li> </li>
        <li>
          <h5>&nbsp;&nbsp;&nbsp;&nbsp;D??zenle</h5>
        </li>
        <li>
          <h5>&nbsp;&nbsp;&nbsp;&nbsp;Sil</h5>
        </li>
      </ul>
    </div>
  <?php do { ?>
    <div class="listele">
      <ul>
      	<li>
   	    <img src="../<?php echo $row_yazilar['img']; ?>" width="110" height="90" /> </li>
        <li>
          <h5><?php echo $row_sayfalar['baslik']; ?> </h5>
        </li>
        <li>
          <h5><?php $kelime = $row_sayfalar['icerik'];
echo substr($kelime,0,35).'...'; ?> </h5>
        </li>
        <li> </li>
        <li>
          <h5><a href="sayfa-duzenle.php?id=<?php echo $row_sayfalar['id']; ?>">D??zenle</a></h5>
        </li>
        <li>
          <h5><a href="sil.php?ids=<?php echo $row_sayfalar['id']; ?>">Sil</a></h5>
        </li>
      </ul>
    </div>
    <?php } while ($row_sayfalar = mysql_fetch_assoc($sayfalar)); ?>
    <table border="0">
      <tr>
        <td><?php if ($pageNum_sayfalar > 0) { // Show if not first page ?>
            <a href="<?php printf("%s?pageNum_sayfalar=%d%s", $currentPage, 0, $queryString_sayfalar); ?>"><img src="First.png" /></a>
            <?php } // Show if not first page ?></td>
        <td><?php if ($pageNum_sayfalar > 0) { // Show if not first page ?>
            <a href="<?php printf("%s?pageNum_sayfalar=%d%s", $currentPage, max(0, $pageNum_sayfalar - 1), $queryString_sayfalar); ?>"><img src="Previous.png" /></a>
            <?php } // Show if not first page ?></td>
        <td><?php if ($pageNum_sayfalar < $totalPages_sayfalar) { // Show if not last page ?>
            <a href="<?php printf("%s?pageNum_sayfalar=%d%s", $currentPage, min($totalPages_sayfalar, $pageNum_sayfalar + 1), $queryString_sayfalar); ?>"><img src="Next.png" /></a>
            <?php } // Show if not last page ?></td>
        <td><?php if ($pageNum_sayfalar < $totalPages_sayfalar) { // Show if not last page ?>
            <a href="<?php printf("%s?pageNum_sayfalar=%d%s", $currentPage, $totalPages_sayfalar, $queryString_sayfalar); ?>"><img src="Last.png" /></a>
            <?php } // Show if not last page ?></td>
      </tr>
    </table>
  <!-- InstanceEndEditable --></div>
</div>

</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($kullanici);

mysql_free_result($sayfalar);
?>
