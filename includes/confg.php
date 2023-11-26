<?php
define('DB_SERVER','localhost');
define('DB_USER','publicac_admin');
define('DB_PASS' ,'7N6fv@R7i5X!xE');
define('DB_NAME','publicac_publica');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
