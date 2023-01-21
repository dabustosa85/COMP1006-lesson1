<?php
include_once "./includes/conn.php";
//get post db
try {
    $query = $conn->query("SELECT * FROM post");
    $posts = $query->fetchAll();

    $action = $_GET['action'] ?? '';

} catch (Exception $ex) {
    echo $ex->getMessage();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Posts</title>
</head>

<body>

<div class="container">

    <div class="row mb-3">
        <div class="col-12">
            <h1>Leave a coment</h1>
            <form action="process.php" method="post">
                <div class="mb-2">
                    <label for="body" class="form-label">Body:</label>
                    <textarea name="body" id="body" class="form-control"></textarea>
                </div>
                <div class="mb-2">
                    <label for="user" class="form-label">User:</label>
                    <input name="user" id="user" class="form-control"/>
                </div>
                <div class="mb-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <?php if ($action == 'created') { ?>
        <div class="row mb-3">
            <div class="alert alert-success" role="alert">
                Post Created!
            </div>
        </div>
    <?php } ?>

    <?php if ($action == 'deleted') { ?>
        <div class="row mb-3">
            <div class="alert alert-danger" role="alert">
                Post Deleted!
            </div>
        </div>
    <?php } ?>

    <?php if ($action == 'edited') { ?>
        <div class="row mb-3">
            <div class="alert alert-warning" role="alert">
                Post Updated!
            </div>
        </div>
    <?php } ?>

    <div class="row mb-3">
        <div class="col-12">
            <h2>Lastest Post</h2>
            <table class="table table-sm table-bordered table-hover">
                <thead>
                <tr>
                    <th scope="col">Post</th>
                    <th scope="col">User</th>
                    <th scope="col">Date</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($posts as $post) {
                    ?>
                    <tr>
                        <td><?= $post['body']; ?></td>
                        <td><?= $post['user'] ?></td>
                        <td><?= date('d M y', strtotime($post['date'])) ?></td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="edit.php?postId=<?= $post['postId'] ?>" class="btn btn-success">Edit</a>
                                <a href="delete.php?postId=<?= $post['postId'] ?>" class="btn btn-danger">Delete</a>
                            </div>
                        </td>
                    </tr>
                    <?php
                }

                ?>
                </tbody>


            </table>

        </div>

    </div>
</div>


</body>
</html>