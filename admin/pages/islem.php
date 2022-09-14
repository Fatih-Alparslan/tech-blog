<?php

include "../../sistem/baglan.php";
extract($_POST);
// GENEL AYARLAR GÜNCELLEME İŞLEMİ
if (isset($genel_ayarlar)) {

  if (!$site_title || !$site_url || !$site_desc || !$site_keyw) {
      header("Location: genel-ayarlar.php?update=bos");
  }else {
      $ayarlar=$db->prepare("UPDATE ayarlar SET site_title=?, site_url=?, site_desc=?, site_keyw=? WHERE site_id=?");
      $update=$ayarlar->execute(array($site_title,$site_url,$site_desc,$site_keyw,1));
      if ($update) {
        header("Location: genel-ayarlar.php?update=yes");
      }
      else {
        header("Location: genel-ayarlar.php?update=no");
      }


  }

}


// SOSYAL MEDYA GÜNCELLEME İŞLEMİ
if (isset($sosyal_medya)) {

  if (!$site_facebook || !$site_github || !$site_instagram || !$site_twitter) {
      header("Location: sosyal-medya.php?update=bos");
  }else {
      $ayarlar=$db->prepare("UPDATE ayarlar SET site_facebook=?, site_github=?, site_instagram=?, site_twitter=? WHERE site_id=?");
      $update=$ayarlar->execute(array($site_facebook,$site_github,$site_instagram,$site_twitter,1));
      if ($update) {
        header("Location: sosyal-medya.php?update=yes");
      }
      else {
      header("Location: sosyal-medya.php?update=no");
      }


  }

}




 ?>
