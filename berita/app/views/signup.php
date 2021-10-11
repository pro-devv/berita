<?php
require_once("../config/config.php");
include_once '../helpers/session_helper.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/assets/css/style_signup.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style="background-color:#e8eff4;">
    <?php flash('register') ?>
    <form method="post" action="<?php echo BASEURL; ?>/Home/register" enctype='multipart/form-data'>
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 col-lg-10">
                        <div class="wrap d-md-flex">
                            <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
                                <div class="text w-100">
                                    <div class="icon"><img src="../../public/assets/images/logo.png" style="width:250px;"></div>
                                    <p>Already have an account?</p>
                                    <a href="<?php echo BASEURL; ?>/home/signin" class="btn btn-white btn-outline-white">Sign In</a>
                                </div>
                        </div>
                            <div class="login-wrap p-4 p-md-5">
                                <h3 class="mb-4">Hello! <span>Please sign up to continue</span></h3>
                                <form action="#" class="signup-form">
                                    <div class="form-group mb-4">
                                        <input type="text" class="form-control" placeholder="First Name" required>
                                    </div>
                                    <div class="form-group mb-4">
                                        <input type="text" class="form-control" placeholder="Last Name" required>
                                    </div>
                                    <div class="form-group mb-4">
                                        <input name="birthdate" class="form-control" placeholder="Birth Date" id="birthdate" type="date" style="color:rgba(0, 0, 0, 0.4);" required>
                                    </div>
                                    <div class="form-group mb-4">
                                        <select name="sex" class="form-control" style="color:rgba(0, 0, 0, 0.4);" required>
                                            <option selected disabled>Jenis Kelamin</option>
                                            <option value="Pria">Pria</option>
                                            <option value="Wanita">Wanita</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-4">
                                        <input type="file" name="avatar">
                                    </div>
                                    <div class="form-group mb-4">
                                        <input type="text" class="form-control" placeholder="Email" required>
                                    </div>
                                    <div class="form-group mb-4">
                                        <input type="text" class="form-control" placeholder="Username" required>
                                    </div>
                                    <div class="form-group mb-4">
                                        <input type="password" class="form-control" placeholder="Password" required>
                                    </div>
                                    <div class="form-group mb-4">
                                        <input type="password" class="form-control" placeholder="Confirm Password" required>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary rounded submit p-3">Sign Up</button>
                                    </div>
                                </form>
                                <div class="w-100 social-wrap">
                                    <p>
                                        <span>or</span>
                                        <span>Signup with</span>
                                    </p>
                                <p class="social-media d-flex justify-content-center">
                                    <a href="https://myaccount.google.com/" class="social-icon google d-flex align-items-center justify-content-center"><span class="fa fa-google"></span></a>
                                    <a href="https://twitter.com/" class="social-icon twitter d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
                                    <a href="https://facebook.com/" class="social-icon facebook d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
                                </p>
                                <p class="mt-4"><a href="<?php echo BASEURL; ?>">Cancel</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</body>

<script src="<?php echo BASEURL; ?>/assets/js/app.js"></script>

</html>