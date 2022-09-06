<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="sidebar">

                          <div class="widget">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form class="form-wrapper" action="ara.php" method="GET">
                                            <input name="ara" type="text" class="form-control" placeholder="Ara">
                                        </form>
                                    </div>
                                </div>
                          </div>

                            <div class="widget">
                                <h2 class="widget-title">Bizi Takip Et</h2>

                                <div class="row text-center">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <a href="<?php echo $ayar_cek["site_facebook"] ?>" target="_blank" class="social-button facebook-button">
                                            <i class="fa fa-facebook"></i>
                                            <p>27k</p>
                                        </a>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <a href="<?php echo $ayar_cek["site_twitter"] ?>" target="_blank" class="social-button twitter-button">
                                            <i class="fa fa-twitter"></i>
                                            <p>98k</p>
                                        </a>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <a href="<?php echo $ayar_cek["site_google"] ?>" target="_blank" class="social-button google-button">
                                            <i class="fa fa-google-plus"></i>
                                            <p>17k</p>
                                        </a>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <a href="<?php echo $ayar_cek["site_instagram"] ?>" target="_blank" class="social-button instagram-button">
                                            <i class="fa fa-instagram"></i>
                                            <p>22k</p>
                                        </a>
                                    </div>
                                </div>
                            </div><!-- end widget -->
                            <div class="widget">
                                <h2 class="widget-title">Popüler Yazılar</h2>
                                <div class="blog-list-widget">
                                    <div class="list-group">
                                      <?php
                                      $populerpost=$db->prepare("SELECT * FROM yazilar ORDER BY yazi_okunma DESC LIMIT 4");
                                      $populerpost->execute();
                                      $populer_goster=$populerpost->fetchALL(PDO::FETCH_ASSOC);
                                      foreach ($populer_goster as $row) { ?>

                                        <a href="tech-single.php?yazi_id=<?php echo $row["yazi_id"]; ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 justify-content-between">
                                                <img src="images/haberler/<?php echo $row["yazi_foto"]; ?>" alt="" class="img-fluid float-left">
                                                <h5 class="mb-1"><?php echo $row["yazi_title"]; ?></h5>
                                                <small><?php echo $row["yazi_tarih"]; ?></small>
                                            </div>
                                        </a>
                                      <?php } ?>
                                    </div>
                                </div><!-- end blog-list -->
                            </div><!-- end widget -->

                            <div class="widget">
                              <?php
                              $reklam=$db->prepare("SELECT * FROM reklamlar WHERE reklam_id=1");
                              $reklam->execute();
                              $reklam_cek=$reklam->fetchALL(PDO::FETCH_ASSOC);
                              foreach ($reklam_cek as $row) { ?>
                                <div class="banner-spot clearfix">
                                    <div class="banner-img">
                                      <a href="<?php echo $row["reklam_link"]; ?>" target="_blank";>
                                        <img src="images/reklamlar/<?php echo $row["reklam_banner"]; ?>" alt="<?php echo $row["reklam_banner"]; ?>" class="img-fluid">
                                      </a>
                                    </div><!-- end banner-img -->
                                </div><!-- end banner -->
                              <?php } ?>
                            </div><!-- end widget -->

                            <div class="widget">
                                <h2 class="widget-title">Son Eklenen Yazılar</h2>
                                <div class="blog-list-widget">
                                    <div class="list-group">
                                      <?php
                                      $populerpost=$db->prepare("SELECT * FROM yazilar ORDER BY yazi_id DESC LIMIT 4");
                                      $populerpost->execute();
                                      $populer_goster=$populerpost->fetchALL(PDO::FETCH_ASSOC);
                                      foreach ($populer_goster as $row) { ?>

                                        <a href="tech-single.php?yazi_id=<?php echo $row["yazi_id"]; ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 justify-content-between">
                                                <img src="images/haberler/<?php echo $row["yazi_foto"]; ?>" alt="" class="img-fluid float-left">
                                                <h5 class="mb-1"><?php echo $row["yazi_title"]; ?></h5>
                                                <small><?php echo $row["yazi_tarih"]; ?></small>
                                            </div>
                                        </a>
                                      <?php } ?>
                                    </div>
                                </div><!-- end blog-list -->
                            </div><!-- end widget -->


                            <div class="widget">
                              <?php
                              $reklam=$db->prepare("SELECT * FROM reklamlar WHERE reklam_id=2 ");
                              $reklam->execute();
                              $reklam_cek=$reklam->fetchALL(PDO::FETCH_ASSOC);
                              foreach ($reklam_cek as $row) { ?>
                                <div class="banner-spot clearfix">
                                    <div class="banner-img">
                                      <a href="<?php echo $row["reklam_link"]; ?>" target="_blank";>
                                        <img src="images/reklamlar/<?php echo $row["reklam_banner"]; ?>" alt="<?php echo $row["reklam_banner"]; ?>" class="img-fluid">
                                      </a>
                                    </div><!-- end banner-img -->
                                </div><!-- end banner -->
                              <?php } ?>
                            </div><!-- end widget -->


                        </div><!-- end sidebar -->
                    </div>
