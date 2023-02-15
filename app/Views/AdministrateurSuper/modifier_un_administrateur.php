<div>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="col-md-12 container">
                    <br>
                    <h2 class="text-primary"><?php echo $TitreDeLaPage ?></h2>
                    <?php if ($TitreDeLaPage == 'Corriger votre formulaire') echo service('validation')->listErrors(); ?>
                    <?php echo form_open('AdministrateurSuper/modifier_un_administrateur/'.$admin['IDENTIFIANT']) ?>
                    <br>

                    <label class="text-primary" for="txtIdentifiant">Identifiant :</label>
                    <input class="form-control" type="input" name="txtIdentifiant" value="<?php echo $admin['IDENTIFIANT'] ?>" /><br />

                    <label class="text-primary" for="txtMdp">Mot de passe :</label>
                    <input class="form-control" type="input" id="mdp" onclick="Affichermasquermdp()" name="txtMdp" value="<?php echo set_value('txtMdp'); ?>" /><br />

                    <label class="text-primary" for="txtEmail">Email :</label>
                    <input class="form-control" type="input" name="txtEmail" value="<?php echo $admin['EMAIL'] ?>" /><br />

                    <input class="btn btn-primary btn-md" type="submit" name="submit" value="Modifier" />
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