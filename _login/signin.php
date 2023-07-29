<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'identifier</title>
    <link rel="stylesheet" href="../_css/bootstrap.css">
</head>
<body>
    <?php 
        require_once('../_menu/nav_1.html');
    ?>
    <form method="POST" action="signin_traitement.php">
        <label for="email">E-mail* : </label>
        <input type="email" id="email" name="email" placeholder="entrer votre mail." required><br><br>
        <label for="pass">Mot de pass* : </label>
        <input type="password" id="pass" name="pass" placeholder="entrer votre mot de passe." required><br><br>
        <input type="submit" value="se connecter" name="OK">
    </form>

    <script src="../_js/bootstrap.bundle.min.js"></script>
</body>
</html>