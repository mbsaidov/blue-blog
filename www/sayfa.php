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
<title><?php echo $row_sayfa['baslik']; ?> » <?php echo $row_baslik['site_adi']; ?></title>
</head>

<body>
<div class="dis">
<div class="genel">
<?php include('sidebar.php'); ?>
<div class="icerik">
<div class="makale"><div class="s-baslik">//<?php echo $row_sayfa['baslik']; ?></div><div class="yazi-icerik"><?php echo $row_sayfa['icerik']; ?></div> 
<div id="yorum"><div id="disqus_thread"></div>
        <div id="disqus_thread"></div>
		  <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = 'pelikanw'; // required: replace example with your forum shortname

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    
    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript></div>
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
