<?php
// Démarrer la session
session_start();

// Détruire toutes les données de session
$_SESSION = array();

// Si vous voulez détruire complètement la session, effacez également
// le cookie de session.
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finalement, détruire la session
session_destroy();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déconnexion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        
        .logout-container {
            background: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: center;
            max-width: 500px;
        }
        
        h1 {
            color: #28a745;
            margin-bottom: 20px;
        }
        
        .message {
            background-color: #e6ffe6;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
        }
        
        .login-btn {
            display: inline-block;
            padding: 12px 30px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-size: 16px;
        }
        
        .login-btn:hover {
            background-color: #0056b3;
        }
        
        .timer {
            margin-top: 20px;
            color: #666;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="logout-container">
        <h1>✅ Déconnexion réussie</h1>
        
        <div class="message">
            <p>Vous avez été déconnecté avec succès.</p>
            <p>Toutes les données de session ont été effacées.</p>
        </div>
        
        <a href="login.php" class="login-btn">Se reconnecter</a>
        
        <div class="timer">
            <p>Redirection automatique dans <span id="countdown">5</span> secondes...</p>
        </div>
    </div>
    
    <script>
        // Redirection automatique après 5 secondes
        let countdown = 5;
        const countdownElement = document.getElementById('countdown');
        
        const interval = setInterval(() => {
            countdown--;
            countdownElement.textContent = countdown;
            
            if (countdown <= 0) {
                clearInterval(interval);
                window.location.href = 'login.php';
            }
        }, 1000);
    </script>
</body>
</html>