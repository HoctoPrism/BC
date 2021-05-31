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
    <section class="d-flex flex-column align-items-center my-5">
        <h1>Contactez-nous</h1>
        <p>Vous pouvez nous contacter via le formulaire ci dessous.</p>
        <form class="d-flex flex-column">
            <div class="mb-3">
                <label for="NameContact" class="form-label">Votre Nom</label>
                <input type="text" class="form-control w-100 p-2 rounded-2" id="NameContact" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="emailContact" class="form-label">Votre Email</label>
                <input type="email" class="form-control w-100 p-2 rounded-2" id="emailContact">
            </div>
            <div>
                <label for="emailContact" class="form-label">Sujet</label>
                <select name="SujetContact" id="SujetContact" required class="form-select mb-3 w-100 p-2 rounded-2">
                    <option value="Marketing@Nîmesalerie.com">Marketing</option>
                    <option value="Serv.client@Nîmesalerie.com">Service Client</option>
                    <option value="technique@Nîmesalerie.com">Technique</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="messageContact" class="form-label">Votre Message</label>
                <textarea class="form-control" id="messageContact" rows="3" cols="50"></textarea>
            </div>
            <button type="submit" class="btn btn-warning text-white w-50 align-self-center">Envoyer</button>
        </form>
    </section>
    <?php include("footer.php")?>
    <script src="../bootstrap.bundle.min.js"></script>
</body>
</html>