<?php
error_reporting(0);
extract($_GET);
if ($update=="bos") { ?>
  <div class="alert alert-warning">
      <b>DİKKAT!</b> Lütfen boş alan bırakmayınız...
  </div>
<?php }elseif ($update=="no") {?>
  <div class="alert alert-danger">
    <b>HATA!</b> Güncelleme işlemi yapılırken bir hata oluştu...
  </div>
<?php  }elseif ($update=="yes") {?>
<div class="alert alert-success">
      <b>TEBRİKLER!</b> Güncelleme işlemi başarıyla yapıldı...
</div>
<?php }
elseif ($delete=="yes") {?>
<div class="alert alert-success">
      <b>TEBRİKLER!</b> Silme işlemi başarıyla gerçekleşti...
</div>
<?php }
elseif ($delete=="no") {?>
<div class="alert alert-success">
      <b>HATA!</b> Silme işlemi yapılırken bir hata oluştu...
</div>
<?php }
elseif ($insert=="yes") {?>
<div class="alert alert-success">
      <b>TEBRİKLER!</b> ekleme işlemi başarıyla gerçekleşti...
</div>
<?php }
elseif ($insert=="no") {?>
<div class="alert alert-success">
      <b>HATA!</b> Ekleme işlemi yapılırken bir hata oluştu...
</div>
<?php }
elseif ($update=="gecersizuzanti") {?>
  <div class="alert alert-success">
        <b>DİKKAT!</b> Sadece JPG, PNG ve JPEG uzantılı resimleri yükleyebilirsiniz...
  </div>
<?php }
elseif ($update=="buyuk") {?>
  <div class="alert alert-success">
        <b>DİKKAT!</b> En fazla 1 MB büyüklüğünde resim yükleyebilirsiniz...
  </div>
<?php }

?>
