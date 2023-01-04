<?php require_once('../Connections/blog.php'); ?>
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

if ((isset($_GET['id'])) && ($_GET['id'] != "")) {
  $deleteSQL = sprintf("DELETE FROM yazilar WHERE id=%s",
                       GetSQLValueString($_GET['id'], "int"));

  mysql_select_db($database_blog, $blog);
  $Result1 = mysql_query($deleteSQL, $blog) or die(mysql_error());

  $deleteGoTo = "yazilar.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

if ((isset($_GET['idk'])) && ($_GET['idk'] != "")) {
  $deleteSQL = sprintf("DELETE FROM kategori WHERE id=%s",
                       GetSQLValueString($_GET['idk'], "int"));

  mysql_select_db($database_blog, $blog);
  $Result1 = mysql_query($deleteSQL, $blog) or die(mysql_error());

  $deleteGoTo = "kategori.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

if ((isset($_GET['ids'])) && ($_GET['ids'] != "")) {
  $deleteSQL = sprintf("DELETE FROM sayfa WHERE id=%s",
                       GetSQLValueString($_GET['ids'], "int"));

  mysql_select_db($database_blog, $blog);
  $Result1 = mysql_query($deleteSQL, $blog) or die(mysql_error());

  $deleteGoTo = "sayfalar.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

if ((isset($_GET['slider'])) && ($_GET['slider'] != "")) {
  $deleteSQL = sprintf("DELETE FROM slider WHERE id=%s",
                       GetSQLValueString($_GET['slider'], "int"));

  mysql_select_db($database_blog, $blog);
  $Result1 = mysql_query($deleteSQL, $blog) or die(mysql_error());

  $deleteGoTo = "slider.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

if ((isset($_GET['mid'])) && ($_GET['mid'] != "")) {
  $deleteSQL = sprintf("DELETE FROM ``iletisim-formu`` WHERE id=%s",
                       GetSQLValueString($_GET['mid'], "int"));

  mysql_select_db($database_blog, $blog);
  $Result1 = mysql_query($deleteSQL, $blog) or die(mysql_error());

  $deleteGoTo = "iletisim.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>