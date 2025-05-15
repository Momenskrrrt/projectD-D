<?php
require_once("conn.php");
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION["loggato"]) && $_SESSION["loggato"] == true) {
    header("Location: home.php");
    exit;
}

$errore = "";
if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username == "" || $password == "") {
        $errore = "Tutti i campi sono obbligatori.";
    } else {
        $username = $conn->real_escape_string($username);
        $hash = md5($password);
        $sql = "INSERT INTO utenti (username, password) VALUES ('$username', '$hash')";
        if ($conn->query($sql)) {
            header("Location: index.php?registrato=1");
            exit;
        } else {
            $errore = "Errore nella registrazione: " . $conn->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Registrazione</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Registrazione</h2>
    <?php if ($errore) echo "<p>$errore</p>"; ?>
    <form method="post">
        <label>Username:</label>
        <input type="text" name="username" required><br><br>
        <label>Password:</label>
        <input type="password" name="password" required><br><br>
        <input type="submit" value="Registrati">
    </form>
    <p>Hai già un account? <a href="index.php">Login</a></p>
</body>
</html>
