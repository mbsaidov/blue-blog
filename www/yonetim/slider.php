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
$query_slider = "SELECT * FROM slider ORDER BY id DESC";
$slider = mysql_query($query_slider, $blog) or die(mysql_error());
$row_slider = mysql_fetch_assoc($slider);
$totalRows_slider = mysql_num_rows($slider);



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
   
  <h2>//Slider<span> Yönetimi</span></h2>
  <?php
@$islem = $_GET['islem'];//İşlem isminde bir string değişken tanımlıyoruz
switch($islem){
case "":
$query = mysql_query("SELECT * FROM slider");//Resimleri çekmek için gerekli mysql kodumuz

?>
  <form method="post" action="slider.php?islem=upload" enctype="multipart/form-data">
    <br />
    <table width="100%">
  <tr>
    <td width="14%" height="49" bgcolor="#EAEAEA"><h4>Resim:</h4></td>
    <td width="86%" bgcolor="#EAEAEA"><input name="imagesUpload[]" type="file" size="100" min="1" max="3" multiple /></td>
  </tr>
  <tr>
    <td height="49">&nbsp;</td>
    <td><input name="url" type="text" size="120" placeholder="Resim Linki" /></td>
  </tr>
    <tr>
    <td height="46" bgcolor="#EAEAEA">&nbsp;</td>
    <td bgcolor="#EAEAEA"><input type="submit" value="Gönder" /></td>
  </tr>
</table>
</form>
<?php
break;

case "upload"://upload string değişken değerimiz
$img_target = "../slider/resimler/"; //Resmin yükleneceği yer
foreach ($_FILES["imagesUpload"]["error"] as $upload => $error) {//Foreach döngüsü kurarak toplu seçimde array olaran gelen resimleri alıyoruz
    if ($error == UPLOAD_ERR_OK) {//Resim seçilmiş ve hata yok ise upload yap
        $img_source = $_FILES["imagesUpload"]["tmp_name"][$upload];
        $img_name = $_FILES["imagesUpload"]["name"][$upload];
		$url=$_POST['url'];


		move_uploaded_file($img_source,$img_target.'/'.$img_name);
		$resim = "slider/resimler/".$img_name."";

		$query = mysql_query("INSERT INTO slider (img, url) VALUES ('$resim','$url')");
		echo '<meta http-equiv="refresh" content="0;URL=slider.php">';
	}else{//Resim seçilmemiş ve hata var ise
		echo "Bir resim seçmelisiniz!";
	}
}
break;

break;
}
?>
<br /><br /><br /><br />
  <?php do { ?>
    <table width="220" cellpadding="1" id="slider-imgs">
      <tr>
        <td><img src="../<?php echo $row_slider['img']; ?>" width="220" height="100" /></td>
      </tr>
      <tr>
        <td height="32" align="center" bgcolor="#E2E2E2"><h4><a href="sil.php?slider=<?php echo $row_slider['id']; ?>">Sil</a></h4></td>
      </tr>
    </table>
    <?php } while ($row_slider = mysql_fetch_assoc($slider)); ?>
  <!-- InstanceEndEditable --></div>
</div>

</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($kullanici);

mysql_free_result($slider);
?>
