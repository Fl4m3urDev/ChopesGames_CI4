<div>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="col-md-12 container">
                    <br>
                    <h2 class="text-primary"><?php echo $TitreDeLaPage ?></h2>
                    <?php if ($TitreDeLaPage == 'Corriger votre formulaire') echo service('validation')->listErrors();
                    echo form_open_multipart('AdministrateurSuper/ajouter_une_categorie');
                    ?>
                    <br>

                    <label class="text-primary" for="txtLibelle">Nom de la categorie :</label>
                    <input class="form-control" type="input" name="txtLibelle" value="<?php echo set_value('txtLibelle'); ?>" /><br />

                    <input class="btn btn-primary btn-md" type="submit" name="submit" value="Ajouter une categorie" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>