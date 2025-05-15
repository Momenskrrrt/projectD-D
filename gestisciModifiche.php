<?php
require_once("conn.php");
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION["loggato"] != true) {
    header("Location: index.php");
    exit;
}

// Verifica che l'ID della scheda sia stato passato
if (!isset($_GET['id_scheda'])) {
    // Se stai passando l'id nell'URL della form
    $_GET['id_scheda'] = $_GET['id'];
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
WHERE id = " . intval($_GET['id']);

$conn->query($sql);

// Correzione sintassi UPDATE per incantesimi
if ($_GET['incantesimo1'] != "") {
    $sql = "UPDATE `incantesimi` SET `nome`='" . $conn->real_escape_string($_GET['incantesimo1']) . "' WHERE `id_scheda`= " . intval($_GET['id']) . " AND id = 1";
    $conn->query($sql);
}
if ($_GET['incantesimo2'] != "") {
    $sql = "UPDATE `incantesimi` SET `nome`='" . $conn->real_escape_string($_GET['incantesimo2']) . "' WHERE `id_scheda`= " . intval($_GET['id']) . " AND id = 2";
    $conn->query($sql);
}
if ($_GET['incantesimo3'] != "") {
    $sql = "UPDATE `incantesimi` SET `nome`='" . $conn->real_escape_string($_GET['incantesimo3']) . "' WHERE `id_scheda`= " . intval($_GET['id']) . " AND id = 3";
    $conn->query($sql);
}
if ($_GET['incantesimo4'] != "") {
    $sql = "UPDATE `incantesimi` SET `nome`='" . $conn->real_escape_string($_GET['incantesimo4']) . "' WHERE `id_scheda`= " . intval($_GET['id']) . " AND id = 4";
    $conn->query($sql);
}

if ($_GET["equipment1"] != "") {
    $sql = "UPDATE `inventario` SET `nome`='" . $conn->real_escape_string($_GET["equipment1"]) . "',`quantita`=" . intval($_GET["qnt1"]) . " WHERE `id_scheda`= " . intval($_GET['id']) . " AND id = 1";
    $conn->query($sql);
}
if ($_GET["equipment2"] != "") {
    $sql = "UPDATE `inventario` SET `nome`='" . $conn->real_escape_string($_GET["equipment2"]) . "',`quantita`=" . intval($_GET["qnt2"]) . " WHERE `id_scheda`= " . intval($_GET['id']) . " AND id = 2";
    $conn->query($sql);
}
if ($_GET["equipment3"] != "") {
    $sql = "UPDATE `inventario` SET `nome`='" . $conn->real_escape_string($_GET["equipment3"]) . "',`quantita`=" . intval($_GET["qnt3"]) . " WHERE `id_scheda`= " . intval($_GET['id']) . " AND id = 3";
    $conn->query($sql);
}
if ($_GET["equipment4"] != "") {
    $sql = "UPDATE `inventario` SET `nome`='" . $conn->real_escape_string($_GET["equipment4"]) . "',`quantita`=" . intval($_GET["qnt4"]) . " WHERE `id_scheda`= " . intval($_GET['id']) . " AND id = 4";
    $conn->query($sql);
}
if ($_GET["equipment5"] != "") {
    $sql = "UPDATE `inventario` SET `nome`='" . $conn->real_escape_string($_GET["equipment5"]) . "',`quantita`=" . intval($_GET["qnt5"]) . " WHERE `id_scheda`= " . intval($_GET['id']) . " AND id = 5";
    $conn->query($sql);
}
if ($_GET["equipment6"] != "") {
    $sql = "UPDATE `inventario` SET `nome`='" . $conn->real_escape_string($_GET["equipment6"]) . "',`quantita`=" . intval($_GET["qnt6"]) . " WHERE `id_scheda`= " . intval($_GET['id']) . " AND id = 6";
    $conn->query($sql);
}
if ($_GET["equipment7"] != "") {
    $sql = "UPDATE `inventario` SET `nome`='" . $conn->real_escape_string($_GET["equipment7"]) . "',`quantita`=" . intval($_GET["qnt7"]) . " WHERE `id_scheda`= " . intval($_GET['id']) . " AND id = 7";
    $conn->query($sql);
}
if ($_GET["equipment8"] != "") {
    $sql = "UPDATE `inventario` SET `nome`='" . $conn->real_escape_string($_GET["equipment8"]) . "',`quantita`=" . intval($_GET["qnt8"]) . " WHERE `id_scheda`= " . intval($_GET['id']) . " AND id = 8";
    $conn->query($sql);
}

if ($conn->error) {
    echo $conn->error;
    exit;
} else {
    header("Location: schede.php?msg=" . urlencode("Scheda aggiornata con successo."));
    exit;
}
?>