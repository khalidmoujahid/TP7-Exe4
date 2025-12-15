<?php
// Démarrer la session
session_start();

// Rediriger si déjà connecté
if (isset($_SESSION['user_id'])) {
    header('Location: welcome.php');
    exit();
}

// Identifiants définis dans le code
$utilisateurs = [
    'admin' => 'password123',
    'john' => 'secret456',
    'alice' => 'alice789'
];

$erreur = '';

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    
    // Vérifier les identifiants
    if (empty($username) || empty($password)) {
        $erreur = 'Veuillez remplir tous les champs.';
    } elseif (!isset($utilisateurs[$username])) {
        $erreur = 'Identifiant incorrect.';
    } elseif ($utilisateurs[$username] !== $password) {
        $erreur = 'Mot de passe incorrect.';
    } else {
        // Connexion réussie
        $_SESSION['user_id'] = $username;
        $_SESSION['login_time'] = time();
        
        // Redirection vers la page de bienvenue
        header('Location: welcome.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
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
        
        .login-container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }
        
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }
        
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        
        button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        
        button:hover {
            background-color: #0056b3;
        }
        
        .error {
            background-color: #ffe6e6;
            color: #cc0000;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 15px;
            text-align: center;
        }
        
        .info {
            background-color: #e6f3ff;
            padding: 15px;
            border-radius: 4px;
            margin-top: 20px;
            font-size: 14px;
        }
        
        .info h3 {
            margin-top: 0;
        }
        
        .info ul {
            padding-left: 20px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Connexion</h1>
        
        <?php if ($erreur): ?>
            <div class="error">
                <?php echo htmlspecialchars($erreur); ?>
            </div>
        <?php endif; ?>
        
        <form method="post" action="">
            <div class="form-group">
                <label for="username">Identifiant :</label>
                <input type="text" id="username" name="username" required>
            </div>
            
            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <button type="submit">Se connecter</button>
        </form>
        
        <div class="info">
            <h3>Identifiants de test :</h3>
            <ul>
                <li>admin / password123</li>
                <li>john / secret456</li>
                <li>alice / alice789</li>
            </ul>
        </div>
    </div>
</body>
</html>