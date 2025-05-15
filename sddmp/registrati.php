<?php
session_start();
$conn = new mysqli("localhost", "root", "", "sddmp");
if ($conn->connect_error) die("Connessione fallita: " . $conn->connect_error);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email    = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (!$email || !$password) {
        echo "Errore: tutti i campi sono obbligatori! <a href='registrati.html'>Riprova</a>";
        exit;
    }

    // ✅ Verifica email unica (tabella corretta: 'utenti')
    $stmt = $conn->prepare("SELECT 1 FROM utenti WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        echo "Errore: email già registrata. <a href='registrati.html'>Riprova</a>";
        exit;
    }
    $stmt->close();

    // ✅ Inserisci con password hashata
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO utenti (email, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $hash);
    if ($stmt->execute()) {
        header("Location: login.html?register=success");
        exit;
    } else {
        echo "Errore durante la registrazione. <a href='registrati.html'>Riprova</a>";
    }
    $stmt->close();
}
$conn->close();
exit;
?>
