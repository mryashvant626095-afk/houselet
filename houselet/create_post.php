<?php
session_start();
include "config/db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $conn->query("INSERT INTO posts (title, content) VALUES ('$title','$content')");
    header("Location: posts.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Post</title>
</head>
<body>

<h2>Add New Post</h2>

<form method="POST">
    Title:<br>
    <input type="text" name="title" required><br><br>
    Content:<br>
    <textarea name="content" required></textarea><br><br>
    <button name="submit">Add Post</button>
</form>

</body>
</html>
