<?php
  session_start();

  if(!isset($_SESSION['name'])){
    header("Location: login.php");
    exit();
  }

  include "connection.php"; // Pastikan file ini ada untuk koneksi database

  // Ambil semua data dari tabel posts
  $queryGetAll = "SELECT * FROM kasir";
  $result = mysqli_query($conn, $queryGetAll);

  // Hapus post
  if(isset($_POST['delete'])){
      $id = $_POST['id'];
      $deleteQuery = "DELETE FROM order WHERE id = $id";
      $runQuery = mysqli_query($conn, $deleteQuery);
      
      if($runQuery){
          echo "<script>alert('Post berhasil dihapus!'); window.location.href='view.php';</script>";
      } else {
          echo "<script>alert('Gagal menghapus post.')</script>";
      }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Posts</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f0a500;
            color: white;
        }
        button {
            background-color: red;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
        button:hover {
            background-color: darkred;
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
        <h1>List of Posts</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['title'] ?></td>
                    <td><?= substr($row['content'], 0, 50) ?>...</td>
                    <td><?= $row['created_at'] ?></td>
                    <td>
                        <form method="POST" action="update.php">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <button type="submit" name="edit">Edit</button>
                        </form>
                        <form method="POST" onsubmit="return confirm('Yakin ingin menghapus post ini?')">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <button type="submit" name="delete">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>

</body>
</html>
