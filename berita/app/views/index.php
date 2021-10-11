<?php 
    if (!isset($_SESSION)) session_start();
    require_once "../models/Admin.php";
?>
<!DOCTYPE html>
<html lang="eng">
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>KIYO News</title>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/assets/vendors/mdi/css/materialdesignicons.min.css"/>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/assets/vendors/aos/dist/aos.css/aos.css" />
    <link rel="shortcut icon" href="<?php echo BASEURL; ?>/assets/images/logo.png" />
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/assets/css/profile.css">
  </head>

  <body>
    <div class="container-scroller">
      <div class="main-panel">
       
        <?php include 'partials/navbar.php'; ?>

        <div class="flash-news-banner">
          <div class="container">
            <div class="d-lg-flex align-items-center justify-content-between">
              <div class="d-flex">
                <span class="mr-3 text-black">
                  <span id="datetime"></span>
                    <script>
                      var dt = new Date(); document.getElementById("datetime").innerHTML = dt.toLocaleString();
                    </script>
                </span>
              </div>
            </div>
          </div>
        </div>
        <div class="content-wrapper">
          <div class="container">
            <div class="row" data-aos="fade-up">
              <?php
                  $i = 1;
                  $func = new functions();
                  $rows = $func->select();
                  if(is_array($rows)){
                      foreach($rows as $row){
                        if($i <= 1){
              ?>
              <div class="col-xl-8 stretch-card grid-margin">
                <div class="position-relative">
                  <a href="<?php echo BASEURL; ?>/detail_berita.php?id=<?php echo $row['id']; ?>"><img src="<?php echo BASEURL .'/images/' . $row['image']; ?>" alt="banner" class="img-fluid"/></a>
                  <div class="banner-content">
                    <div class="badge badge-danger fs-12 font-weight-bold mb-3"><?php echo $row['category'].' '; ?></div>
                    <a href="<?php echo BASEURL; ?>/detail_berita.php?id=<?php echo $row['id']; ?>" style="text-decoration: none; color: white"><h1 class="mb-2"><?php echo $row['title']; ?></h1></a>
                    <div class="fs-12">
                      <span class="mr-2"><?php echo $row['date']; ?></span>
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
              <div class="col-xl-4 stretch-card grid-margin">
                <div class="card bg-dark text-white">
                  <div class="card-body">
                    <h2>Latest news</h2>
                    <?php
                      $i = 1;
                      $func = new functions();
                      $rows = $func->select();
                      if(is_array($rows)){
                          foreach($rows as $row){
                            if($i <= 3 && ($row['category'] == 'Sports' || $row['category'] == 'Technology')){
                    ?>
                    <div class="d-flex border-bottom-blue pt-3 pb-4 align-items-center justify-content-between">
                      <div class="pr-3">
                        <a href="<?php echo BASEAPPURL; ?>/detail_berita.php?id=<?php echo $row['id']; ?>" style="color: white"><h5><?php echo $row['title']; ?></h5></a>
                        <div class="fs-12">
                          <span class="mr-2"><?php echo $row['category']; ?></span><?php echo $row['date']; ?>
                        </div>
                      </div>
                      <div class="rotate-img">
                        <a href="<?php echo BASEAPPURL; ?>/detail_berita.php?id=<?php echo $row['id']; ?>"><img src="<?php echo BASEAPPURL .'/images/' . $row['image']; ?>" alt="thumb" class="img-fluid img-lg"/></a>
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
            <div class="row" data-aos="fade-up">
              <div class="col-lg-3 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h2>Category</h2>
                    <ul class="vertical-menu">
                      <li><a href="<?php echo BASEAPPURL; ?>/views/economics.php">Economics</a></li>
                      <li><a href="<?php echo BASEAPPURL; ?>/views/international.php">International</a></li>
                      <li><a href="<?php echo BASEAPPURL; ?>/views/lifestyle.php">Life Style</a></li>
                      <li><a href="<?php echo BASEAPPURL; ?>/views/politics.php">Politics</a></li>
                      <li><a href="<?php echo BASEAPPURL; ?>/views/sports.php">Sports</a></li>
                      <li><a href="<?php echo BASEAPPURL; ?>/views/technology.php">Technology</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-9 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                  <?php
                      $i = 1;
                      $func = new functions();
                      $rows = $func->select();
                      if(is_array($rows)){
                          foreach($rows as $row){
                            if($i <= 3 && ($row['category'] == 'Politics' || $row['category'] == 'Economics')){
                    ?>
                    <div class="row">
                      <div class="col-sm-4 grid-margin">
                        <div class="position-relative">
                          <div class="rotate-img">
                            <a href="<?php echo BASEURL; ?>/detail_berita.php?id=<?php echo $row['id']; ?>"><img src="<?php echo BASEURL . '/images/' . $row['image']; ?>" alt="thumb" class="img-fluid"/></a>
                          </div>
                          <div class="badge-positioned">
                            <span class="badge badge-danger font-weight-bold"><?php echo $row['category'].' '; ?></span>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-8  grid-margin">
                        <a href="<?php echo BASEURL; ?>/detail_berita.php?id=<?php echo $row['id']; ?>" style="color: #016064"><h2 class="mb-2 font-weight-600"><?php echo $row['title']; ?></h2></a>
                        <div class="fs-13 mb-2">
                          <span class="mr-2"><?php echo $row['date']; ?></span>
                        </div>
                        <p class="mb-0"><?php echo substr($row['content'], 0, 170) . '...'; ?></p>
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
            <div class="row" data-aos="fade-up">
              <div class="col-sm-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-8">
                        <div class="card-title"> Videos </div>
                        <div class="row">
                          <div class="col-sm-6 grid-margin">
                            <div class="position-relative">
                              <div class="rotate-img" style="border-radius:10px;">
                                <img src="<?php echo BASEURL; ?>/assets/images/dashboard/lifestyle.png" style="border-radius:10px;" alt="thumb" class="img-fluid"/>
                              </div>
                              <div class="badge-positioned w-90">
                                <div class="d-flex justify-content-between align-items-center">
                                  <span class="badge badge-danger font-weight-bold">Lifestyle</span>
                                  <div class="video-icon">
                                    <a href="https://youtu.be/SrlLXecPsdo" target="_blank"><i class="mdi mdi-play"></i></a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6 grid-margin">
                            <div class="position-relative">
                              <div class="rotate-img" style="border-radius:10px;">
                                <img src="<?php echo BASEURL; ?>/assets/images/dashboard/sports.jpg" style="border-radius:10px;" alt="thumb" class="img-fluid"/>
                              </div>
                              <div class="badge-positioned w-90">
                                <div class="d-flex justify-content-between align-items-center">
                                  <span class="badge badge-danger font-weight-bold">Sports</span>
                                  <div class="video-icon">
                                    <a href="https://youtu.be/gjxXqkHgaio" target="_blank"><i class="mdi mdi-play"></i></a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-6 grid-margin">
                            <div class="position-relative">
                              <div class="rotate-img" style="border-radius:10px;">
                                <img src="<?php echo BASEURL; ?>/assets/images/dashboard/music.jpg" style="border-radius:10px;" alt="thumb" class="img-fluid"/>
                              </div>
                              <div class="badge-positioned w-90">
                                <div class="d-flex justify-content-between align-items-center">
                                  <span class="badge badge-danger font-weight-bold">Music</span>
                                  <div class="video-icon">
                                    <a href="https://youtu.be/5YlJt5EYrlM" target="_blank"><i class="mdi mdi-play"></i></a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6 grid-margin">
                            <div class="position-relative">
                              <div class="rotate-img" style="border-radius:10px;">
                                <img src="<?php echo BASEURL; ?>/assets/images/dashboard/travel.jpg" style="border-radius:10px;" alt="thumb" class="img-fluid"/>
                              </div>
                              <div class="badge-positioned w-90">
                                <div class="d-flex justify-content-between align-items-center">
                                  <span class="badge badge-danger font-weight-bold">Travel</span>
                                  <div class="video-icon">
                                    <a href="https://youtu.be/ojQbArbuN4E" target="_blank"><i class="mdi mdi-play"></i></a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="card-title"> Latest Video </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center border-bottom pb-2">
                          <div class="div-w-80 mr-3">
                            <div class="rotate-img" style="border-radius:10px;">
                              <a href="https://youtu.be/awkkyBH2zEo" target="_blank">
                                <img src="<?php echo BASEURL; ?>/assets/images/dashboard/lalisa.jpg" style="border-radius:5px;" alt="thumb" class="img-fluid"/>
                              </a>
                            </div>
                          </div>
                          <a href="https://youtu.be/awkkyBH2zEo" target="_blank">
                            <h3 class="font-weight-600 mb-0" style="text-decoration: none; color: #3A3A3A;">Debut Solo LISA-'LALISA' M/V</h3>
                          </a>
                        </div>
                        <div class="d-flex justify-content-between align-items-center border-bottom pb-2">
                          <div class="div-w-80 mr-3">
                            <div class="rotate-img" style="border-radius:10px;">
                              <a href="https://youtu.be/OXtZfPZIex4" target="_blank">
                                <img src="<?php echo BASEURL; ?>/assets/images/dashboard/niki.jpg" style="border-radius:5px;" alt="thumb" class="img-fluid"/>
                              </a>
                            </div>
                          </div>
                          <a href="https://youtu.be/OXtZfPZIex4" target="_blank">
                            <h3 class="font-weight-600 mb-0" style="text-decoration: none; color: #3A3A3A;">NIKI - Every Summertime M/V</h3>
                          </a>
                        </div>
                        <div class="d-flex justify-content-between align-items-center border-bottom pb-2">
                          <div class="div-w-80 mr-3">
                            <div class="rotate-img" style="border-radius:10px; width:75px;">
                              <a href="https://youtu.be/2BxbHCg39Sk" target="_blank">
                                <img src="<?php echo BASEURL; ?>/assets/images/dashboard/hoyeon.jpg" style="border-radius:5px; width:74px;" alt="thumb" class="img-fluid"/>
                              </a>
                            </div>
                          </div>
                          <a href="https://youtu.be/2BxbHCg39Sk" target="_blank">
                            <h3 class="font-weight-600 mb-0" style="text-decoration: none; color: #3A3A3A;">Squid Game's Hoyeon Jung</h3>
                          </a>
                        </div>
                        <div class="d-flex justify-content-between align-items-center border-bottom pb-2">
                          <div class="div-w-80 mr-3">
                            <div class="rotate-img" style="border-radius:10px;">
                              <a href="https://youtu.be/3YqPKLZF_WU" target="_blank">
                                <img src="<?php echo BASEURL; ?>/assets/images/dashboard/coldplaybts.jpg" style="border-radius:5px;" alt="thumb" class="img-fluid"/>
                              </a>
                            </div>
                          </div>
                          <a href="https://youtu.be/3YqPKLZF_WU" target="_blank">
                            <h3 class="font-weight-600 mb-0" style="text-decoration: none; color: #3A3A3A;">Coldplay X BTS - My Universe</h3>
                          </a>
                        </div>
                        <div class="d-flex justify-content-between align-items-center border-bottom pb-2">
                          <div class="div-w-80 mr-3">
                            <div class="rotate-img" style="border-radius:10px; width:75px;">
                              <a href="https://youtu.be/WPdWvnAAurg" target="_blank">
                                <img src="<?php echo BASEURL; ?>/assets/images/dashboard/aespa.jpg" style="border-radius:5px; width:75px;" alt="thumb" class="img-fluid"/>
                              </a>
                            </div>
                          </div>
                          <a href="https://youtu.be/WPdWvnAAurg" target="_blank">
                            <h3 class="font-weight-600 mb-0" style="text-decoration: none; color: #3A3A3A;">aespa 에스파 'Savage' MV</h3>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row" data-aos="fade-up">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-xl-6">
                        <div class="card-title"> Spotlight </div>
                        <div class="row">
                          <?php
                            $i = 1;
                            $func = new functions();
                            $rows = $func->select();
                            if(is_array($rows)){
                                foreach($rows as $row){
                                  if($i <= 1 && $row['category'] == 'Sports'){
                          ?>
                          <div class="col-xl-6 col-lg-8 col-sm-6">
                            <div class="rotate-img">
                              <a href="<?php echo BASEAPPURL; ?>/detail_berita.php?id=<?php echo $row['id']; ?>"><img src="<?php echo BASEAPPURL . '/images/' . $row['image']; ?>" alt="thumb" class="img-fluid"/></a>
                            </div>
                            <a href="<?php echo BASEAPPURL; ?>/detail_berita.php?id=<?php echo $row['id']; ?>" style="color: black; text-decoration: none"><h2 class="mt-3 text-primary mb-2"><?php echo $row['title']; ?></h2></a>
                            <p class="fs-13 mb-1 text-muted">
                              <span class="mr-2"><?php echo $row['category']; ?></span><?php echo $row['date']; ?>
                            </p>
                            <p class="my-3 fs-15"><?php echo substr($row['content'],0,100).'...'; ?></p>
                          </div>
                          <?php
                                  $i++;
                                }
                              }
                            }
                          ?>
                          <div class="col-xl-6 col-lg-4 col-sm-6">
                            <?php
                              $i = 1;
                              $func = new functions();
                              $rows = $func->select();
                              if(is_array($rows)){
                                  foreach($rows as $row){
                                    if($i <= 4){
                            ?>
                            <div class="border-bottom pb-3 mb-3">
                              <a href="<?php echo BASEAPPURL; ?>/views/detail_berita.php?id=<?php echo $row['id']; ?>" style="color: black; text-decoration: none"><h3 class="font-weight-600 mb-0"><?php echo substr($row['title'],0,20).'...'; ?></h3></a>
                              <p class="fs-13 text-muted mb-0">
                                <span class="mr-2"><?php echo $row['category']; ?></span><?php echo $row['date']; ?>
                              </p>
                              <p class="mb-0"><?php echo substr($row['content'],0,50).'...'; ?></p>
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
                      <div class="col-xl-6">
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="card-title" style="color: white">.</div>
                            <?php
                              $i = 1;
                              $func = new functions();
                              $rows = $func->select();
                              if(is_array($rows)){
                                  foreach($rows as $row){
                                    if($i <= 2 && $row['category'] == 'Technology'){
                            ?>
                            <div class="border-bottom pb-3">
                              <div class="rotate-img">
                                <a href="<?php echo BASEURL; ?>/detail_berita.php?id=<?php echo $row['id']; ?>"><img src="<?php echo BASEURL .'/images/' . $row['image']; ?>" alt="thumb" class="img-fluid"/></a>
                              </div>
                              <a href="<?php echo BASEURL; ?>/detail_berita.php?id=<?php echo $row['id']; ?>" style="color: black; text-decoration: none"><p class="fs-16 font-weight-600 mb-0 mt-3"><?php echo $row['title']; ?></p></a>
                              <p class="fs-13 text-muted mb-0">
                                <span class="mr-2"><?php echo $row['category']; ?></span><?php echo $row['date']; ?>
                              </p>
                            </div>
                            <?php
                                    $i++;
                                  }
                                }
                              }
                            ?>
                          </div>
                          <div class="col-sm-6">
                            <div class="card-title"> International News </div>
                            <div class="row">
                              <div class="col-sm-12">
                                <div class="border-bottom pb-3">
                                  <?php
                                    $i = 1;
                                    $func = new functions();
                                    $rows = $func->select();
                                    if(is_array($rows)){
                                        foreach($rows as $row){
                                          if($i <= 5 && $row['category'] == 'International'){
                                  ?>
                                  <div class="row">
                                    <div class="col-sm-5 pr-2">
                                      <div class="rotate-img">
                                        <a href="<?php echo BASEURL; ?>/detail_berita.php?id=<?php echo $row['id']; ?>"><img src="<?php echo BASEURL .'/images/' . $row['image']; ?>" alt="thumb"  class="img-fluid w-100"/></a>
                                      </div>
                                    </div>
                                    <div class="col-sm-7 pl-2">
                                      <a href="<?php echo BASEURL; ?>/detail_berita.php?id=<?php echo $row['id']; ?>" style="color: black; text-decoration: none"><p class="fs-16 font-weight-600 mb-0"><?php echo substr($row['title'],0,15).'...'; ?></p></a>
                                      <p class="fs-13 text-muted mb-0">
                                        <span class="mr-2"><?php echo $row['category']; ?></span><?php echo $row['date']; ?>
                                      </p>
                                      <p class="mb-0 fs-13"><?php echo substr($row['content'],0,15).'...'; ?></p>
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
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <?php include 'partials/footer.php'; ?>
    </div>
    <script src="<?php echo BASEURL; ?>../../public/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="<?php echo BASEURL; ?>../../public/assets/vendors/aos/dist/aos.js/aos.js"></script>
    <script src="<?php echo BASEURL; ?>../../public/assets/js/demo.js"></script>
    <script src="<?php echo BASEURL; ?>../../public/assets/js/jquery.easeScroll.js"></script>
  </body>
</html>
