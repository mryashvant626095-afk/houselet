<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

include "config/db.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Posts</title>
</head>
<body>

<h2>All Posts</h2>

<a href="create_post.php">➕ Add New Post</a> |
<a href="logout.php">🚪 Logout</a>

<hr>

<?php
$result = $conn->query("SELECT * FROM posts ORDER BY id DESC");

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<h3>".$row['title']."</h3>";
        echo "<p>".$row['content']."</p>";
        echo "<a href='edit_post.php?id=".$row['id']."'>✏️ Edit</a> | ";
        echo "<a href='delete_post.php?id=".$row['id']."' onclick=\"return confirm('Delete this post?')\">❌ Delete</a>";
        echo "<hr>";
    }
} else {
    echo "No posts found.";
}
?>

</body>
</html>
