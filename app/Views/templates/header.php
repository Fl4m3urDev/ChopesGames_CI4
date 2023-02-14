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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo site_url('Visiteur/accueil') ?>">
                <img class="d-block" style="width:60px;height:38px;'" src="<?php echo base_url() . '/assets/images/logo.jpg' ?>" alt="Logo">
            </a>
            <ul class="d-flex gap-3 navbar-nav">

                <li class="nav-item">
                    <a href="<?php echo site_url('Visiteur/accueil') ?>" class="btn btn-info">
                        <span class="fas fa-home"></span>Accueil
                    </a>
                </li>

                <li class="nav-item">
                    <a class="btn btn-primary" href="<?php echo site_url('Visiteur/lister_les_produits') ?>">Lister tous les Produits</a>
                </li>

            </ul>
        </div>

        <div class="navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <button type="button" class="btn btn-primary dropdown-toggle" role="button" data-bs-toggle="dropdown">
                        Catégories
                    </button>
                    <div class="dropdown-menu">
                        <?php foreach ($categories as $categorie) { ?>
                            <a class="dropdown-item"><?php echo anchor('Visiteur/lister_les_produits_par_categorie/' . $categorie["NOCATEGORIE"], $categorie["LIBELLE"]); ?>
                            <?php } ?></a>
                    </div>
                </li>
            </ul>
        </div>

        <div class="d-flex order-0">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <div class="d-flex w-100">
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




        <div class="navbar-collapse w-100 order-3">
            <ul class="navbar-nav d-flex gap-3">
                <li class="nav-item">
                    <a href="<?php echo site_url('Visiteur/afficher_panier') ?>" class="btn btn-info btn-md">
                        <span class="fas fa-shopping-cart"><?php if ($nb > 0) echo "($nb)" ?></span>
                    </a>
                </li>

                <?php if ($session->get('statut') == 2 or $session->get('statut') == 3) : ?>
                    <li class="nav-item dropdown">
                        <button type="button" class="btn btn-primary dropdown-toggle" role="button" data-bs-toggle="dropdown">
                            Administration
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php echo site_url('AdministrateurEmploye/afficher_les_clients') ?>">Clients->Commandes</a>
                            <a class="dropdown-item" href="">(2Do) Commandes non traitées</a>
                            <?php if ($session->get('statut') == 3) { ?>
                                <a class="dropdown-item" href="<?php echo site_url('AdministrateurSuper/ajouter_un_produit') ?>">Ajouter un produit</a>
                                <a class="dropdown-item" href="<?php echo site_url('AdministrateurSuper/ajouter_une_categorie') ?>">Ajouter une categorie</a>
                                <a class="dropdown-item" href="<?php echo site_url('AdministrateurSuper/modifier_identifiants_bancaires_site') ?>">Modifier identifiants bancaires site</a>
                            <?php } ?>
                        </div>
                    </li>
                <?php endif; ?>


                <li class="nav-item dropdown">
                    <button type="button" class="btn btn-primary dropdown-toggle" role="button" data-bs-toggle="dropdown">
                        Mon compte
                    </button>
                    <div class="dropdown-menu">
                        <?php if (!is_null($session->get('statut'))) { ?>
                            <?php if ($session->get('statut') == 1) { ?>
                                <a class="dropdown-item" href="<?php echo site_url('Client/historique_des_commandes') ?>">Mes commandes</a>
                                <a class="dropdown-item" href="<?php echo site_url('Visiteur/s_enregistrer') ?>">Modifier son compte</a>
                            <?php } elseif ($session->get('statut') == 3) { ?>
                                <a class="dropdown-item" href="?>">(2Do) Modifier son compte</a>
                            <?php } ?>
                            <a class="dropdown-item" href="<?php echo site_url('Client/se_de_connecter') ?>">Se déconnecter</a>
                        <?php } else { ?>
                            <a class="dropdown-item" href="<?php echo site_url('Visiteur/se_connecter') ?>">Se connecter</a>
                            <a class="dropdown-item" href="<?php echo site_url('Visiteur/s_enregistrer') ?>">S'enregister</a>
                        <?php } ?>
                    </div>
                </li>

                <li>
                </li>
                <li>
                </li>
                <?php if (empty($session->get('statut'))) : ?>
                    <li class="nav-item droite">
                        <a href="<?php echo site_url('Visiteur/connexion_administrateur') ?>" class="fas fa-lock"></a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    <main class="bg-light bg-gradient">