<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_blog = "localhost";
$database_blog = "pelikanw_blogdemo";
$username_blog = "pelikanw_demo";
$password_blog = "your_password_here";
$blog = mysql_pconnect($hostname_blog, $username_blog, $password_blog) or trigger_error(mysql_error(),E_USER_ERROR); 
?>