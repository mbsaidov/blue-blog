<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Arama Sonuçları</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />

</head>

<body>
<div class="dis">
<div class="genel">
<?php include('sidebar.php'); ?>
<div class="icerik">
<div class="kat-baslik"><h4>//Arama</h4></div>
<div class="search-makaleler"><div class="a-baslik"><?php
$aramasorgusu = @mysql_real_escape_string($_GET['aramasorgusu']);
$sonucsorgu = @mysql_query("SELECT * FROM yazilar WHERE baslik LIKE '%".$aramasorgusu."%'" );

if(@mysql_num_rows($sonucsorgu)>0){
while($sorguoku=@mysql_fetch_array($sonucsorgu)){
$id = $sorguoku['id'];
$baslik = $sorguoku['baslik'];
echo '<a href="yazi.php?id='.$id.'">'.$baslik.'</a><br><br><br>';
 }
}
else{
 echo 'Aradığınız İçerik Bulunamadı'; 
}?>
<?php echo $sorguoku['id'].'<br><br><br><br>'; ?>
</div> 
</div>  
</div>
</div>
</body>
</html>