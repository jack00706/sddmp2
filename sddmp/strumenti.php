<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.html");
    exit;
}

?>

<style>

body
{
  color: black !important;
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" 
        href="img/minicona.png" 
        type="image/png" />
    <title>Strumenti</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://unpkg.com/htmx.org@1.9.2"></script>
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

    <!-- Contenuto principale centrato -->
    <div class="page-center">
        <div class="card align-items">
            <h2 class="section-title text-center light-text">Lancia i Dadi!</h2>
            <div class="controls">
                <label for="dice-count" class="light-text">Numero di dadi:</label>
                <input type="number" id="dice-count" class="input" value="1" min="1" max="10" />

                <label for="dice-type" class="light-text">Tipo di dado:</label>
                <select id="dice-type" class="select">
                    <option value="4">D4</option>
                    <option value="6" selected>D6</option>
                    <option value="8">D8</option>
                    <option value="10">D10</option>
                    <option value="12">D12</option>
                    <option value="20">D20</option>
                </select>
            </div>

            <div id="dice-container" class="dice-container"></div>

            <!-- Bottone centrato -->
            <div class="center-button">
                <button onclick="rollDice()" class="btn dice-button shake-on-hover">Lancia</button>
            </div>

            <p id="result" class="result-text text-center light-text">Totale: —</p>
        </div>
    </div>

    <!-- Sezione musica -->
    <div class="music-section">
        <h3 class="light-text">Brani</h3>
        <ul id="playlist">
            <li data-src="audio/Città.mp3">Villaggio</li>
            <li data-src="audio/Taverna.mp3">Taverna</li>
            <li data-src="audio/Foresta.mp3">Foresta</li>
            <li data-src="audio/Caverna.mp3">Caverna</li>
        </ul>
        <audio id="player" controls></audio>
    </div>

    <!-- Script -->
    <script src="script.js"></script>
    <script src="moseca.js"></script>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 SDDMP. Tutti i diritti riservati.</p>
    </footer>
</body>   
</html>

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

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>