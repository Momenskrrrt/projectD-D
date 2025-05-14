<?php
require_once("conn.php");
if (!isset($_SESSION)) {
    session_start();
    # code...
}
if ($_SESSION["loggato"] != true) {
    header("Location: index.php");
    exit;
}

$sql = "UPDATE `scheda` SET 
`Strength`=" . intval($_GET['Strength']) . ",
`Dexterity`=" . intval($_GET['Dexterity']) . ",
`Constitution`=" . intval($_GET['Constitution']) . ",
`Intelligence`=" . intval($_GET['Intelligence']) . ",
`Wisdom`=" . intval($_GET['Wisdom']) . ",
`Charisma`=" . intval($_GET['Charisma']) . ",
`livello`=" . intval($_GET['livello']) . ",
`nomePersonaggio`='" . $conn->real_escape_string($_GET['Nome']) . "',
`alignment`='" . $conn->real_escape_string($_GET['allineamento']) . "',
`classe`='" . $conn->real_escape_string($_GET['classe']) . "',
`lingua`='" . $conn->real_escape_string($_GET['lingua']) . "',
`razza`='" . $conn->real_escape_string($_GET['razza']) . "' 
WHERE id_utente = " . intval($_SESSION['id']);

$conn->query($sql);
if ($conn->error) {
    header("Location: errore.php?msg=" . urlencode($conn->error));
    exit;
} else {
    header("Location: schede.php?msg=" . urlencode("Scheda aggiornata con successo."));
    exit;
}
?>