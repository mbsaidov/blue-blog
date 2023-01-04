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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO `mesajlar` (id, isim, baslik, mail, mesaj) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id'], "int"),
                       GetSQLValueString($_POST['isim'], "text"),
                       GetSQLValueString($_POST['baslik'], "text"),
                       GetSQLValueString($_POST['mail'], "text"),
                       GetSQLValueString($_POST['mesaj'], "text"));

  mysql_select_db($database_blog, $blog);
  $Result1 = mysql_query($insertSQL, $blog) or die(mysql_error());
}

$colname_sayfa = "-1";
if (isset($_GET['id'])) {
  $colname_sayfa = $_GET['id'];
}
mysql_select_db($database_blog, $blog);
$query_sayfa = sprintf("SELECT * FROM sayfa WHERE id = %s", GetSQLValueString($colname_sayfa, "int"));
$sayfa = mysql_query($query_sayfa, $blog) or die(mysql_error());
$row_sayfa = mysql_fetch_assoc($sayfa);
$totalRows_sayfa = mysql_num_rows($sayfa);

mysql_select_db($database_blog, $blog);
$query_baslik = "SELECT * FROM ayarlar";
$baslik = mysql_query($query_baslik, $blog) or die(mysql_error());
$row_baslik = mysql_fetch_assoc($baslik);
$totalRows_baslik = mysql_num_rows($baslik);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<title>İletişim - <?php echo $row_baslik['site_adi']; ?></title>
</head>

<body>
<div class="dis">
<div class="genel">
<?php include('sidebar.php'); ?>
<div class="icerik">
<div class="iletisim">
  <div class="s-baslik">//İletişim
    <div id="iletisimform"><form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
          <input id="iletisim1"  type="text" name="baslik"  size="32" value="Başlık *" />
          <input id="iletisim1" value="İsim *" type="text" name="isim"  size="32" />
          <input id="iletisim2" value="Mail *" type="text" name="mail"  size="32" />
          <textarea id="iletisim3" value="Mesajınız *" name="mesaj" cols="50" rows="5">Mesajınız *

          </textarea>
			<input id="iletisim4" type="submit" value="Gönder" /></td>

      <input type="hidden" name="id" value="" />
      <input type="hidden" name="MM_insert" value="form1" />
    </form></div>
    <p>&nbsp;</p>
</div>
<div style="clear: both"></div>
</div>
</div>  
</div>
</div>
</body>
</html>
<?php
mysql_free_result($sayfa);

mysql_free_result($baslik);
?>
