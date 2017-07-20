<?php
if (isset($_SESSION['is_logged_in'])) {
    header("location: " . ROOT_URL . "flats");
}
?>


<script src="<?php echo ROOT_PATH; ?>assets/js/home/index.js"></script>

<div id="container2">

    <h3>Witamy w serwisie lokatorów kamienicy czynszowej</h3>

    <div id="slider">
        <ul class="slides">
            <li class="slide slide1">slide1</li>
            <li class="slide slide2">slide2</li>
            <li class="slide slide3">slide3</li>
            <li class="slide slide4">slide4</li>
            <li class="slide slide5">slide5</li>
            <li class="slide slide1">slide1</li>
        </ul>
    </div>


</div>
