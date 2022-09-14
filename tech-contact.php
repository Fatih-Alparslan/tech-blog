<?php include 'header.php';?>

        <div class="page-title lb single-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <h2><i class="fa fa-envelope-open-o bg-orange"></i> Bize Ulaşın
                        <!-- Saydam yazı -->
                        <!-- <small class="hidden-xs-down hidden-sm-down">Nulla felis eros, varius sit amet volutpat non. </small> -->
                        </h2>
                    </div><!-- end col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Ana Sayfa</a></li>
                            <li class="breadcrumb-item active">İletişim</li>
                        </ol>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end page-title -->

        <section class="section wb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-wrapper">
                            <div class="row">
                              <?php
                               $hakkimizda=$db->prepare("SELECT * FROM hakkimizda");
                               $hakkimizda->execute();
                               $hakkimizda_cek=$hakkimizda->fetch(PDO::FETCH_ASSOC);
                               ?>
                                <div class="col-lg-5">
                                    <h4><?php echo $hakkimizda_cek["hakkimizda_baslik"]; ?></h4>
                                    <p><?php echo $hakkimizda_cek["hakkimizda_icerik"]; ?></p>
                                    <h4>KONUM VE TELEFON BİLGİLERİ</h4>

                                    <p><?php echo $hakkimizda_cek["hakkimizda_adres"]; ?></p>

                                  <p><i class="fa fa-phone" aria-hidden="true"></i>
                                    <a href="tel:<?php echo $hakkimizda_cek["hakkimizda_telefon"]; ?>">
                                    İletişim : <?php echo $hakkimizda_cek["hakkimizda_telefon"]; ?></a></p>


                                </div>
                                <div class="col-lg-7">
                                    <form action="yorum-yap.php" class="form-wrapper" id="iletisimForm" method="POST" onsubmit="return false;" >
                                        <input name="iletisim_ad"  type="text" class="form-control" placeholder="Adınız">
                                        <input name="iletisim_eposta" type="email" class="form-control" placeholder="Email Adresiniz">
                                        <input name="iletisim_konu" type="text" class="form-control" placeholder="Konu">
                                        <textarea name="iletisim_mesaj" class="form-control" placeholder="Mesajınız"></textarea>
                                        <button type="submit" onclick="iletisimGonder();" class="btn btn-primary" role="button">Gönder <i class="fa fa-envelope-open-o"></i></button>
                                    </form>
                                </div>

                            </div>

                            <hr class="invis1">

                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="page-wrapper">
                                        <div class="custombox authorbox clearfix">
                                            <h4 class="small-title">Yazarlar</h4>
                                            <?php
                                            $yazarlar=$db->prepare("SELECT * FROM yazar");
                                            $yazarlar->execute();
                                            $yazar_goster=$yazarlar->fetchALL(PDO::FETCH_ASSOC);

                                            foreach ($yazar_goster as $row) { ?>
                                              <div class="row">
                                                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                      <img src="images/yazarfoto/<?php echo $row["yazar_foto"]; ?>" alt="" class="img-fluid rounded-circle">
                                                  </div><!-- end col -->

                                                  <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                                      <h4><?php echo $row["yazar_adi"]; ?></h4>
                                                      <p><?php echo $row["yazar_aciklama"]; ?></p>
                                                      <div class="topsocial">
                                                          <a href="<?php echo $row["yazar_facebook"]; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                                                          <a href="<?php echo $row["yazar_youtube"]; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube"></i></a>
                                                          <a href="<?php echo $row["yazar_pinterest"]; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                                                          <a href="<?php echo $row["yazar_twitter"]; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                                          <a href="<?php echo $row["yazar_instagram"]; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                                          <a href="<?php echo $row["yazar_website"]; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Website"><i class="fa fa-link"></i></a>
                                                      </div><!-- end social -->

                                                  </div><!-- end col -->
                                              </div><!-- end row -->
                                              <hr class="invis1">
                                          <?php   }  ?>
                                        </div><!-- end author-box -->
                                      </div>
                                  </div>
                            </div>
                        </div><!-- end page-wrapper -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>


<?php include 'footer.php';?>
