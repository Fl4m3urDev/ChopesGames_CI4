</main>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark" id="pied_de_page">
    <div class='container-fluid'>

        <div class="col-md-3 col-sm-6">
            <img class="navbar-brand" src="<?php echo base_url() . '/assets/images/logo.jpg' ?>" alt="Logo" id="logo_footer">
            <a href="<?php echo site_url('Visiteur/flux_rss') ?>">
                <img class="navbar-brand" src="<?php echo base_url() . '/assets/images/rss.png' ?>" id="logo_rss">
            </a>
            <BR>
            <p class="text-light">© Louis Baye, 2023 - D. Boucard and co</p>
        </div>
        <div class="col-md-3 col-sm-6">
            <h4 class="text-light">Nous contacter</h4>
            <a href='https://www.google.fr/maps/place/Lyc%C3%A9e+Rabelais/@48.5042205,-2.7503218,17z/data=!4m13!1m7!3m6!1s0x480e1d185a2011d3:0xca3c59f0bff91073!2s8+Rue+Rabelais,+22000+Saint-Brieuc!3b1!8m2!3d48.5042205!4d-2.7481331!3m4!1s0x480e1d18e9d8109d:0x739b07353bbf2d23!8m2!3d48.5042841!4d-2.7468056'><i class="fas fa-map-marker-alt"></i> 8 Rue Rabelais, 22000 Saint-Brieuc</a>
            <br>
            <a href='mailto:master@chopesgames.com'><i class="fas fa-envelope"></i> master@chopesgames.com</a>
            <br>
            <a href="#"><i class="fas fa-phone"></i> 02 96 00 00 00</a><br />
        </div>
        <div class="col-md-3 col-sm-6">
            <h4 class="text-light">Nous suivre</h4>
            <a href="https://www.facebook.com/ChopesGamesShop"><i class="fab fa-facebook-square"></i> Facebook</a>
            <br>
            <a href="https://www.twitter.com/ChopesGamesShop"><i class="fab fa-twitter-square"></i> Twitter</a>
            <br>
            <a href="https://www.Instagram.com/ChopesGamesShop"><i class="fab fa-instagram"></i> Instagram</a><br />
        </div>

        <div class="col-md-3 col-sm-6">
            <h4 class="text-light">Lettre d’information</h4>
            <p class="text-light">Abonnez vous à notre lettre d'information pour ne rater aucune nouveauté</p>
            <?php echo form_open('Visiteur/abonne') ?>
            <div class="d-flex flex-row">
                <input class="form-control" type="input" name="txtEmail" value="<?php echo set_value('txtEmail') ?>" />
                <button class="btn btn-primary" type="submit" name="submit">
                    <i class="bi bi-envelope-fill"></i>
                </button>
            </div>
            <?php echo form_close() ?>
        </div>
</nav>
</div>
</body>

<script src="<?php echo js_url('bootstrap.bundle.min') ?>"></script>

</html>