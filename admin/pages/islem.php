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

// YAZI EKLE seo eklenebilir
$DosyaTuru= array("image/jpeg","image/jpg","image/png","image/x-png",);
$DosyaUzanti=array("jpeg","jpg","png","x-png");

if (isset($yazi_ekle)) {
      $kaynak=$_FILES["yazi_foto"]["tmp_name"];
      $isim=$_FILES["yazi_foto"]["name"];
      $boyut=$_FILES["yazi_foto"]["size"];
      $tur=$_FILES["yazi_foto"]["type"];

      $uzanti=substr($isim,strpos($isim,".")+1);
      $resimAd=rand()."_".$isim;
      $hedef="../../images/haberler/".$resimAd;
      if (!$kaynak || !$yazi_title || !$yazi_icerik) {
       header("Location: yazilar.php?update=bos");
      }
      else {


        if ($kaynak) {
          if (!in_array($uzanti,$DosyaUzanti) && !in_array($tur,$DosyaTuru)) {
            header("Location: yazilar.php?update=gecersizuzanti");
          }
          elseif ($boyut>1024*1024) {
            header("Location: yazilar.php?update=buyuk");
          }
          else {
            if (move_uploaded_file($kaynak,$hedef)) {
              $yukle=$db->prepare("INSERT INTO yazilar  SET yazi_foto=?, yazi_title=?, yazi_kategori_id=?, yazi_icerik=?,yazi_yazar_id=?");
              $insert=$yukle->execute(array($resimAd,$yazi_title,$yazi_kategori,$yazi_icerik,$yazar));
              if ($insert) {
                header("Location: yazilar.php?insert=yes");
              }else {
                header("Location: yazilar.php?insert=no");
              }
            }
          }
        }
      }


}

// YAZI DÜZENLE
$DosyaTuru= array("image/jpeg","image/jpg","image/png","image/x-png",);
$DosyaUzanti=array("jpeg","jpg","png","x-png");
$yazi_id=$_GET["yazi_id"];
if (isset($yazi_id)) {
  //eğer Fotoğraf değiştirirse burası çalışacak
  if ($_FILES["yazi_foto"]["size"]>0) {

      $kaynak=$_FILES["yazi_foto"]["tmp_name"];
      $isim=$_FILES["yazi_foto"]["name"];
      $boyut=$_FILES["yazi_foto"]["size"];
      $tur=$_FILES["yazi_foto"]["type"];

      $uzanti=substr($isim,strpos($isim,".")+1);
      $resimAd=rand()."_".$isim;
      $hedef="../../images/haberler/".$resimAd;
      if ($kaynak) {
        if (!in_array($uzanti,$DosyaUzanti) && !in_array($tur,$DosyaTuru)) {
          header("Location: yazilar.php?update=gecersizuzanti");
        }
        elseif ($boyut>1024*1024) {
          header("Location: yazilar.php?update=buyuk");
        }
        else {
          $sil =$db->prepare("SELECT * FROM yazilar WHERE yazi_id=?");
          $sil->execute(array($yazi_id));
          $eski_resim=$sil->fetch(PDO::FETCH_ASSOC);
          $eski_resim["yazi_foto"];
          unlink("../../images/haberler/".$eski_resim["yazi_foto"]);

          if (move_uploaded_file($kaynak,$hedef)) {
            $yukle=$db->prepare("UPDATE yazilar SET yazi_foto=?, yazi_title=?, yazi_kategori_id=?, yazi_icerik=? WHERE yazi_id=?");
            $update=$yukle->execute(array($resimAd,$yazi_title,$yazi_kategori,$yazi_icerik,$yazi_id));
            if ($update) {
              header("Location: yazilar.php?update=yes");
            }else {
              header("Location: yazilar.php?update=no");
            }
          }
        }
      }
  }else {
    if (!$yazi_title || !$yazi_icerik || !$yazi_kategori) {
       header("Location: yazilar.php?update=bos");
    }
    else {


      $yukle=$db->prepare("UPDATE yazilar SET yazi_title=?, yazi_kategori_id=?, yazi_icerik=? WHERE yazi_id=?");
      $update=$yukle->execute(array($yazi_title,$yazi_kategori,$yazi_icerik,$yazi_id));
      if ($update) {
        header("Location: yazilar.php?update=yes");
      }else {
        header("Location: yazilar.php?update=no");
      }
    }
  }
}

