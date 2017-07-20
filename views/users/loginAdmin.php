<div id="container2">
    <div id="loginContainer">
        <div>
            <h3 class="panel-title">Formularz logowania Administratora</h3>
        </div>

        <div id="formContainer">
            <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" id="signInForm">

                <?php Messages::display(); ?>

                <div>
                    <input type="text" name="adminNr" id="login" placeholder="Nr Administratora"/>
                </div>

                <div>
                    <input type="password" name="password" id="haslo" placeholder="Hasło"/>
                </div>

                <div>
                    <input type="submit" name="submit" value="log in" class="button"/>
                </div>

            </form>
        </div>
    </div>

    <div id="clue"></div>

</div>

<script src="<?php echo ROOT_PATH;?>assets/js/users/login.js">
</script>