<?php
session_start();

// Connessione al database
$servername = "localhost";
$dbUser = "root";
$dbPassword = "";
$database = "sddmp";

$conn = new mysqli($servername, $dbUser, $dbPassword, $database);
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Verifica che la richiesta sia POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST['email']) ? $conn->real_escape_string(trim($_POST['email'])) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    if ($email && $password) {
        // ✅ Usa nome tabella e campi corretti
        $sql = "SELECT * FROM utenti WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // ✅ Verifica la password
            if (password_verify($password, $user['password'])) {
                $_SESSION['email'] = $user['email'];
                $utente_id = $_SESSION['utente_id'];
                header("Location: index.php?login=success");
                exit;
            } else {
                echo "Password errata. <a href='login.html'>Riprova</a>";
            }
        } else {
            echo "Utente non trovato. <a href='registrati.html'>Registrati Qui</a>";
        }
    } else {
        echo "Compila tutti i campi.";
    }
}

$conn->close();
?>
