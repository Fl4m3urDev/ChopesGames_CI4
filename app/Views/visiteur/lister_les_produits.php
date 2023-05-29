<?php $session = session(); ?>
<h1 class='titrepage mt-2'><?php echo $TitreDeLaPage ?></h1>
<hr />

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-sm-12">
            <div class="container">
                <div class="row">
                    <?php if ($lesProduits == null) {
                        echo '<h3>Aucun produit correspondant à cette recherche</h3>';
                    } ?>
                    <?php $count = 0;
                    foreach ($lesProduits as $unProduit) {
                        $count++; ?>


                        <div class="col-mb-6 col-sm-3">
                            <div class="d-block position-relative text-center border border-3 rounded">
                                <div class="d-block position-relative bg-white img-responsive">
                                    <a href="<?php echo base_url() . 'Visiteur/voir_un_produit/' . $unProduit["NOPRODUIT"] ?>">
                                        <?php
                                        if (!empty($unProduit["NOMIMAGE"])) echo img_class($unProduit["NOMIMAGE"] . '.jpg', $unProduit["LIBELLE"], 'img-responsive w-100');
                                        else echo img_class('nonimage.jpg', $unProduit["LIBELLE"], 'img-responsive w-100');
                                        ?>
                                    </a>
                                </div>
                                <div class="p-25">
                                    <h3 class="fs-4 fw-light text-capitalize"><a href="<?php echo base_url() . 'Visiteur/voir_un_produit/' . $unProduit["NOPRODUIT"] ?>"><?php echo $unProduit["LIBELLE"] ?></a>
                                        <?php if ($session->get('statut') == 3) { ?>
                                            <a href="<?php echo site_url('AdministrateurSuper/Vitrine/' . $unProduit["NOPRODUIT"]);  ?>"><?php if ($unProduit['VITRINE'] == 1) {
                                                                                                                                                echo "<i class='fas fa-star fav'></i>";
                                                                                                                                            } else {
                                                                                                                                                echo "<i class='far fa-star fav'></i>";
                                                                                                                                            } ?> </a>
                                        <?php } ?>
                                    </h3>
                                    <div class="d-block fs-5 fw-light text-primary">
                                        <?php echo number_format((($unProduit["PRIXHT"]) + ($unProduit["TAUXTVA"])), 2, ",", ' '), '€' ?>
                                    </div>
                                    <?php if ($session->get('statut') == 3) {
                                        if ($unProduit["DISPONIBLE"] == 0) {
                                    ?>
                                            <a class="d-inline-block fs-6 fw-light text-light bg-warning border border-2" href="<?php echo site_url('AdministrateurSuper/rendre_disponible/' . $unProduit["NOPRODUIT"]);  ?>">Rendre disponible</a>
                                        <?php } else { ?>

                                            <a class="d-inline-block fs-6 fw-light text-light bg-danger border border-2" href="<?php echo site_url('AdministrateurSuper/rendre_indisponible/' . $unProduit["NOPRODUIT"]);  ?>">Rendre indisponible</a>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <?php if ($unProduit["DISPONIBLE"] == 0) {
                                            echo 'Rupture de stock..';
                                        } ?><br />
                                        <div class='container'> <a class="d-inline-block fs-6 fw-light text-light bg-success border border-2 rounded border-dark btn <?php if ($unProduit["DISPONIBLE"] == 0) {
                                                                                                                                                                            echo 'd-none';
                                                                                                                                                                        } ?>" href="<?php echo site_url('Visiteur/ajouter_au_panier/' . $unProduit["NOPRODUIT"]);  ?>">Ajouter au panier</a>
                                        </div> <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php if ($count % 4 == 0) {
                            echo '</div><br/><hr/><br/><div class="row">';
                        }
                    } ?>
                </div>

            </div>
            <a class="btn"><?php echo $pager->links() ?></a>
        </div>
    </div>
</div>