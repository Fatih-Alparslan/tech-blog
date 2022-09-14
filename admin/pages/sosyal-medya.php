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
                  <?php } ?>

                    <div class="panel panel-default">

                        <div class="panel-heading">
                            <i class="fa fa-slack fa-fw"></i> Sosyal Medya Linkleri
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                          <form action="islem.php" method="post">
                            <label>Facebook</label>
                            <a class="btn btn-block btn-social btn-facebook">
                                <i class="fa fa-facebook"></i>
                                <input type="text" class="form-control" style="height:25px;" name="site_facebook" value="<?php echo $ayar_cek["site_facebook"]; ?>">
                            </a><br>
                            <label>Twitter</label>
                            <a class="btn btn-block btn-social btn-twitter">
                                <i class="fa fa-twitter"></i>
                                <input type="text" class="form-control" style="height:25px;" name="site_twitter" value="<?php echo $ayar_cek["site_twitter"]; ?>">
                            </a><br>
                            <label>GitHub</label>
                            <a class="btn btn-block btn-social btn-github">
                                <i class="fa fa-github"></i>
                                <input type="text" class="form-control" style="height:25px;" name="site_github" value="<?php echo $ayar_cek["site_github"]; ?>">
                            </a><br>
                            <label>Instagram</label>
                            <a class="btn btn-block btn-social btn-instagram">
                                <i class="fa fa-instagram"></i>
                                <input type="text" class="form-control" style="height:25px;" name="site_instagram" value="<?php echo $ayar_cek["site_instagram"]; ?>">
                            </a>
                            <br>

                            <button type="submit" name="sosyal_medya" class="btn btn-primary btn-block">Güncelle</button>
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
