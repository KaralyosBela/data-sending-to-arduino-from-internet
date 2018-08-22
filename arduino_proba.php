<html>
<head>
</head>
<body>
<form method="post" id="form">
    <select name="portszamok">
        <option value="nothing" <?php if (isset($_POST["portszamok"])) {
            if ($_POST["portszamok"] == "nothing") {
                echo "selected = selected";
            }
        } ?>>Nothing
        </option>
        <option value="serialcom3" <?php if (isset($_POST["portszamok"])) {
            if ($_POST["portszamok"] == "serialcom3") {
                echo "selected = selected";
            }
        } ?> >COM3
        </option>
    </select><br>
    <input type="checkbox" name="redled" value="on" <?php if (isset($_POST['redled'])) echo "checked='checked'"; ?>>Piros<br>
    <input type="checkbox" name="greenled" value="on" <?php if (isset($_POST['greenled'])) echo "checked='checked'"; ?>>Zöld<br>
    <input type="checkbox" name="blueled" value="on" <?php if (isset($_POST['blueled'])) echo "checked='checked'"; ?>>Kék<br>
    <label for="lcdtext">LCD üzenet:</label>
    <input type="text" name="lcdtext" id="lcdtext"><br>
    <label for="servo">Szervo forgás:</label>
    <input type="text" name="servo" id="servo"><br>
    <button type="submit">Küldés</button>
</form>

<?php

if ($_POST) {
    print_r($_POST);
    if ($_POST["portszamok"] == "serialcom3") {
        $allData = "";
        $comPort = "COM3";
        if (isset($_POST["redled"])) {
            $data = "1";
            $allData .= "1 ";
            //exec("ECHO $data > $comPort");
        } else {
            $data = "0";
            $allData .= "0 ";
            //exec("ECHO $data > $comPort");
        }
        //sleep(1);
        if (isset($_POST["greenled"])) {
            $data = "2";
            $allData .= "1 ";
            //exec("ECHO $data > $comPort");
        } else {
            $data = "3";
            $allData .= "0 ";
            //exec("ECHO $data > $comPort");
        }
        //sleep(1);
        if (isset($_POST["blueled"])) {
            $data = "4";
            $allData .= "1 ";
            //exec("ECHO $data > $comPort");
        } else {
            $data = "5";
            $allData .= "0 ";
            //exec("ECHO $data > $comPort");
        }
        //sleep(1);

        if(!empty($_POST["servo"]))
        {
            $rpm = $_POST["servo"];
            $rpm.=" ";
            $allData .= $rpm;
            //exec("ECHO $string > $comPort");
        }else{
            $string = "200";
            $allData .= "200 ";
        }

        if(!empty($_POST["lcdtext"]))
        {
            $string = $_POST["lcdtext"];
            $allData .= $_POST["lcdtext"];
            //exec("ECHO $string > $comPort");
        }else{
            $string = "nope";
            $allData .= "nope";
        }

        echo $allData;
        exec("ECHO $allData > $comPort");
    } else {
        echo "Nincs kiválasztva elérhető port!";
    }
}


?>

<div class="felulet">
    <video id="video" width="600" height="500" autoplay></video>
</div>

<script>

    var video = document.getElementById("video");
    var vendorUrl = window.URL || window.webkitURL;

    navigator.getMedia = navigator.getUserMedia ||
                         navigator.webkitGetUserMedia ||
                         navigator.mozGetUserMedia ||
                         navigator.msGetUserMedia;

    navigator.getMedia({
        video: true,
        audio: false
    }, function (stream) {
        video.src = vendorUrl.createObjectURL(stream);
        video.play();
    }, function (error) {

    });

    /*$(function () {
        $('#myFormName').on('submit', function (e) {

            $.ajax({
                type: 'post',
                url: 'arduino_proba.php',
                data: $('#form').serialize(),
                success: function () {
                    alert("Email has been sent!");
                }
            });
            e.preventDefault();
        });
    });
*/




</script>
</body>
</html>
