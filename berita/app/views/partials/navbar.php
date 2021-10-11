<header id="header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="navbar-top">
                <div class="d-flex justify-content-between align-items-center">
                    <ul class="navbar-top-left-menu">
                        <li class="nav-item">
                            
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contactus.php">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="aboutus.php" class="nav-link">About</a>
                        </li>
                    </ul>
                    <ul class="navbar-top-right-menu">
                        <li class="nav-item">
                            <a href="#" class="nav-link"><i class="mdi mdi-magnify"></i></a>
                        </li>
                        <?php if (!isset($data['profile']['id'])) : ?>
                            <li class="nav-item">
                                <a href="<?php echo BASEURL; ?>/home/signin" class="nav-link">Login</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo BASEURL; ?>/home/signup" class="nav-link">Sign up</a>
                            </li>
                        <?php else : ?>
                            <li class="nav-item">
                                <a href="<?php echo BASEURL; ?>/profile" class="nav-link">
                                    <?php if (isset($data['profile']['avatar'])) : ?>
                                        <img src="<?php echo BASEURL.'/assets/avatars/' . $data['profile']['avatar'] ?>" alt="Avatar" class="avatar">
                                    <?php else : ?>
                                        <?php if ($data['profile']['sex'] == 'Wanita') : ?>
                                            <img src="<?php echo BASEURL; ?>/assets/images/avatars/avatar-women.png" alt="Avatar" class="avatar">
                                        <?php else : ?>
                                            <img src="<?php echo BASEURL; ?>/assets/images/avatars/avatar.png" alt="Avatar" class="avatar">
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php echo $data['profile']['username'] ?>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo BASEURL; ?>/home/logout" class="nav-link">Logout</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <div class="navbar-bottom">
                <div class="d-flex justify-content-between align-items-center">
                    <div> <a class="navbar-brand" href="index.php"><img src="<?php echo BASEURL; ?>/assets/images/logo (1).png" alt="" /></a> </div>
                    <div>
                        <button class="navbar-toggler" type="button" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="navbar-collapse justify-content-center collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav d-lg-flex justify-content-between align-items-center">
                                <li>
                                    <button class="navbar-close"> <i class="mdi mdi-close"></i> </button>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="index.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo BASEAPPURL; ?>/views/international.php">International</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo BASEAPPURL; ?>/views/economics.php">Economics</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo BASEAPPURL; ?>/views/politics.php">Politics</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo BASEAPPURL; ?>/views/sports.php">Sports</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo BASEAPPURL; ?>/views/technology.php">Technology</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo BASEAPPURL; ?>/views/lifestyle.php">Life Style</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <ul class="social-media">
                        <li> <a href="https://www.instagram.com/"> <i class="mdi mdi-instagram"></i> </a> </li>
                        <li> <a href="https://www.youtube.com/"> <i class="mdi mdi-youtube"></i> </a> </li>
                        <li> <a href="https://www.facebook.com/"> <i class="mdi mdi-facebook"></i> </a> </li>
                        <li> <a href="https://www.twitter.com/"> <i class="mdi mdi-twitter"></i> </a> </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>