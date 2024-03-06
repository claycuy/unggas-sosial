<?php
$conn = mysqli_connect("unggassosial-database-unggassosial.a.aivencloud.com", "defaultdb", "AVNS_PTIwoksPUfZN6ZmfIxT", "avnadmin");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

if (mysqli_query($conn, $sql)) {
    echo "Sign Up successful!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
