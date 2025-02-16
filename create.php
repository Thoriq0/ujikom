<?php
  session_start();

  if(!isset($_SESSION['name'])){
    header("Location: login.php");
    exit();
  }

  include "connection.php"; // Pastikan file ini ada untuk koneksi database

  if(isset($_POST['submit'])){
      $title = $_POST['title'];
      $content = $_POST['content'];

      $insertQuery = "INSERT INTO posts (title, content) VALUES ('$title', '$content')";
      $query = mysqli_query($conn, $insertQuery);

      if($query){
          echo "<script>alert('Post berhasil dibuat!'); window.location.href='dashboard.php';</script>";
      } else {
          echo "<script>alert('Gagal membuat post.')</script>";
      }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
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
            max-width: 500px;
            margin-top: 20px;
        }
        input, textarea, button {
            display: block;
            width: 100%;
            margin-bottom: 10px;
            padding: 8px;
        }
    </style>
</head>
<body>

    <nav>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="create.php">Create</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <div class="container">
        <h1>Create a New Post</h1>
        <form method="POST">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" required>

            <label for="content">Content:</label>
            <textarea name="content" id="content" rows="5" required></textarea>

            <button type="submit" name="submit">Create Post</button>
        </form>
    </div>

</body>
</html>
