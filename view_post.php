<?php
include 'db_connect.php';

$id = $_GET['id'];
$sql = "SELECT title, content, created_at FROM posts WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
            <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.amber.min.css"
>
    <title><?php echo $row['title']; ?></title>
    <meta charset="utf-8">
</head>
<body class="container">
    <h1><?php echo $row['title']; ?></h1>
    <p>Created at: <?php echo $row['created_at']; ?></p>
    <p><?php echo nl2br($row['content']); ?></p>
    <a href="edit_post.php?id=<?php echo $id; ?>">Edit</a> | <a href="delete_post.php?id=<?php echo $id; ?>">Delete</a> | <a href="index.php">Back</a>
</body>
</html>
<?php
} else {
    echo "Post not found.";
}
$conn->close();
?>