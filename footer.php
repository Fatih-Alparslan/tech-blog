<footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="widget">
                            <div class="footer-text text-left">
                                <a href="<?php echo $ayar_cek["site_url"] ?>"><img src="images/version/tech-logo.png" alt="" class="img-fluid"></a>
                                <p><?php echo $ayar_cek["site_desc"] ?></p>
                                <div class="social">
                                    <a href="<?php echo $ayar_cek["site_facebook"] ?>" data-toggle="tooltip" data-placement="bottom" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                                    <a href="<?php echo $ayar_cek["site_twitter"] ?>" data-toggle="tooltip" data-placement="bottom" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                                    <a href="<?php echo $ayar_cek["site_instagram"] ?>" data-toggle="tooltip" data-placement="bottom" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a>
                                    <a href="<?php echo $ayar_cek["site_github"] ?>" data-toggle="tooltip" data-placement="bottom" title="GitHub" target="_blank"><i class="fa fa-github"></i></a>
                                </div>

                                <hr class="invis">

                                <div class="newsletter-widget text-left">
                                    <form class="form-inline">
                                        <input type="text" class="form-control" placeholder="Enter your email address">
                                        <button type="submit" class="btn btn-primary">SUBMIT</button>
                                    </form>
                                </div><!-- end newsletter -->
                            </div><!-- end footer-text -->
                        </div><!-- end widget -->
                    </div><!-- end col -->

                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <h2 class="widget-title">Kategoriler</h2>
                            <div class="link-widget">
                                <ul>
                                  <?php

                                  $kategoriler= $db->prepare("SELECT * FROM kategoriler  LIMIT 4");
                                  $kategoriler->execute();
                                  $kategori_listele=$kategoriler->fetchALL(PDO::FETCH_ASSOC);


                                  foreach ($kategori_listele as $row) { ?>
                                    <?php

                                    $yazilar=$db->prepare("SELECT * FROM yazilar WHERE yazi_kategori_id=?");
                                    $yazilar->execute(array($row["kategori_id"]));
                                    $yazilar_list=$yazilar->fetchALL(PDO::FETCH_ASSOC);
                                    $kategori_say=$yazilar->rowCount();

                                     ?>

                                    <li><a href="tech-category-01.php?kategori_id=<?php echo $row["kategori_id"]; ?>">
                                      <?php echo $row["kategori_title"]; ?>

                                      <span>(<?php echo $kategori_say  ?>)</span></a></li>




                                  <?php } ?>
                                </ul>
                            </div><!-- end link-widget -->
                        </div><!-- end widget -->
                    </div><!-- end col -->

                    <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <h2 class="widget-title">İletişim</h2>
                            <div class="link-widget">
                                <ul>
                                    <li><a href="tech-contact.php">Bize ulaşın</a></li>
                                    <li><a href="tech-contact.php">Hakkımızda</a></li>
                                    <li><a href="#">Reklam</a></li>
                                    <li><a href="#">Bizim için yazın</a></li>

                                </ul>
                            </div><!-- end link-widget -->
                        </div><!-- end widget -->
                    </div><!-- end col -->
                </div>

                <div class="row">
                    <div class="col-md-12 text-center">
                        <br>
                        <div class="copyright"> KafayaAL BLOG &copy; 2022 Tüm Hakları Saklıdır</a>.</div>
                    </div>
                </div>
            </div><!-- end container -->
        </footer><!-- end footer -->

        <div class="dmtop">Scroll to Top</div>

    </div><!-- end wrapper -->

    <!-- Core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>

</body>
</html>
