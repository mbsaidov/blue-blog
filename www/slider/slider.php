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
$query_slider = "SELECT * FROM slider ORDER BY id DESC";
$slider = mysql_query($query_slider, $blog) or die(mysql_error());
$row_slider = mysql_fetch_assoc($slider);
$totalRows_slider = mysql_num_rows($slider);
?>
	<link rel="stylesheet" type="text/css" href="slider/engine1/style.css" />
	<script type="text/javascript" src="slider/engine1/jquery.js"></script>
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
		<?php do { ?>
		  <li><a href="<?php echo $row_slider['url']; ?>"><img src="<?php echo $row_slider['img']; ?>" id="wows1_0"/></a></li>
		  <?php } while ($row_slider = mysql_fetch_assoc($slider)); ?>
    </ul></div>
	<div class="ws_bullets"><div>
		<a href="#" title="5">1</a>
		<a href="#" title="ilk">2</a>
		<a href="#" title="1">3</a>
		<a href="#" title="2">4</a>
		<a href="#" title="3">5</a>
		<a href="#" title="4">6</a>
	</div></div>
	<div class="ws_shadow"></div>
	</div>	
	<script type="text/javascript" src="slider/engine1/wowslider.js"></script>
	<script type="text/javascript" src="slider/engine1/script.js"></script>
	<?php
mysql_free_result($slider);
?>
