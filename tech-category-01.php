<?php include "header.php"; ?>

<?php
$kategori_id=$_GET["kategori_id"];
$ktitle=$db->prepare("SELECT * FROM kategoriler WHERE kategori_id=?");
$ktitle->execute(array($kategori_id));
$kgoster=$ktitle->fetch(PDO::FETCH_ASSOC);

 ?>
        <div class="page-title lb single-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <h2><i class="fa fa-gears bg-orange"></i> <?php echo $kgoster["kategori_title"]; ?> Kategorisi
                          <!-- <small class="hidden-xs-down hidden-sm-down">Nulla felis eros, varius sit amet volutpat non. </small></h2> -->
                    </div><!-- end col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="tech-index.php">Ana Sayfa</a></li>
                            <li class="breadcrumb-item"><a href="tech-category-01.php?kategori_id=<?php echo $kategori_id; ?>"><?php echo $kgoster["kategori_title"]; ?> Kategorisi</a></li>
                            <li class="breadcrumb-item active"><?php echo $kgoster["kategori_title"]; ?></li>
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
                                  $yazi_say=$db->query("SELECT * FROM yazilar WHERE yazi_kategori_id=".$kategori_id);
                                  $Toplamyazi=$yazi_say->rowCount();
                                  $limit=8;
                                  $sayfasayisi= ceil($Toplamyazi/$limit);// b??l??nen sayfay?? tam say??ya yuvarlar
                                  if($sayfa>$sayfasayisi){$sayfa=$sayfasayisi;}
                                  $goster=$sayfa*$limit-$limit;//1 * 2 - 2 = 0 ->0-2
                                  $gorunensayfa=3;


                                  $kategori_id=$_GET["kategori_id"];
                                  $kategoriler= $db->prepare("SELECT * FROM yazilar INNER JOIN kategoriler INNER JOIN yazar
                                  where kategori_id=? AND kategoriler.kategori_id=yazilar.yazi_kategori_id AND yazar.yazar_id=yazilar.yazi_yazar_id ORDER BY yazi_id DESC LIMIT $goster,$limit");
                                  $kategoriler->execute(array($kategori_id));
                                  $kategori_listele=$kategoriler->fetchALL(PDO::FETCH_ASSOC);

                                  foreach ($kategori_listele as $row) {?>
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
                                  <?php } ?>
                                </div><!-- end row -->
                            </div><!-- end blog-grid-system -->
                        </div><!-- end page-wrapper -->

                        <hr class="invis3">

                        <div class="row">
                            <div class="col-md-12">
                                <nav aria-label="Page navigation">

                                    <ul class="pagination justify-content-start">
                                      <?php if($sayfa>1){ ?>
                                        <li class="page-item"><a class="page-link" href="tech-category-01.php?kategori_id=<?php echo $kategori_id; ?>&sayfa=1">??lk Sayfa</a></li>
                                        <li class="page-item"><a class="page-link" href="tech-category-01.php?kategori_id=<?php echo $kategori_id; ?>&sayfa=<?php echo $sayfa-1; ?>">??nceki Sayfa</a></li>
                                      <?php } ?>

                                      <?php for ($i=$sayfa-$gorunensayfa; $i <$sayfa+$gorunensayfa+1 ; $i++) {
                                        if ($i>0 AND $i<=$sayfasayisi) {
                                          if ($i==$sayfa) {
                                            echo '<li class="page-item disabled"><a class="page-link" style="background-color:#9acfed !important;">'.$i.'</a></li>';
                                          }
                                          else {
                                            echo '<li class="page-item"><a class="page-link" href="tech-category-01.php?kategori_id='.$kategori_id.'&sayfa='.$i.'">'.$i.'</a></li>';
                                          }
                                        }
                                      } ?>

                                      <?php if($sayfa!=$sayfasayisi){ ?>
                                        <li class="page-item"><a class="page-link" href="tech-category-01.php?kategori_id=<?php echo $kategori_id; ?>&sayfa=<?php echo $sayfa+1; ?>">Sonraki Sayfa</a></li>
                                        <li class="page-item"><a class="page-link" href="tech-category-01.php?kategori_id=<?php echo $kategori_id; ?>&sayfa=<?php echo $sayfasayisi; ?>">Son Sayfa</a></li>
                                      <?php } ?>
                                    </ul>

                                </nav>
                            </div><!-- end col -->
                        </div><!-- end  row -->
                    </div><!-- end col -->
                    <?php include "page-nav.php" ?>
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

<?php include "footer.php" ?>
