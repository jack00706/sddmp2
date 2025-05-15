<?php
session_start();
if (!isset($_SESSION['user'])) {
    echo '
    <div class="auth-overlay">
        <div class="auth-box">
            <h2>Accedi</h2>
            <form hx-post="login.php" hx-target="#auth-message" hx-swap="innerHTML">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Accedi</button>
            </form>
            <p id="auth-message"></p>
        </div>
    </div>';
} else {
    echo ''; // Se autenticato, non mostra nulla
}
?>
