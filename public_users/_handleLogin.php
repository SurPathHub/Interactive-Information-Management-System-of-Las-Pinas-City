<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../includes/db.php';
    $username = $_POST["loginusername"];
    $password = $_POST["loginpassword"];

    $sql = "Select * from public_users where username='$username'";
    $result = mysqli_query($connection, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        $row = mysqli_fetch_assoc($result);
        $userId = $row['user_id'];
        if (password_verify($password, $row['user_password'])) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['userId'] = $userId;
            header("location: /interactive-Information-Management-System-of-Las-Pinas-City/index.php?loginsuccess=true");
            exit();
        } else {
            header("location: /interactive-Information-Management-System-of-Las-Pinas-City/index.php?loginsuccess=false");
        }
    } else {
        header("location:/interactive-Information-Management-System-of-Las-Pinas-City/index.php?loginsuccess=false");
    }
}
