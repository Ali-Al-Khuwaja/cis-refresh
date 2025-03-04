<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "INSERT INTO posts (title, content) VALUES ('$title', '$content')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.amber.min.css"
>
    <title>Create Post</title>
    <meta charset="utf-8">
</head>
<body class="container">
    <h1>Create New Post</h1>
    <form method="post">
        <label for="title">Title:</label><br>
        <input type="text" name="title" required><br><br>
        <label for="content">Content:</label><br>
        <textarea name="content" rows="10" cols="50" required></textarea><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>