<?php

include 'connection.php';

$rgb_red = $_GET["redled"];
$rgb_green = $_GET["greenled"];
$rgb_blue = $_GET["blueled"];
$szervo_allas = $_GET["szervo"];
$lcd_szoveg = $_GET["lcd"];

/*
echo $rgb_red . "<br>";
echo $rgb_green . "<br>";
echo $rgb_blue . "<br>";
echo $szervo_allas . "<br>";
echo $lcd_szoveg . "<br>";
*/

//http://localhost/projekt1/arduinobol_data_mysqlbe.php?redled=on&greenled=on&blueled=on&szervo=100&lcd=karalyos
?>

<html>
<!DOCTYPE html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <title>Arduino</title>
</head>

<style>
    th {
        border: solid 1px black;
    }

    table {
        border: solid 2px black;
    }
</style>

<body>
<table>

    <tr>
        <th>user id</th>
        <th>full_name</th>
        <th>email address</th>
        <th>password</th>
        <th>isadmin</th>
    </tr>

    <?php
    $connection->query("UPDATE meresi_adatok SET redled = '$rgb_red', greenled = '$rgb_green', blueled = '$rgb_blue', lcd_uzenet = '$lcd_szoveg', szervo_allasa = $szervo_allas WHERE id = 1");

    $eredmeny = $connection->query("SELECT * FROM meresi_adatok");

    while ($row = $eredmeny->fetch_assoc()) {
        echo "<tr>";
        echo "<th>" . $row["redled"] . "</th>";
        echo "<th>" . $row["greenled"] . "</th>";
        echo "<th>" . $row["blueled"] . "</th>";
        echo "<th>" . $row["lcd_uzenet"] . "</th>";
        echo "<th>" . $row["szervo_allasa"] . "</th>";
        echo "<tr>";
    }
    ?>

</table>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
        integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>

<script type="text/javascript">

</script>
</body>
</html>

