<?php
	require "../include/connection.php";
	require "../models/Admin.php";
?>

<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>KIYO News</title>
        <link rel="stylesheet" href="../../public/assets/vendors/mdi/css/materialdesignicons.min.css" />
        <link rel="stylesheet" href="../../public/assets/vendors/aos/dist/aos.css/aos.css" />
        <link rel="shortcut icon" href="../../public/assets/images/logo.png" />
        <link rel="stylesheet" href="../../public/assets/css/style.css">
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
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
        
        <!-- Tombol Tambah Berita -->
        <div>
        <a href="add_news.php" class="btn btn-primary" style="float: right; margin: 10px 146px;">Add News</a>
        </div>
        <!-- Table Berita -->
        <div class="container">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark text-center">
                    <th>No.</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Writer</th>
                    <th>Content</th>
                    <th>Publication Date</th>
                    <th>Image</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                        $nomor = 0;
                        $func = new functions();
                        $rows = $func->select();
                        if(is_array($rows)){
                            foreach($rows as $row){
                                $nomor += 1;
                    ?>
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo htmlspecialchars($row['title']); ?></td>
                        <td><?php echo htmlspecialchars($row['category']); ?></td>
                        <td><?php echo htmlspecialchars($row['writer']); ?></td>
                        <td><?php echo htmlspecialchars($row['content']); ?></td>
                        <td><?php echo htmlspecialchars($row['date']);?></td>
                        <td><img src="../images/<?php echo $row['image']; ?>" width="200" height="100"></td>
                        <td><form action="edit_news.php" method="post">
                                <button class="btn" name="id" value="<?php echo $row['id']; ?>"><i class="fa fa-edit"></i></button>
                            </form>
                            <form action="../controller/delete_news.php" method="post">
                                <button class="btn" name="id" value="<?php echo $row['id']; ?>"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                    <?php
                            }
                        }
                    ?>
            </table>
        </div>
    </body>
</html>