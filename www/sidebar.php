<?php require_once('Connections/blog.php'); ?>
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
$query_kategorigetir = "SELECT * FROM kategori ORDER BY id DESC";
$kategorigetir = mysql_query($query_kategorigetir, $blog) or die(mysql_error());
$row_kategorigetir = mysql_fetch_assoc($kategorigetir);
$totalRows_kategorigetir = mysql_num_rows($kategorigetir);

mysql_select_db($database_blog, $blog);
$query_logo = "SELECT * FROM ayarlar ORDER BY logo DESC";
$logo = mysql_query($query_logo, $blog) or die(mysql_error());
$row_logo = mysql_fetch_assoc($logo);
$totalRows_logo = mysql_num_rows($logo);

mysql_select_db($database_blog, $blog);
$query_sayfalistele = "SELECT * FROM sayfa ORDER BY id ASC";
$sayfalistele = mysql_query($query_sayfalistele, $blog) or die(mysql_error());
$row_sayfalistele = mysql_fetch_assoc($sayfalistele);
$totalRows_sayfalistele = mysql_num_rows($sayfalistele);

mysql_select_db($database_blog, $blog);
$query_sosyal = "SELECT * FROM iletisim";
$sosyal = mysql_query($query_sosyal, $blog) or die(mysql_error());
$row_sosyal = mysql_fetch_assoc($sosyal);
$totalRows_sosyal = mysql_num_rows($sosyal);

?>

<div class="sol">
  <div class="logo"><a href="index.php"><img src="<?php echo $row_logo['logo']; ?>" width="196" height="62" alt="logo" /></a></div>
  <div class="kategori">
    <ul>
      <li><a href="index.php"><img alt="homeicon" src="resimler/homeicon.png" />&nbsp;&nbsp;&nbsp;ANASAYFA</a></li>
      <?php do { ?>
        <li><a href="kategori.php?kat=<?php echo $row_kategorigetir['id']; ?>"><img alt="icon" src="<?php echo $row_kategorigetir['icon']; ?>" />&nbsp;&nbsp;&nbsp;<?php echo $row_kategorigetir['ad']; ?></a></li>
        <?php } while ($row_kategorigetir = mysql_fetch_assoc($kategorigetir)); ?>
    </ul>
   </div>
  <a href="<?php echo $row_sosyal['face']; ?>" target="_blank"><img src="resimler/flat_social_icons_02.png" width="66" alt="face" /></a>
  <a href="<?php echo $row_sosyal['twitter']; ?>" target="_blank"><img src="resimler/flat_social_icons_01.png" width="65" alt="face" /></a>
  <a href="<?php echo $row_sosyal['youtube']; ?>" target="_blank"><img src="resimler/flat_social_icons_03.png" width="66" alt="face" /></a>
  <a href="<?php echo $row_sosyal['plus']; ?>" target="_blank"><img src="resimler/flat_social_icons_04.png" width="66" alt="face" /></a>
 
 
 
 </div>
 
 <div class="ust">
   <div class="search">    <form action="search.php" method="get">
      <input type="text" name="aramasorgusu" id="search_text" placeholder="Blogda Ara" />
      <input type="button" name="search_button" id="search_button" />
    </form></div>
    <div class="sayfalar">
      <ul>   
		<?php do { ?>
        <li><a href="sayfa.php?id=<?php echo $row_sayfalistele['id']; ?>"><?php echo $row_sayfalistele['baslik']; ?></a></li>
        <?php } while ($row_sayfalistele = mysql_fetch_assoc($sayfalistele)); ?>
        <li><a href="iletisim.php">İletişim</a></li>
		</ul>
    </div>
 </div>
 <?php
mysql_free_result($kategorigetir);

mysql_free_result($sayfalistele);

mysql_free_result($sosyal);
?>
