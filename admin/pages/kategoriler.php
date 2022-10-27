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

                          <i class="fa fa-tags"> Kategoriler</i>
                          <a  href="kategori-ekle.php" class="btn btn-primary btn-xs pull-right"><i class="fa fa-plus"> Kategori Ekle</i></a>
                      </div>
                      <!-- /.panel-heading -->
                      <div class="panel-body">
                          <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                              <thead>
                                  <tr>
                                      <th width="30">#</th>
                                      <th width="125">Kategori Adı</th>
                                      <th width="125">Yazı Sayısı</th>
                                      <th width="75">İşlemler</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php
                                $kategoriler= $db->prepare("SELECT * FROM kategoriler ORDER BY kategori_id DESC");
                                $kategoriler->execute();
                                $kategori_cek=$kategoriler->fetchALL(PDO::FETCH_ASSOC);
                                $kategori_say=$kategoriler->rowCount();

                                if ($kategori_say) {
                                  foreach ($kategori_cek as $row) {
                                    $yazilar= $db->prepare("SELECT * FROM yazilar WHERE yazi_kategori_id=?");
                                    $yazilar->execute(array($row["kategori_id"]));
                                    $yazilar->fetchALL(PDO::FETCH_ASSOC);
                                    $yazi_say=$yazilar->rowCount();

                                    ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $row["kategori_id"]; ?></td>
                                        <td><?php echo $row["kategori_title"]; ?></td>
                                        <td><?php echo $yazi_say ?></td>

                                        <td class="center">
                                          <a href="kategori-duzenle.php?kategori_id=<?php echo $row["kategori_id"]; ?>"><button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Düzenle</button></a>
                                          <a href="islem.php?kategorisil_id=<?php echo $row["kategori_id"]; ?>"><button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Sil</button></a>
                                        </td>
                                    </tr>
                                    <?php
                                  }
                                }
                                 ?>


                              </tbody>
                          </table>

                      </div>
                      <!-- /.panel-body -->
                  </div>
                  <!-- /.panel -->
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
