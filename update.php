<?php
    session_start();

    if (!isset($_SESSION['name'])) {
        header("Location: login.php");
        exit();
    }

    include "connection.php"; // Koneksi database

    // Cek apakah parameter ID ada
    if (!isset($_POST['id'])) {
        header("Location: view.php");
        exit();
    }

    $id = $_POST['id'];

    // Ambil data berdasarkan ID
    $queryGetPost = "SELECT * FROM kasir WHERE id = $id";
    $result = mysqli_query($conn, $queryGetPost);
    $post = mysqli_fetch_assoc($result);

    // Jika tombol update ditekan
    if (isset($_POST['update'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];

        $updateQuery = "UPDATE posts SET title = '$title', content = '$content' WHERE id = $id";
        $runQuery = mysqli_query($conn, $updateQuery);

        if ($runQuery) {
            echo "<script>alert('Post berhasil diperbarui!'); window.location.href='view.php';</script>";
        } else {
            echo "<script>alert('Gagal memperbarui post.')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Post</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
        }
        nav {
            background-color: #333;
            padding: 10px 20px;
        }
        nav ul {
            list-style: none;
            display: flex;
            align-items: center;
        }
        nav ul li {
            margin-right: 20px;
        }
        nav ul li a {
            text-decoration: none;
            color: white;
            font-size: 16px;
        }
        nav ul li a:hover {
            color: #f0a500;
        }
        .container {
            margin: 20px;
            padding: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            max-width: 400px;
        }
        label {
            font-weight: bold;
            margin-top: 10px;
        }
        input, textarea {
            padding: 10px;
            margin-top: 5px;
            width: 100%;
        }
        button {
            margin-top: 20px;
            padding: 10px;
            background-color: green;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: darkgreen;
        }
    </style>
</head>
<body>

    <nav>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="create.php">Create</a></li>
            <li><a href="view.php">View Posts</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <div class="container">
        <h1>Update Post</h1>
        <form method="POST">
            <input type="hidden" name="id" value="<?= $post['id'] ?>">
            
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="<?= $post['title'] ?>" required>

            <label for="content">Content</label>
            <textarea name="content" id="content" rows="5" required><?= $post['content'] ?></textarea>

            <button type="submit" name="update">Update Post</button>
        </form>
    </div>

</body>
</html>
