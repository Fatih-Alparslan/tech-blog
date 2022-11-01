<?php include "header.php" ?>
      <!-- Navigation -->
<?php include "sidebar.php" ?>

<?php
$reklam_id=$_GET["reklam_id"];
$reklamlar=$db->prepare("SELECT * FROM reklamlar where reklam_id=?");
$reklamlar->execute(array($reklam_id));
$reklam_cek=$reklamlar->fetch(PDO::FETCH_ASSOC);
 ?>

      <!-- Page Content -->
      <div id="page-wrapper">
          <div class="container-fluid">
              <div class="row">
                  <br>
                  <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-edit fa-fw"></i> Reklam Düzenle
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                          <form action="islem.php?reklam_id=<?php echo $reklam_id ?>" method="post" enctype="multipart/form-data">

                          <div class="form-group">
                              <label>Reklam Fotoğraf</label><br>
                              <img class="img-thumbnail" width="400" src="../../images/reklamlar/<?php echo $reklam_cek["reklam_banner"];?>" alt="<?php echo $reklam_cek["reklam_link"];?>">
                          </div>
                          <div class="form-group">
                              <label>Reklam Fotoğrafı Yükle</label>
                              <input type="file" class="form-control" name="reklam_banner">
                          </div>
                          <div class="form-group">
                              <label>Reklam Link</label>
                              <input class="form-control" name="reklam_link" value="<?php echo $reklam_cek["reklam_link"]; ?>">
                          </div>

                          <div class="form-group">
                              <label>Tarih</label>
                              <input class="form-control" name="reklam_tarih" value="<?php echo $reklam_cek["reklam_tarih"]; ?>" disabled>
                          </div>

                            <button type="submit" name="reklam_duzenle" class="btn btn-primary btn-block">Güncelle</button>
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
