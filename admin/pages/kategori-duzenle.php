<?php include "header.php" ?>
      <!-- Navigation -->
<?php include "sidebar.php" ?>

<?php
$kategori_id=$_GET["kategori_id"];
$kategoriler=$db->prepare("SELECT * FROM kategoriler where kategori_id=?");
$kategoriler->execute(array($kategori_id));
$kategori_cek=$kategoriler->fetch(PDO::FETCH_ASSOC);
 ?>

      <!-- Page Content -->
      <div id="page-wrapper">
          <div class="container-fluid">
              <div class="row">
                  <br>
                  <div class="col-lg-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-edit fa-fw"></i> Kategori Düzenle
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                          <form action="islem.php?kategori_id=<?php echo $kategori_cek["kategori_id"]; ?>" method="POST">

                          <div class="form-group">
                              <label>Kategori Adı</label>
                              <input class="form-control" name="kategori_title" value="<?php echo $kategori_cek["kategori_title"]; ?>">
                          </div>
                          <div class="form-group">
                              <label>Kategori Url</label>
                              <input class="form-control" name="kategori_url" value="<?php echo $kategori_cek["kategori_url"]; ?>">
                          </div>


                            <button type="submit" name="kategori_duzenle" class="btn btn-primary btn-block">Güncelle</button>
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
