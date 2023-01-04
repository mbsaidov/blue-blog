<?php require_once('Connections/blog.php'); ?>
<form action="sonuc.php" method="get">
 <input type="text" name="aramasorgusu" placeholder="Aramak istediðiniz kelimeyi yazýnýz"><br>
 <input type="submit" value="Ara">
</form>
<?php
$aramasorgusu = @mysql_real_escape_string($_GET['aramasorgusu']);
$sonucsorgu = @mysql_query("SELECT * FROM yazilar WHERE baslik LIKE '%".$aramasorgusu."%'" );
if(@mysql_num_rows($sonucsorgu)>0){
 while($sorguoku=@mysql_fetch_array($sonucsorgu)){
  echo $sorguoku['baslik'].'<br>';
 }
}
else{
 echo 'Aradýðýnýz Ýçerik Bulunamadý';
}
?>