<?php include "header.php" ?>
      <!-- Navigation -->
<?php include "sidebar.php" ?>

<?php
$yazi_id=$_GET["yazi_id"];
$yazilar=$db->prepare("SELECT * FROM yazilar where yazi_id=?");
$yazilar->execute(array($yazi_id));
$yazi_cek=$yazilar->fetch(PDO::FETCH_ASSOC);
 ?>

      <!-- Page Content -->
      <div id="page-wrapper">
          <div class="container-fluid">
              <div class="row">
                  <br>
                  <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-edit fa-fw"></i> Yazı Düzenle
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                          <form action="islem.php?yazi_id=<?php echo $yazi_id ?>" method="post" enctype="multipart/form-data">

                          <div class="form-group">
                              <label>Yazı Fotoğraf</label><br>
                              <img class="img-thumbnail" width="400" src="../../images/haberler/<?php echo $yazi_cek["yazi_foto"];?>" alt="<?php echo $yazi_cek["yazi_title"];?>">
                          </div>
                          <div class="form-group">
                              <label>Fotoğraf Yükle</label>
                              <input type="file" class="form-control" name="yazi_foto">
                          </div>
                          <div class="form-group">
                              <label>Yazı Başlık</label>
                              <input class="form-control" name="yazi_title" value="<?php echo $yazi_cek["yazi_title"]; ?>">
                          </div>
                          <div class="form-group">
                              <label>Kategori</label>
                              <select name="yazi_kategori" class="form-control">
                                <?php
                                $kategoriler=$db->prepare("SELECT * FROM kategoriler");
                                $kategoriler->execute();
                                $kategori_cek=$kategoriler->fetchALL(PDO::FETCH_ASSOC);
                                foreach ($kategori_cek as $row){ ?>
                                  <option value="<?php echo $row["kategori_id"]; ?>" <?php echo $yazi_cek["yazi_kategori_id"]==$row["kategori_id"] ? "selected" : null; ?>>
                                     <?php echo $row["kategori_title"]; ?>
                                  </option>
                                <?php } ?>
                              </select>
                          </div>
                          <div class="form-group">
                              <label>Tarih</label>
                              <input class="form-control" name="yazi_tarih" value="<?php echo $yazi_cek["yazi_tarih"]; ?>" disabled>
                          </div>
                          <div class="form-group">
                              <label>Okunma Sayısı</label>
                              <input class="form-control" name="yazi_okunma" value="<?php echo $yazi_cek["yazi_okunma"]; ?>" disabled>
                          </div>
                          <div class="form-group">
                              <label>İçerik</label><br>
                              <textarea name="yazi_icerik" class="ckeditor">
                                <?php echo $yazi_cek["yazi_icerik"]; ?>
                              </textarea>
                          </div>

                            <button type="submit" name="yazi_duzenle" class="btn btn-primary btn-block">Güncelle</button>
                          </form>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                  </div>
                  <!-- /.col-lg-12 -->
              </div>
              <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
      </div>
      <!-- /#page-wrapper -->

  </div>
  <!-- /#wrapper -->

<?php include "footer.php" ?>
