<?php include 'header.php'; ?>

<?php
$yazi_id=$_GET["yazi_id"];
$yazidetay= $db->prepare("SELECT * FROM yazilar INNER JOIN kategoriler INNER JOIN yazar
where yazi_id=? AND kategoriler.kategori_id=yazilar.yazi_kategori_id AND yazar.yazar_id=yazilar.yazi_yazar_id ORDER BY yazi_id DESC");
$yazidetay->execute(array($yazi_id));
$yd_listele=$yazidetay->fetch(PDO::FETCH_ASSOC);

?>


        <section class="section single-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-title-area text-center">
                                <ol class="breadcrumb hidden-xs-down">
                                    <li class="breadcrumb-item"><a href="<?php echo $ayar_cek["site_url"] ?>">Anasayfa</a></li>

                                    <li class="breadcrumb-item active"><?php echo $yd_listele["yazi_title"] ?></li>
                                </ol>

                                <span class="color-orange"><a href="tech-category-01.php?kategori_id=<?php echo $yd_listele["kategori_id"]; ?>" title=""><?php echo $yd_listele["kategori_title"]; ?></a></span>

                                <h3><?php echo $yd_listele["yazi_title"]; ?></h3>

                                <div class="blog-meta big-meta">
                                    <small><?php echo $yd_listele["yazi_tarih"]; ?></small>
                                    <small><a href="tech-author.php?yazarid=<?php echo $yd_listele["yazi_yazar_id"]; ?>" title=""><?php echo $yd_listele["yazar_adi"]; ?></a></small>
                                    <small><i class="fa fa-eye"></i> <?php echo $yd_listele["yazi_okunma"]; ?></small>
                                </div><!-- end meta -->

                                <div class="post-sharing">
                                    <ul class="list-inline">
                                        <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Facebook'ta Payla??</span></a></li>
                                        <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Twitter'da Payla??</span></a></li>
                                        <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div><!-- end post-sharing -->
                            </div><!-- end title -->

                            <div class="single-post-media">
                                <img src="images/haberler/<?php echo $yd_listele["yazi_foto"]; ?>" alt="" class="img-fluid">
                            </div><!-- end media -->

                            <div class="blog-content">
                                <div class="pp">
                                    <p><?php echo $yd_listele["yazi_icerik"]; ?> </p>

                                </div><!-- end pp -->
                            </div><!-- end content -->

                            <div class="blog-title-area">
                                <div class="tag-cloud-single">
                                    <span>Tags</span>
                                    <small><a href="#" title="">lifestyle</a></small>
                                    <small><a href="#" title="">colorful</a></small>
                                    <small><a href="#" title="">trending</a></small>
                                    <small><a href="#" title="">another tag</a></small>
                                </div><!-- end meta -->

                                <div class="post-sharing">
                                    <ul class="list-inline">
                                        <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Facebook'ta Payla??</span></a></li>
                                        <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Twitter'da Payla??</span></a></li>
                                        <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div><!-- end post-sharing -->
                            </div><!-- end title -->
                            <?php
                            $reklam=$db->prepare("SELECT * FROM reklamlar WHERE reklam_id=3 ");
                            $reklam->execute();
                            $reklam_cek=$reklam->fetchALL(PDO::FETCH_ASSOC);
                            foreach ($reklam_cek as $row) { ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="banner-spot clearfix">
                                      <div class="banner-img">
                                        <a href="<?php echo $row["reklam_link"]; ?>" target="_blank";>
                                          <img src="images/reklamlar/<?php echo $row["reklam_banner"]; ?>" alt="<?php echo $row["reklam_banner"]; ?>" class="img-fluid">
                                        </a>
                                      </div><!-- end banner-img -->
                                    </div><!-- end banner -->
                                </div><!-- end col -->
                            </div><!-- end row -->
                            <?php } ?>

                            <hr class="invis1">

                            <div class="custombox prevnextpost clearfix">
                                <div class="row">
                                  <?php

                                  $yazionceki= $db->prepare("SELECT * FROM yazilar WHERE yazi_id=?");
                                  $yazionceki->execute(array($yazi_id-1));
                                  $yazionceki_list=$yazionceki->fetch(PDO::FETCH_ASSOC);

                                  $yazisonraki= $db->prepare("SELECT * FROM yazilar WHERE yazi_id=?");
                                  $yazisonraki->execute(array($yazi_id+1));
                                  $yazisonraki_list=$yazisonraki->fetch(PDO::FETCH_ASSOC);

                                  ?>
                                  <?php
                                  if (!empty($yazionceki_list)) { ?>
                                    <div class="col-lg-6">
                                        <div class="blog-list-widget">
                                            <div class="list-group">
                                                <a href="tech-single.php?yazi_id=<?php echo $yazionceki_list["yazi_id"]; ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                                    <div class="w-100 justify-content-between text-right">
                                                        <img src="images/haberler/<?php echo $yazionceki_list["yazi_foto"]; ?>" alt="" class="img-fluid float-right">
                                                        <h5 class="mb-1"><?php echo $yazionceki_list["yazi_title"]; ?></h5>
                                                        <small>??NCEK?? G??NDER??</small>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div><!-- end col -->
                                      <?php  }  ?>
                                    <?php
                                    if (!empty($yazisonraki_list)) { ?>
                                      <div class="col-lg-6">
                                          <div class="blog-list-widget">
                                              <div class="list-group">
                                                  <a href="tech-single.php?yazi_id=<?php echo $yazisonraki_list["yazi_id"]; ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                                      <div class="w-100 justify-content-between text-right">
                                                          <img src="images/haberler/<?php echo $yazisonraki_list["yazi_foto"]; ?>" alt="" class="img-fluid float-right">
                                                          <h5 class="mb-1"><?php echo $yazisonraki_list["yazi_title"]; ?></h5>
                                                          <small>SONRAK?? G??NDER??</small>
                                                      </div>
                                                  </a>
                                              </div>
                                          </div>
                                      </div><!-- end col -->
                                  <?php  }  ?>

                                </div><!-- end row -->
                            </div><!-- end author-box -->

                            <hr class="invis1">

                            <div class="custombox authorbox clearfix">
                                <h4 class="small-title">Yazar Hakk??nda</h4>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <img src="images/yazarfoto/<?php echo $yd_listele["yazar_foto"]; ?>" alt="" class="img-fluid rounded-circle">
                                    </div><!-- end col -->

                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                        <h4><a href="tech-author.php?yazarid=<?php echo $yd_listele["yazi_yazar_id"]; ?>"><?php echo $yd_listele["yazar_adi"]; ?></a></h4>
                                        <p><?php echo $yd_listele["yazar_aciklama"]; ?></p>
                                        <div class="topsocial">
                                            <a href="<?php echo $yd_listele["yazar_facebook"]; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                                            <a href="<?php echo $yd_listele["yazar_youtube"]; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube"></i></a>
                                            <a href="<?php echo $yd_listele["yazar_pinterest"]; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                                            <a href="<?php echo $yd_listele["yazar_twitter"]; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                            <a href="<?php echo $yd_listele["yazar_instagram"]; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                            <a href="<?php echo $yd_listele["yazar_website"]; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Website"><i class="fa fa-link"></i></a>
                                        </div><!-- end social -->

                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end author-box -->

                            <hr class="invis1">



                            <div class="custombox clearfix">
                                <h4 class="small-title">??unlar da ho??unuza gidebilir</h4>
                                <div class="row">
                                  <?php
                                  $yazilar= $db->prepare("SELECT * FROM yazilar
                                  ORDER BY yazi_okunma DESC LIMIT 1");
                                  $yazilar->execute();
                                  $yazi_listele=$yazilar->fetchALL(PDO::FETCH_ASSOC);

                                  foreach ($yazi_listele as $row) {?>
                                    <div class="col-lg-6">
                                        <div class="blog-box">
                                            <div class="post-media">
                                                <a href="tech-single.php?yazi_id=<?php echo $row["yazi_id"]; ?>" title="">
                                                    <img src="images/haberler/<?php echo $row["yazi_foto"]; ?>" alt="" class="img-fluid">
                                                    <div class="hovereffect">
                                                        <span class=""></span>
                                                    </div><!-- end hover -->
                                                </a>
                                            </div><!-- end media -->
                                            <div class="blog-meta">
                                                <h4><a href="tech-single.php?yazi_id=<?php echo $row["yazi_id"]; ?>" title=""><?php echo $row["yazi_title"]; ?></a></h4>
                                                <small><a href="tech-single.php?yazi_id=<?php echo $row["yazi_id"]; ?>" title="">En ??ok Okunan</a></small>
                                                <small><a href="tech-single.php?yazi_id=<?php echo $row["yazi_id"]; ?>" title=""><?php echo $row["yazi_tarih"]; ?></a></small>
                                            </div><!-- end meta -->
                                        </div><!-- end blog-box -->
                                    </div><!-- end col -->
                                  <?php } ?>

                                  <?php
                                  $yazilar= $db->prepare("SELECT * FROM yazilar
                                  ORDER BY yazi_id DESC LIMIT 1");
                                  $yazilar->execute();
                                  $yazi_listele=$yazilar->fetchALL(PDO::FETCH_ASSOC);

                                  foreach ($yazi_listele as $row) {?>
                                    <div class="col-lg-6">
                                        <div class="blog-box">
                                            <div class="post-media">
                                                <a href="tech-single.php?yazi_id=<?php echo $row["yazi_id"]; ?>" title="">
                                                    <img src="images/haberler/<?php echo $row["yazi_foto"]; ?>" alt="" class="img-fluid">
                                                    <div class="hovereffect">
                                                        <span class=""></span>
                                                    </div><!-- end hover -->
                                                </a>
                                            </div><!-- end media -->
                                            <div class="blog-meta">
                                                <h4><a href="tech-single.php?yazi_id=<?php echo $row["yazi_id"]; ?>" title=""><?php echo $row["yazi_title"]; ?></a></h4>
                                                <small><a href="tech-single.php?yazi_id=<?php echo $row["yazi_id"]; ?>" title="">En Son Haber</a></small>
                                                <small><a href="tech-single.php?yazi_id=<?php echo $row["yazi_id"]; ?>" title=""><?php echo $row["yazi_tarih"]; ?></a></small>
                                            </div><!-- end meta -->
                                        </div><!-- end blog-box -->
                                    </div><!-- end col -->
                                  <?php } ?>
                                </div><!-- end row -->
                            </div><!-- end custom-box -->

                            <hr class="invis1">
                            <?php
                            $yorumlar=$db->prepare("SELECT * FROM yorumlar WHERE yorum_yazi_id=? AND yorum_durum=? AND yorum_ust=?");
                            $yorumlar->execute(array($yazi_id, 1, 0));
                            $yorum_listele=$yorumlar->fetchALL(PDO::FETCH_ASSOC);
                            $yorum_say=$yorumlar->rowCount();
                            ?>
                            <div class="custombox clearfix">
                                <h4 class="small-title"><?php echo $yorum_say; ?> Yorum</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="comments-list">
                                          <?php
                                          if ($yorum_say) {
                                            foreach ($yorum_listele as $row) { ?>
                                              <div class="media">
                                                      <img src="images/user.png" alt="" class="rounded-circle">
                                                  <div class="media-body">
                                                      <h4 class="media-heading user_name"><?php echo $row["yorum_ekleyen"]; ?> <small><?php echo date('d.m.Y H:i:s',strtotime($row["yorum_tarih"])); ?></small></h4>
                                                      <p><?php echo $row["yorum_icerik"]; ?></p>
                                                      <a href="#" class="btn btn-primary btn-sm">Yan??tla</a>
                                                  </div>
                                              </div>
                                          <?php } }
                                          else {
                                            echo "Bu yaz??ya hi?? yorum yap??lmam????.. Hadi ilk yorumu sen yap...";
                                          }
                                           ?>



                                        </div>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end custom-box -->

                            <hr class="invis1">

                            <div class="custombox clearfix">
                                <h4 class="small-title">Yorum Yaz??n</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form class="form-wrapper" method="POST" id="yorumForm" onsubmit="return false;">
                                            <input name="yorum_yazi_id" type="hidden"  value="<?php echo $yd_listele["yazi_id"]; ?>">
                                            <input name="yorum_ekleyen" type="text" class="form-control" placeholder="Ad??n??z">
                                            <input name="yorum_eposta" type="email" class="form-control" placeholder="Email adresiniz">
                                            <textarea name="yorum_icerik" class="form-control" placeholder="Yorum"></textarea>
                                            <button type="submit" onclick="yorumGonder();" class="btn btn-primary" role="button">Yorumu G??nder</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end page-wrapper -->
                    </div><!-- end col -->

                    <?php include 'page-nav.php'; ?>
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

<?php include 'footer.php'; ?>
