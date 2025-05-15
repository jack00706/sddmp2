<?php
session_start();
?>
<style>

.working-progress {
    background-color: #ffcc00;  /* Colore di sfondo della banda */
    color: #333333;  /* Colore del testo */
    text-align: center;  /* Centra il testo */
    padding: 15px 0;  /* Spazio sopra e sotto il testo */
    font-size: 18px;  /* Dimensione del testo */
    font-weight: bold;  /* Testo in grassetto */
    width: 100%;  /* Larghezza della banda che copre tutta la pagina */
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
  <title>Home</title>
  <link rel="stylesheet" href="styles.css">
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

<section class="showcase">
  <img src="img/Manuals.png" alt="Manual">
  <div class="showcase-text text-light">
    <h2>Scopri Tomi Antichi</h2>
    <p>Accedi a una vasta libreria di manuali e avventure, il tutto a portata di mano!</p>
  </div>
</section>

<section class="showcase">
  <img src="img/dice.png" alt="Dadi">
  <div class="showcase-text text-light">
    <h2>Tira i Dadi</h2>
    <p>Tira i dadi e scopri che destino aspetta i tuoi giocatori!</p>
  </div>
</section>

<section class="showcase">
  <img src="img/Music.jpg" alt="Musica">
  <div class="showcase-text text-light">
    <h2>Arricchisci l'Atmosfera</h2>
    <p>Fai vivere ai tuoi giocatori un’esperienza immersiva grazie alla nostra vasta
    <br>collezione di musiche tematiche!</p>
  </div>
</section>

  <section class="showcase">
  <img src="img/scheda.png" alt="scheda" class="imgscheda">
  <div class="showcase-text text-light">
    <h2>Scheda per il DM</h2>
    <p>Salva i progressi del parti</p>
  </div>
</section>

<div class="working-progress">
        <p>Working in Progress</p>
    </div>

    <section class="showcase">
  <img src="img/mappa.png" alt="Mappa edit" class="imgmap">
  <div class="showcase-text text-light">
    <h2>editor di mappe</h2>
    <p>imergi i giocatori in contri unici
    <br>con mappe inedite da te!</p>
  </div>
</section>

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

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>
</body>
</html>
