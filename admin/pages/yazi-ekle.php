<?php include "header.php" ?>
      <!-- Navigation -->
<?php include "sidebar.php" ?>

      <!-- Page Content -->
      <div id="page-wrapper">
          <div class="container-fluid">
              <div class="row">
                  <br>
                  <div class="col-lg-12">
                  
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-edit fa-fw"></i> Yazı Ekle
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                          <form action="islem.php" method="POST" enctype="multipart/form-data">
                          <div class="form-group">
                              <label>Fotoğraf Yükle</label>
                              <input type="file" class="form-control" name="yazi_foto">
                          </div>
                          <div class="form-group">
                              <label>Yazı Başlık</label>
                              <input class="form-control" name="yazi_title" placeholder="Yazınızın başlığını giriniz...">
                          </div>
                          <div class="form-group">
                              <label>Kategori</label>
                              <select name="yazi_kategori" class="form-control">
                                <?php
                                $kategoriler=$db->prepare("SELECT * FROM kategoriler");
                                $kategoriler->execute();
                                $kategori_cek=$kategoriler->fetchALL(PDO::FETCH_ASSOC);
                                foreach ($kategori_cek as $row){ ?>
                                  <option value="<?php echo $row["kategori_id"]; ?>"><?php echo $row["kategori_title"]; ?></option>
                                <?php } ?>
                              </select>
                          </div>
                          <div class="form-group">
                              <label>İçerik</label><br>
                              <textarea name="yazi_icerik" class="ckeditor"></textarea>
                          </div>

                          <div class="form-group">
                              <label>Yazar</label>
                              <select name="yazar" class="form-control">
                                <?php
                                $kategoriler=$db->prepare("SELECT * FROM yazar");
                                $kategoriler->execute();
                                $kategori_cek=$kategoriler->fetchALL(PDO::FETCH_ASSOC);
                                foreach ($kategori_cek as $row){ ?>
                                  <option value="<?php echo $row["yazar_id"]; ?>"><?php echo $row["yazar_adi"]; ?></option>
                                <?php } ?>
                              </select>
                          </div>

                            <button type="submit" name="yazi_ekle" class="btn btn-primary btn-block">Ekle</button>
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
