<?php
    session_start();
    if (!isset($_SESSION['email'])) 
    {
        header("Location: login.html");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <link rel="icon" 
        href="img/minicona.png" 
        type="image/png" />
    <title>Libreria</title>
    <style>
        .library {
            display: grid;
            grid-template-columns: repeat(2, 1fr); /* Due libri per riga */
            gap: 40px;
            max-width: 800px;
            margin: auto;
        }
        .book {
            width: 300px;
            height: 450px;
            perspective: 1200px;
            margin: auto;
        }
        .book-inner {
            position: relative;
            width: 100%;
            height: 100%;
            transition: transform 0.8s;
            transform-style: preserve-3d;
        }
        .book:hover .book-inner {
            transform: rotateY(180deg);
        }
        .book-front, .book-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 6px 12px rgba(0,0,0,0.5);
        }
        .book-front img, .book-back img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .book-back {
            transform: rotateY(180deg);
            background-color: #1a252f;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2em;
            font-weight: bold;
            color: #ecf0f1;
        }

        
        .logo img {
        width: 40px;
        height: auto;
        display: block;
        margin-right: 15px;
        }
    </style>
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

    <div class="library">
        <div class="book">
            <a href="libro1.html" target="_blank">
                <div class="book-inner">
                    <div class="book-front">
                        <img src="img/Book1.jpg" alt="Player's Handbook">
                    </div>
                    <div class="book-back">
                        <span>Sfoglia</span>
                    </div>
                </div>
            </a>
        </div>

        <div class="book">
            <a href="libro2.html" target="_blank">
                <div class="book-inner">
                    <div class="book-front">
                        <img src="img/Book2.jpg" alt="Dungeon Master's Guide">
                    </div>
                    <div class="book-back">
                        <span>Sfoglia</span>
                    </div>
                </div>
            </a>
        </div>

        <div class="book">
            <a href="libro3.html" target="_blank">
                <div class="book-inner">
                    <div class="book-front">
                        <img src="img/Book3.jpg" alt="Monster Manual">
                    </div>
                    <div class="book-back">
                        <span>Sfoglia</span>
                    </div>
                </div>
            </a>
        </div>

        <div class="book">
            <a href="libro4.html" target="_blank">
                <div class="book-inner">
                    <div class="book-front">
                        <img src="img/Book4.jpg" alt="Curse of Strahd">
                    </div>
                    <div class="book-back">
                        <span>Sfoglia</span>
                    </div>
                </div>
            </a>
        </div>
    </div>

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
