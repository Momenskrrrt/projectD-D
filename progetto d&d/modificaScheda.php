<?php
require_once("conn.php");
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION["loggato"]) && $_SESSION["loggato"] != true) {
    header("Location: index.php");
    exit;
}

$stmt = $conn->prepare("SELECT * FROM scheda WHERE id = ?");
$stmt->bind_param("i", $_GET['id']);
$stmt->execute();
$result = $stmt->get_result();

$stmt2 = $conn->prepare("SELECT * FROM inventario WHERE id_scheda = ?");
$stmt2->bind_param("i", $_GET['id']);
$stmt2->execute();
$result2 = $stmt2->get_result();

$stmt3 = $conn->prepare("SELECT * FROM incantesimi WHERE id_scheda = ?");
$stmt3->bind_param("i", $_GET['id']);
$stmt3->execute();
$result3 = $stmt3->get_result();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifica Scheda</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="gestisciModifiche.php" method="get">
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
        
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
        <select name="lingua" id="lingueSelect">
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

        <input type="submit" value="Modifica Scheda">
    </form>
    
    <?php
    if ($result->num_rows > 0) {
        // Output dei dati di ogni riga
        while ($row = $result->fetch_assoc()) {
            echo "<h2>" . $row["nomePersonaggio"] . "</h2>";
            echo "<p>Razza: " . $row["razza"] . "</p>";
            echo "<p>Classe: " . $row["classe"] . "</p>";
            echo "<p>Forza: " . $row["Strength"] . "</p>";
            echo "<p>Destrezza: " . $row["Dexterity"] . "</p>";
            echo "<p>Costituzione: " . $row["Constitution"] . "</p>";
            echo "<p>Intelligenza: " . $row["Intelligence"] . "</p>";
            echo "<p>Saggezza: " . $row["Wisdom"] . "</p>";
            echo "<p>Carisma: " . $row["Charisma"] . "</p>";
        }
        $result->data_seek(0); // Reset the pointer to the first row
    } else {
        echo 'Nessuna scheda trovata. <a href="creaScheda.php">Crea Scheda</a>';
    }
    
    if ($result2->num_rows > 0) {
        // Output dei dati di ogni riga
        while ($row2 = $result2->fetch_assoc()) {
            echo "<h2>" . $row2["nome"] . "</h2>";
            echo "<p>Quantità: " . $row2["quantita"] . "</p>";
        }
        $result2->data_seek(0); // Reset the pointer to the first row
        echo "<hr>";
    } else {
        echo 'Nessun equipaggiamento trovato.';
    }
    
    if ($result3->num_rows > 0) {
        // Output dei dati di ogni riga
        while ($row3 = $result3->fetch_assoc()) {
            echo "<h2>" . $row3["nome"] . "</h2>";
        }
        $result3->data_seek(0); // Reset the pointer to the first row
        echo "<hr>";
    } else {
        echo 'Nessun incantesimo trovato.';
    }
    ?>
    
    <script src="script.js"></script>
    <script>
        function preselectDropdown(dropdownID, preselectedValue) {
            var selectBoxEl = document.getElementById(dropdownID);
            var arrayOfNodes = selectBoxEl.childNodes;
            for (var i = 0; i < arrayOfNodes.length; i++) {
                console.log(arrayOfNodes[i].value);
                if (arrayOfNodes[i].value === preselectedValue) {
                    arrayOfNodes[i].selected = true
                }
            }
        }

        let tmp = "<?php echo $_GET['id']; ?>";
        console.log(tmp);
        <?php
        $row = $result->fetch_assoc();
        ?>
        let preselectedClass = "<?php echo $row['classe']; ?>";
        let preselectedRace = "<?php echo $row['razza']; ?>";
        let preselectedAlignment = "<?php echo $row['alignment']; ?>";
        let preselectedLanguage = "<?php echo $row['lingua']; ?>";
        let preselectedName = "<?php echo $row['nomePersonaggio']; ?>";
        let preselectedLevel = "<?php echo $row['livello']; ?>";
        let preselectedStrength = "<?php echo $row['Strength']; ?>";
        let preselectedDexterity = "<?php echo $row['Dexterity']; ?>";
        let preselectedConstitution = "<?php echo $row['Constitution']; ?>";
        let preselectedIntelligence = "<?php echo $row['Intelligence']; ?>";
        let preselectedWisdom = "<?php echo $row['Wisdom']; ?>";
        let preselectedCharisma = "<?php echo $row['Charisma']; ?>";
        let equipments = [];
        let incantesimi = [];
        
        <?php
        while ($row2 = $result2->fetch_assoc()) {
            echo "equipments.push({ nome: '" . $row2['nome'] . "', quantita: '" . $row2['quantita'] . "' }); \n";
        }
        while ($row3 = $result3->fetch_assoc()) {
            echo "incantesimi.push({ nome: '" . $row3['nome'] . "' }); \n";
        }
        ?>
        
        window._data["razza"].then(()=>{
            preselectDropdown("razza", preselectedRace);
        });
        window._data["classe"].then(()=>{
            preselectDropdown("classe", preselectedClass);
        });
        window._data["allineamento"].then(()=>{
            preselectDropdown("allineamento", preselectedAlignment);
        });
        window._data["equipment"].then(()=>{
            for (let index = 0; index < equipments.length; index++) {
                const element = equipments[index];
                preselectDropdown("equipment" + (index + 1), element.nome);
                document.getElementById("qnt" + (index + 1)).value = element.quantita;
            }
        });
        
        window._data["lingueSelect"].then(()=>{
            preselectDropdown("lingueSelect", preselectedLanguage);
        });
        document.getElementById("livello").value = preselectedLevel;
        document.getElementById("Nome").value = preselectedName;
        document.getElementById("Strength").value = preselectedStrength;
        document.getElementById("Dexterity").value = preselectedDexterity;
        document.getElementById("Constitution").value = preselectedConstitution;
        document.getElementById("Intelligence").value = preselectedIntelligence;
        document.getElementById("Wisdom").value = preselectedWisdom;
        document.getElementById("Charisma").value = preselectedCharisma;

        window._data["incantesimi"].then(()=>{
            for (let index = 0; index < incantesimi.length; index++) {
                const element = incantesimi[index];
                preselectDropdown("incantesimo" + (index + 1), element.nome);
            }
        });
    </script>
</body>
</html>