<?php
  session_start();

  if(!isset($_SESSION['name'])){
    header("Location: login.php");
    exit();
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
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
        <h1>Welcome, <?= $_SESSION['name']; ?></h1>
        <p>Selamat datang di dashboard.</p>
    </div>
</body>
</html>