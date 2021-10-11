<?php
	require "../models/Admin.php";
?>

<!DOCTYPE html>
<html lang="eng">
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>KIYO News</title>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/assets/vendors/aos/dist/aos.css/aos.css" />
    <link rel="shortcut icon" href="<?php echo BASEURL; ?>/assets/images/logo.png" />
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/assets/css/style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  </head>

  <body>
    <div class="container-scroller">
      <div class="main-panel">
       
      <?php include 'partials/navbar.php'; ?>

        <div class="content-wrapper">
            <div class="container">
                <div class="col-sm-12">
                    <div class="card" data-aos="fade-up">
                        <div class="card-body">
                            <div class="aboutus-wrapper">
                                <h1 class="mt-5 text-center mb-5"> About Us</h1>
                                    <div class="row">
                                        <div class="col-lg-12 mb-5 mb-sm-2">
                                            <img src="<?php echo BASEURL; ?>/images/logo.png" style="width:500px;margin-left:90px;">
                                            <p style="font-size:20px;">KIYO News is your news, entertainment, music fashion website. We provide you with the latest breaking news and videos straight from the entertainment industry.</p>                                        
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'partials/footer.php'; ?>

      </div>
    </div>
    <script src="../../public/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../../public/assets/vendors/aos/dist/aos.js/aos.js"></script>
    <script src="../../public/assets/js/demo.js"></script>
    <script src="../../public/assets/js/jquery.easeScroll.js"></script>
  </body>
</html>
