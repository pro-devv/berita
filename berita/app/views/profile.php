<?php
    include_once '../app/helpers/session_helper.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>../../public/assets/css/style_login.css" type="text/css">
</head>
<style>
    .custom-layout {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-bottom: 20px;
    }

    .current-avatar-section {
        text-align: center;
        padding: 10px 0;
    }

    .avatar-profile {
        vertical-align: middle;
        width: 150px;
        height: 150px;
        border-radius: 50%;
    }
</style>
<body>

<h1 class="header">Profile</h1>

<?php flash('profile') ?>

<div class="current-avatar-section">
    <?php if ($data['profile']['avatar']) : ?>
    <img src="<?php echo BASEURL; ?>/assets/avatars/<?php echo $data['profile']['avatar'] ?>" alt="Avatar" class="avatar-profile">
    <?php else : ?>
        <?php if ($data['profile']['sex'] == 'Wanita') : ?>
        <img src="<?php echo BASEURL; ?>/assets/images/avatars/avatar-women.png" alt="Avatar" class="avatar-profile">
        <?php else : ?>
        <img src="<?php echo BASEURL; ?>/assets/images/avatars/avatar.png" alt="Avatar" class="avatar-profile">
        <?php endif; ?>
    <?php endif; ?>
</div>
<form method="post" action="<?php echo BASEURL.'/profile/avatar_update/'.$data['profile']['id'] ?>" enctype="multipart/form-data">
    <input type="hidden" name="currentAvatar" value="<?php echo $data['profile']['avatar'] ? BASEURL.'/assets/avatars/'.$data['profile']['avatar'] : null  ?>">
    <input type="file" name="avatar">
    <div class="custom-layout">
        <div>
            <button type="submit" name="submit">Simpan</button>
            <button type="submit" name="delete">Hapus</button>
        </div>
        <a href="<?php echo BASEURL; ?>">Back to homepage</a>
    </div>
</form>
</body>

<script src="<?php echo BASEURL; ?>../../public/assets/js/app.js"></script>