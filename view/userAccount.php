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
        <div class="col-2 p-3">
            <a href="#"><div class="text-secondary fs-5 p-1">Mes informations</div></a>
            <a href="#"><div class="text-secondary fs-5 p-1">Mes commandes</div></a>
            <a href="#"><div class="text-secondary fs-5 p-1">Mes paniers</div></a>
            <a href="#"><div class="text-secondary fs-5 p-1">Bon d'achat et avoirs</div></a>
            <a href="#"><div class="text-secondary fs-5 p-1">Mes paramètres</div></a>
        </div>
        <div class="col-10 row">
            <?php  /* include("userAccountInfo.php"); */  ?>
            <div class="text-secondary text-center my-5">
                <h2 class="fs-1">Commande en cours</h2>
                <div class="fs-2">0</div>
            </div>
            <div class="text-secondary">
                <h2 class="fs-1 text-center mb-5">Historique des commandes</h2>
                <!-- PREMIER ITEM -->
                <div>
                    <div class="d-flex row text-center p-3">
                        <div class="col-1">#1</div>
                        <div class="col-3">N°ME8846A</div>
                        <div class="col-3">197€80 TTC</div>
                        <div class="col-3">Expédiée le 13/02/2017</div>
                        <div class="accordion accordion-flush col-2" id="accordionFlush1">
                            <h2 class="accordion-header d-flex justify-content-between align-items-center" id="flush-headingOne">
                                <button class="btn collapsed p-0 perso_accordion_b_produit text-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    Détails
                                </button>
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#505160" class="bi bi-caret-down" viewBox="0 0 16 16">
                                    <path d="M3.204 5h9.592L8 10.481 3.204 5zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659z"/>
                                </svg>
                            </h2>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#flush-headingOne">
                            <div class="accordion-body">
                                <div class="my-2">Mode de paiement : <strong>Carte bancaire</strong></div>
                                <div class="my-2">Mode de livraison : <strong>Livraison Chronopost Express (13h)</strong></div>
                                <div class="d-flex row align-items-center justify-content-center border-top">
                                    <div class="col-7"><img src="../img/croquette_chat.png" alt="croquette de chat"></div>
                                    <div class="col-2 text-end">x1</div>
                                    <div class="col-3 text-end">59€90</div>
                                </div>
                                <div class="d-flex row align-items-center justify-content-center border-top">
                                    <div class="col-7"><img src="../img/croquette_chien.png" alt="croquette de chien"></div>
                                    <div class="col-2 text-end">x1</div>
                                    <div class="col-3 text-end">119€90</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8"></div>
                                <div class="col-4">
                                    <div class="d-flex justify-content-between my-1 p-2">
                                        <div>Frais de port</div>
                                        <div>17€99</div>
                                    </div>
                                    <div class="d-flex justify-content-between my-1 bg-warning p-2 text-white fw-bold">
                                        <div>Total de la commande</div>
                                        <div>197€80</div>
                                    </div>
                                    <div class="text-end"><a href="#" class="text-secondary">Télécharger la facture</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- DEUXIEME ITEM -->
                <div>
                    <div class="d-flex row text-center p-3">
                        <div class="col-1">#2</div>
                        <div class="col-3">N°ME826MA</div>
                        <div class="col-3">102€89 TTC</div>
                        <div class="col-3">Expédiée le 21/01/2017</div>
                        <div class="accordion accordion-flush col-2" id="accordionFlush2">
                            <h2 class="accordion-header d-flex justify-content-center align-items-center" id="flush-headingOne">
                                <button class="btn collapsed p-0 perso_accordion_b_produit text-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    Détails
                                </button>
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#505160" class="bi bi-caret-down" viewBox="0 0 16 16">
                                    <path d="M3.204 5h9.592L8 10.481 3.204 5zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659z"/>
                                </svg>
                            </h2>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#flush-headingTwo">
                            <div class="accordion-body">
                                <div class="my-2">Mode de paiement : <strong>Carte bancaire</strong></div>
                                <div class="my-2">Mode de livraison : <strong>Livraison Colissimo</strong></div>
                                <div class="d-flex row align-items-center justify-content-center border-top">
                                    <div class="col-7"><img src="../img/croquette_chat.png" alt="croquette de chat"></div>
                                    <div class="col-2 text-end">x1</div>
                                    <div class="col-3 text-end">99€90</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8"></div>
                                <div class="col-4">
                                    <div class="d-flex justify-content-between my-1 p-2">
                                        <div>Frais de port</div>
                                        <div>2€99</div>
                                    </div>
                                    <div class="d-flex justify-content-between my-1 bg-warning p-2 text-white fw-bold">
                                        <div>Total de la commande</div>
                                        <div>102€89</div>
                                    </div>
                                    <div class="text-end"><a href="#" class="text-secondary">Télécharger la facture</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include("footer.php")?>
    <script src="../bootstrap.bundle.min.js"></script>
</body>
</html>