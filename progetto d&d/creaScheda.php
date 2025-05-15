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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="MettiTuttoDentro.php" method="get">
        <label for="razza">Razza:</label>
        <select name="razza" id="razza" required>
            <option value="">Caricamento...</option>
        </select><br><br>

        <label for="classe">Classe:</label>
        <select name="classe" id="classe" required>
            <option value="">Caricamento...</option>
        </select><br><br>

        <label for="allineamento">Allineamento:</label>
        <select name="allineamento" id="allineamento" required>
            <option value="">Caricamento...</option>
        </select><br><br>

        <label for="proficiencies">Proficiencies:</label>
        <select name="proficiencies" id="proficiencies" multiple required>
            <option value="">Seleziona una classe</option>
        </select><br><br>

        <label for="lingue">Lingue:</label>
        <select id="lingueSelect">
            <option value="">Caricamento...</option>
        </select>
        <br><br>

        <label for="incantesimo1">Incantesimo 1:</label>
        <select name="incantesimo1" id="incantesimo1" required>
            <option value="">Caricamento...</option>
        </select><br><br>
        <label for="incantesimo2">Incantesimo 2:</label>
        <select name="incantesimo2" id="incantesimo2" required>
            <option value="">Caricamento...</option>
        </select><br><br>
        <label for="incantesimo3">Incantesimo 3:</label>
        <select name="incantesimo3" id="incantesimo3" required>
            <option value="">Caricamento...</option>
        </select><br><br>
        <label for="incantesimo4">Incantesimo 4:</label>
        <select name="incantesimo4" id="incantesimo4" required>
            <option value="">Caricamento...</option>
        </select><br><br>

        <!-- Equipment selects -->
        <label>Equipment 1:</label>
        <select name="equipment1" id="equipment1" required>
            <option value="">Caricamento...</option>
        </select>
        <label>Quantità equipment1:</label>
        <input type="number" name="qnt1" id="qnt1" min="1" value="1">
        <br><br>

        <label>Equipment 2:</label>
        <select name="equipment2" id="equipment2" required>
            <option value="">Caricamento...</option>
        </select>
        <label>Quantità equipment2:</label>
        <input type="number" name="qnt2" id="qnt2" min="1" value="1">
        <br><br>

        <label>Equipment 3:</label>
        <select name="equipment3" id="equipment3" required>
            <option value="">Caricamento...</option>
        </select>
        <label>Quantità equipment3:</label>
        <input type="number" name="qnt3" id="qnt3" min="1" value="1">
        <br><br>

        <label>Equipment 4:</label>
        <select name="equipment4" id="equipment4" required>
            <option value="">Caricamento...</option>
        </select>
        <label>Quantità equipment4:</label>
        <input type="number" name="qnt4" id="qnt4" min="1" value="1">
        <br><br>
        
        <label>Equipment 5:</label>
        <select name="equipment5" id="equipment5" required>
            <option value="">Caricamento...</option>
        </select>
        <label>Quantità equipment5:</label>
        <input type="number" name="qnt5" id="qnt5" min="1" value="1">
        <br><br>

        <label>Equipment 6:</label>
        <select name="equipment6" id="equipment6" required>
            <option value="">Caricamento...</option>
        </select>
        <label>Quantità equipment6:</label>
        <input type="number" name="qnt6" id="qnt6" min="1" value="1">
        <br><br>

        <label>Equipment 7:</label>
        <select name="equipment7" id="equipment7" required>
            <option value="">Caricamento...</option>
        </select>
        <label>Quantità equipment7:</label>
        <input type="number" name="qnt7" id="qnt7" min="1" value="1">
        <br><br>
        <label>Equipment 8:</label>
        <select name="equipment8" id="equipment8" required>
            <option value="">Caricamento...</option>
        </select>
        <label>Quantità equipment8:</label>
        <input type="number" name="qnt8" id="qnt8" min="1" value="1">
        <br><br>

        <label for="Nome">Nome:</label>
        <input type="text" name="Nome" id="Nome" required><br><br>

        <label for="Strength">Forza:</label>
        <input type="number" name="Strength" id="Strength" required min="1" max="20" value="1"><br><br>

        <label for="Dexterity">Destrezza:</label>
        <input type="number" name="Dexterity" id="Dexterity" required min="1" max="20" value="1"><br><br>

        <label for="Constitution">Costituzione:</label>
        <input type="number" name="Constitution" id="Constitution" required min="1" max="20" value="1"><br><br>

        <label for="Intelligence">Intelligenza:</label>
        <input type="number" name="Intelligence" id="Intelligence" required min="1" max="20" value="1"><br><br>

        <label for="Wisdom">Saggezza:</label>
        <input type="number" name="Wisdom" id="Wisdom" required min="1" max="20" value="1"><br><br>

        <label for="Charisma">Carisma:</label>
        <input type="number" name="Charisma" id="Charisma" required min="1" max="20" value="1"><br><br>

        <label>Livello</label>
        <input type="number" name="livello" id="livello" min="1" value="1">
        <br><br>

        <input type="submit" value="Crea Scheda">
    </form>
    <script src="script.js"></script>   
</body>

</html>