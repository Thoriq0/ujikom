<?php
$password = "ahmad"; 
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
echo "Password Hash: " . $hashedPassword;