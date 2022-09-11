<section class="section mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-top clearfix">
                                <h4 class="pull-left">Yeni Haberler <a href="#"><i class="fa fa-rss"></i></a></h4>
                            </div><!-- end blog-top -->

                            <?php
                            error_reporting(0);
                            $sayfa = intval($_GET["sayfa"]);if(!$sayfa || $sayfa < 1){$sayfa=1;}
                            $yazi_say=$db->query("SELECT * FROM yazilar");
                            $Toplamyazi=$yazi_say->rowCount();
                            $limit=8;
                            $sayfasayisi= ceil($Toplamyazi/$limit);// bölünen sayfayı tam sayıya yuvarlar
                            if($sayfa>$sayfasayisi){$sayfa=$sayfasayisi;}
                            $goster=$sayfa*$limit-$limit;//1 * 2 - 2 = 0 ->0-2
                            $gorunensayfa=3;


                            $yazilar= $db->prepare("SELECT * FROM yazilar INNER JOIN kategoriler INNER JOIN yazar
                            where kategoriler.kategori_id=yazilar.yazi_kategori_id AND yazar.yazar_id=yazilar.yazi_yazar_id ORDER BY yazi_id DESC LIMIT $goster,$limit");
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
                                      <?php if($sayfa>1){ ?>
                                        <li class="page-item"><a class="page-link" href="tech-index.php?sayfa=1">İlk Sayfa</a></li>
                                        <li class="page-item"><a class="page-link" href="tech-index.php?sayfa=<?php echo $sayfa-1; ?>">Önceki Sayfa</a></li>
                                      <?php } ?>

                                      <?php for ($i=$sayfa-$gorunensayfa; $i <$sayfa+$gorunensayfa+1 ; $i++) {
                                        if ($i>0 AND $i<=$sayfasayisi) {
                                          if ($i==$sayfa) {
                                            echo '<li class="page-item disabled"><a class="page-link" style="background-color:#9acfed !important;">'.$i.'</a></li>';
                                          }
                                          else {
                                            echo '<li class="page-item"><a class="page-link" href="tech-index.php?sayfa='.$i.'">'.$i.'</a></li>';
                                          }
                                        }
                                      } ?>

                                      <?php if($sayfa!=$sayfasayisi){ ?>
                                        <li class="page-item"><a class="page-link" href="tech-index.php?sayfa=<?php echo $sayfa+1; ?>">Sonraki Sayfa</a></li>
                                        <li class="page-item"><a class="page-link" href="tech-index.php?sayfa=<?php echo $sayfasayisi; ?>">Son Sayfa</a></li>
                                      <?php } ?>
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
