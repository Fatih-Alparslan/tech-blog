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
                    <?php include "durum.php" ?>       

                    <div class="panel panel-default">

                        <div class="panel-heading">
                            <i class="fa fa-cog fa-fw"></i> Genel Ayarlar
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                          <form action="islem.php" method="post">

                          <div class="form-group">
                              <label>Site Başlık</label>
                              <input class="form-control" name="site_title" value="<?php echo $ayar_cek["site_title"]; ?>">
                          </div>
                          <div class="form-group">
                              <label>Site Url</label>
                              <input class="form-control" name="site_url" value="<?php echo $ayar_cek["site_url"]; ?>">
                          </div>
                          <div class="form-group">
                              <label>Site Description</label>
                              <input class="form-control" name="site_desc" value="<?php echo $ayar_cek["site_desc"]; ?>">
                          </div>
                          <div class="form-group">
                              <label>Site Keyword</label>
                              <input class="form-control" name="site_keyw" value="<?php echo $ayar_cek["site_keyw"]; ?>">
                          </div>

                            <button type="submit" name="genel_ayarlar" class="btn btn-primary btn-block">Güncelle</button>
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
