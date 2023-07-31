<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'inscrire</title>
    <link rel="stylesheet" href="../_css/bootstrap.css">
    <link rel="stylesheet" href="../_css/styleform_1.css">
</head>
<body>
    <?php 
        require_once('../_menu/nav_1.html');
    ?>
    <div align = "center">
    <form method="POST" action="signup_traitement.php">
        <label for="nom">Nom* : </label>
        <input type="text" id="nom" name="nom" placeholder="entrer votre nom." required><br><br>
        <label for="prenom">Prénom : </label>
        <input type="text" id="prenom" name="prenom" placeholder="entrer votre prénom." ><br><br>
        <label for="statut">Statut* :</label><br>
        <input type="radio" id="enseignant" name="statut" value="ensignants">
        <label for="enseignant"> Enseignant</label><br>
        <input type="radio" id="etudiant" name="statut" value="etudiants">
        <label for="etudiant">Etudiant(e)</label><br><br>
        <label for="email">E-mail* : </label>
        <input type="email" id="email" name="email" placeholder="entrer votre mail." required><br><br>
        <label for="pass">Mot de pass* : </label>
        <input type="password" id="pass" name="pass" placeholder="entrer votre mot de passe." required><br><br>
        <input type="submit" value="m'inscrire" name="OK">
    </form>
    </div>
    <script src="../_js/bootstrap.bundle.min.js"></script>
    <script src="../_js/formscript_1"></script>
</body>
</html>