// YAZI SİLME İŞLEMİ
$yazisil_id= $_GET["yazisil_id"];
if (isset($yazisil_id)) {

  $sil =$db->prepare("SELECT * FROM yazilar WHERE yazi_id=?");
  $sil->execute(array($yazisil_id));
  $eski_resim=$sil->fetch(PDO::FETCH_ASSOC);
  $eski_resim["yazi_foto"];
  unlink("../../images/haberler/".$eski_resim["yazi_foto"]);

  $delete=$db->prepare("DELETE FROM yazilar WHERE yazi_id=?");
  $remove=$delete->execute(array($yazisil_id));
  if ($remove) {
    header("Location: yazilar.php?delete=yes");
  }else {
    header("Location: yazilar.php?delete=no");
  }
}

// KATEGORİ EKLEME İŞLEMİ
if (isset($kategori_ekle)) {

  if (!$kategori_title || !$kategori_url) {
      header("Location: kategoriler.php?update=bos");
  }else {
      $kategoriler=$db->prepare("INSERT INTO kategoriler SET kategori_title=?, kategori_url=?");
      $kategori_ekle=$kategoriler->execute(array($kategori_title,$kategori_url));
      if ($kategori_ekle) {
        header("Location: kategoriler.php?insert=yes");
      }
      else {
      header("Location: kategoriler.php?insert=no");
      }
  }
}

// KATEGORİ GÜNCELLEME İŞLEMİ
$kategori_id=$_GET["kategori_id"];
if (isset($kategori_duzenle)) {

  if (!$kategori_title || !$kategori_url) {
      header("Location: kategoriler.php?update=bos");
  }else {
      $kategoriler=$db->prepare("UPDATE kategoriler SET kategori_title=?, kategori_url=? WHERE kategori_id=?");
      $kategori_update=$kategoriler->execute(array($kategori_title,$kategori_url,$kategori_id));
      if ($kategori_update) {
        header("Location: kategoriler.php?update=yes");
      }
      else {
        header("Location: kategoriler.php?update=no");
      }
  }
}

// YAZI SİLME İŞLEMİ
$kategorisil_id= $_GET["kategorisil_id"];
if (isset($kategorisil_id)) {

  $delete=$db->prepare("DELETE FROM kategoriler WHERE kategori_id=?");
  $remove=$delete->execute(array($kategorisil_id));
  if ($remove) {
    header("Location: kategoriler.php?delete=yes");
  }else {
    header("Location: kategoriler.php?delete=no");
  }
}

//REKLAM DÜZENLE
$DosyaTuru= array("image/jpeg","image/jpg","image/png","image/x-png",);
$DosyaUzanti=array("jpeg","jpg","png","x-png");
$reklam_id=$_GET["reklam_id"];
if (isset($reklam_id)) {
  //eğer Fotoğraf değiştirirse burası çalışacak
  if ($_FILES["reklam_banner"]["size"]>0) {

      $kaynak=$_FILES["reklam_banner"]["tmp_name"];
      $isim=$_FILES["reklam_banner"]["name"];
      $boyut=$_FILES["reklam_banner"]["size"];
      $tur=$_FILES["reklam_banner"]["type"];

      $uzanti=substr($isim,strpos($isim,".")+1);
      $resimAd=rand()."_".$isim;
      $hedef="../../images/reklamlar/".$resimAd;
      if ($kaynak) {
        if (!in_array($uzanti,$DosyaUzanti) && !in_array($tur,$DosyaTuru)) {
          header("Location: reklamlar.php?update=gecersizuzanti");
        }
        elseif ($boyut>1024*1024) {
          header("Location: reklamlar.php?update=buyuk");
        }
        else {
          $sil =$db->prepare("SELECT * FROM reklamlar WHERE reklam_id=?");
          $sil->execute(array($reklam_id));
          $eski_resim=$sil->fetch(PDO::FETCH_ASSOC);
          $eski_resim["reklam_banner"];
          unlink("../../images/reklamlar/".$eski_resim["reklam_banner"]);

          if (move_uploaded_file($kaynak,$hedef)) {
            $yukle=$db->prepare("UPDATE reklamlar SET reklam_banner=?, reklam_link=? WHERE reklam_id=?");
            $update=$yukle->execute(array($resimAd,$reklam_link,$reklam_id));
            if ($update) {
              header("Location: reklamlar.php?update=yes");
            }else {
              header("Location: reklamlar.php?update=no");
            }
          }
        }
      }
  }else {
      $yukle=$db->prepare("UPDATE reklamlar SET reklam_link=? WHERE reklam_id=?");
      $update=$yukle->execute(array($reklam_link,$reklam_id));
      if ($update) {
        header("Location: reklamlar.php?update=yes");
      }else {
        header("Location: reklamlar.php?update=no");
      }
  }
}





 ?>
