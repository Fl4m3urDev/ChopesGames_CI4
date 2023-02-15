<div>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="col-md-12 container">
                    <br>
                    <h2 class="text-primary"><?php echo $TitreDeLaPage ?></h2>
                    <?php if ($TitreDeLaPage == 'Corriger votre formulaire') echo service('validation')->listErrors();
                    echo form_open_multipart('AdministrateurSuper/ajouter_une_marque');
                    ?>
                    <br>

                    <label class="text-primary" for="txtMarque">Nom de la marque :</label>
                    <input class="form-control" type="input" name="txtMarque" value="<?php echo set_value('txtMarque'); ?>" /><br />

                    <input class="btn btn-primary btn-md" type="submit" name="submit" value="Ajouter une marque" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>