<?php

include 'sistem/baglan.php';

extract($_POST);
if ($_POST) {
    if (!$iletisim_ad || !$iletisim_eposta || !$iletisim_konu || !$iletisim_mesaj) {
     echo "bos";
    }
    else {
      $iletisim=$db->prepare("INSERT INTO iletisim SET iletisim_ad=?, iletisim_eposta=?, iletisim_konu=?, iletisim_mesaj=?");
      $insert=$iletisim->execute(array($iletisim_ad, $iletisim_eposta, $iletisim_konu, $iletisim_mesaj));
      if ($insert) {
        echo "yes";
      }
      else {
        echo "no";
      }
  }
}
