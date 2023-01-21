<?php
include_once "./includes/conn.php";

$postId = $_GET['postId'];

$queryPrepare = $conn->prepare("SELECT * FROM post WHERE postId = :postId");

$queryPrepare->bindParam(":postId", $postId);
$queryPrepare->execute();

$post = $queryPrepare->fetch();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row mb-3">
        <div class="col-12">
            <h1>Edit Coment</h1>
            <form action="edit-process.php" method="post">
                <div class="mb-2">
                    <label for="body" class="form-label">Body:</label>
                    <textarea name="body" id="body" class="form-control"><?= $post['body'] ?></textarea>
                </div>
                <div class="mb-2">
                    <label for="user" class="form-label">User:</label>
                    <input type="text" name="user" id="user" class="form-control" value="<?= $post['user'] ?>"/>
                </div>
                <div class="mb-2">
                    <input type="hidden" name="postId" id="postId" value="<?= $post['postId'] ?>"/>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
