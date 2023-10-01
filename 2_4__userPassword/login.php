<?php
    if($_POST['user'] == 'admin' && $_POST['password'] == 'password'){
        session_start();
        $_SESSION['user'] = $_POST['user'];
        header('Location: index.php');
    } else {
        echo '<h1>Login Error</h1>';
    }
?>