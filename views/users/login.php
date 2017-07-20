<div id="container2">
    <div id="loginContainer">
        <div>
            <h3>Formularz logowania</h3>
        </div>

        <div>

            <div id="formContainer">
                <form method="post" action="<?php echo ROOT_URL; ?>users/login" id="signInForm">

                    <?php Messages::display(); ?>

                    <div>
                        <input type="text" name="flatNr" id="flat" placeholder="Nr mieszkania"/>
                    </div>

                    <div>
                        <input type="password" name="password" id="pass" placeholder="Hasło"/>
                    </div>

                    <div>
                        <input type="submit" name="submit" value="log in" class="button"/>
                    </div>
                </form>
            </div>

        </div>

    </div>

    <div id="clue"></div>

</div>

<script src="<?php echo ROOT_PATH; ?>assets/js/users/login.js"></script>