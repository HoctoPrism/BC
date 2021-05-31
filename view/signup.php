<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../perso_style.css">
    <link rel="stylesheet" href="../https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <title>La Nîmes'alerie</title>
</head>
<body class="text-secondary">
    <?php include("header.php")?>
    <h2 class="mt-5 text-center">Vous inscrire</h2>
    <div class="d-flex flex-column align-items-center my-5">
        <form for="signin" class="d-flex flex-column">
            <div class="d-flex align-items-center justify-content-between my-4 fs-5">
                <a href="signin.php" class="text-warning">Se connecter</a>
                <div>S'inscrire</div>
            </div>
            <div class="mb-3">
                <label for="EmailSignin" class="form-label">Adresse mail</label>
                <input type="email" class="form-control" id="EmailSignin" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="PasswordSignup" class="form-label">Votre mot de passe</label>
                <input type="password" class="form-control" id="PasswordSignup">
            </div>
            <p>Vos informations personnellles : </p>
            <div class="d-flex justify-content-between">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Homme
                    </label>
                    </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Femme
                    </label>
                </div>
            </div>
            <div class="mb-3">
                <label for="firstnameUser" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="firstnameUser">
            </div>
            <div class="mb-3">
                <label for="lastnameUser" class="form-label">Nom</label>
                <input type="text" class="form-control" id="lastnameUser">
            </div>
            <div class="mb-3">
                <label for="birthUser" class="form-label">Date de naissance</label>
                <input type="date" class="form-control" id="birthUser">
            </div>
            <div class="mb-3 ">
                <label for="countrySignup" class="form-label">Pays</label>
                <select class="form-select" aria-label="countrySignup">
                    <option value="France">France</option>
                    <option value="Belgique">Belgique</option>
                    <option value="Suisse">Suisse</option>
                </select>
            </div>
            <button type="submit" class="btn btn-warning text-white">Envoyer</button>
        </form>
    </div>
    <?php include("footer.php")?>
</body>
</html>


