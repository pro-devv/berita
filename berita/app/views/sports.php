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
  <link rel="stylesheet" href="../../public/assets/vendors/mdi/css/materialdesignicons.min.css" />
  <link rel="stylesheet" href="../../public/assets/vendors/aos/dist/aos.css/aos.css" />
  <link rel="shortcut icon" href="../../public/assets/images/logo.png" />
  <link rel="stylesheet" href="../../public/assets/css/style.css">
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
                <div class="row">
                  <div class="col-sm-12">
                    <h1 class="font-weight-600 mb-4">SPORTS</h1>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-8">
                    <?php
                    $func = new functions();
                    $rows = $func->select();
                    if (is_array($rows)) {
                      foreach ($rows as $row) {
                        if ($row['category'] == 'Sports') {
                    ?>
                          <div class="row">
                            <div class="col-sm-4 grid-margin">
                              <div class="rotate-img">
                                <a href="detail_berita.php?id=<?php echo $row['id']; ?>"><img src="../images/<?php echo $row['image']; ?>" alt="banner" class="img-fluid" /></a>
                              </div>
                            </div>
                            <div class="col-sm-8 grid-margin">
                              <a href="detail_berita.php?id=<?php echo $row['id']; ?>" style="color: #016064">
                                <h2 class="font-weight-600 mb-2"><?php echo htmlspecialchars($row['title']); ?></h2>
                              </a>
                              <p class="fs-13 text-muted mb-0">
                                <span class="mr-2"><?php echo htmlspecialchars($row['category']); ?></span>
                                <?php echo htmlspecialchars($row['date']); ?>
                              </p>
                              <p class="fs-15"><?php echo substr($row['content'], 0, 170) . '...'; ?>
                              </p>
                            </div>
                          </div>
                    <?php
                        }
                      }
                    }
                    ?>
                  </div>

                  <div class="col-lg-4">
                    <h2 class="mb-4 text-primary font-weight-600"> Latest news </h2>
                    <?php
                    $i = 1;
                    $func = new functions();
                    $rows = $func->select();
                    if (is_array($rows)) {
                      foreach ($rows as $row) {
                        if ($row['category'] == 'Sports' && $i <= 3) {
                    ?>
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="border-bottom pb-4 pt-4">
                                <div class="row">
                                  <div class="col-sm-8">
                                    <a href="detail_berita.php?id=<?php echo $row['id']; ?>" style="text-decoration: none; color: black;">
                                      <h5 class="font-weight-600 mb-1"><?php echo htmlspecialchars($row['title']); ?></h5>
                                    </a>
                                    <p class="fs-13 text-muted mb-0">
                                      <span class="mr-2"><?php echo htmlspecialchars($row['category']); ?></span>
                                      <?php echo htmlspecialchars($row['date']); ?>
                                    </p>
                                  </div>
                                  <div class="col-sm-4">
                                    <div class="rotate-img">
                                      <a href="detail_berita.php?id=<?php echo $row['id']; ?>"><img src="../images/<?php echo $row['image']; ?>" alt="banner" class="img-fluid" /></a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                    <?php
                          $i++;
                        }
                      }
                    }
                    ?>

                    <div class="trending">
                      <h2 class="mb-4 text-primary font-weight-600"> Trending </h2>
                      <?php
                      $i = 1;
                      $func = new functions();
                      $rows = $func->select();
                      if (is_array($rows)) {
                        foreach ($rows as $row) {
                          if ($row['category'] == 'Sports' && $i <= 2) {
                      ?>
                            <div class="mb-4">
                              <div class="rotate-img">
                                <a href="detail_berita.php?id=<?php echo $row['id']; ?>"><img src="../images/<?php echo $row['image']; ?>" alt="banner" class="img-fluid" /></a>
                              </div>
                              <a href="detail_berita.php?id=<?php echo $row['id']; ?>" style="text-decoration: none; color: black;">
                                <h3 class="mt-3 font-weight-600"><?php echo htmlspecialchars($row['title']); ?></h3>
                              </a>
                              <p class="fs-13 text-muted mb-0">
                                <span class="mr-2"><?php echo htmlspecialchars($row['category']); ?></span>
                                <?php echo htmlspecialchars($row['date']); ?>
                              </p>
                            </div>
                    </div>
              <?php
                            $i++;
                          }
                        }
                      }
              ?>
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