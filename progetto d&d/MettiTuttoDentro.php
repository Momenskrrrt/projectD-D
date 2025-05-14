<?php
require_once("conn.php");
if (!isset($_SESSION)) {
    session_start();
}

// Recupera i dati dal form GET
$nome = $_GET['Nome'];
$str = $_GET['Strength'];
$dex = $_GET['Dexterity'];
$con = $_GET['Constitution'];
$int = $_GET['Intelligence'];
$wis = $_GET['Wisdom'];
$cha = $_GET['Charisma'];
$razza = $_GET['razza'];
$classe = $_GET['classe'];
$allineamento = $_GET['allineamento'];
$lingua = $_GET['lingua'];
$livello = $_GET['livello'];; // Puoi modificarlo se vuoi gestire il livello
$id_utente = $_SESSION['id'];

// Query di inserimento
$sql = "INSERT INTO `scheda`(
  `id`, 
  `Strength`, 
  `Dexterity`, 
  `Constitution`, 
  `Intelligence`, 
  `Wisdom`, 
  `Charisma`, 
  `id_utente`, 
  `livello`, 
  `nomePersonaggio`, 
  `alignment`, 
  `classe`, 
  `lingua`, 
  `razza`
) 
VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);
";

$stmt = $conn->prepare($sql);
print_r($_GET);
print_r($stmt);
$stmt->bind_param(
    "iiiiiiiisssss",
    $str,
    $dex,
    $con,
    $int,
    $wis,
    $cha,
    $id_utente,
    $livello,
    $nome,
    $allineamento,
    $classe,
    $lingua,
    $razza
);


if ($stmt->execute()) {
    $id_scheda = $conn->insert_id;
    // Inserisci equipment nell'inventario
    for ($i = 1; $i <= 8; $i++) {
        $equip = $_GET["equipment$i"];
        $qnt = $_GET["qnt$i"];
        if ($equip != "") {
            $conn->query("INSERT INTO inventario (nome, tipo, quantita, id_scheda) VALUES ('$equip', '', $qnt, $id_scheda)");
        }
    }
    echo "Scheda inserita con successo!";
    header("Location:home.php");
    exit;
} else {
    echo "Errore nell'inserimento: " . $stmt->error;
}
$stmt->close();
?>
