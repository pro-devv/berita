<footer>
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <img src="<?php echo BASEURL; ?>/assets/images/logo (1).png" style="width: 300px;" class="footer-logo" alt="" />
                    <h5 class="font-weight-normal mt-4 mb-5">
                        KIYO News is your news, entertainment, music fashion website. We provide you with the latest breaking news and videos straight from the entertainment industry.
                    </h5>
                    <ul class="social-media mb-3">
                        <li>
                            <a href="https://www.instagram.com/"><i class="mdi mdi-instagram"></i></a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/"><i class="mdi mdi-youtube"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/"><i class="mdi mdi-facebook"></i></a>
                        </li>
                        <li>
                            <a href="https://www.twitter.com/"><i class="mdi mdi-twitter"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <h3 class="font-weight-bold mb-3">RECENT POSTS</h3>
                    <?php
                    $i = 1;
                    $func = new functions();
                    $rows = $func->select();
                    if (is_array($rows)) {
                        foreach ($rows as $row) {
                            if ($i <= 3) {
                    ?>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="footer-border-bottom pb-2">
                                            <div class="row">
                                                <div class="col-3">
                                                    <a href="detail_berita.php?id=<?php echo $row['id']; ?>"><img src="<?php echo BASEURL; ?>/images/<?php echo $row['image']; ?>" alt="thumb" class="img-fluid" /></a>
                                                </div>
                                                <div class="col-9">
                                                    <a href="detail_berita.php?id=<?php echo $row['id']; ?>" class="cat">
                                                        <h5 class="font-weight-600"><?php echo htmlspecialchars($row['title']); ?></h5>
                                                    </a>
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

                </div>
                <div class="col-sm-3">
                    <h3 class="font-weight-bold mb-3">CATEGORIES</h3>
                    <div class="footer-border-bottom pb-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="international.php" class="cat">
                                <h5 class="mb-0 font-weight-600">International</h5>
                            </a>
                            <div class="count">1</div>
                        </div>
                    </div>
                    <div class="footer-border-bottom pb-2 pt-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="economics.php" class="cat">
                                <h5 class="mb-0 font-weight-600">Economics</h5>
                            </a>
                            <div class="count">2</div>
                        </div>
                    </div>
                    <div class="footer-border-bottom pb-2 pt-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="politics.php" class="cat">
                                <h5 class="mb-0 font-weight-600">Politics</h5>
                            </a>
                            <div class="count">3</div>
                        </div>
                    </div>
                    <div class="footer-border-bottom pb-2 pt-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="sports.php" class="cat">
                                <h5 class="mb-0 font-weight-600">Sports</h5>
                            </a>
                            <div class="count">4</div>
                        </div>
                    </div>
                    <div class="footer-border-bottom pb-2 pt-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="technology.php" class="cat">
                                <h5 class="mb-0 font-weight-600">Technology</h5>
                            </a>
                            <div class="count">5</div>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="lifestyle.php" class="cat">
                                <h5 class="mb-0 font-weight-600">Life Style</h5>
                            </a>
                            <div class="count">6</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="d-sm-flex justify-content-between align-items-center">
                        <div class="fs-14 font-weight-600"> © 2021 KIYO News. All rights reserved. </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>