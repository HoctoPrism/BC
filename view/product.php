<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" href="../perso_style.css">
        <link rel="stylesheet" href="../https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
        <title>La Nîmes'alerie</title>
    </head>
    <body>
        <!-- HEADER -->
        <?php require("../view/header.php");?>
        <!-- Descriptif rapide -->
        <?php require("../view/quickDescription.php");?>
        <!-- description complète-->
        <?php require("../view/fullDescription.php");?>
      <!-- Avis sur le produit -->
      <section class="container-fluid">
          <div class="row bg-secondary text-white rounded-1 p-lg-5 m-lg-5 p-md-3 m-md-3 p-1 m-0">
            <h3 class="col-12 fw-bold fs-3 text-center mb-md-5 mb-4">Avis sur le produit</h3>
            <div class="col-lg-4 col-12 row">
                <!-- REVIEW ONE -->
                <?php require("../view/productReview.php");?>
            </div>
            <div class="col-lg-4 col-12 row">
                <!-- REVIEW TWO -->
                <?php require("../view/productReview.php");?>
            </div>
            <div class="col-lg-4 col-12 row d-lg-flex d-none">
                <!-- REVIEW THREE -->
                <?php require("../view/productReview.php");?>
            </div>
            <div class="col-12 d-flex align-items-center justify-content-center">
                <button type="button" class="btn btn-light text-secondary px-5 mt-md-5 mt-3">Voir Plus</button>
            </div>
          </div>
      </section>
      <section class="container-fluid text-secondary">
        <h3 class="my-5 fw-bold text-center">Produits similaires</h3>
        <div class="row row-cols-lg-7 justify-content-lg-center flex-nowrap text-secondary perso_overflow mb-5 g-0">
            <div class="col">
              <!-- SIMILAR PRODUCT ONE -->
              <?php require("../view/similarProduct.php");?>
            </div>       
            <div class="col">
              <!-- SIMILAR PRODUCT TWO -->
              <?php require("../view/similarProduct.php");?>
            </div>
            <div class="col">
              <!-- SIMILAR PRODUCT THREE -->
              <?php require("../view/similarProduct.php");?>
            </div>
            <div class="col">
              <!-- SIMILAR PRODUCT FOUR -->
              <?php require("../view/similarProduct.php");?>
            </div>
            <div class="col">
              <!-- SIMILAR PRODUCT FIVE -->
              <?php require("../view/similarProduct.php");?>
            </div>
            <div class="col">
              <!-- SIMILAR PRODUCT SIX -->
              <?php require("../view/similarProduct.php");?>
            </div>
            <div class="col">
              <!-- SIMILAR PRODUCT SEVEN -->
              <?php require("../view/similarProduct.php");?>
            </div>
        </div>
      </section>
      <?php require("../view/footer.php") ?>
    <script src="../bootstrap.bundle.min.js"></script>
</body>
</html>