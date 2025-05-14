<?php
if (!isset($_SESSION)) {
    session_start();
    # code...
}
    if ($_SESSION["loggato"] == true) {
        # code...
        header("Location: home.php");
        exit;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="script.js"></script>
</head>
<body>
    <H1>BENVENUTO NEL MIO SITO.</H1>
    <p>Per favore accedi per continuare</p>
    
    <form action="gestioneLogin.php" method="get">
        <input type="text" name="username" id="">
        <input type="text" name="password" id="">
        <input type="submit" value="Login">
        <a href="register.php">Registrati</a>
    </form>
</body>
</html>