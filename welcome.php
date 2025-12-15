<?php
// Démarrer la session
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    // Rediriger vers la page de connexion
    header('Location: login.php');
    exit();
}

$username = $_SESSION['user_id'];
$login_time = $_SESSION['login_time'];
$session_duration = time() - $login_time;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        h1 {
            color: #333;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
        }
        
        .welcome-message {
            background-color: #e6f3ff;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
        }
        
        .info-box {
            background-color: #f9f9f9;
            padding: 15px;
            border-left: 4px solid #28a745;
            margin: 20px 0;
        }
        
        .logout-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #dc3545;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 20px;
        }
        
        .logout-btn:hover {
            background-color: #c82333;
        }
        
        .session-info {
            background-color: #fff3cd;
            padding: 15px;
            border-radius: 4px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bienvenue, <?php echo htmlspecialchars($username); ?> !</h1>
        
        <div class="welcome-message">
            <h2>Vous êtes connecté avec succès.</h2>
            <p>Cette page est protégée et n'est accessible qu'aux utilisateurs authentifiés.</p>
        </div>
        
        <div class="info-box">
            <h3>Informations de session :</h3>
            <p><strong>Utilisateur :</strong> <?php echo htmlspecialchars($username); ?></p>
            <p><strong>Connecté depuis :</strong> <?php echo date('H:i:s', $login_time); ?></p>
            <p><strong>Durée de la session :</strong> <?php echo gmdate("H:i:s", $session_duration); ?></p>
        </div>
        
        <div class="session-info">
            <h3>Fonctionnalités du système :</h3>
            <ul>
                <li>Authentification avec sessions PHP</li>
                <li>Protection des pages sans authentification</li>
                <li>Gestion sécurisée de la déconnexion</li>
                <li>Pas de base de données requise</li>
            </ul>
        </div>
        
        <a href="logout.php" class="logout-btn">Se déconnecter</a>
        
        <p style="margin-top: 30px;">
            <a href="welcome.php">Rafraîchir la page</a>
        </p>
    </div>
</body>
</html>