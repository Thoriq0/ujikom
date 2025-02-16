<?php
    session_start();
    include "connection.php";

    $errorMessage = "";

    if (isset($_POST['submit'])) {
        $name = mysqli_real_escape_string($conn, $_POST['nama']);
        $password = $_POST['password'];

        $sql = "SELECT * FROM kasir WHERE nama = '$name'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            // Verifikasi password
            if (password_verify($password, $row['password'])) {
                $_SESSION['name'] = $row['nama'];
                header("Location: dashboard.php");
                exit();
            } else {
                $errorMessage = "Password salah!";
            }
        } else {
            $errorMessage = "User tidak ditemukan!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Kasir</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
            width: 300px;
            text-align: center;
        }
        h1 {
            margin-bottom: 15px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Login Kasir</h1>
        <form method="post">
            <input type="text" name="nama" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="submit">Masuk</button>
        </form>
        <?php if ($errorMessage) : ?>
            <p class="error"><?= $errorMessage ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
