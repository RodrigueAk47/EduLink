<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Register EduLink</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
<div class="contain">
    <div class="container">
        <h1>Page d'enregistrement</h1>
        <form action="../Models/Auth/Register.php" method="POST">
            <div class="form-group">
                <label for="username">Nom et Prenoms:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="matricule">Matricule:</label>
                <input type="matricule" id="matricule" name="matricule" required>
            </div>
            <div class="form-group">
                <label for="email">Mail Esatic:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit">Inscrit</button>
            </div>
        </form>
        <div class="typess">Vous avez déjà un compte <a href="login.php">Se connecter</a></div>
    </div>
</div>
</body>
</html>