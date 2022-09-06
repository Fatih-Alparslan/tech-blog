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

                                  $arananyazi= $db->prepare("SELECT * FROM yazilar INNER JOIN kategoriler INNER JOIN yazar
                                  where yazi_title LIKE ? AND kategoriler.kategori_id=yazilar.yazi_kategori_id AND yazar.yazar_id=yazilar.yazi_yazar_id ORDER BY yazi_id DESC LIMIT 8");
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
                                          <li class="page-item"><a class="page-link" href="#">1</a></li>
                                          <li class="page-item"><a class="page-link" href="#">2</a></li>
                                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                                          <li class="page-item">
                                              <a class="page-link" href="#">Next</a>
                                          </li>
                                      </ul>
                                  </nav>
                              </div><!-- end col -->
                          </div><!-- end row -->
                        <?php } ?>

                    </div><!-- end col -->
                    <?php include "page-nav.php" ?>
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

<?php include "footer.php" ?>
