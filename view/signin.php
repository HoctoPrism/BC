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
    <h2 class="mt-5 text-center">Vous connecter</h2>
    <div class="d-flex flex-column align-items-center my-5">
        <form for="signin" class="d-flex flex-column">
            <div class="d-flex align-items-center justify-content-between my-4 fs-5">
                <div>Se connecter</div>
                <a href="signup.php" class="text-warning">S'inscrire</a>
            </div>
            <div class="mb-3">
                <label for="EmailSignin" class="form-label">Adresse mail</label>
                <input type="email" class="form-control" id="EmailSignin" name="EmailSignin" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="PasswordSignin" class="form-label">Votre mot de passe</label>
                <input type="password" class="form-control" id="PasswordSignin" name="PasswordSignin">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="keepConnection">
                <label class="form-check-label" for="keepConnection" name="keepConnection">Rester connecté</label>
            </div>
            <div class="mb-2"><a href="#forgotPassword" class="text-secondary" data-bs-toggle="modal" data-bs-target="#forgotPassword">Mot de passe oublié ?</a></div>
            <button type="submit" class="btn btn-warning text-white">Envoyer</button>
        </form>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="forgotPassword" tabindex="-1" aria-labelledby="forgotPasswordLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="forgotPasswordLabel">Réinitialisation du mot de passe</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="EmailReset" class="form-label">Adresse mail</label>
                    <input type="email" class="form-control" id="EmailReset" name="EmailReset" aria-describedby="emailHelp">
                </div>
                <p>Saisissez l'adresse email que vous avez utilisée pour créer votre compte client afin de recevoir un lien de réinitialisation de mot de passe.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>
    <?php include("footer.php")?>
    <script src="../bootstrap.bundle.min.js"></script>
</body>
</html>


