<section class="section mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-top clearfix">
                                <h4 class="pull-left">Yeni Haberler <a href="#"><i class="fa fa-rss"></i></a></h4>
                            </div><!-- end blog-top -->

                            <?php
                            $yazilar= $db->prepare("SELECT * FROM yazilar INNER JOIN kategoriler INNER JOIN yazar
                            where kategoriler.kategori_id=yazilar.yazi_kategori_id AND yazar.yazar_id=yazilar.yazi_yazar_id ORDER BY yazi_id DESC LIMIT 8");
                            $yazilar->execute();
                            $yazi_listele=$yazilar->fetchALL(PDO::FETCH_ASSOC);

                            foreach ($yazi_listele as $row) {?>
                              <div class="blog-list clearfix">
                                  <div class="blog-box row">
                                      <div class="col-md-4">
                                          <div class="post-media">
                                              <a href="tech-single.php?yazi_id=<?php echo $row["yazi_id"]; ?>" title="">
                                                  <img src="images/haberler/<?php echo $row["yazi_foto"]; ?>" alt="<?php echo $row["yazi_title"]; ?>" class="img-fluid">
                                                  <div class="hovereffect"></div>
                                              </a>
                                          </div><!-- end media -->
                                      </div><!-- end col -->

                                      <div class="blog-meta big-meta col-md-8">
                                          <h4><a href="tech-single.php?yazi_id=<?php echo $row["yazi_id"]; ?>" title=""><?php echo $row["yazi_title"]; ?></a></h4>
                                          <p><?php echo $row["yazi_icerik"]; ?></p>
                                          <small class="firstsmall"><a class="bg-orange" href="tech-category-01.php?kategori_id=<?php echo $row["kategori_id"]; ?>" title=""><?php echo $row["kategori_title"]; ?></a></small>
                                          <small><a href="tech-single.php?yazi_id=<?php echo $row["yazi_id"]; ?>" title=""><?php echo $row["yazi_tarih"]; ?></a></small>
                                          <small><a href="tech-author.php?yazarid=<?php echo $row["yazar_id"] ?>" title=""><?php echo $row["yazar_adi"]; ?></a></small>
                                          <small><a href="tech-single.php?yazi_id=<?php echo $row["yazi_id"]; ?>" title=""><i class="fa fa-eye"></i> <?php echo $row["yazi_okunma"]; ?></a></small>
                                      </div><!-- end meta -->
                                  </div><!-- end blog-box -->

                                  <hr class="invis">
                              </div><!-- end blog-list -->

                            <?php } ?>





                        </div><!-- end page-wrapper -->

                        <hr class="invis">

                        <div class="row">
                            <div class="col-md-12">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-start">
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Sonraki Sayfa</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div><!-- end col -->
                        </div><!-- end  row -->
                    </div>

                    <!--sagtaraf bas -->
                    <?php include 'page-nav.php'; ?>

                   <!--sagtaraf bitis -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
