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
                                  $kategori_id=$_GET["kategori_id"];
                                  $kategoriler= $db->prepare("SELECT * FROM yazilar INNER JOIN kategoriler INNER JOIN yazar
                                  where kategori_id=? AND kategoriler.kategori_id=yazilar.yazi_kategori_id AND yazar.yazar_id=yazilar.yazi_yazar_id ORDER BY yazi_id DESC LIMIT 8");
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
                    </div><!-- end col -->
                    <?php include "page-nav.php" ?>
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

<?php include "footer.php" ?>
