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

// Correzione sintassi UPDATE per incantesimi
if ($_GET['incantesimo1'] != "") {
    $sql = "UPDATE `incantesimi` SET `nome`='" . $conn->real_escape_string($_GET['incantesimo1']) . "' WHERE `id_scheda`= " . intval($_GET['id_scheda']);
    $conn->query($sql);
    # code...
}
if ($_GET['incantesimo2'] != "") {
    $sql = "UPDATE `incantesimi` SET `nome`='" . $conn->real_escape_string($_GET['incantesimo1']) . "' WHERE `id_scheda`= " . intval($_GET['id_scheda']);
    $conn->query($sql);
    # code...
}
if ($_GET['incantesimo3'] != "") {
    $sql = "UPDATE `incantesimi` SET `nome`='" . $conn->real_escape_string($_GET['incantesimo1']) . "' WHERE `id_scheda`= " . intval($_GET['id_scheda']);
    $conn->query($sql);
    # code...
}
if ($_GET['incantesimo4'] != "") {
    $sql = "UPDATE `incantesimi` SET `nome`='" . $conn->real_escape_string($_GET['incantesimo1']) . "' WHERE `id_scheda`= " . intval($_GET['id_scheda']);
    $conn->query($sql);
    # code...
}

if ($_GET["equipment1"] != "") {
    "UPDATE `inventario` SET `nome`='" . $_GET["equipment1"] . "',`quantita`='" . $_GET["qnt1"] . "' WHERE `id_scheda`= " . intval($_GET['id_scheda']);
    # code...
    $conn->query($sql);
}
if ($_GET["equipment2"] != "") {
    "UPDATE `inventario` SET `nome`='" . $_GET["equipment2"] . "',`quantita`='" . $_GET["qnt2"] . "' WHERE `id_scheda`= " . intval($_GET['id_scheda']);
    # code...
    $conn->query($sql);
}
if ($_GET["equipment3"] != "") {
    "UPDATE `inventario` SET `nome`='" . $_GET["equipment3"] . "',`quantita`='" . $_GET["qnt3"] . "' WHERE `id_scheda`= " . intval($_GET['id_scheda']);
    # code...
    $conn->query($sql);
}
if ($_GET["equipment4"] != "") {
    "UPDATE `inventario` SET `nome`='" . $_GET["equipment4"] . "',`quantita`='" . $_GET["qnt4"] . "' WHERE `id_scheda`= " . intval($_GET['id_scheda']);
    # code...
    $conn->query($sql);
}
if ($_GET["equipment5"] != "") {
    "UPDATE `inventario` SET `nome`='" . $_GET["equipment5"] . "',`quantita`='" . $_GET["qnt5"] . "' WHERE `id_scheda`= " . intval($_GET['id_scheda']);
    # code...
    $conn->query($sql);
}
if ($_GET["equipment6"] != "") {
    "UPDATE `inventario` SET `nome`='" . $_GET["equipment6"] . "',`quantita`='" . $_GET["qnt6"] . "' WHERE `id_scheda`= " . intval($_GET['id_scheda']);
    # code...
    $conn->query($sql);
}
if ($_GET["equipment7"] != "") {
    "UPDATE `inventario` SET `nome`='" . $_GET["equipment7"] . "',`quantita`='" . $_GET["qnt7"] . "' WHERE `id_scheda`= " . intval($_GET['id_scheda']);
    # code...
    $conn->query($sql);
}
if ($_GET["equipment8"] != "") {
    "UPDATE `inventario` SET `nome`='" . $_GET["equipment8"] . "',`quantita`='" . $_GET["qnt8"] . "' WHERE `id_scheda`= " . intval($_GET['id_scheda']);
    # code...
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