<?php 
require("../config/config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $check = "SELECT * FROM users WHERE admin_email = '$email'";
    $check_result = mysqli_query($connection, $check);

    if (mysqli_num_rows($check_result) > 0) {
        echo "email already exists"; 
    } else {
        $query = "INSERT INTO users (admin_name, admin_email, admin_password) VALUES ('$name', '$email', '$hashedPassword')";
        $result = mysqli_query($connection, $query);

        if ($result) {
            echo "registered successfully"; 
        } else {
            echo "error"; 
        }
    }

} else {
    echo "error cant connect to database"; 
}
?>
