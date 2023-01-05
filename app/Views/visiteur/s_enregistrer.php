<div>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="col-md-12 container">
                    <?php echo form_open('Visiteur/s_enregistrer') ?>
                    <br>
                    <h3 class="text-center text-primary"><?php echo $TitreDeLaPage ?></h3>
                    <?PHP if ($TitreDeLaPage == 'Corriger votre formulaire') echo service('validation')->listErrors();
                    if (!isset($txtNom)) $txtNom = '';
                    if (!isset($txtPrenom)) $txtPrenom = '';
                    if (!isset($txtAdresse)) $txtAdresse = '';
                    if (!isset($txtVille)) $txtVille = '';
                    if (!isset($txtCP)) $txtCP = '';
                    if (!isset($txtEmail)) $txtEmail = ''; ?>
                    <p>
                        <?php
                        echo form_label('Nom', 'txtNom', ['class' => 'text-primary']);
                        echo form_input('txtNom', set_value("txtNom"), ['placeholder' => 'Votre Nom', 'class' => 'form-control'], 'text');
                        ?>
                    </p>
                    <p>
                        <?php
                        echo form_label('Prenom', 'txtPrenom', ['class' => 'text-primary']);
                        echo form_input('txtPrenom', set_value("txtPrenom"), ['placeholder' => 'Votre Prenom', 'class' => 'form-control'], 'text');
                        ?>
                    </p>
                    <p>
                        <?php
                        echo form_label('Adresse', 'txtAdresse', ['class' => 'text-primary']);
                        echo form_input('txtAdresse', set_value("txtAdresse"), ['placeholder' => 'Votre Adresse', 'class' => 'form-control'], 'text');
                        ?>
                    </p>
                    <p>
                        <?php
                        echo form_label('Ville', 'txtVille', ['class' => 'text-primary']);
                        echo form_input('txtVille', set_value("txtVille"), ['placeholder' => 'Votre Ville', 'class' => 'form-control'], 'text');
                        ?>
                    </p>
                    <p>
                        <?php
                        echo form_label('Code Postal', 'txtCP', ['class' => 'text-primary']);
                        echo form_input('txtCP', set_value("txtCP"), ['placeholder' => 'Votre Code Postal', 'class' => 'form-control'], 'text');
                        ?>
                    </p>
                    <p>
                        <?php
                        echo form_label('Adresse Email', 'txtEmail', ['class' => 'text-primary']);
                        echo form_input('txtEmail', set_value("txtEmail"), ['placeholder' => 'Votre Adresse Email', 'class' => 'form-control'], 'email');
                        ?>
                    </p>
                    <p>
                        <?php
                        echo form_label('Mot de passe', 'txtMdp', ['class' => 'text-primary']);
                        echo form_password('txtMdp', set_value('txtMdp'), ['placeholder' => 'Votre Mot de passe', 'class' => 'form-control', 'id' => 'mdp'], 'password');
                        // echo form_label('Voir&nbsp', 'voir', ['class' => 'mt-3 text-primary small']);
                        // echo form_checkbox('Voir&nbsp', 'voir', false, 'onclick="Affichermasquermdp()"');
                        ?>
                    </p>
                    <p>
                        <?php
                        echo form_label('Confimation du mot de passe', 'txtConfirmMdp', ['class' => 'text-primary']);
                        echo form_password('txtConfirmMdp', set_value('txtConfirmMdp'), ['placeholder' => 'Confimation de votre Mot de passe', 'class' => 'form-control', 'id' => 'mdp'], 'password');
                        // echo form_label('Voir&nbsp', 'voir', ['class' => 'mt-3 text-primary small']);
                        // echo form_checkbox('Voir&nbsp', 'voir', false, 'onclick="Affichermasquermdp()"')
                        ?>
                    </p>
                    <?php echo csrf_field();
                    echo form_submit('submit', 'Valider', ['class' => 'btn btn-primary']);
                    ?>
                    <div class="text-primary right">
                        <a class="btn btn-primary" href="<?php echo site_url('Visiteur/se_connecter') ?>">Se connecter</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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