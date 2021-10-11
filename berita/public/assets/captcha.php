<?php
    session_start();
    create_image();

    function create_image() {
        $md5_hash = md5(rand(0,999));
        $captcha = substr($md5_hash, 15,5);

        $_SESSION['captcha'] = $captcha;

        $width = 200;
        $height = 50;

        $image = ImageCreate($width, $height);

        $white  = imagecolorallocate($image, 255, 255, 255);
        $black  = imagecolorallocate($image, 0, 0, 0);
        $green  = imagecolorallocate($image, 0, 255, 0);
        $brown  = imagecolorallocate($image, 139, 69, 19);
        $orange = imagecolorallocate($image, 204, 204, 204);
        $grey   = imagecolorallocate($image, 204, 204, 204);

        imagefill($image, 0, 0, $black);

        $font = '../assets/fonts/blackjack.otf';
        imagettftext($image, 25,10,45,45, $white, $font, $captcha);

        header("Content-Type: image/jpeg");

        imagejpeg($image);
        imagedestroy($image);
    }
?>