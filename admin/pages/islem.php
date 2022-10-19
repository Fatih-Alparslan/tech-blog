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

// SİTE LOGO DÜZENLEME
$DosyaTuru= array("image/jpeg","image/jpg","image/png","image/x-png",);
$DosyaUzanti=array("jpeg","jpg","png","x-png");
if (isset($logo)) {
  if ($_FILES["site_logo"]["size"]>0) {
      $kaynak=$_FILES["site_logo"]["tmp_name"];
      $isim=$_FILES["site_logo"]["name"];
      $boyut=$_FILES["site_logo"]["size"];
      $tur=$_FILES["site_logo"]["type"];

      $uzanti=substr($isim,strpos($isim,".")+1);
      $resimAd=rand()."_".$isim;
      $hedef="../../images/version/".$resimAd;
      if ($kaynak) {
        if (!in_array($uzanti,$DosyaUzanti) && !in_array($tur,$DosyaTuru)) {
          header("Location: logo-favicon.php?update=gecersizuzanti");
        }
        elseif ($boyut>1024*1024) {
          header("Location: logo-favicon.php?update=buyuk");
        }
        else {
          $sil =$db->prepare("SELECT * FROM ayarlar WHERE site_id=?");
          $sil->execute(array(1));
          $eski_resim=$sil->fetch(PDO::FETCH_ASSOC);
          $eski_resim["site_logo"];
          unlink("../../images/version/".$eski_resim["site_logo"]);

          if (move_uploaded_file($kaynak,$hedef)) {
            $yukle=$db->prepare("UPDATE ayarlar SET site_logo=? WHERE site_id=?");
            $update=$yukle->execute(array($resimAd,1));
            if ($update) {
              header("Location: logo-favicon.php?update=yes");
            }else {
              header("Location: logo-favicon.php?update=no");
            }

          }
        }
      }
  }else {
    header("Location: logo-favicon.php?update=bos");
  }
}

// SİTE FAVICON DÜZENLEME
$DosyaTuru= array("image/jpeg","image/jpg","image/png","image/x-png",);
$DosyaUzanti=array("jpeg","jpg","png","x-png","ico");
if (isset($favicon)) {
  if ($_FILES["site_favicon"]["size"]>0) {
      $kaynak=$_FILES["site_favicon"]["tmp_name"];
      $isim=$_FILES["site_favicon"]["name"];
      $boyut=$_FILES["site_favicon"]["size"];
      $tur=$_FILES["site_favicon"]["type"];

      $uzanti=substr($isim,strpos($isim,".")+1);
      $resimAd=rand()."_".$isim;
      $hedef="../../images/".$resimAd;
      if ($kaynak) {
        if (!in_array($uzanti,$DosyaUzanti) && !in_array($tur,$DosyaTuru)) {
          header("Location: logo-favicon.php?update=gecersizuzanti");
        }
        elseif ($boyut>1024*1024) {
          header("Location: logo-favicon.php?update=buyuk");
        }
        else {
          $sil =$db->prepare("SELECT * FROM ayarlar WHERE site_id=?");
          $sil->execute(array(1));
          $eski_resim=$sil->fetch(PDO::FETCH_ASSOC);
          $eski_resim["site_favicon"];
          unlink("../../images/".$eski_resim["site_favicon"]);

          if (move_uploaded_file($kaynak,$hedef)) {
            $yukle=$db->prepare("UPDATE ayarlar SET site_favicon=? WHERE site_id=?");
            $update=$yukle->execute(array($resimAd,1));
            if ($update) {
              header("Location: logo-favicon.php?update=yes");
            }else {
              header("Location: logo-favicon.php?update=no");
            }

          }
        }
      }
  }else {
    header("Location: logo-favicon.php?update=bos");
  }
}


 ?>
