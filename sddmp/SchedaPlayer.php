<?php
session_start();

// Verifica sessione utente tramite email
if (!isset($_SESSION['email'])) {
    header("Location: login.html");
    exit;
}

$email = $_SESSION['email'];

// Connessione al database
$mysqli = new mysqli("localhost", "root", "", "sddmp");
$mysqli->set_charset("utf8mb4");

if ($mysqli->connect_error) {
    die("Connessione fallita: " . $mysqli->connect_error);
}

// Salvataggio scheda
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['salva_scheda'])) {
    $nome = trim($_POST['nome']);
    $classe = trim($_POST['classe']);
    $livello = intval($_POST['livello']);
    $ca = intval($_POST['ca']);
    $percezione = intval($_POST['percezione_passiva']);

    if ($stmt = $mysqli->prepare("INSERT INTO schede_personaggio (email, nome, classe, livello, ca, percezione_passiva) VALUES (?, ?, ?, ?, ?, ?)")) {
        $stmt->bind_param("sssiii", $email, $nome, $classe, $livello, $ca, $percezione);

        if ($stmt->execute()) {
            header("Location: SchedaPlayer.php?msg=saved");
            exit;
        } else {
            $error_msg = "Errore nel salvataggio della scheda: " . $stmt->error;
        }

        $stmt->close();
    }
}

// Eliminazione scheda
if (isset($_GET['elimina'])) {
    $scheda_id = intval($_GET['elimina']);

    if ($stmt = $mysqli->prepare("DELETE FROM schede_personaggio WHERE id = ? AND email = ?")) {
        $stmt->bind_param("is", $scheda_id, $email);
        $stmt->execute();
        $stmt->close();
    }

    header("Location: SchedaPlayer.php?msg=deleted");
    exit;
}

// Recupero schede
$schede = [];
if ($stmt = $mysqli->prepare("SELECT * FROM schede_personaggio WHERE email = ?")) {
    $stmt->bind_param( "s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $schede[] = $row;
    }

    $stmt->close();
}

?>

<style>

/* Generale */
body {
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
}

main {
    max-width: 1000px;
    margin: 0 auto;
    padding: 20px;
}

/* Form scheda */
.card {
    background-color: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    padding: 25px;
    margin-bottom: 30px;
    max-width: 700px;
    margin-left: auto;
    margin-right: auto;
}

.card form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.card input, .card button {
    padding: 12px;
    font-size: 1.1rem;
}

.card button {
    background-color: #333;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.card button:hover {
    background-color: #555;
}

/* Scheda personaggio */
.scheda-personaggio {
    background-color: #fff;
    border: 2px solid #444;
    border-radius: 15px;
    box-shadow: 0 8px 16px rgba(0,0,0,0.1);
    padding: 25px;
    margin: 25px 0;
    font-size: 1.3rem;
    line-height: 1.6;
    max-width: 750px;
    margin-left: auto;
    margin-right: auto;
}

.scheda-personaggio strong {
    font-size: 1.7rem;
}

    .logo img {
  width: 40px;
  height: auto;
  display: block;
  margin-right: 15px;
}
</style>


<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" 
        href="img/minicona.png" 
        type="image/png" />
  <title>schede</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&display=swap" rel="stylesheet">

</head>
<body>
<header>
  <div class="header-top">

          <div class="logo">
      <a href="index.php">
        <img src="img/icona.png" alt="Logo sito">
      </a>
    </div>

    <?php if (isset($_SESSION['email'])): ?>
      <div class="user-dropdown">
        <button class="user-icon" id="userMenuToggle">
          <i class="fas fa-user"></i>
        </button>
        <div class="dropdown-menu" id="userMenu">
          <a href="profilo.php">Profilo</a>
          <a href="logout.php">Logout</a>
        </div>
      </div>
    <?php else: ?>
      <a href="login.html" class="auth-btn">
        <i class="fas fa-sign-in-alt"></i>
      </a>
    <?php endif; ?>
    
    <h1 class="site-title">Sito Del Dungeon Master Pigro</h1>
  </div>
     <nav class="main-nav">
            <a href="index.php">Home Page</a>
            <a href="strumenti.php">Dadi e Musica</a>
            <a href="SchedaPlayer.php">Schede</a>
            <a href="lib.php">Libreria</a>
            <a href="contact.php">Info e Contatti</a>
          </nav>
</header>

<main>
    <div class="card light-text" style="max-width: 600px; margin: 20px auto;">

        <form action="SchedaPlayer.php" method="POST">
            <h2>Nuova Scheda</h2>
            <label>Nome: <input type="text" name="nome" required></label><br>
            <label>Classe: <input type="text" name="classe" required></label><br>
            <label>Livello: <input type="number" name="livello" min="1" max="20" required></label><br>
            <label>CA: <input type="number" name="ca" min="1" max="25" required></label><br>
            <label>Percezione Passiva: <input type="number" name="percezione_passiva" min="5" max="42" required></label><br>
            <input type="hidden" name="salva_scheda" value="1">
            <button type="submit">Salva</button>
        </form>
    </div>

    <?php
    // Messaggi di conferma
    if (isset($_GET['msg'])) {
        $msg = $_GET['msg'];
        if ($msg === 'saved') {
            echo "<p style='color: green;'>Scheda salvata con successo!</p>";
        } elseif ($msg === 'deleted') {
            echo "<p style='color: red;'>Scheda eliminata con successo!</p>";
        }
    }

    if (!empty($error_msg)) {
        echo "<p style='color: red;'>" . htmlspecialchars($error_msg) . "</p>";
    }
    ?>

    <h2 class="text-light">Le tue schede</h2>

    <?php if (empty($schede)): ?>
        <p class="text-light">Non hai ancora nessuna scheda salvata.</p>
    <?php else: ?>
        <?php foreach ($schede as $scheda): ?>
              <div class="scheda-personaggio">
                <strong><?= htmlspecialchars($scheda['nome']) ?> (<?= htmlspecialchars($scheda['classe']) ?>)</strong><br>
                Livello: <?= intval($scheda['livello']) ?><br> - CA: <?= intval($scheda['ca']) ?><br> - Percezione: <?= intval($scheda['percezione_passiva']) ?><br>
                <a href="SchedaPlayer.php?elimina=<?= intval($scheda['id']) ?>" onclick="return confirm('Vuoi davvero eliminare questa scheda?')">🗑️ Elimina</a>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</main>

<footer>
  <p>&copy; 2025 SDDMP. Tutti i diritti riservati.</p>
</footer>

<script>
  const params = new URLSearchParams(window.location.search);
  if (params.get("login") === "success") alert("✅ Login effettuato con successo!");
  if (params.get("register") === "success") alert("✅ Registrazione completata con successo!");
  if (params.get("login") || params.get("register")) {
    history.replaceState({}, document.title, window.location.pathname);
  }

  // Toggle user menu
  const toggle = document.getElementById('userMenuToggle');
  const menu = document.getElementById('userMenu');

  document.addEventListener('click', function (event) {
    if (toggle && menu) {
      if (toggle.contains(event.target)) {
        menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
      } else if (!menu.contains(event.target)) {
        menu.style.display = 'none';
      }
    }
  });
</script>
</body>
</html>
