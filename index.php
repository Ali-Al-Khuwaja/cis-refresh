<?php
include 'db_connect.php';

$sql = "SELECT id, title, created_at FROM posts ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html  dir="rtl" lang="ar">
<head>
        <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.amber.min.css"
>
    <title>news</title>
    <meta charset="utf-8">
</head>
<body class="container">
    <h1>news</h1>
    <a href="create_post.php">Create New Post</a>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<h3><a href='view_post.php?id=" . $row["id"] . "'>" . $row["title"] . "</a></h3>";
            echo "<p>Created at: " . $row["created_at"] . "</p>";
            echo "</div>";
        }
    } else {
        echo "<p>No posts yet.</p>";
    }
    $conn->close();
    ?>
</body>
</html>