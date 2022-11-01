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

                          <i class="fa fa-suitcase"> Reklamlar</i>
                      </div>
                      <!-- /.panel-heading -->
                      <div class="panel-body">
                          <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                              <thead>
                                  <tr>
                                      <th width="30">#</th>
                                      <th width="250">Fotoğraf</th>
                                      <th width="125">Reklam Link</th>
                                      <th width="125">Reklam Tarih</th>
                                      <th width="125">İşlemler</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php
                                $reklamlar= $db->prepare("SELECT * FROM reklamlar
                                ORDER BY reklam_id DESC");
                                $reklamlar->execute();
                                $reklam_cek=$reklamlar->fetchALL(PDO::FETCH_ASSOC);
                                $r_say=$reklamlar->rowCount();

                                if ($r_say) {
                                  foreach ($reklam_cek as $row) {?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $row["reklam_id"]; ?></td>
                                        <td><img src="../../images/reklamlar/<?php echo $row["reklam_banner"]; ?>" width="250" height="200" alt=""></td>
                                        <td><?php echo $row["reklam_link"]; ?></td>
                                        <td><?php echo $row["reklam_tarih"]; ?></td>


                                        <td class="col text-center">
                                          <a href="reklam-duzenle.php?reklam_id=<?php echo $row["reklam_id"]; ?>"><button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Düzenle</button></a>
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
