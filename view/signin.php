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
                <input type="email" class="form-control" id="EmailSignin" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="PasswordSignin" class="form-label">Votre mot de passe</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="keepConnection">
                <label class="form-check-label" for="keepConnection">Rester connecté</label>
            </div>
            <button type="submit" class="btn btn-warning text-white">Envoyer</button>
        </form>
    </div>
    <?php include("footer.php")?>
</body>
</html>


