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
      <!-- HEADER -->
      <?php require("header.php");?>
      <!-- BANNIERE -->
      <?php include("slider.php");?>
      <!-- TENDANCES -->
      <section class="container-fluid">
          <h2 class="fw-bold fs-1 text-secondary col-12 text-center my-md-5 my-3">tendances</h2>
          <!-- tendance chat -->
          <?php include("catHighlight.php"); ?>
          <!-- tendance chien -->
          <?php include("dogHighlight.php"); ?>
          <!-- tendance Rongeur -->
          <?php include("rodentHighlight.php"); ?>
          <!-- tendance Oiseau -->
          <?php include("birdHighlight.php"); ?>
        </section>
      <!-- TEMOIGNAGE -->
      <?php include("testimony.php"); ?>
      <!-- DESCRIPTIF DE L'ENTREPRISE -->
      <?php include("company.php"); ?>
      <!-- FOOTER -->
      <?php require("footer.php"); ?>
    <script src="../bootstrap.bundle.min.js"></script>
</body>
</html>