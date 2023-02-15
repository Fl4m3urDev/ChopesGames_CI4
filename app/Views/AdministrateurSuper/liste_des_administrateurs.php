<div>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="col-md-12 container">
                    <br>
                    <h2 class="text-primary"><?php echo $TitreDeLaPage ?></h2>
                    <br>
                    <table class="table table-hover">
                        <?php
                        foreach ($admins as $admin) {
                        ?>
                            <tr class="bg-secondary bg-gradient bg-opacity-25 border border-dark">
                                <td> <?php echo $admin['IDENTIFIANT']; ?></td>
                                <td><a class="text-white" href="<?php echo site_url('AdministrateurSuper/modifier_un_administrateur/'.$admin['IDENTIFIANT'])?>"><button class="btn btn-primary">Modifier</button></a>
                                </td>
                                <td><a class="text-white" href="<?php echo site_url('AdministrateurSuper/supprimer_un_administrateur/'.$admin['IDENTIFIANT'])?>"><button class="btn btn-primary">Supprimer</button></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>