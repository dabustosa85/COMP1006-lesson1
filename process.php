<?php
include_once "includes/conn.php";

try {
    $body = $_POST['body'];
    $user = $_POST['user'];
    $date = date('Y-m-d H:i:s');

    $queryPrepare = $conn->prepare("INSERT INTO post (body,user,date) VALUES (:body,:user,:date)");
    $queryPrepare->bindParam(":body", $body, PDO::PARAM_STR, 4000);
    $queryPrepare->bindParam(":user", $user, PDO::PARAM_STR, 100);
    $queryPrepare->bindParam(":date", $date, PDO::PARAM_STR);

    $queryPrepare->execute();
    $conn = null;

    header("Location: index.php?action=created");

} catch (Exception $exception) {
    var_dump($exception->getMessage());
}