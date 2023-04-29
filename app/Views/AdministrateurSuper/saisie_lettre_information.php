<div>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="col-md-12 container">
                    <br>
                    <h2 class="text-primary"><?php echo $TitreDeLaPage ?></h2>
                    <?php if ($TitreDeLaPage == 'Corriger votre formulaire') echo service('validation')->listErrors();
                    echo form_open('AdministrateurSuper/saisie_lettre_information')
                    ?>
                    <br>

                    <label class="text-primary" for="txtObjet">Objet : </label>
                    <input class="form-control" type="input" name="txtObjet" value="<?php echo set_value('txtObjet'); ?>" /><br />

                    <label class="text-primary" for="txtTitre">Titre : </label>
                    <input class="form-control" type="input" name="txtTitre" value="<?php echo set_value('txtTitre'); ?>" /><br />

                    <label class="text-primary" for="txtMessage">Message : </label>
                    <textarea class="form-control" id="formControlTextarea" rows="10" name="txtMessage" value="<?php echo set_value('txtMessage'); ?>"></textarea><br />

                    <input class="btn btn-primary btn-md" type="submit" name="submit" value="Envoyer" />

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>