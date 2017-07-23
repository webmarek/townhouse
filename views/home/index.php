<?php
if (isset($_SESSION['is_logged_in'])) {
    header("location: " . ROOT_URL . "flats");
}
?>


<script src="<?php echo ROOT_PATH; ?>assets/js/home/index.js"></script>

<div id="container2">

    <h3>Witamy w serwisie lokatorów kamienicy czynszowej</h3>

    <div id="shadow2">
        <div id="slider">
            <ul class="slides">
                <li class="slide slide1"><img src="<?php echo ROOT_PATH; ?>assets/img/home/1.jpg"></li>
                <li class="slide slide2"><img src="<?php echo ROOT_PATH; ?>assets/img/home/2.jpg"></li>
                <li class="slide slide3"><img src="<?php echo ROOT_PATH; ?>assets/img/home/3.jpg"></li>
                <li class="slide slide4"><img src="<?php echo ROOT_PATH; ?>assets/img/home/4.jpg"></li>
                <li class="slide slide5"><img src="<?php echo ROOT_PATH; ?>assets/img/home/5.jpg"></li>
                <li class="slide slide1"><img src="<?php echo ROOT_PATH; ?>assets/img/home/1.jpg"></li>
            </ul>
        </div>
    </div>


</div>
