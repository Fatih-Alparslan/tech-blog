<?php include "sistem/baglan.php";
$ayarlar=$db->prepare("SELECT * FROM ayarlar");
$ayarlar->execute();
$ayar_cek=$ayarlar->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="tr">

    <!-- Basic -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Site Metas -->
    <title><?php echo $ayar_cek["site_title"] ?></title>
    <meta name="keywords" content="<?php echo $ayar_cek["site_keyw"] ?>">
    <meta name="description" content="<?php echo $ayar_cek["site_desc"] ?>">
    <meta name="author" content="Fatih Alparslan">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/<?php echo $ayar_cek["site_favicon"] ?>" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Design fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- FontAwesome Icons core CSS -->
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Responsive styles for this template -->
    <link href="css/responsive.css" rel="stylesheet">

    <!-- Colors for this template -->
    <link href="css/colors.css" rel="stylesheet">

    <!-- Version Tech CSS for this template -->
    <link href="css/version/tech.css" rel="stylesheet">

    <!-- SWEET ALERT SWAL.CSS -->
    <link rel="stylesheet" href="css/swal.css">

    <!-- SWEET ALERT SWAL.MİN.JS -->
    <script type="text/javascript" src="js/swal.min.js"></script>
    <script type="text/javascript" src="js/function.js"></script>


    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

    <div id="wrapper">
        <header class="tech-header header">
            <div class="container-fluid">
                <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo $ayar_cek["site_url"] ?>"><img src="images/version/<?php echo $ayar_cek["site_logo"] ?>" alt=""></a>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo $ayar_cek["site_url"] ?>">Ana Sayfa</a>
                            </li>
                            <li class="nav-item dropdown has-submenu menu-large hidden-md-down hidden-sm-down hidden-xs-down">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">KATEGORİLER</a>
                                <ul class="dropdown-menu megamenu" aria-labelledby="dropdown01">
                                    <li>
                                        <div class="container">
                                            <div class="mega-menu-content clearfix">
                                                <div class="tab">
                                                  <?php
                                                   $ktgostermenu=$db->prepare("SELECT * FROM kategoriler  LIMIT 5");
                                                   $ktgostermenu->execute();
                                                   $ktmenu_listele=$ktgostermenu->fetchALL(PDO::FETCH_ASSOC);

                                                   foreach ($ktmenu_listele as $row) { ?>
                                                       <button class="tablinks" onclick="openCategory(event, <?php echo $row["kategori_id"] ?>)"><?php echo $row["kategori_title"] ?></button>

                                                    <?php } ?>
                                                </div>

                                                <div class="tab-details clearfix">
                                                    <?php
                                                    $ktgostermenu=$db->prepare("SELECT * FROM kategoriler LIMIT 5");
                                                    $ktgostermenu->execute();
                                                    $ktmenu_listele=$ktgostermenu->fetchALL(PDO::FETCH_ASSOC);

                                                    foreach ($ktmenu_listele as $row) { ?>
                                                    <div id="<?php echo $row["kategori_id"]?>" class="tabcontent">


                                                        <div class="row">
                                                          <?php
                                                          $ktgostermenu=$db->prepare("SELECT * FROM yazilar INNER JOIN kategoriler WHERE yazi_kategori_id=?
                                                          AND yazilar.yazi_kategori_id=kategoriler.kategori_id ORDER BY yazi_id DESC LIMIT 4");
                                                          $ktgostermenu->execute(array($row["kategori_id"]));
                                                          $ktmenu_listele=$ktgostermenu->fetchALL(PDO::FETCH_ASSOC);

                                                          foreach ($ktmenu_listele as $row2) { ?>
                                                            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                                <div class="blog-box">
                                                                    <div class="post-media">
                                                                        <a href="tech-single.php?yazi_id=<?php echo $row2["yazi_id"]; ?>" title="">
                                                                            <img src="images/haberler/<?php echo $row2["yazi_foto"]; ?>" alt="" class="img-fluid">
                                                                            <div class="hovereffect">
                                                                            </div><!-- end hover -->
                                                                            <span class="menucat"><?php echo $row2["kategori_title"]?></span>
                                                                        </a>
                                                                    </div><!-- end media -->
                                                                    <div class="blog-meta">
                                                                        <h4><a href="tech-single.php?yazi_id=<?php echo $row2["yazi_id"]; ?>" title=""><?php echo $row2["yazi_title"]?></a></h4>
                                                                    </div><!-- end meta -->
                                                                </div><!-- end blog-box -->
                                                            </div>


                                                            <?php } ?>
                                                          </div><!-- end row -->
                                                        </div>
                                                      <?php } ?>




                                                </div><!-- end tab-details -->

                                            </div><!-- end mega-menu-content -->
                                        </div>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="tech-contact.php">İLETİŞİM</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav mr-2">
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-rss"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-android"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-apple"></i></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div><!-- end container-fluid -->
        </header><!-- end market-header -->
