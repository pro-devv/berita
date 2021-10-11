<?php
    require "../include/connection.php";
    require "../models/Admin.php";

    if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $category = $_POST['category'];
        $writer = $_POST['writer'];
        $content = $_POST['content'];
        $date = $_POST['date'];
        $name = $_FILES['image']['name'];
        $targetDir = "../images/";
        $targetFile = $targetDir.basename($_FILES['image']['name']);
        if(move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)){
            $fields = [
                'title' => $title,
                'category' => $category,
                'writer' => $writer,
                'content' => $content,
                'date' => $date,
                'image' => $name
            ];

            $func = new functions();
            $func->insert($fields);
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Add News</title>
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="../../public/assets/vendors/mdi/css/materialdesignicons.min.css" />
        <link rel="stylesheet" href="../../public/assets/vendors/aos/dist/aos.css/aos.css" />
        <link rel="shortcut icon" href="../../public/assets/images/logo.png" />
        <link rel="stylesheet" href="../../public/assets/css/style.css">
    </head>
    <body style="background-color:#e8eff4;">
        <div class="container-scroller">
            <div class="main-panel">
                <header id="header">
                    <!-- navbar -->
                    <div class="container">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <div class="navbar-top">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div> <a class="navbar-brand" href="pages/index.html"><img src="../assets/images/logo.svg" alt=""/></a> </div>
                                    <div>
                                        <button class="navbar-toggler" type="button"  data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon"></span>
                                        </button>
                                        <div class="navbar-collapse justify-content-center collapse" id="navbarSupportedContent">
                                            <li class="nav-item">
                                                <a href="index.php" class="nav-link">
                                                    <button type="button" class="active btn btn-default btn btn-danger btn-md pull-left" style="margin: 0px 20px;">Logout
                                                    </button>
                                                </a>
                                            </li>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </header>
            </div>
        </div>
        <div class="container center_div">
            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <br><label class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Title" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <input type="text" class="form-control" name="category" placeholder="Category" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Writer</label>
                            <input type="text" class="form-control" name="writer" placeholder="Writer" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Content</label>
                            <textarea rows="10" class="form-control" name="content" placeholder="Content" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Publication Date</label>
                            <input type="text" class="form-control" name="date" placeholder="Publication Date" required>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Image</label>
                            <input style="height:45px;" class="form-control" type="file" name="image" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>&nbsp;&nbsp;
                            <a class="btn btn-outline-dark" href="home_admin.php">Cancel</a>
                        <div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>