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
                                <div class="col-lg-5">
                                    <h4>Biz Kimiz</h4>
                                    <p>Tech Blog is a personal blog for handcrafted, cameramade photography content, fashion styles from independent creatives around the world.</p>

                                    <h4>Vizyonumuz</h4>
                                    <p>Etiam vulputate urna id libero auctor maximus. Nulla dignissim ligula diam, in sollicitudin ligula congue quis turpis dui urna nibhs. </p>

                                    <h4>Misyonumuz</h4>
                                    <p>Fusce dapibus nunc quis quam tempor vestibulum sit amet consequat enim. Pellentesque blandit hendrerit placerat. Integertis non.</p>
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
                        </div><!-- end page-wrapper -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>


<?php include 'footer.php';?>
