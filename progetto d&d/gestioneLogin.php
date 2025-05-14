<?php
if (!isset($_SESSION)) {
    session_start();
    # code...
}
require_once("conn.php");
$user = $_GET["username"];
$pass = $_GET["password"];
$passMD5 = md5($pass);
$sql = "SELECT * FROM utenti WHERE username = ? AND password= ? ";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $user, $passMD5);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    # code...
    echo "username o pass errati";
} else if ($result->num_rows == 1) {
    # code...
    $row = $result->fetch_assoc();
    $_SESSION["loggato"] = true;
    $_SESSION["username"] = $user;
    $_SESSION["password"] = $passMD5;
    $_SESSION["id"] = $row["id"];
    header("Location: home.php");
    exit;

} else {
    echo "Non fare il furbetto!";
}
?>