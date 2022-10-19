<?php include "header.php" ?>
      <!-- Navigation -->
<?php include "sidebar.php" ?>

<?php
$ayarlar=$db->prepare("SELECT * FROM ayarlar");
$ayarlar->execute();
$ayar_cek=$ayarlar->fetch(PDO::FETCH_ASSOC);
 ?>

      <!-- Page Content -->
      <div id="page-wrapper">
          <div class="container-fluid">
              <div class="row">
                  <br>
                  <div class="col-lg-12">
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
                  <!-- PANEL FAVİCON  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bomb fa-fw"> </i> Logo Düzenle
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body ">
                          <form action="islem.php" method="post" enctype="multipart/form-data">
                            <div class="form-group ">
                                <label>Şuanki LOGO</label><br>
                                <img class="img-thumbnail img-responsive bg-primary" width="200" height="50" src="../../images/version/<?php echo $ayar_cek["site_logo"]; ?>" alt="Logo">
                            </div>
                          <div class="form-group">
                              <input type="file" class="form-control" name="site_logo">
                          </div>
                          <div class="form-group">
                            <button type="submit" name="logo" class="btn btn-primary btn-block">Güncelle</button>
                          </form>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                  </div>
                    <!-- PANEL FAVİCON END -->
                  <!-- /.col-lg-12 -->

                  <!-- PANEL FAVİCON -->
                  <div class="panel panel-default">

                      <div class="panel-heading">
                          <i class="fa fa-bomb fa-fw"> </i> Favicon Düzenle
                      </div>
                      <!-- /.panel-heading -->
                      <div class="panel-body ">
                        <form action="islem.php" method="post" enctype="multipart/form-data">
                          <div class="form-group ">
                              <label>Şuanki Favicon</label><br>
                              <img class="img-thumbnail img-responsive bg-primary" width="50" height="50" src="../../images/<?php echo $ayar_cek["site_favicon"]; ?>" alt="favicon">
                          </div>
                        <div class="form-group">
                            <input type="file" class="form-control" name="site_favicon">
                        </div>
                        <div class="form-group">
                          <button type="submit" name="favicon" class="btn btn-primary btn-block">Güncelle</button>
                        </form>
                      </div>
                      <!-- /.panel-body -->
                  </div>
                </div>
                  <!-- PANEL FAVİCON END -->
              </div>
              <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
      </div>
      <!-- /#page-wrapper -->

  </div>
  <!-- /#wrapper -->

<?php include "footer.php" ?>
