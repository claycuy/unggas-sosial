<?php
session_start();
$conn = mysqli_connect("unggassosial-database-unggassosial.a.aivencloud.com", "defaultdb", "AVNS_PTIwoksPUfZN6ZmfIxT", "avnadmin");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['password'])) {
        echo "Sign In successful!";
        $_SESSION['username'] = $username;
    } else {
        echo "Invalid password!";
    }
} else {
    echo "User not found!";
}

mysqli_close($conn);
?>
