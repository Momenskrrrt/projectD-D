<?php
require_once("conn.php");
if (!isset($_SESSION)) {
    session_start();
    # code...
}
if ($_SESSION["loggato"] != true) {
    # code...
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Benvenuto <?php echo $_SESSION["username"]; ?></h1>
    <p>Sei loggato</p>
    <a href="logout.php">Logout</a>
    <a href="schede.php">Guarda schede</a>
    <a href="creaScheda.php">Crea Scheda</a>
</body>
</html>