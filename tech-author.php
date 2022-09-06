<?php include 'header.php' ?>

<?php
$yazar_id=$_GET["yazarid"];

$yazarlar=$db->prepare("SELECT * FROM yazar INNER JOIN yazilar
WHERE yazar_id=? AND yazilar.yazi_yazar_id=yazar.yazar_id ");
$yazarlar->execute(array($yazar_id));
$yazar_goster=$yazarlar->fetch(PDO::FETCH_ASSOC);
?>

  <div class="page-title lb single-wrapper">
      <div class="container">
          <div class="row">
              <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                  <h2><i class="fa fa-star bg-orange"></i> Yazar: <?php echo $yazar_goster["yazar_adi"]; ?></h2>
              </div><!-- end col -->
              <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="<?php echo $ayar_cek["site_url"] ?>">AnaSayfa</a></li>
                      <li class="breadcrumb-item"><a href="#">Yazar</a></li>
                      <li class="breadcrumb-item active"><?php echo $yazar_goster["yazar_adi"]; ?></li>
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
                      <div class="custombox authorbox clearfix">
                          <h4 class="small-title">Yazar Hakkında</h4>
                          <div class="row">
                              <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                  <img src="images/yazarfoto/<?php echo $yazar_goster["yazar_foto"]; ?>" alt="" class="img-fluid rounded-circle">
                              </div><!-- end col -->

                              <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                  <h4><?php echo $yazar_goster["yazar_adi"]; ?></h4>
                                  <p><?php echo $yazar_goster["yazar_aciklama"]; ?></p>
                                  <div class="topsocial">
                                      <a href="<?php echo $yazar_goster["yazar_facebook"]; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                                      <a href="<?php echo $yazar_goster["yazar_youtube"]; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube"></i></a>
                                      <a href="<?php echo $yazar_goster["yazar_pinterest"]; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                                      <a href="<?php echo $yazar_goster["yazar_twitter"]; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                      <a href="<?php echo $yazar_goster["yazar_instagram"]; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                      <a href="<?php echo $yazar_goster["yazar_website"]; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Website"><i class="fa fa-link"></i></a>
                                  </div><!-- end social -->

                              </div><!-- end col -->
                          </div><!-- end row -->
                      </div><!-- end author-box -->
                      <hr class="invis1">

<?php
$yazar_id=$_GET["yazarid"];
$yazilar= $db->prepare("SELECT * FROM yazilar INNER JOIN kategoriler INNER JOIN yazar
where yazar_id=? AND kategoriler.kategori_id=yazilar.yazi_kategori_id AND yazar.yazar_id=yazilar.yazi_yazar_id ORDER BY yazi_id DESC");
$yazilar->execute(array($yazar_id));
$yazi_goster=$yazilar->fetchALL(PDO::FETCH_ASSOC);

foreach ($yazi_goster as $row) {?>
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

<?php }?>



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
                        </div><!-- end row -->
                    </div><!-- end col -->

                    <?php include 'page-nav.php'; ?>
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

<?php include 'footer.php'; ?>
