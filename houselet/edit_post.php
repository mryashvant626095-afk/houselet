<?php
include "config/db.php";

$id = $_GET['id'];

if (isset($_POST['update'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $conn->query("UPDATE posts SET title='$title', content='$content' WHERE id=$id");
    header("Location: posts.php");
}

$post = $conn->query("SELECT * FROM posts WHERE id=$id")->fetch_assoc();
?>

<form method="POST">
    Title:<br>
    <input type="text" name="title" value="<?php echo $post['title']; ?>"><br><br>
    Content:<br>
    <textarea name="content"><?php echo $post['content']; ?></textarea><br><br>
    <button name="update">Update</button>
</form>
