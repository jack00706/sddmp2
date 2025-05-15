<?php
session_start();
?>

<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" 
        href="img/minicona.png" 
        type="image/png" />
  <title>Chi Siamo?</title>
  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">


  <style>
 
    .contact-item {
      margin-bottom: 20px;
    }
    .contact-icon {
      width: 40px;
      vertical-align: middle;
      margin-right: 10px;
    }

    .paddingbotom{ padding-bottom: 5%;}

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
  <!-- Main content -->
  <main>
    <div class="page-container">
      
      <!-- Sezione Chi siamo -->
      <div class="page-title card paddingbotom">
        <h2>Chi siamo?</h2>
      
        <h3 class="light-text">
          Un’app pensata per semplificare il lavoro del Dungeon Master e arricchire l’esperienza di gioco.<br>
          Offre strumenti pratici come consigli per il DM, colonne sonore tematiche e immagini per illustrare luoghi e personaggi.<br>
          Include anche generatori di incontri casuali, tracciamento in tempo reale di punti ferita e incantesimi,<br>
          e una gestione facile delle schede personaggio per i giocatori.<br>
          Questa app rende la gestione delle sessioni più semplice e veloce, migliorando l’immersione e il coinvolgimento di tutti,<br>
          per un’esperienza di gioco più fluida e memorabile.
        </h3>
      </div >

      <div class="page-title card ">
        <h2>Contatti</h2>
        <div class="contact-info align-items" >
          <div class="contact-item">
            <img src="img/Telefono.png" alt="Telefono" class="contact-icon">
            <span class="light-text">+39 123 456 789</span>
          </div>
          <div class="contact-item ">
            <img src="img/email.png" alt="Email" class="contact-icon">
            <span class="light-text">sddmpdnd@gmail.com</span>
          </div>
        
       <!-- From Uiverse.io by Medisetti-Venkata-Saikiran --> 
<div class="social-login-icons paddingbotom">
  <div class="socialcontainer">
    <div class="social-icon-1">
      <svg
        viewBox="0 0 512 512"
        height="1.7em"
        xmlns="http://www.w3.org/2000/svg"
        class="svgIcontwit"
        fill="white"
      >
        <path
          d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"
        ></path>
      </svg>
    </div>
    <div class="social-icon-1">
      <svg
        viewBox="0 0 512 512"
        height="1.7em"
        xmlns="http://www.w3.org/2000/svg"
        class="svgIcontwit"
        fill="white"
      >
        <path
          d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"
        ></path>
      </svg>
    </div>
  </div>
  <div class="socialcontainer">
    <div class="social-icon-2">
      <svg
        fill="white"
        class="svgIcon"
        viewBox="0 0 448 512"
        height="1.5em"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"
        ></path>
      </svg>
    </div>
    <div class="social-icon-2">
      <svg
        fill="white"
        class="svgIcon"
        viewBox="0 0 448 512"
        height="1.5em"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"
        ></path>
      </svg>
    </div>
  </div>
  <div class="socialcontainer">
    <div class="social-icon-3">
      <svg
        viewBox="0 0 384 512"
        fill="white"
        height="1.6em"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z"
        ></path>
      </svg>
    </div>
    <div class="social-icon-3">
      <svg
        viewBox="0 0 384 512"
        fill="white"
        height="1.6em"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z"
        ></path>
      </svg>
    </div>
    </div>
  </div>
  </div>
</div>

  </main>

  <!-- Footer -->
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>
