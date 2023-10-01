<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Site</title>
</head>
<body>
    <h1>Main Page</h1>
        <!-- Se utiliza $_SESSION en lugar de
        $_COOKIE Por razones de seguridad. -->
    <?php if(isset($_SESSION['admin'])) { ?>
        <p>Welome <?php echo $_SESSION['admin'] ?> </p>
        <a href="close.php">Log Out</a>
    <?php } else { ?>
        <p>Login Successfull</p>
        <a href="start.php">Logout</a>
    <?php } ?>
</body>
</html>