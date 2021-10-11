<?php
  require_once("../config/config.php");
  require "../models/Admin.php";
  require "../models/Comments.php";

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $fun = new functions();
    $result = $fun->selectOne($id);
  }

  if(isset($_POST['submit'])){
    $comment = $_POST['comment'];
    $date = date("Y-m-d");
    $postid = $_POST['postid'];
    $userid = $_SESSION['id'];

    $fields = [
        'post_id' => $postid,
        'user_id' => $userid,
        'date' => $date,
        'comment' => $comment
    ];

    $comments = new comments();
    $comments->addComment($fields);
  }
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    .fa {
      font-size: 15px;
      cursor: pointer;
      user-select: none;
    }

    .fa:hover {
      color: #FF5757;
    }
  </style>
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
                    <h1 class="font-weight-600 mb-4 row col-lg-8"><?php echo htmlspecialchars($result['title']); ?></h1>
                  </div>
                </div>
                <div class="row">
                  <div class="row col-lg-8">
                    <div class="col-sm-11 grid-margin">
                      <h5>KIYO NEWS / <?php echo htmlspecialchars($result['date']); ?></h5>
                      <img src="<?php echo BASEURL; ?>/images/<?php echo $result['image']; ?>" width="590" height="290" /></br></br>
                      <p class="text-justify"><?php echo nl2br($result['content']); ?></p></br></br>
                      <h5>- <?php echo htmlspecialchars($result['writer']); ?> -</h5>
                    </div>
                  </div>

                  <div class="col-lg-4">
                    <h2 class="mb-4 text-primary font-weight-600"> Latest news </h2>
                    <?php
                    $i = 1;
                    $func = new functions();
                    $rows = $func->select();
                    if (is_array($rows)) {
                      foreach ($rows as $row) {
                        if ($row['category'] == $result['category'] && $i <= 3) {
                    ?>
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="border-bottom pb-4 pt-4">
                                <div class="row">
                                  <div class="col-sm-8">
                                    <a href="<?php echo BASEURL; ?>/detail_berita.php?id=<?php echo $row['id']; ?>" style="text-decoration: none; color: black;">
                                      <h5 class="font-weight-600 mb-1"><?php echo htmlspecialchars($row['title']); ?></h5>
                                    </a>
                                    <p class="fs-13 text-muted mb-0">
                                      <span class="mr-2"><?php echo htmlspecialchars($row['category']); ?></span>
                                      <?php echo htmlspecialchars($row['date']); ?>
                                    </p>
                                  </div>
                                  <div class="col-sm-4">
                                    <div class="rotate-img">
                                      <a href="<?php echo BASEURL; ?>/detail_berita.php?id=<?php echo $row['id']; ?>"><img src="<?php echo BASEURL; ?>/images/<?php echo $row['image']; ?>" alt="banner" class="img-fluid" /></a>
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
                              if ($row['category'] == $result['category'] && $i <= 2) {
                        ?>
                        <div class="mb-4">
                          <div class="rotate-img">
                            <a href="<?php echo BASEURL; ?>/detail_berita.php?id=<?php echo $row['id']; ?>"><img src="<?php echo BASEURL; ?>/images/<?php echo $row['image']; ?>" alt="banner" class="img-fluid" /></a>
                          </div>
                          <a href="<?php echo BASEURL; ?>/detail_berita.php?id=<?php echo $row['id']; ?>" style="text-decoration: none; color: black;">
                            <h3 class="mt-3 font-weight-600"><?php echo htmlspecialchars($row['title']); ?></h3>
                          </a>
                          <p class="fs-13 text-muted mb-0">
                            <span class="mr-2"><?php echo htmlspecialchars($row['category']); ?></span>
                            <?php echo htmlspecialchars($row['date']); ?>
                          </p>
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
            <?php
              $i = 1;
              $func = new functions();
              $rows = $func->select();
              if (is_array($rows)) {
                foreach ($rows as $row) {
                  if ($row['category'] == $result['category'] && $i == 1) {
            ?>
            <div class="card-body" data-aos="fade-up">
              <h3 class="font-weight-600 mb-4">Comments</h3>
              <form action="" method="post">
                <textarea rows="10" class="form-control" name="comment" placeholder="Leave your comment here..."></textarea>
                <input type="hidden" name="postid" value="<?php echo $row['id']; ?>"/>
                <br><button type="submit" class="btn btn-dark" style="float: right">Post</submit>
              </form>
            </div>
            <?php
                    $i++;
                  }
                }
              }
            ?>
              <?php
                  $func = new comments();
                  $rows = $func->selectComments();
                  if(is_array($rows)){
                      foreach($rows as $row){
                        if($row['post_id'] == $result['id']){
                          $users = $func->selectUser($row['user_id']);
                          foreach($users as $user){
                ?>
                <div class="card p-3">
                  <div class="d-flex justify-content-between align-items-center">
                      <div class="user d-flex flex-row align-items-center"> 
                        <img src="<?php echo BASEURL; ?>/assets/images/avatars/<?php if($user['avatar'] == null) echo 'avatar.png'; else echo $user['avatar'];?>" width="30" class="user-img rounded-circle mr-2"> 
                      <span><small class="font-weight-bold text-primary"><?php echo htmlspecialchars($user['firstname']).' '.htmlspecialchars($user['lastname']); ?></small> </span> 
                  </div> <small><?php echo htmlspecialchars($row['date']); ?></small>
                  </div>
                  <div class="action d-flex justify-content-between mt-2 align-items-center">
                      <div class="reply"><?php echo htmlspecialchars($row['comment']); ?><span class="dots"></span></div>
                      <div class="icons align-items-center" id="like"> 
                        <!-- likes -->
                      </div>
                  </div>
                </div>
                <?php
                        }
                      }
                    }
                  }
                ?>
          </div>
        </div>
      </div>

      <?php include 'partials/footer.php'; ?>

    </div>
  </div>
  <script src="<?php echo BASEURL; ?>/assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="<?php echo BASEURL; ?>/assets/vendors/aos/dist/aos.js/aos.js"></script>
  <script src="<?php echo BASEURL; ?>./assets/js/demo.js"></script>
  <script src="<?php echo BASEURL; ?>/assets/js/jquery.easeScroll.js"></script>
</body>
</html>