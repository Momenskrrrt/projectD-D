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

// Utilizzo della prepared statement
$stmt = $conn->prepare("SELECT * FROM scheda");
$stmt->execute();
$result = $stmt->get_result();
print_r($_SESSION);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Schede D&D</title>
</head>
<body>
    <h1>Elenco Schede</h1>
    <?php
    if ($result->num_rows > 0) {
        // Output dei dati di ogni riga
        while($row = $result->fetch_assoc()) {
            echo "<h2>" . $row["nomePersonaggio"] . "</h2>";
            echo "<p>Razza: " . $row["razza"] . "</p>";
            echo "<p>Classe: " . $row["classe"] . "</p>";
            echo "<p>Forza: " . $row["Strength"] . "</p>";
            echo "<p>Destrezza: " . $row["Dexterity"] . "</p>";
            echo "<p>Costituzione: " . $row["Constitution"] . "</p>";
            echo "<p>Intelligenza: " . $row["Intelligence"] . "</p>";
            echo "<p>Saggezza: " . $row["Wisdom"] . "</p>";
            echo "<p>Carisma: " . $row["Charisma"] . "</p>";
            echo '<a href="modificaScheda.php?id=' . $row["id"] . '">Modifica Scheda</a>';
            echo '<a href="eliminaScheda.php?id=' . $row["id"] . '">Elimina Scheda</a>';
            echo "<hr>";
        }
    } else {
        echo 'Nessuna scheda trovata. <a href="creaScheda.php">Crea Scheda</a>';
    }

    ?>
    
</body>
</html>