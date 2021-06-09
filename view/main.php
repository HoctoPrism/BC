<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/perso_style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
        <title>La Nîmes'alerie</title>
    </head>
    <body>
      <!-- HEADER -->
      <?php require("inc/header.php");?>
      <!-- BANNIERE -->
      <?php include("inc/slider.php");?>
      <!-- TENDANCES -->
      <section class="container-fluid">
          <h2 class="fw-bold fs-1 text-secondary col-12 text-center my-md-5 my-3">tendances</h2>
          <!-- tendance chat -->
          <?php include("inc/catHighlight.php"); ?>
          <!-- tendance chien -->
          <?php include("inc/dogHighlight.php"); ?>
          <!-- tendance Rongeur -->
          <?php include("inc/rodentHighlight.php"); ?>
          <!-- tendance Oiseau -->
          <?php include("inc/birdHighlight.php"); ?>
        </section>
      <!-- TEMOIGNAGE -->
      <?php include("inc/testimony.php"); ?>
      <!-- DESCRIPTIF DE L'ENTREPRISE -->
      <?php include("inc/company.php"); ?>
      <!-- FOOTER -->
      <?php require("inc/footer.php"); ?>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>