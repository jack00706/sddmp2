<?php
session_start(); // Avvia la sessione

// Configurazione del database
$servername = "localhost";
$username = "root";     // Cambia con le tue credenziali
$password = "";         // Cambia con la tua password
$database = "gpoi_db";  // Nome del database

// Connessione al database
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Verifica che la richiesta POST arrivi correttamente
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Per debug, puoi decommentare la riga seguente:
    // echo "Dati ricevuti: " . print_r($_POST, true);

    // Controlla se il modulo di salvataggio è stato inviato
    if (isset($_POST['salva_scheda'])) {
        // Recupera e sanitizza i dati dal form
        $nome = isset($_POST['nome']) ? $conn->real_escape_string($_POST['nome']) : '';
        $classe = isset($_POST['classe']) ? $conn->real_escape_string($_POST['classe']) : '';
        $livello = isset($_POST['livello']) ? $conn->real_escape_string($_POST['livello']) : '';
        $ca = isset($_POST['ca']) ? $conn->real_escape_string($_POST['ca']) : '';
        $percezione = isset($_POST['percezione-passiva']) ? $conn->real_escape_string($_POST['percezione-passiva']) : '';

        // Verifica che tutti i campi siano stati compilati
        if ($nome && $classe && $livello && $ca && $percezione) {
            // Query SQL per salvare i dati nella tabella "personaggi"
            $sql = "INSERT INTO personaggi (nome_personaggio, classe, livello, CA, Percezione) 
                    VALUES ('$nome', '$classe', '$livello', '$ca', '$percezione')";
            
            if ($conn->query($sql) === TRUE) {
                echo "Dati salvati con successo. <a href='SchedaPlayer.html'>Torna alla scheda</a>";
            } else {
                echo "Errore nel salvataggio: " . $conn->error;
            }
        } else {
            echo "Errore: dati mancanti!";
        }
    }
}

$conn->close();
?>
