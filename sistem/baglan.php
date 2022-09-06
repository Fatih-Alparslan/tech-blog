<?php

try {
  $db=new PDO("mysql:host=localhost; dbname=techblog; charset=utf8;","root","");
} catch (PDOException $error) {
      echo "<center><b>Veritabanına bağlanılamadı</b></center>"; $error->getMessage();
}



 ?>
