<?php
  require "../models/Admin.php";
?>

<!DOCTYPE html>
<html lang="eng">
<head>
  <meta charset="UTF-8" />
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
                  <h1 class="mt-5 text-center mb-5"> Contact Us</h1>
                  <div class="row">
                    <div class="col-lg-12 mb-8">
                      <div class="card border-primary rounded-0">
                        <div class="card-header p-0">
                          <div class="bg-primary text-white text-center py-2">
                              <h3><i class="fa fa-envelope"></i> Write for Us:</h3>
                              <p class="m-0">Write your thoughts about KIYO News, so we can improve our services. Thank you</p>
                          </div>
                        </div>
                        <div class="card-body p-6">
                          <div class="form-group">
                            <i class="fa fa-user text-primary"></i>&nbsp;&nbsp;<label>Username</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Username">
                            </div>
                          </div>
                          <div class="form-group">
                            <i class="fa fa-envelope text-primary"></i>&nbsp;&nbsp; <label>Email</label>
                              <div class="input-group mb-2 mb-sm-0">
                                  <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Email">
                              </div>
                          </div>
                          <div class="form-group">
                            <label>Message</label>
                              <div class="input-group mb-2 mb-sm-0">
                                  <textarea class="form-control"></textarea>
                              </div>
                          </div>
                          <div class="text-center">
                              <button class="btn btn-primary btn-lg btn-block rounded-0 py-2">Submit</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  <div class="col-lg-12">
                    <div class="row text-center">
                      <div class="col-md-4">
                        <a class="bg-primary px-3 py-2 rounded text-white mb-2 d-inline-block"><i class="fa fa-location-arrow"></i></a>
                        <p>Jl. Boulevard No. 18 Sudirman, Jakarta, Indonesia</p>
                      </div>
                      <div class="col-md-4">
                        <a class="bg-primary px-3 py-2 rounded text-white mb-2 d-inline-block"><i class="fa fa-phone"></i></a>
                        <p>+ 62 8139820, <br>Mon - Fri, 08:00-18:00</p>
                      </div>
                      <div class="col-md-4">
                        <a class="bg-primary px-3 py-2 rounded text-white mb-2 d-inline-block"><i class="fa fa-envelope"></i></a>
                        <p>kiyonews@gmail.com<br>cs@kiyonews.com</p>
                      </div>
                    </div>
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
  <script src="<?php echo BASEURL; ?>/assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="<?php echo BASEURL; ?>/assets/vendors/aos/dist/aos.js/aos.js"></script>
  <script src="<?php echo BASEURL; ?>/assets/js/demo.js"></script>
  <script src="<?php echo BASEURL; ?>/assets/js/jquery.easeScroll.js"></script>
</body>
</html>