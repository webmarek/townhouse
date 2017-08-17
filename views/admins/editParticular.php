<?php

if (!isset($_SESSION['is_logged_in_admin'])) {
    header('location: ' . ROOT_PATH);
    exit();
}

/*var_dump($viewmodel);*/
?>

<script src="<?php echo ROOT_URL;?>assets/js/admins/editParticular.js" type="text/javascript"></script>

    <div id="container2">
        <div><a href="<?php echo ROOT_URL; ?>admins" class="button">wstecz</a></div>

        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" id="form">
            <table id="particular">
                <tr>
                    <td colspan="100%">wprowadź dane</td>
                <tr>

                <tr>
                    <td colspan="33%">podaj rok</td>
                    <td colspan="67%">w formacie cyfr arabskich:<input type="text" class="inputInt" name="year" id="year"/></td>
                <tr>

                <tr>
                    <td colspan="33%">podaj miesiac</td>
                    <td colspan="67%">w formacie cyfr arabskich:<input type="text" class="inputInt" name="month" id="month"/></td>
                <tr>

                <tr>
                    <td colspan=33%>podaj nr mieszkania</td>
                    <td colspan=67%>w formacie cyfr arabskich:<input type="text" class="inputInt" name="flat" id="flat"/></td>
                    <input type="hidden"  name="driver" value="particular"/>
                <tr>


                <tr>
                    <td colspan='100%'><input type="button" class="button" value="pokaż" id="showThose"></td>
                <tr>

                <tr>
                    <td colspan='33%'>ciepla woda</td>
                    <td colspan='33%'>zimna woda</td>
                    <td colspan='34%'>prąd</td>
                <tr>

                <tr>
                    <td colspan='33%'><input type="text" name="hwaterUpdate" class="inputInt" id="hwaterUpdate"></td>
                    <td colspan='33%'><input type="text" name="cwaterUpdate" class="inputInt" id="cwaterUpdate"></td>
                    <td colspan='34%'><input type="text" name="electricityUpdate" class="inputInt" id="electricityUpdate"></td>
                <tr>

                <tr>
                    <td colspan='100%'><input type="submit" class="button" name="submit" value="zatwierdź poprawki"/></td>
                <tr>


            </table>
        </form>
    </div>

    <div id="noToShowAlert" title="UWAGA!">
        <p class="alertParagraph" >W podanym miejscu nie ma jeszcze danych, nie ma czego edytować</p>
    </div>


