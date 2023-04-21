<?php $session = session();
    if ($session->get('statut') == 1) { ?>
<div>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="col-md-12 container">
                    <?php echo form_open('Client/confirmation_supprimer_compte') ?>
                    <br>
                    <h3 class="text-center text-primary"><?php echo $TitreDeLaPage ?></h3>
                    <?php if ($TitreDeLaPage == 'Corriger votre formulaire') {
                        if (service('validation')->hasError('txtEmail') || service('validation')->hasError('txtMdp')) {
                            echo "Identifiants incorrects";
                        }
                    } ?>
                    <p>
                        <?php
                        echo form_label('Adresse Email', 'txtEmail', ['class' => 'text-primary']);
                        echo form_input('txtEmail', set_value("txtEmail"), ['placeholder' => 'Votre Adresse Email', 'class' => 'form-control'], 'email');
                        ?>
                    </p>
                    <p>
                        <?php
                        echo form_label('Mot de passe', 'txtMdp', ['class' => 'text-primary']);
                        echo form_password('txtMdp', set_value("txtMdp"), ['placeholder' => 'Votre Mot de passe', 'class' => 'form-control', 'id' => 'mdp']);
                        $js = 'OnClick="Affichermasquermdp()"';
                        echo form_label('Voir&nbsp', 'voir', ['class' => 'mt-3 text-primary small']);
                        echo form_checkbox('Voir', 'voir', false, $js);
                        ?>
                    </p>
                    <?php
                    echo form_submit('submit', 'Confirmer', ['class' => 'btn btn-primary']);
                    ?>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } else { ?>
    <div class="text-primary right">
        <h1 class="display-4">Désolé vous n'avez pas accès à cette page :/<h1>
    <?php } ?>
</div>
<script language=javascript>
    function Affichermasquermdp() {
        var x = document.getElementById("mdp");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>