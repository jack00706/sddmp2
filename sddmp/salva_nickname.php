<?php
session_start();

if (!isset($_SESSION['email'])) {
    http_response_code(403);
    echo "Non autorizzato";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['nickname'])) {
    $conn = new mysqli("localhost", "root", "", "sddmp");
    $conn->set_charset("utf8mb4");

    if ($conn->connect_error) {
        http_response_code(500);
        echo "Errore di connessione";
        exit;
    }

    $email_loggato = $_SESSION['email'];
    $nickname = $_POST['nickname'];

    $stmt = $conn->prepare("INSERT INTO nickname (email, nickname) VALUES (?, ?)
                            ON DUPLICATE KEY UPDATE nickname = VALUES(nickname)");
    $stmt->bind_param("ss", $email_loggato, $nickname);

    if ($stmt->execute()) {
        echo "OK";
    } else {
        http_response_code(500);
        echo "Errore nel salvataggio: " . $stmt->error;
    }

    $stmt->close();
} else {
    http_response_code(400);
    echo "Dati mancanti";
}
