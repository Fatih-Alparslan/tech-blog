<?php include "header.php" ?>
      <!-- Navigation -->
<?php include "sidebar.php" ?>

      <!-- Page Content -->
      <div id="page-wrapper">
          <div class="container-fluid">
              <div class="row">
                  <br>
                  <div class="col-lg-12">
                    <?php include "durum.php" ?>

                  <div class="panel panel-default">
                      <div class="panel-heading">

                          <i class="fa fa-list"> Yazılar</i>
                          <a  href="yazi-ekle.php" class="btn btn-primary btn-xs pull-right"><i class="fa fa-plus"> Yazı Ekle</i></a>
                      </div>
                      <!-- /.panel-heading -->
                      <div class="panel-body">
                          <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                              <thead>
                                  <tr>
                                      <th width="30">#</th>
                                      <th width="125">Fotoğraf</th>
                                      <th width="125">Başlık</th>
                                      <th width="75">Kategori</th>
                                      <th width="75">Okunma</th>
                                      <th width="75">Tarih</th>
                                      <th width="125">İşlemler</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php
                                $yazilar= $db->prepare("SELECT * FROM yazilar
                                INNER JOIN kategoriler ON kategoriler.kategori_id=yazilar.yazi_kategori_id
                                ORDER BY yazi_id DESC");
                                $yazilar->execute();
                                $yazi_cek=$yazilar->fetchALL(PDO::FETCH_ASSOC);
                                $yazi_say=$yazilar->rowCount();

                                if ($yazi_say) {
                                  foreach ($yazi_cek as $row) {?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $row["yazi_id"]; ?></td>
                                        <td><img src="../../images/haberler/<?php echo $row["yazi_foto"]; ?>" width="150" height="75" alt=""></td>
                                        <td><?php echo $row["yazi_title"]; ?></td>
                                        <td><?php echo $row["kategori_title"]; ?></td>
                                        <td class="center"><?php echo $row["yazi_okunma"]; ?></td>
                                        <td class="center"><?php echo $row["yazi_tarih"]; ?></td>
                                        <td class="center">
                                          <a href="yazi-duzenle.php?yazi_id=<?php echo $row["yazi_id"]; ?>"><button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Düzenle</button></a>
                                          <a href="islem.php?yazisil_id=<?php echo $row["yazi_id"]; ?>"><button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Sil</button></a>
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
