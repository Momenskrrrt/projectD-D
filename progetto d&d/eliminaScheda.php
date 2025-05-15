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

// Recupera l'ID della scheda da eliminare
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $scheda_id = intval($_GET['id']);

    // Elimina l'inventario associato alla scheda
    $conn->query("DELETE FROM inventario WHERE id_scheda = $scheda_id");
    // Elimina l'inventario associato alla scheda
    $conn->query("DELETE FROM incantesimi WHERE id_scheda = $scheda_id");

    // Elimina la scheda
    $conn->query("DELETE FROM scheda WHERE id = $scheda_id");
    // Reindirizza dopo l'eliminazione
    header("Location: schede.php?eliminato=1");
    exit;
} else {
    // ID non valido o non passato
    header("Location: schede.php?errore=1");
    exit;
}
?>