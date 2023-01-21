<?php
try {
    include_once "./includes/conn.php";

    $postId = $_POST['postId'];

    $body = $_POST['body'];
    $user = $_POST['user'];


    $queryPrepare = $conn->prepare("UPDATE post SET body = :body, user = :user WHERE postId = :postId");
    $queryPrepare->bindParam(":body", $body);
    $queryPrepare->bindParam(":user", $user);
    $queryPrepare->bindParam(":postId", $postId);

    $queryPrepare->execute();
    $conn = null;

    header("Location: index.php?action=edited");

} catch (Exception $exception) {
    var_dump($exception->getMessage());
}