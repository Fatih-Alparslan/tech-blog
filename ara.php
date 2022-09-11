<?php include "header.php"; ?>

<?php $ara=strip_tags($_GET["ara"]) ?>
        <div class="page-title lb single-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <h2><i class="fa fa-gears bg-orange"></i> <?php echo $ara ?> ile ilgili sonuçlar...
                          <!-- <small class="hidden-xs-down hidden-sm-down">Nulla felis eros, varius sit amet volutpat non. </small></h2> -->
                    </div><!-- end col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="tech-index.php">Ana Sayfa</a></li>
                            <li class="breadcrumb-item active"><?php echo $ara ?></li>
                        </ol>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end page-title -->

        <section class="section">
            <div class="container">
                <div class="row">

                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-grid-system">
                                <div class="row">
                                  <?php
                                  error_reporting(0);
                                  $sayfa = intval($_GET["sayfa"]);if(!$sayfa || $sayfa < 1){$sayfa=1;}
                                  $yazi_say=$db->query("SELECT * FROM yazilar WHERE yazi_title LIKE '%{$ara}%'");
                                  $Toplamyazi=$yazi_say->rowCount();
                                  $limit=3;
                                  $sayfasayisi= ceil($Toplamyazi/$limit);// bölünen sayfayı tam sayıya yuvarlar
                                  if($sayfa>$sayfasayisi){$sayfa=$sayfasayisi;}
                                  $goster=$sayfa*$limit-$limit;//1 * 2 - 2 = 0 ->0-2
                                  $gorunensayfa=3;

                                  $arananyazi= $db->prepare("SELECT * FROM yazilar INNER JOIN kategoriler INNER JOIN yazar
                                  where yazi_title LIKE ? AND kategoriler.kategori_id=yazilar.yazi_kategori_id AND yazar.yazar_id=yazilar.yazi_yazar_id ORDER BY yazi_id DESC LIMIT $goster,$limit");
                                  $arananyazi->execute(array('%'.$ara.'%'));
                                  $arananyazi_listele=$arananyazi->fetchALL(PDO::FETCH_ASSOC);
                                  $yazi_say=$arananyazi->rowCount();

                                  if ($yazi_say) {


                                  foreach ($arananyazi_listele as $row) {?>
                                    <div class="col-md-6">
                                        <div class="blog-box">
                                            <div class="post-media">
                                                <a href="tech-single.php?yazi_id=<?php echo $row["yazi_id"]; ?>" title="">
                                                    <img src="images/haberler/<?php echo $row["yazi_foto"]; ?>" alt="" class="img-fluid">
                                                    <div class="hovereffect">
                                                        <span></span>
                                                    </div><!-- end hover -->
                                                </a>
                                            </div><!-- end media -->
                                            <div class="blog-meta big-meta">
                                                <span class="color-orange"><a href="tech-category-01.php?kategori_id=<?php echo $row["kategori_id"]; ?>" title=""><?php echo $row["kategori_title"]; ?></a></span>
                                                <h4><a href="tech-single.php?yazi_id=<?php echo $row["yazi_id"]; ?>" title=""><?php echo $row["yazi_title"]; ?></a></h4>
                                                <p><?php echo $row["yazi_icerik"]; ?></p>
                                                <small><a href="tech-single.php?yazi_id=<?php echo $row["yazi_id"]; ?>" title=""><?php echo $row["yazi_tarih"]; ?></a></small>
                                                <small><a href="tech-author.php?yazarid=<?php echo $row["yazar_id"] ?>" title=""><?php echo $row["yazar_adi"]; ?></a></small>
                                                <small><a href="tech-single.php?yazi_id=<?php echo $row["yazi_id"]; ?>" title=""><i class="fa fa-eye"></i> <?php echo $row["yazi_okunma"]; ?></a></small>
                                            </div><!-- end meta -->
                                        </div><!-- end blog-box -->
                                    </div><!-- end col -->
                                  <?php }   } else {

                                    echo '<h3><i class="text-danger" >' ."Aradığınız kelime ile ilgili sonuç bulunamadı!". '</i></h3>';

                                  } ?>
                                </div><!-- end row -->
                            </div><!-- end blog-grid-system -->
                        </div><!-- end page-wrapper -->

                        <hr class="invis3">
                        <?php if ($yazi_say>0) { ?>
                          <div class="row">
                              <div class="col-md-12">
                                  <nav aria-label="Page navigation">

                                      <ul class="pagination justify-content-start">
                                        <?php if($sayfa>1){ ?>
                                          <li class="page-item"><a class="page-link" href="ara.php?ara=<?php echo $ara; ?>&sayfa=1">İlk Sayfa</a></li>
                                          <li class="page-item"><a class="page-link" href="ara.php?ara=<?php echo $ara; ?>&sayfa=<?php echo $sayfa-1; ?>">Önceki Sayfa</a></li>
                                        <?php } ?>

                                        <?php for ($i=$sayfa-$gorunensayfa; $i <$sayfa+$gorunensayfa+1 ; $i++) {
                                          if ($i>0 AND $i<=$sayfasayisi) {
                                            if ($i==$sayfa) {
                                              echo '<li class="page-item disabled"><a class="page-link" style="background-color:#9acfed !important;">'.$i.'</a></li>';
                                            }
                                            else {
                                              echo '<li class="page-item"><a class="page-link" href="ara.php?ara='.$ara.'&sayfa='.$i.'">'.$i.'</a></li>';
                                            }
                                          }
                                        } ?>

                                        <?php if($sayfa!=$sayfasayisi){ ?>
                                          <li class="page-item"><a class="page-link" href="ara.php?ara=<?php echo $ara; ?>&sayfa=<?php echo $sayfa+1; ?>">Sonraki Sayfa</a></li>
                                          <li class="page-item"><a class="page-link" href="ara.php?ara=<?php echo $ara; ?>&sayfa=<?php echo $sayfasayisi; ?>">Son Sayfa</a></li>
                                        <?php } ?>
                                      </ul>

                                  </nav>
                              </div><!-- end col -->
                          </div><!-- end  row -->
                        <?php } ?>

                    </div><!-- end col -->
                    <?php include "page-nav.php" ?>
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

<?php include "footer.php" ?>
