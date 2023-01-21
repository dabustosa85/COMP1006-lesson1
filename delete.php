<?php
include_once "./includes/conn.php";
$postId = $_GET['postId'];


$queryPrepare = $conn->prepare("DELETE FROM post WHERE postId = :postId");
$queryPrepare->bindParam(":postId", $postId, PDO::PARAM_STR);

$queryPrepare->execute();
$conn = null;

header("Location: index.php?action=deleted");
