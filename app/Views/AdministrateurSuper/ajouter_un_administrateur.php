<div>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="col-md-12 container">
                    <br>
                    <h2 class="text-primary"><?php echo $TitreDeLaPage ?></h2>
                    <?php if ($TitreDeLaPage == 'Corriger votre formulaire') echo service('validation')->listErrors();
                    echo form_open_multipart('AdministrateurSuper/ajouter_un_administrateur');
                    ?>
                    <br>

                    <label class="text-primary" for="txtIdentifiant">Identifiant :</label>
                    <input class="form-control" type="input" name="txtIdentifiant" value="<?php echo set_value('txtIdentifiant'); ?>" /><br />

                    <label class="text-primary" for="txtMdp">Mot de passe :</label>
                    <input class="form-control" type="input" name="txtMdp" value="<?php echo set_value('txtMdp'); ?>" /><br />

                    <label class="text-primary" for="txtEmail">Email :</label>
                    <input class="form-control" type="input" name="txtEmail" value="<?php echo set_value('txtEmail'); ?>" /><br />

                    <input class="btn btn-primary btn-md" type="submit" name="submit" value="Valider" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>