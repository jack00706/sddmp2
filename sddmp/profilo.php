<?php
session_start();

if (!isset($_SESSION['email'])) {
    echo "Devi essere loggato per vedere il profilo. <a href='login.html'>Login</a>";
    exit;
}

$conn = new mysqli("localhost", "root", "", "sddmp");
$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

$email_loggato = $_SESSION['email'];

$stmt = $conn->prepare("SELECT u.email, n.nickname 
                        FROM utenti u
                        LEFT JOIN nickname n ON u.email = n.email
                        WHERE u.email = ?");
$stmt->bind_param("s", $email_loggato);
$stmt->execute();
$result = $stmt->get_result();
$profilo = $result->fetch_assoc();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" 
        href="img/minicona.png" 
        type="image/png" />
  <title>Profilo</title>
  <link rel="stylesheet" href="styles.css">
  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&display=swap" rel="stylesheet">
  <style>
    .card {
      max-width: 600px;
      width: 90%;
      margin: 0 auto;
      padding: 20px;
      background-color: #1a1a1a;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.3);
      color: #fff;
    }
    .img-rotonda {
      width: 140px;
      height: 140px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid #e46d6b;
      box-shadow: 0 4px 8px rgba(0,0,0,0.5);
    }
    .profilo-container {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-top: 40px;
    }
    .nickname-form {
      margin-top: 20px;
      text-align: center;
    }
    .nickname-form input {
      padding: 8px;
      border-radius: 6px;
      border: 1px solid #ccc;
      font-size: 16px;
    }
    .nickname-form button {
      padding: 8px 16px;
      margin-left: 10px;
      background-color: #000;
      color: #fff;
      border-radius: 6px;
      border: none;
      cursor: pointer;
    }
    .nickname-form button:hover {
      background-color: #333;
    }

    .logo img {
  width: 40px;
  height: auto;
  display: block;
  margin-right: 15px;
}
  </style>
</head>
<body>
<header>
  <div class="header-top">

  <div class="logo">
      <a href="index.php">
        <img src="img/icona.png" alt="Logo sito">
      </a>
    </div>  
    <h1 class="site-title">Sito Del Dungeon Master Pigro</h1>
  </div>
     <nav class="main-nav">
            <a href="index.php">Home Page</a>
          </nav>
</header>

  <main style="flex: 1;">
    <div class="profilo-container card">
      <img src="img/avatar.png" alt="Avatar utente" class="img-rotonda">

      <div class="info">
        <p><strong>Nickname:</strong> <span id="nickname_display"><?= htmlspecialchars($profilo['nickname'] ?? 'Non impostato') ?></span></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($profilo['email']) ?></p>
      </div>  

      <form id="nicknameForm" class="nickname-form">
          <label for="nickname">Modifica il tuo nickname:</label><br>
          <input type="text" name="nickname" id="nickname" value="<?= htmlspecialchars($profilo['nickname'] ?? '') ?>" required>
          <button type="submit">Salva</button>
      </form>
      <p id="feedback" style="color: lime; display: none;">Nickname aggiornato!</p>
    </div>
  </main>

  <footer>
    <p>&copy; 2025 SDDMP. Tutti i diritti riservati.</p>
  </footer>

  <script>
    document.getElementById('nicknameForm').addEventListener('submit', function(e) {
        e.preventDefault();

        var nickname = document.getElementById('nickname').value;
        var feedback = document.getElementById('feedback');

        fetch('salva_nickname.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'nickname=' + encodeURIComponent(nickname)
        })
        .then(response => response.text())
        .then(data => {
            if (data === 'OK') {
                document.getElementById('nickname_display').textContent = nickname;
                feedback.style.display = 'block';
            } else {
                feedback.style.color = 'red';
                feedback.textContent = 'Errore: ' + data;
                feedback.style.display = 'block';
            }
        });
    });
  </script>
</body>
</html>
