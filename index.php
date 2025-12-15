<?php
// Rediriger vers la page appropriée
session_start();

if (isset($_SESSION['user_id'])) {
    // Si connecté, rediriger vers welcome.php
    header('Location: welcome.php');
} else {
    // Sinon, rediriger vers login.php
    header('Location: login.php');
}
exit();