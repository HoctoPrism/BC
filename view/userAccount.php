<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../perso_style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <title>La Nîmes'alerie</title>
</head>
<body>
    <?php include("header.php")?>
    <section class="container-fluid row row-cols-2">
        <div class="col-2">
            <a href="#"><div>Mes informations</div></a>
            <a href="#"><div>Mes commandes</div></a>
            <a href="#"><div>Mes paniers</div></a>
            <a href="#"><div>Bon d'achat et avoirs</div></a>
            <a href="#"><div>Mes paramètres</div></a>
        </div>
        <h2 class="col">Informations personnelles</h2>
        <div class="col row row-cols-2 d-flex flex-column align-items-center my-5">
            <!-- PREMIERE PARTIE -->
            <div class="col">
                <div class="mb-3">
                    <label for="EmailSignin" class="form-label">Adresse mail</label>
                    <input type="email" class="form-control" id="EmailSignin" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="PasswordSignup" class="form-label">Votre mot de passe</label>
                    <input type="password" class="form-control" id="PasswordSignup">
                </div>
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
            </div>
            <!-- SECONDE PARTIE -->
            <div class="col">
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
            </div>
            <button type="submit" class="btn btn-warning text-white">Envoyer</button>
        </div>
    </section>
    <?php include("footer.php")?>
    <script src="../bootstrap.bundle.min.js"></script>
</body>
</html>