<?php
include 'db_connect.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "UPDATE posts SET title = '$title', content = '$content' WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: view_post.php?id=" . $id);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT title, content FROM posts WHERE id = $id";
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
    <title>Edit Post</title>
    <meta charset="utf-8">
</head>
<body class="container">
    <h1>Edit Post</h1>
    <form method="post">
        <label for="title">Title:</label><br>
        <input type="text" name="title" value="<?php echo $row['title']; ?>" required><br><br>
        <label for="content">Content:</label><br>
        <textarea name="content" rows="10" cols="50" required><?php echo $row['content']; ?></textarea><br><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
<?php
} else {
    echo "Post not found.";
}
$conn->close();
?>