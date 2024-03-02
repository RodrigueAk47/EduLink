<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Login EduLink</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
<div class="contain">
    <div class="container">
        <h1>Portail Connect</h1>
        <form action="../Models/Auth/login.php" method="POST">
            <div class="form-group">
                <label for="email">Mail Esatic:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit">Connect</button>
            </div>

        </form>
        <div class="typess">Vous n'avez pas de compte ? <a href="register.php">S'inscrire</a></div>
    </div>

</div>
</body>
</html>