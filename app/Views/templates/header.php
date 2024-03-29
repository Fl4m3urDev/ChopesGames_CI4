<!DOCTYPE html>
<html>
<?php $session = session();
if ($session->has('cart')) {
    $cart = session('cart');
    $nb = count($cart);
} else $nb = 0; ?>

<head>
    <title>ChopesGames</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() . 'assets/images/favicon.ico' ?>">
    <link rel="alternate" type="application/rss+XML" title="ChopesGames" href="<?php echo site_url('AdministrateurSuper/flux_rss') ?>" />

    <link rel="stylesheet" href="<?php echo css_url('bootstrap.min') ?>">
    <!-- <link rel="stylesheet" href="<?php // echo css_url('style') 
                                        ?>"> -->
    <link rel="stylesheet" href="<?php echo site_url('/assets/css/style.css'); ?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>

<body>
    <nav class="navbar navbar-dark bg-dark col-12" id="nav">
        <div class="justify-content-start d-flex flex-nowrap align-items-center col">
            <a class="navbar-brand justify-content-start pt-2" href="<?php echo site_url('Visiteur/accueil') ?>">
                <img class="d-inline-block ms-2" width=54 height=50 src="<?php echo base_url() . '/assets/images/logo.jpg' ?>" alt="Logo">
            </a>

            <a class="btn btn-primary me-2" href="<?php echo base_url('Visiteur/lister_les_produits') ?>">Notre catalogue</a>
            <div class="dropdown">
                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                    Catégories
                </button>
                <ul class="dropdown-menu">
                    <?php foreach ($categories as $categorie) {
                        $class = 'dropdown-item';
                        $no = $categorie["NOCATEGORIE"];
                        $li = $categorie["LIBELLE"];
                        echo "<li><a class='$class' href='" . base_url("Visiteur/lister_les_produits_par_categorie/$no") . "'>$li</a></li>"; ?><?php } ?>
            </div>

        </div>

        <div class="container-fluid d-inline-flex justify-content-center col">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <form class="d-flex form-inline" method="post" action="<?php echo site_url('Visiteur/lister_les_produits') ?>">
                        <input class="form-control mr-sm-2" type="text" name="search" id='search' placeholder="Search">
                        <button class="btn btn-success" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </li>
            </ul>
        </div>

        <div class="container-fluid justify-content-end col me-4">
            <a href="<?php echo site_url('Visiteur/afficher_panier') ?>" class="btn btn-info btn-md me-2">
                <span class="fas fa-shopping-cart"><?php if ($nb > 0) echo "($nb)" ?></span>
            </a>

            <?php if ($session->get('statut') == 2 or $session->get('statut') == 3) : ?>
                <div class="nav-item dropdown">
                    <button type="button" class="btn btn-primary dropdown-toggle me-2" role="button" data-bs-toggle="dropdown">
                        Administration
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?php echo site_url('AdministrateurEmploye/afficher_les_clients') ?>">Clients->Commandes</a>
                        <a class="dropdown-item" href="<?php echo site_url('AdministrateurEmploye/commande_non_traitees') ?>">Commandes non traitées</a>
                        <?php if ($session->get('statut') == 3) { ?>
                            <a class="dropdown-item" href="<?php echo site_url('AdministrateurSuper/ajouter_un_produit') ?>">Ajouter un produit</a>
                            <a class="dropdown-item" href="<?php echo site_url('AdministrateurSuper/ajouter_une_categorie') ?>">Ajouter une categorie</a>
                            <a class="dropdown-item" href="<?php echo site_url('AdministrateurSuper/ajouter_une_marque') ?>">Ajouter une marque</a>
                            <a class="dropdown-item" href="<?php echo site_url('AdministrateurSuper/ajouter_un_administrateur') ?>">Ajouter un administrateur</a>
                            <a class="dropdown-item" href="<?php echo site_url('AdministrateurSuper/liste_des_administrateurs') ?>">Liste des administrateurs</a>
                            <a class="dropdown-item" href="<?php echo site_url('AdministrateurSuper/modifier_identifiants_bancaires_site') ?>">Modifier identifiants bancaires site</a>
                            <a class="dropdown-item" href="<?php echo site_url('AdministrateurSuper/saisie_lettre_information') ?>">Newsletter</a>
                        <?php } ?>
                    </div>
                </div>
            <?php endif; ?>

            <div class="nav-item dropdown">
                <button type="button" class="btn btn-primary dropdown-toggle me-2" role="button" data-bs-toggle="dropdown">
                    Mon compte
                </button>
                <div class="dropdown-menu">
                    <?php if (!is_null($session->get('statut'))) { ?>
                        <?php if ($session->get('statut') == 1) { ?>
                            <a class="dropdown-item" href="<?php echo site_url('Client/historique_des_commandes') ?>">Mes commandes</a>
                            <a class="dropdown-item" href="<?php echo site_url('Visiteur/s_enregistrer') ?>">Modifier son compte</a>
                        <?php } elseif ($session->get('statut') == 3) { ?>
                            <a class="dropdown-item" href="<?php echo site_url('AdministrateurSuper/modifier_un_administrateur/' . $session->get('identifiant')) ?>">Modifier son compte</a>
                        <?php } ?>
                        <a class="dropdown-item" href="<?php echo site_url('Client/se_de_connecter') ?>">Se déconnecter</a>
                    <?php } else { ?>
                        <a class="dropdown-item" href="<?php echo site_url('Visiteur/se_connecter') ?>">Se connecter</a>
                        <a class="dropdown-item" href="<?php echo site_url('Visiteur/s_enregistrer') ?>">S'enregister</a>
                    <?php } ?>
                </div>
            </div>
            <?php if (empty($session->get('statut'))) : ?>
                <li class="nav-item droite">
                    <a href="<?php echo site_url('Visiteur/connexion_administrateur') ?>" class="fas fa-lock"></a>
                </li>
            <?php endif; ?>
            </ul>
        </div>
    </nav>
    <div id="conteneur_page">
        <main id="enveloppe_contenu">