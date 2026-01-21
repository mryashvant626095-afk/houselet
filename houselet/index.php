<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

include "config/db.php";
?>

<h2>Welcome <?php echo $_SESSION['username']; ?></h2>

<a href="create_post.php">➕ Add Post</a> |
<a href="logout.php">🚪 Logout</a>
