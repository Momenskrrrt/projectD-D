let equipment = null;
let classesList = null;
let classSubclasses = null;
let alignmentsList = null;
let languagesList = null;
let proficienciesList = null;
let racesList = null;
let spellsList = null;

async function getEquipment() {
    try {
        const response = await fetch("https://www.dnd5eapi.co/api/2014/equipment", {
            "credentials": "omit",
            "headers": {
                "Accept": "application/json",
            },
            "method": "GET",
            "mode": "cors"
        });
        let txt = await response.text();
        equipment = JSON.parse(txt);

    } catch (error) {
        console.error('Error fetching equipment:', error);
        return null;
    }
}


async function getClassesList() {
    try {
        const response = await fetch("https://www.dnd5eapi.co/api/2014/classes", {
            "credentials": "omit",
            "headers": {
                "Accept": "application/json",
            },
            "method": "GET",
            "mode": "cors"
        });
        let txt = await response.text();
        classesList = JSON.parse(txt);

    } catch (error) {
        console.error('Error fetching classes:', error);
        return null;
    }
}

async function getClassSubclasses(index) {
    try {
        const response = await fetch(`https://www.dnd5eapi.co/api/2014/classes/${index}/subclasses`, {
            "credentials": "omit",
            "headers": {
                "Accept": "application/json",
            },
            "method": "GET",
            "mode": "cors"
        });
        let txt = await response.text();
        classSubclasses = JSON.parse(txt);
    } catch (error) {
        console.error('Error fetching class subclasses:', error);
        return null;
    }
}

async function getLanguagesList() {
    try {
        const response = await fetch("https://www.dnd5eapi.co/api/2014/languages/", {
            "credentials": "omit",
            "headers": {
                "Accept": "application/json",
            },
            "method": "GET",
            "mode": "cors"
        });
        let txt = await response.text();
        languagesList = JSON.parse(txt);
    } catch (error) {
        console.error('Error fetching alignments list:', error);
        return null;
    }
}



async function getAlignmentsList() {
    try {
        const response = await fetch("https://www.dnd5eapi.co/api/2014/alignments/", {
            "credentials": "omit",
            "headers": {
                "Accept": "application/json",
            },
            "method": "GET",
            "mode": "cors"
        });
        let txt = await response.text();
        alignmentsList = JSON.parse(txt);
    } catch (error) {
        console.error('Error fetching alignments list:', error);
        return null;
    }
}

async function getAlignmentByIndex() {
    try {
        const response = await fetch(`https://www.dnd5eapi.co/api/2014/alignments/`, {
            "credentials": "omit",
            "headers": {
                "Accept": "application/json",
            },
            "method": "GET",
            "mode": "cors"
        });
        let txt = await response.text();
        alignmentByIndex = JSON.parse(txt);
    } catch (error) {
        console.error('Error fetching alignment by index:', error);
        return null;
    }
}

async function getProficienciesList() {
    try {
        const response = await fetch("https://www.dnd5eapi.co/api/2014/proficiencies/", {
            "credentials": "omit",
            "headers": {
                "Accept": "application/json",
            },
            "method": "GET",
            "mode": "cors"
        });
        let txt = await response.text();
        proficienciesList = JSON.parse(txt);
    } catch (error) {
        console.error('Error fetching proficiencies list:', error);
        return null;
    }
}

async function getRacesList() {
    try {
        const response = await fetch("https://www.dnd5eapi.co/api/2014/races/", {
            "credentials": "omit",
            "headers": {
                "Accept": "application/json",
            },
            "method": "GET",
            "mode": "cors"
        });
        let txt = await response.text();
        racesList = JSON.parse(txt);
    } catch (error) {
        console.error('Error fetching races list:', error);
        return null;
    }
}

async function getSpellsList() {
    try {
        const response = await fetch("https://www.dnd5eapi.co/api/2014/spells/", {
            "credentials": "omit",
            "headers": {
                "Accept": "application/json",
            },
            "method": "GET",
            "mode": "cors"
        });
        let txt = await response.text();
        spellsList = JSON.parse(txt);
    } catch (error) {
        console.error('Error fetching spells list:', error);
        return null;
    }
}

