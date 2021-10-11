<?php
    require "../include/connection.php";
    require "../models/Admin.php";

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $fun = new functions();
        $result = $fun->selectOne($id);
    }

    if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $category = $_POST['category'];
        $writer = $_POST['writer'];
        $content = $_POST['content'];
        $date = $_POST['date'];

        if(isset($_POST['changeImg'])){
            $name = $_FILES['newImg']['name'];
            $targetDir = "../images/";
            $targetFile = $targetDir.basename($_FILES['newImg']['name']);
            if(move_uploaded_file($_FILES['newImg']['tmp_name'], $targetFile)){
                $fields = [
                    'title' => $title,
                    'category' => $category,
                    'writer' => $writer,
                    'content' => $content,
                    'date' => $date,
                    'image' => $name
                ];
    
                $func = new functions();
                $func->update($fields, $id);
            }
        } else{
            $fields = [
                'title' => $title,
                'category' => $category,
                'writer' => $writer,
                'content' => $content,
                'date' => $date
            ];

            $func = new functions();
            $func->update($fields, $id);
            
        }
        
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Edit News</title>
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body style="background-color:#e8eff4;">
        <header>
            <!-- navbar -->
        </header>
        <div class="container center_div">
            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="id" class="form-label">ID</label>
                            <input type="text" class="form-control" name="id" value="<?php echo $result["id"]; ?>" required readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" value="<?php echo $result["title"]; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <input type="text" class="form-control" name="category" value="<?php echo $result["category"]; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Writer</label>
                            <input type="text" class="form-control" name="writer" value="<?php echo $result["writer"]; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Content</label>
                            <textarea rows="10" class="form-control" name="content" required><?php echo $result["content"]; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Publication Date</label>
                            <input type="text" class="form-control" name="date" value="<?php echo $result["date"]; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Image</label>
                            <?php echo '<img src="../images/'.$result["image"].'" style="width:540px;">'; ?>
                            <input type="checkbox" name="changeImg" value="true"> Change Image<br>
                            <input style="height:45px;" class="form-control" type="file" name="newImg">
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="submit" class="btn btn-primary btn-sm">Save</button>
                            <a class="btn btn-outline-dark btn-sm" href="home_admin.php">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>