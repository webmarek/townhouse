<!DOCTYPE HTML>
<html lang="pl" xmlns="http://www.w3.org/1999/html">
<head>

    <meta charset="utf-8"/>
    <title>KamienicaMVC</title>

    <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/jquery-ui.min.css">
    <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/style.css">


    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>-->
    <script
        src="https://code.jquery.com/jquery-2.1.4.min.js"
        integrity="sha256-8WqyJLuWKRBVhxXIL1jBDD7SDxU936oZkCnxQbWwJVw="
        crossorigin="anonymous"></script>
    <script src="<?php echo ROOT_PATH; ?>assets/js/jquery-ui.min.js"></script>
    <script src="<?php echo ROOT_PATH; ?>assets/js/mainJs.js"></script>

    <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/style2.css">

</head>

<body>

<div id="mainContainer">

    <div class="shadow">
        <img src="<?php echo ROOT_PATH; ?>/assets/img/flamenco.jpg"/>
    </div>

    <div id="header">


        <div class="headerDiv">
            <a href="<?php echo ROOT_URL ?>" class="button">Kamienica</a>
        </div>

        <?php if (isset($_SESSION['is_logged_in'])) : ?>

            <div class="headerDiv">
                Witaj, Mieszkańcu lokalu nr <?php echo $_SESSION['user_data']['user']; ?>
            </div>

            <div class="headerDiv">
                <a href="<?php echo ROOT_URL; ?>users/logout" class="button">Wyloguj</a>
            </div>

            <div style="clear:both"></div>




        <?php elseif (isset($_SESSION['is_logged_in_admin'])) : ?>

            <div class="headerDiv">
                <div id="adminNr">Witaj, Administratorze nr <?php echo $_SESSION['user_data']['user']; ?></div>
                <a href="<?php echo ROOT_URL; ?>admins" class="button">panel administratora</a>
            </div>

            <div class="headerDiv">
                <a href="<?php echo ROOT_URL; ?>users/logout" class="button" >Wyloguj</a>
            </div>

        <?php else : ?>

            <div class="headerDiv">_</div>

            <div class="headerDiv">
                <a href="<?php echo ROOT_URL; ?>users/login" class="button" id="signIn">Zaloguj</a>
            </div>

        <?php endif; ?>

    </div>



    <div class="container">

        <?php /*Messages::display(); */?>
        <?php require($view); ?>

    </div><!-- /.container -->

    <div id="footer">
        2017 &copy; Marek Kamiński <a href="mailto:marekkaminski26@gmail.com" class="button">kontakt</a>

    </div>

</div>

</body>


</html>