// Funzione per popolare una select con dati
function populateSelect(selectId, data, textKey = "name", valueKey = "index") {
    const select = document.getElementById(selectId);
    if (!select) {
        console.error(`Select con id ${selectId} non trovata.`);
        return;
    }
    select.innerHTML = "";
    let items = [];
    // 'items' è un array che conterrà gli oggetti da inserire nella select.
    // Viene popolato con i dati passati a populateSelect, che possono essere:
    // - un array di oggetti (già pronto per la select)
    // - un oggetto con proprietà 'results' che è un array di oggetti
    if (Array.isArray(data)) {
        items = data;
    } else if (data && Array.isArray(data.results)) {
        items = data.results;
    } else {
        select.innerHTML = '<option value="">Errore caricamento</option>';
        return;
    }
    select.innerHTML = '<option value="">Seleziona...</option>';
    items.forEach(item => {
        const option = document.createElement("option");
        option.value = item[valueKey];
        option.textContent = item[textKey];
        select.appendChild(option);
    });
}
window._data = {};
// Carica razze usando getRacesList come per getEquipment
window._data["razza"] = getRacesList().then(() => {
    let items = [];
    if (racesList && racesList.results && Array.isArray(racesList.results)) {
        items = racesList.results;
    }
    populateSelect("razza", items);
});

// Carica classi usando getClassesList come per getEquipment
window._data["classe"] = getClassesList().then(() => {
    let items = [];
    if (classesList && classesList.results && Array.isArray(classesList.results)) {
        items = classesList.results;
    }
    populateSelect("classe", items);
});

// Carica allineamenti usando getAlignmentsList come per getEquipment
window._data["allineamento"] = getAlignmentsList().then(() => {
    let items = [];
    if (alignmentsList && alignmentsList.results && Array.isArray(alignmentsList.results)) {
        items = alignmentsList.results;
    }
    // Assicurati di avere una select con id="allineamento" nell'HTML
    populateSelect("allineamento", items);
});
window._data["lingueSelect"] = getLanguagesList().then(() => {
    let items = [];
    if (languagesList && languagesList.results && Array.isArray(languagesList.results)) {
        items = languagesList.results;
    }
    populateSelect("lingueSelect", items);
});

// Carica equipment per tutte le select equipment
window._data["equipment"] = getEquipment().then(() => {
    let items = [];
    if (equipment && equipment.results && Array.isArray(equipment.results)) {
        items = equipment.results;
    }
    for (let i = 1; i <= 8; i++) {
        populateSelect("equipment" + i, items);
    }
});

// Carica incantesimi per tutte le select incantesimo
window._data["incantesimo"] = getSpellsList().then(() => {
    let items = [];
    if (spellsList && spellsList.results && Array.isArray(spellsList.results)) {
        items = spellsList.results;
    }
    for (let i = 1; i <= 4; i++) {
        populateSelect("incantesimo" + i, items);
    }
});




// Carica proficiencies in base alla classe selezionata
/**
 * Al cambio della select "classe", recupera le proficiencies associate alla classe selezionata
 * tramite una chiamata API e popola la select "proficiencies" con i risultati.
 * Se non viene selezionata alcuna classe, mostra un messaggio di selezione.
 * Se la classe non ha proficiencies, mostra un messaggio dedicato.
 */
let element = document.getElementById("classe");
console.log("Select classe:", element); // Debugging
element.addEventListener("change", function () {
    const classIndex = this.value;
    console.log("Classe selezionata:", classIndex); // Debugging
    const profSelect = document.getElementById("proficiencies");
    console.log("Select profSelect:", profSelect); // Debugging
    profSelect.innerHTML = '<option value="">Caricamento...</option>';
    if (!classIndex) {
        profSelect.innerHTML = '<option value="">Seleziona una classe</option>';
        return;
    }
    // Chiamata diretta all'API per la classe selezionata
    fetch(`https://www.dnd5eapi.co/api/2014/classes/${classIndex}`)
        .then(res => res.json())
        .then(data => {
            console.log("Dati ricevuti:", data); // Debugging
            let items = [];
            if (data && Array.isArray(data.proficiencies)) {
                items = data.proficiencies;
            }
            profSelect.innerHTML = "";
            if (items.length === 0) {
                profSelect.innerHTML = '<option value="">Nessuna proficiency</option>';
            } else {
                items.forEach(item => {
                    const option = document.createElement("option");
                    option.value = item.index;
                    option.textContent = item.name;
                    profSelect.appendChild(option);
                });
            }
        })
        .catch(() => {
            profSelect.innerHTML = '<option value="">Errore caricamento</option>';
        });
});


// Carica incantesimi e popola le 4 select
getSpellsList().then(() => {
    let items = [];
    if (spellsList && spellsList.results && Array.isArray(spellsList.results)) {
        items = spellsList.results;
    }
    for (let i = 1; i <= 4; i++) {
        populateSelect("incantesimo" + i, items);
    }
});